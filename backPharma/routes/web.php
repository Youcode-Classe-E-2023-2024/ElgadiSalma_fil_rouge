<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\userController;
use App\Http\Controllers\venteController;
use App\Http\Controllers\viewsController;
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


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/medicament', [viewsController::class, 'medicineList'])->name('medicineList');

Route::get('/addMedicine', [viewsController::class, 'addMedicineView'])->name('addMedicineView');

Route::get('/dashboard', [viewsController::class, 'adminDashboard'])->name('adminDashboard');



Route::get('/about-us', function () {
    return view('Guest.about-us');
})->name('about-us');

/*
|--------------------------------------------------------------------------
| Authentification Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('Authentification.login');
})->name('login');

Route::get('/forgot-password', function () {
    return view('Authentification.forgot-password');
})->name('forgot-password');



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
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| Forgot-password
|--------------------------------------------------------------------------
*/
Route::post('/forgotPassword', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/reset-password/{token}', [AuthController::class, 'reset'])->name('password.reset');
Route::get('/reset-password/{token}', [AuthController::class, 'resetView'])->name('password.reset_view');


Route::get('helloworld', [AuthController::class, 'index']);


/*
|--------------------------------------------------------------------------
| CRUD medicament
|--------------------------------------------------------------------------
*/
Route::post('/medicine', [medicamentController::class, 'addMedicine'])->name('medicine.add');
Route::put('/medicine/{id}', [medicamentController::class, 'editMedicine'])->name('medicine.edit');
Route::delete('/medicine/{id}', [medicamentController::class, 'deleteMedicine'])->name('medicine.delete');


/*
|--------------------------------------------------------------------------
| CRUD category
|--------------------------------------------------------------------------
*/
Route::post('/category', [categoryController::class, 'addCategory'])->name('category.add');
Route::put('/category/{id}', [categoryController::class, 'editCategory'])->name('category.edit');
Route::delete('/category/{id}', [categoryController::class, 'deleteCategory'])->name('category.delete');


/*
|--------------------------------------------------------------------------
| CRUD users
|--------------------------------------------------------------------------
*/
Route::post('/users', [userController::class, 'addUser'])->name('user.add');
Route::put('/users/{id}', [userController::class, 'editUser'])->name('user.edit');
Route::delete('/users/{id}', [userController::class, 'deleteUser'])->name('user.delete');


/*
|--------------------------------------------------------------------------
| pharma infos
|--------------------------------------------------------------------------
*/
Route::post('/pharmaInfos', [pharmaController::class, 'addPharma'])->name('pharma.add');


/*
|--------------------------------------------------------------------------
| CRD commande
|--------------------------------------------------------------------------
*/
Route::post('/commande', [commandeController::class, 'addCommande'])->name('commande.add');
Route::delete('/commande/{id}', [commandeController::class, 'deleteCommande'])->name('commande.delete');


/*
|--------------------------------------------------------------------------
| approuve or decline commande
|--------------------------------------------------------------------------
*/
Route::put('/commande/{id}', [commandeController::class, 'approuveCommande'])->name('commande.approuve');
// Route::delete('/commande/{id}', [commandeController::class, 'declineCommande']);


/*
|--------------------------------------------------------------------------
| buy medicine
|--------------------------------------------------------------------------
*/
Route::put('/buyMedicine/{id}', [venteController::class, 'buyMedicine'])->name('medicine.buy');
// Route::delete('/commande/{id}', [commandeController::class, 'declineCommande']);
