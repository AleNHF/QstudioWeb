<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CallController;
use App\Http\Controllers\Api\ChildrenController;
use App\Http\Controllers\Api\ContactsController;
use App\Http\Controllers\Api\ContentController;
use App\Http\Controllers\Api\ExpotokenController;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\RekognitionController;
use App\Http\Controllers\Api\TutorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return "hola";
});
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::controller(ExpotokenController::class)->group(function () {
    Route::post('/register-token-kid', 'registerTokenLogin');
    Route::post('/register-notification', 'registerExpotoken');
    Route::post('/send-token', 'sendToken');
    ROute::post('/verify-token','verifyToken');
    Route::post('disabled/token', 'disabledTokenInfante');

});

Route::group(['middleware' => ["auth:sanctum"]], function () {
    Route::post('profile', [AuthController::class, 'profile']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('profile/update', [TutorController::class, 'update']);
    Route::get('getChildren', [TutorController::class, 'getChildren']);
    //Route::get('/delete-token', [App\Http\Controllers\API\ExpoTokenController::class, 'deleteExpotoken']);

    Route::post('children/store', [ChildrenController::class, 'store']);
   
    Route::prefix('location')->group(function () {
        Route::post('/store', [LocationController::class, 'store']);
        Route::get('/kid/{kidId}', [LocationController::class, 'getLocationXKid']);
    });

    Route::prefix('file')->group(function () {
        Route::get('/kid/{idkid}', [FileController::class, 'getFilesXKid']);
        Route::post('/', [FileController::class, 'store']);
        Route::post('/{id}', [FileController::class, 'update']);
        Route::get('/{id}', [FileController::class, 'show']);
        Route::delete('/{id}', [FileController::class, 'destroy']);
    });

    Route::prefix('contact')->group(function () {
        Route::get('/kid/{idkid}', [ContactsController::class, 'getContactsXKid']);
        Route::post('/', [ContactsController::class, 'store']);
        Route::post('/{id}', [ContactsController::class, 'update']);
        Route::get('/{id}', [ContactsController::class, 'show']);
        Route::delete('/{id}', [ContactsController::class, 'destroy']);
    });

    Route::prefix('call')->group(function () {
        Route::post('/store', [CallController::class, 'store']);
        Route::post('/{id}', [CallController::class, 'update']);
        Route::get('/{id}', [CallController::class, 'show']);
        Route::delete('/{id}', [CallController::class, 'destroy']);
        Route::get('/{idchild}/children', [CallController::class, 'getCallsxChildren']);
        Route::get('/{idcontact}/contact', [CallController::class, 'getCallsXContact']);
    });

    Route::prefix('content')->group(function () {
        Route::post('/store', [ContentController::class, 'store']);
        Route::post('/{id}', [ContentController::class, 'update']);
        Route::get('/{id}', [ContentController::class, 'show']);
        Route::delete('/{id}', [ContentController::class, 'destroy']);
        Route::get('/', [ContentController::class, 'index']);
        Route::get('/index/quantity', [ContentController::class, 'quantity_of_content']);
        Route::get('/kid/{idKid}', [ContentController::class, 'contentXKid']);
        Route::get('/children/index', [ContentController::class, 'contentXChildren']);
    });

    // TODO: Endpoints for control image with AWS
    Route::prefix('rekognition')->group(function () {
        Route::post('/controlCamera', [RekognitionController::class, 'imageControlCamera']);
        Route::post('/controlDownload', [RekognitionController::class, 'imageControlDownload']);
        Route::post('/controlFacebook', [RekognitionController::class, 'imageControlFacebook']);
        Route::post('/controlTelegram', [RekognitionController::class, 'imageControlTelegram']);
        Route::post('/controlDocument', [RekognitionController::class, 'documentControl']);
    });
});
