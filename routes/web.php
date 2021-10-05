<?php

use Illuminate\Support\Facades\Route;
// composer update
// php artisan migrate
// php artisan db:seed
// php artisan migrate:refresh --seed
// composer dump-autoload
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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');

Route::get('/forgot-password', function () {
    return view('auth/forgot-password');
});

Route::get('/reset-password/{token}', function () {
    return view('auth/reset-password');
})->name('password.reset');

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/admin/{any}', [App\Http\Controllers\AdminController::class, 'index'])->where('any', '.*');
});

// Route::get('{any}', function () { 
//     return view('vue-layout'); 
// })->where('any', '.*'); 

Route::get('/login', function () {
    return view('login');
})->name('login');