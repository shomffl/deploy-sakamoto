<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\GamePredictController;
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
    Route::post('/room/search', [RoomController::class, 'search']);
    Route::get('/rooms/create', [RoomController::class, 'create'])->name('create');
    Route::get('/rooms/{room}/preview', [RoomController::class, 'room_info']);
    Route::get('/chat/{room}', [RoomController::class, 'chat']);
    Route::get('/rooms/{room}/edit', [RoomController::class, 'edit']);
    Route::put('/rooms/{room}', [RoomController::class, 'update']);
    Route::post('/chat', [RoomController::class, 'store']);
    Route::post('/input', [ChatController::class, 'exeStore']);
    //Route::get('/chat/{room}/{id}', [ChatController::class, 'chat']);
    //Route::get('/chat', [RoomController::class, 'chat']);
    Route::get('/game_predict/{room}',[GamePredictController::class, 'game_predict']);
    Route::post('/game_predict/first_bench_team', [GamePredictController::class, 'voteToFirstBenchTeam']);
    Route::post('/game_predict/third_bench_team', [GamePredictController::class, 'voteToThirdBenchTeam']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
