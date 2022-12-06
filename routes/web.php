<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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
    return view('layout');
});


Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'getAll']);
    Route::post('/add', [UserController::class, 'createUser'])->name('user.add');
});

Route::prefix('auth')->group(function () {
    Route::get('/login', function () {
        $title = 'Login';
        return view('page.auth.login', compact('title'));
    })->name('auth.login');
    Route::post('/login', [AuthController::class, 'Login'])->name('auth.login.post');

    Route::get('/register', function () {
        $title = 'Register';
        return view('page.auth.register', compact('title'));
    })->name('auth.register');
    Route::post('/register', [AuthController::class, 'Register'])->name('auth.register.post');
    Route::post('/forgot', [AuthController::class, 'Forgot'])->name('auth.forgot');

    Route::get('/active/{code}/{email}', [AuthController::class, 'Active'])->name('auth.active')->where([
        'code' => '[0-9a-z]+',
        'email' => '^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$'
    ]);
});
