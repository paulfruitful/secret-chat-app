<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\chatControl;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [chatControl::class, 'index'])->name('home');
Route::get('/chats',[chatControl::class,'index']);
Route::get('/chat',[chatControl::class,'show']);
Route::post('/send', [chatControl::class,'sendMessage']);