<?php

use App\Http\Livewire\Login;
use App\Http\Livewire\Register;
use Illuminate\Support\Facades\Route;



Route::get('/register', Register::class)->name('register.render');
Route::get('/login', Login::class)->name('login.render');
// Route::middleware('guest')->group(
//     function () {


// });
