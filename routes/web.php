<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\EntrepriseMiddleware;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/* Route::middleware(['auth', 'role:0'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/dashboard', [EntrepriseController::class, 'index'])->name('dashboard');
}); */

//Admin
Route::middleware([AdminMiddleware::class])->group(function () {

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/users', [HomeController::class, 'allusers'])->name('users');
Route::get('/adduser', [HomeController::class, 'add'])->name('users.add');
Route::post('/users/store', [HomeController::class, 'store'])->name('store');
Route::put('/user/update/{id}', [HomeController::class, 'update'])->name('user.update');
Route::delete('/users/{id}', [HomeController::class, 'destroy'])->name('users.destroy');
Route::get('/settings/{id}', [HomeController::class, 'modifier'])->name('settings');
});
//entreprise
Route::middleware([EntrepriseMiddleware::class])->group(function () {
Route::get('/dashbord', [EntrepriseController::class, 'index'])->name('dashbord');
Route::get('/produits', [EntrepriseController::class, 'allproduits'])->name('produits');
Route::get('/addproduit', [EntrepriseController::class, 'add'])->name('produits.add');
Route::post('/store', [EntrepriseController::class, 'store'])->name('produits.store');
Route::get('/parametre/{id}', [HomeController::class, 'modifier'])->name('parametre');
Route::put('/produit/update/{id}', [EntrepriseController::class, 'update'])->name('produit.update');
Route::delete('/produits/{id}', [EntrepriseController::class, 'destroy'])->name('produits.destroy');
});
//fournisseur

//client


