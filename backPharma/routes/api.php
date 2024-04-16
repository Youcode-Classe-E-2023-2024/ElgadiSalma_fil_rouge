<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\venteController;
use App\Http\Controllers\pharmaController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\commandeController;
use App\Http\Controllers\medicamentController;

// /*
// |--------------------------------------------------------------------------
// | Authentification
// |--------------------------------------------------------------------------
// */

// Route::post('login', [AuthController::class, 'login']);

// /*
// |--------------------------------------------------------------------------
// | Forgot-password
// |--------------------------------------------------------------------------
// */
// Route::post('/forgotPassword', [AuthController::class, 'forgotPassword']);
// Route::get('/reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
// Route::post('/resetPassword', [AuthController::class, 'reset']);


// Route::group([
//     'middleware' => 'auth:api'
// ], function () {
//     Route::get('helloworld', [AuthController::class, 'index']);
//     Route::post('logout', [AuthController::class, 'logout']);


//     /*
//     |--------------------------------------------------------------------------
//     | CRUD medicament
//     |--------------------------------------------------------------------------
//     */
//     Route::post('/medicine', [medicamentController::class, 'addMedicine']);
//     Route::put('/medicine/{id}', [medicamentController::class, 'editMedicine']);
//     Route::delete('/medicine/{id}', [medicamentController::class, 'deleteMedicine']);


//     /*
//     |--------------------------------------------------------------------------
//     | CRUD category
//     |--------------------------------------------------------------------------
//     */
//     Route::post('/category', [categoryController::class, 'addCategory']);
//     Route::put('/category/{id}', [categoryController::class, 'editCategory']);
//     Route::delete('/category/{id}', [categoryController::class, 'deleteCategory']);


//     /*
//     |--------------------------------------------------------------------------
//     | CRUD users
//     |--------------------------------------------------------------------------
//     */
//     Route::post('/users', [userController::class, 'addUser']);
//     Route::put('/users/{id}', [userController::class, 'editUser']);
//     Route::delete('/users/{id}', [userController::class, 'deleteUser']);


//     /*
//     |--------------------------------------------------------------------------
//     | pharma infos
//     |--------------------------------------------------------------------------
//     */
//     Route::post('/pharmaInfos', [pharmaController::class, 'addPharma']);
    


//     /*
//     |--------------------------------------------------------------------------
//     | CRD commande
//     |--------------------------------------------------------------------------
//     */
//     Route::post('/commande', [commandeController::class, 'addCommande']);
//     Route::delete('/commande/{id}', [commandeController::class, 'deleteCommande']);


//     /*
//     |--------------------------------------------------------------------------
//     | approuve or decline commande
//     |--------------------------------------------------------------------------
//     */
//     Route::put('/commande/{id}', [commandeController::class, 'approuveCommande']);
//     // Route::delete('/commande/{id}', [commandeController::class, 'declineCommande']);


//     /*
//     |--------------------------------------------------------------------------
//     | buy medicine
//     |--------------------------------------------------------------------------
//     */
//     Route::put('/buyMedicine/{id}', [venteController::class, 'buyMedicine']);
//     // Route::delete('/commande/{id}', [commandeController::class, 'declineCommande']);



// });
