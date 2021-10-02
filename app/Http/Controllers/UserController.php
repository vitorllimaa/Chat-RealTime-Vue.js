<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profile() {


        return view('user.profile');
    }

    public function profileUpdate(Request $request) {

        $user = auth()->user();
        $data = $request->all();

        if(empty($data['name'])) {
            unset($data['name']);
        }

        if(empty($data['email'])) {
            unset($data['email']);
        }

        if($request->password) {
            $data['password'] = bcrypt($data['password']);
        }else {
            unset($data['password']);
        }

        if($request->hasFile('file') && $request->file('file')->isValid()) {

            $special_characters = array('\\', '/', '|', '?', '<', '>', '*', ':', '“');

            if($user->image && Storage::exists("public/users/$user->image")) {
                Storage::delete("public/users/$user->image");
            }

            //nome da imagem
            $name = strtolower(str_replace(' ', '_', $request->name)).uniqid($user->id);
            $name = str_ireplace($special_characters, '',
            htmlspecialchars($name));
            $extension = ".".$request->file->extension();
            $nameImage = $name.$extension;
            $data['file'] = $nameImage;

            //adiciona o nome da image no banco de dados
            $user->update(['image' => $data['file']]);


            $upload = $request->file->storeAs('public/users', $nameImage);

            if(!$upload) {
                return redirect()->route('profile')->with('Eror', 'Erro ao atualizar o foto de perfil:/');
            }
            unset($data['file']);
        }


            $user->update($data);


            return redirect()->route('profile')->with('success', 'Atualizado com sucesso!');
    }
}
