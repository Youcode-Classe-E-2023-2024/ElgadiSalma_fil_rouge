<?php

use Illuminate\Support\Facades\Route;

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
});

Route::get('/medicament', function () {
    return view('Guest.medicineList');
});

Route::get('/about-us', function () {
    return view('Guest.about-us');
});

Route::get('/login', function () {
    return view('Authentification.login');
});

Route::get('/forgot-password', function () {
    return view('Authentification.forgot-password');
});
