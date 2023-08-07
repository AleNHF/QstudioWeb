<?php

use App\Events\ContentNotificationEvent;
use App\Events\PruebaPushEvent;
use App\Events\PushNotificationEvent;
use App\Http\Livewire\Login;
use App\Http\Livewire\NotificationComponent;
use App\Http\Livewire\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ChildrenComponent;
use App\Http\Livewire\ContentComponet;
use App\Http\Livewire\CallComponet;
use App\Http\Livewire\LocationComponet;
use App\Http\Livewire\FileComponet;
use App\Http\Livewire\ContactsComponet;
use App\Http\Livewire\TokenComponet;
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

Route::get('/prueba', function () {
    event(new PruebaPushEvent());
    return 'Prueba';
});

Route::get('/register', Register::class)->name('register.render');
Route::get('/login', Login::class)->name('login')->name('login.render');

Route::get('markAsRead', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markAsRead');
Route::get('notifications', NotificationComponent::class)->name('notification.render');

Route::middleware(['auth'])->group(function () {
    Route::get('/plan', [App\Http\Controllers\UserController::class, 'plan'])->name('plan');
    Route::get('/success', [App\Http\Controllers\UserController::class, 'success'])->name('success');
    Route::post('/plan', [App\Http\Controllers\UserController::class, 'checkout'])->name('checkout');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/children', ChildrenComponent::class)->name('children.render');
    Route::get('/content/{child}', ContentComponet::class)->name('content.render');
    Route::get('/location/{child}', LocationComponet::class)->name('location.render');
    Route::get('/contacts/{child}', ContactsComponet::class)->name('contacts.render');
    Route::get('/file/{child}', FileComponet::class)->name('file.render');
    Route::get('/call/{child}', CallComponet::class)->name('call.render');

    Route::get('/token', TokenComponet::class)->name('token.render');

});
