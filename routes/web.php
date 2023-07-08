<?php

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

Route::get('/', function () {
    return view('inicio');
    // return view('front.index');
});

Route::get('/children', ChildrenComponent::class)->name('children.render');
});
