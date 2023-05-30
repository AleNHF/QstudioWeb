<?php

use Illuminate\Support\Facades\Route;

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

Route::post('register', [App\Http\Controllers\API\AuthController::class, 'register']);
Route::post('login', [App\Http\Controllers\API\AuthController::class, 'login']);

Route::controller(App\Http\Controllers\API\ExpoTokenController::class)->group(function () {
    Route::post('/register-token-kid', 'registerTokenLogin');
    Route::post('/register-notification', 'registerExpotoken');
    Route::post('/send-token', 'sendToken');
});

Route::group(['middleware' => ["auth:sanctum"]], function () {
    Route::post('profile', [App\Http\Controllers\API\AuthController::class, 'profile']);
    Route::post('logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
    Route::post('profile/update', [App\Http\Controllers\API\TutorController::class, 'update']);
    Route::get('getChildren', [App\Http\Controllers\API\TutorController::class, 'getChildren']);
    //Route::get('/delete-token', [App\Http\Controllers\API\ExpoTokenController::class, 'deleteExpotoken']);

    Route::post('children/store', [App\Http\Controllers\API\ChildrenController::class, 'store']);

    Route::prefix('location')->group(function () {
        Route::post('/store', [App\Http\Controllers\API\LocationController::class, 'store']);
        Route::get('/kid/{kidId}', [App\Http\Controllers\API\LocationController::class, 'getLocationXKid']);
    });

    Route::prefix('file')->group(function () {
        Route::get('/kid/{idkid}', [App\Http\Controllers\API\FileController::class, 'getFilesXKid']);
        Route::post('/', [App\Http\Controllers\API\FileController::class, 'store']);
        Route::post('/{id}', [App\Http\Controllers\API\FileController::class, 'update']);
        Route::get('/{id}', [App\Http\Controllers\API\FileController::class, 'show']);
        Route::delete('/{id}', [App\Http\Controllers\API\FileController::class, 'destroy']);
    });

    Route::prefix('contact')->group(function () {
        Route::get('/kid/{idkid}', [App\Http\Controllers\API\ContactsController::class, 'getContactsXKid']);
        Route::post('/', [App\Http\Controllers\API\ContactsController::class, 'store']);
        Route::post('/{id}', [App\Http\Controllers\API\ContactsController::class, 'update']);
        Route::get('/{id}', [App\Http\Controllers\API\ContactsController::class, 'show']);
        Route::delete('/{id}', [App\Http\Controllers\API\ContactsController::class, 'destroy']);
        Route::get('/call/{idcontact}', [App\Http\Controllers\API\CallController::class, 'getCallsXContact']);
    });

    Route::prefix('call')->group(function () {
        Route::post('/store', [App\Http\Controllers\API\CallController::class, 'store']);
        Route::post('/{id}', [App\Http\Controllers\API\CallController::class, 'update']);
        Route::get('/{id}', [App\Http\Controllers\API\CallController::class, 'show']);
        Route::delete('/{id}', [App\Http\Controllers\API\CallController::class, 'destroy']);
    });

    Route::prefix('content')->group(function () {
        Route::post('/store', [App\Http\Controllers\API\ContentController::class, 'store']);
        Route::post('/{id}', [App\Http\Controllers\API\ContentController::class, 'update']);
        Route::get('/{id}', [App\Http\Controllers\API\ContentController::class, 'show']);
        Route::delete('/{id}', [App\Http\Controllers\API\ContentController::class, 'destroy']);
        Route::get('/', [App\Http\Controllers\API\ContentController::class, 'index']);
        Route::get('/index/quantity', [App\Http\Controllers\API\ContentController::class, 'quantity_of_content']);
        Route::get('/kid/{idKid}', [App\Http\Controllers\API\ContentController::class, 'contentXKid']);
        Route::get('/children/index', [App\Http\Controllers\API\ContentController::class, 'contentXChildren']);
    });
  
    // TODO: Endpoints for control image with AWS
    Route::prefix('rekognition')->group(function () {
        Route::post('/controlCamera', [App\Http\Controllers\API\RekognitionController::class, 'imageControlCamera']);
        Route::post('/controlDownload', [App\Http\Controllers\API\RekognitionController::class, 'imageControlDownload']);
        Route::post('/controlFacebook', [App\Http\Controllers\API\RekognitionController::class, 'imageControlFacebook']);
        Route::post('/controlTelegram', [App\Http\Controllers\API\RekognitionController::class, 'imageControlTelegram']);
        Route::post('/controlDocument', [App\Http\Controllers\API\RekognitionController::class, 'documentControl']);
    });
});