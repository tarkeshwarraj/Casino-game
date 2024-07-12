<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BetController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::post('user/login', [AuthController::class, 'login'])->name('login');

Route::get('user/login', function () {
    return view('login');
})->name('login');

Route::get('user/register', function () {
    return view('register');
})->name('userregister');

// Alias for login route to avoid RouteNotFoundException
// Route::get('login', function () {
//     return redirect()->route('userlogin');
// })->name('login');

Route::middleware(['auth'])->group(function () {

    Route::get('/welcomeuser', function () {
        return view('dashboard');
    })->name('dashboard');

    //Game
    Route::get('/JhundiBurja', function () {
        return view('games.burja');
    })->name('jhundi');

    Route::post('/save-bets', [BetController::class, 'saveBets'])->name('save.bets');

    Route::get('/game-wallet', [AuthController::class, 'gamePreview'])->name('gamePreview');

    Route::get('/fetch-balance', [BetController::class, 'fetchbalance'])->name('fetchbalance');

    Route::get('user/Logout', [AuthController::class, 'logout'])->name('logout');

    // Route::post('/user/register', [AuthController::class, 'new'])->name('newcreate');


    Route::get('/generate-random-numbers', [BetController::class, 'generateRandomNumbers']);
    //Bet controller



});
Route::resource('users', AuthController::class);

Route::get('/auth/facebook', [AuthController::class, 'redirectToFacebook'])->name('facebookLogin');
Route::get('/auth/facebook/callback', [AuthController::class, 'facebookcallback'])->name('facebookcallback');

Route::get('/auth/google', [AuthController::class, 'googleLogin'])->name('googleLogin');
Route::get('/auth/google/callback', [AuthController::class, 'googlecallback'])->name('googlecallback');
