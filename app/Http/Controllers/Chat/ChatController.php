<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;
use App\Models\Message;
use App\Events\Chat\MessageCreated;

class ChatController extends Controller
{

    public function index() {

        return view('chat.index');
    }

    public function messages() {

        $messages = new Message();

        $messages = $messages->with('user')
                             ->orderby('id', 'DESC')
                             ->limit(50)
                             ->latest()
                             ->get();

        return response()->json($messages, 200);

    }

    public function store(Request $request) {

        $user = auth()->user();
        $message = $user->message()->create([
            'body' => $request->body
        ]);

        $message['user'] = $user;

        broadcast(new MessageCreated($message))->toOthers();

        return response()->json($message, 201);
    }

}
