<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ChildrenComponent;
use App\Http\Livewire\ContentComponet;
use App\Http\Livewire\CallComponet;
use App\Http\Livewire\LocationComponet;
use App\Http\Livewire\FileComponet;
use App\Http\Livewire\ContactsComponet;
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

//children
Route::get('/children', ChildrenComponent::class)->name('children.render');

Route::get('/content/{child}', ContentComponet::class)->name('content.render');
Route::get('/location/{child}', LocationComponet::class)->name('location.render');
Route::get('/contacts/{child}', ContactsComponet::class)->name('contacts.render');
Route::get('/file/{child}', FileComponet::class)->name('file.render');

Route::get('/call/{child}', CallComponet::class)->name('call.render');

