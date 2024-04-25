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
| Guest Routes
|--------------------------------------------------------------------------
*/

Route::get('/',[viewsController::class, 'homePage'])->name('homePage');


Route::get('/about-us', function () {
    return view('Guest.about-us');
})->name('about-us');

Route::get('/medicine/{id}', [viewsController::class, 'showMedicine'])->name('medicine.show');


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



Route::middleware(['auth.check'])->group(function () {


    Route::middleware('role:Administrateur')->group(function () {
        /*
        |--------------------------------------------------------------------------
        | Admin Routes
        |--------------------------------------------------------------------------
        */

        Route::get('/medicament', [viewsController::class, 'medicineList'])->name('medicineList');

        Route::get('/addMedicine', [viewsController::class, 'addMedicineView'])->name('addMedicineView');

        Route::get('/dashboard', [viewsController::class, 'adminDashboard'])->name('adminDashboard');

        Route::get('/User', [viewsController::class, 'addUserViewAdmin'])->name('addUserViewAdmin');

        Route::get('/addCategory', [viewsController::class, 'addCategoryView'])->name('addCategoryView');

        Route::get('/medicineList', [viewsController::class, 'medicineListAdmin'])->name('medicineListAdmin');


        

        /*
        |--------------------------------------------------------------------------
        | CRUD medicament
        |--------------------------------------------------------------------------
        */
        Route::post('/medicine', [medicamentController::class, 'addMedicine'])->name('medicine.add');
        Route::put('/medicine/{id}', [medicamentController::class, 'editMedicine'])->name('medicine.edit');
        Route::get('/editMedicine/{id}', [viewsController::class, 'editMedicineView'])->name('medicine.edit.view');
        Route::delete('/medicine/{id}', [medicamentController::class, 'deleteMedicine'])->name('medicine.delete');


        /*
        |--------------------------------------------------------------------------
        | CRUD category
        |--------------------------------------------------------------------------
        */
        Route::post('/category', [categoryController::class, 'addCategory'])->name('category.add');
        Route::put('/category/{id}', [categoryController::class, 'editCategory'])->name('category.edit');
        Route::delete('/category/{id}', [categoryController::class, 'deleteCategory'])->name('category.delete');



    });


    Route::middleware('role:Administrateur|Moderateur')->group(function () {
        

        /*
        |--------------------------------------------------------------------------
        | CRUD users
        |--------------------------------------------------------------------------
        */
        Route::post('/users', [userController::class, 'addUser'])->name('user.add');
        Route::put('/users/{id}', [userController::class, 'editUser'])->name('user.edit');
        Route::delete('/users/{id}', [userController::class, 'deleteUser'])->name('user.delete');

    });


    Route::middleware('role:Utilisateur|Moderateur')->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Moderateur Routes
        |--------------------------------------------------------------------------
        */
        Route::get('/dashboardM', [viewsController::class, 'moderateurDashboard'])->name('moderateurDashboard');

        Route::get('/medicines', [viewsController::class, 'medicineUser'])->name('medicineListUser');

        Route::get('/vente', [viewsController::class, 'venteView'])->name('venteView');

        Route::get('/commande', [viewsController::class, 'addCommandeView'])->name('addCommandeView');

        Route::get('/addUser', [viewsController::class, 'addUserView'])->name('addUserView');


        /*
        |--------------------------------------------------------------------------
        | CRD commande
        |--------------------------------------------------------------------------
        */
        Route::post('/commande', [commandeController::class, 'addCommande'])->name('commande.add');
        Route::delete('/commande/{id}', [commandeController::class, 'deleteCommande'])->name('commande.delete');



        /*
        |--------------------------------------------------------------------------
        | buy medicine
        |--------------------------------------------------------------------------
        */
        Route::put('/buyMedicine/{id}', [venteController::class, 'buyMedicine'])->name('medicine.buy');

        
    });

    


    Route::middleware('role:Moderateur')->group(function () {
        
        /*
        |--------------------------------------------------------------------------
        | pharma infos
        |--------------------------------------------------------------------------
        */
        Route::get('/pharmaAdd', [viewsController::class, 'pharmaAddView'])->name('pharmacie.view');

        Route::post('/pharmaInfos', [pharmaController::class, 'addPharma'])->name('pharma.add');


        
        /*
        |--------------------------------------------------------------------------
        | approuve or decline commande
        |--------------------------------------------------------------------------
        */
        Route::put('/commande/{id}', [commandeController::class, 'approuveCommande'])->name('commande.approuve');



    });

});
