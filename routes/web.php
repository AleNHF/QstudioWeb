<?php

use App\Http\Livewire\Login;
use App\Http\Livewire\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ChildrenComponent;
use App\Http\Livewire\ContentComponet;
use App\Http\Livewire\CallComponet;
use App\Http\Livewire\LocationComponet;
use App\Http\Livewire\FileComponet;
use App\Http\Livewire\ContactsComponet;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use Ratchet\Server\IoServer;
use App\Http\Controllers\WebSocket\WebSocketController;
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

Route::get('/websocket', function () {
    $webSocketController = new WebSocketController();

    $server = IoServer::factory(
        new HttpServer(
            new WsServer($webSocketController)
        ),
        8090 // Puerto en el que se ejecutará el servidor WebSocket
    );
    $server->run();
});
//$server->run();

Route::get('/', function () {
    return view('inicio');
});

//*************************************************

//**************************************************/



Route::get('/register', Register::class)->name('register.render');
Route::get('/login', Login::class)->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/children', ChildrenComponent::class)->name('children.render');
    Route::get('/content/{child}', ContentComponet::class)->name('content.render');
    Route::get('/location/{child}', LocationComponet::class)->name('location.render');
    Route::get('/contacts/{child}', ContactsComponet::class)->name('contacts.render');
    Route::get('/file/{child}', FileComponet::class)->name('file.render');
    Route::get('/call/{child}', CallComponet::class)->name('call.render');
});
