<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Chat\ChatController;
use App\Http\Controllers\UserController;


Route::group(['middleware' => 'auth'], function () {
    Route::get('chat', [ChatController::class, 'index'])->name('chat');

    Route::post('chat/message', [ChatController::class, 'store']);
    Route::get('chat/messages', [ChatController::class, 'messages'])->name('messageschat');

    Route::get('meuperfil', [UserController::class, 'profile'])->name('profile');

});

Route::get('/', function () {
    return redirect( 'chat');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
