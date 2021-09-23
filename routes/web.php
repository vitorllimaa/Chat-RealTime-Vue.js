<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Chat\ChatController;


Route::group(['middleware' => 'auth'], function () {
    Route::get('chat', [ChatController::class, 'index'])->name('chat');
    Route::post('chat/message', [ChatController::class, 'store']);

    Route::get('chat/messages', [ChatController::class, 'messages'])->name('messageschat');

});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
