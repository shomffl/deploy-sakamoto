<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ChatController;

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

//Route::get('/', function () {
  //  return view('welcome');
//});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [RoomController::class, 'front'])->name('front');
    Route::get('/posts/create', [RoomController::class, 'create'])->name('create');
    Route::get('/posts/{room}', [RoomController::class, 'room_info']);
    Route::get('/chat/{room}', [RoomController::class, 'chat']);
    Route::post('/chat', [RoomController::class, 'store']);
    Route::post('/input', [ChatController::class, 'exeStore']);
    Route::get('/chat/{room}', [ChatController::class, 'chat']);
    Route::get('/chat', [RoomController::class, 'chat']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
