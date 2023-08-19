<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebSocketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/ws', [WebSocketController::class, 'onOpen']);


// // Route::get('/ws://localhost:3000/ws', [WebSocketController::class, 'onOpen'])->name('test');
Route::get('/chat', function () {
    return view('chat');
});

Auth::routes();
Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
