<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContentsController;
use App\Http\Controllers\PortfoliosController;
use App\Http\Controllers\MediasController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\ContactMessagesController;
use App\Http\Controllers\UsersController;

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

// Public routes
Route::get('/v1/contents', [ContentsController::class, 'index']);
Route::get('/v1/portfolios', [PortfoliosController::class, 'index']);
Route::get('/v1/sliders', [SlidersController::class, 'index']);
Route::post('/v1/send-contact-form', [ContactMessagesController::class, 'send']);
Route::get('/auth-user', function (Request $request) {
    return $request->user();
});

// Private routes
Route::middleware('auth:sanctum')->group(function() {
    Route::post('/v1/contents', [ContentsController::class, 'store']);
    Route::put('/v1/contents/{id}', [ContentsController::class, 'update']);
    Route::delete('/v1/contents/{id}', [ContentsController::class, 'destroy']);

    Route::post('/v1/portfolios', [PortfoliosController::class, 'store']);
    Route::put('/v1/portfolios/{id}', [PortfoliosController::class, 'update']);
    Route::delete('/v1/portfolios/{id}', [PortfoliosController::class, 'destroy']);
    Route::post('/v1/portfolios/update-order', [PortfoliosController::class, 'updateOrder']);

    Route::get('/v1/medias', [MediasController::class, 'getMedias']);
    Route::post('/v1/medias', [MediasController::class, 'uploadMedias']);
    Route::post('/v1/medias/delete', [MediasController::class, 'destroy']);

    Route::put('/v1/sliders/{id}', [SlidersController::class, 'update']);

    Route::get('/v1/contacts', [ContactMessagesController::class, 'index']);
    Route::get('/v1/contacts/{id}', [ContactMessagesController::class, 'show']);
    Route::put('/v1/contacts/{id}', [ContactMessagesController::class, 'update']);

    Route::apiResource('/v1/users', UsersController::class);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
