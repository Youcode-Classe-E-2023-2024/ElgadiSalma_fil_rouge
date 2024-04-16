<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\userController;
use App\Http\Controllers\venteController;
use App\Http\Controllers\pharmaController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\commandeController;
use App\Http\Controllers\medicamentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Guest.homePage');
})->name('homePage');

Route::get('/medicament', function () {
    return view('Guest.medicineList');
})->name('medicineList');

Route::get('/about-us', function () {
    return view('Guest.about-us');
})->name('about-us');

Route::get('/login', function () {
    return view('Authentification.login');
})->name('login');

Route::get('/forgot-password', function () {
    return view('Authentification.forgot-password');
})->name('forgot-password');

// Route::get('/reset-password/{token}', function () {
//     return view('Authentification.reset-password');
// })->name('reset-password');

/*
|--------------------------------------------------------------------------
| Authentification
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| Authentification
|--------------------------------------------------------------------------
*/

Route::post('login', [AuthController::class, 'login'])->name('login');

/*
|--------------------------------------------------------------------------
| Forgot-password
|--------------------------------------------------------------------------
*/
Route::post('/forgotPassword', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/reset-password/{token}', [AuthController::class, 'reset'])->name('password.reset');
Route::get('/reset-password/{token}', [AuthController::class, 'resetView'])->name('password.reset_view');
// Route::post('/resetPassword', [AuthController::class, 'reset']);


Route::group([
    'middleware' => 'auth:api'
], function () {
    Route::get('helloworld', [AuthController::class, 'index']);
    Route::post('logout', [AuthController::class, 'logout']);


    /*
    |--------------------------------------------------------------------------
    | CRUD medicament
    |--------------------------------------------------------------------------
    */
    Route::post('/medicine', [medicamentController::class, 'addMedicine']);
    Route::put('/medicine/{id}', [medicamentController::class, 'editMedicine']);
    Route::delete('/medicine/{id}', [medicamentController::class, 'deleteMedicine']);


    /*
    |--------------------------------------------------------------------------
    | CRUD category
    |--------------------------------------------------------------------------
    */
    Route::post('/category', [categoryController::class, 'addCategory']);
    Route::put('/category/{id}', [categoryController::class, 'editCategory']);
    Route::delete('/category/{id}', [categoryController::class, 'deleteCategory']);


    /*
    |--------------------------------------------------------------------------
    | CRUD users
    |--------------------------------------------------------------------------
    */
    Route::post('/users', [userController::class, 'addUser']);
    Route::put('/users/{id}', [userController::class, 'editUser']);
    Route::delete('/users/{id}', [userController::class, 'deleteUser']);


    /*
    |--------------------------------------------------------------------------
    | pharma infos
    |--------------------------------------------------------------------------
    */
    Route::post('/pharmaInfos', [pharmaController::class, 'addPharma']);
    


    /*
    |--------------------------------------------------------------------------
    | CRD commande
    |--------------------------------------------------------------------------
    */
    Route::post('/commande', [commandeController::class, 'addCommande']);
    Route::delete('/commande/{id}', [commandeController::class, 'deleteCommande']);


    /*
    |--------------------------------------------------------------------------
    | approuve or decline commande
    |--------------------------------------------------------------------------
    */
    Route::put('/commande/{id}', [commandeController::class, 'approuveCommande']);
    // Route::delete('/commande/{id}', [commandeController::class, 'declineCommande']);


    /*
    |--------------------------------------------------------------------------
    | buy medicine
    |--------------------------------------------------------------------------
    */
    Route::put('/buyMedicine/{id}', [venteController::class, 'buyMedicine']);
    // Route::delete('/commande/{id}', [commandeController::class, 'declineCommande']);



});


