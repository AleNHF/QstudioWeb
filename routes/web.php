<?php

use App\Http\Livewire\Login;
use App\Http\Livewire\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ChildrenComponent;

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

Route::middleware(['auth'])->group( function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');


Route::get('/children', ChildrenComponent::class)->name('children.render');

    Route::get('/welcome', function () {
        return view('welcome');
    });
});


Route::middleware('guest')->group( function () {

    Route::get('/register', Register::class)->name('register.render');
    Route::get('/login', Login::class)->name('login.render');
});
