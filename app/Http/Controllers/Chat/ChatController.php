<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;

class ChatController extends Controller
{

    public function index() {

        return view('chat.index');
    }

    public function store(Request $request) {

        $message = auth()->user()->message()->create([
            'body' => $request->body
        ]);

        return response()->json($message, 201);
    }
}
