<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\Api\AuthController;


/*
|--------------------------------------------------------------------------
| Authentification
|--------------------------------------------------------------------------
*/
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| Forgot-password
|--------------------------------------------------------------------------
*/
Route::post('/forgotPassword', [AuthController::class, 'forgotPassword']);
Route::get('/reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/resetPassword', [AuthController::class, 'reset']);
    

Route::group([
    'middleware' => 'auth:api'
], function () {
    Route::get('helloworld', [AuthController::class, 'index']);


});
