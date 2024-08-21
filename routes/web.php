<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/allusers', [App\Http\Controllers\HomeController::class, 'allusers'])->name('liste_users');
Route::post('/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');
Route::put('/user/update/{id}', [HomeController::class, 'update'])->name('user.update');
Route::delete('/users/{id}', [HomeController::class, 'destroy'])->name('users.destroy');


/* Route::get('/home','HomeController@index')->name('home');
Route::get('/afficheruser','HomeController@afficher_users')->name('afficheruser'); 
Route::post('/store','HomeController@store')->name('store');*/

