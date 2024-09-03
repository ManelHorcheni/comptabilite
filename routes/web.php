<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\FactureController;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\EntrepriseMiddleware;
use App\Http\Middleware\FournisseurMiddleware;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

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
Route::get('/parametre/{id}', [HomeController::class, 'modifier_entreprise'])->name('parametre');
Route::put('/produit/update/{id}', [EntrepriseController::class, 'update'])->name('produit.update');
Route::delete('/produits/{id}', [EntrepriseController::class, 'destroy'])->name('produits.destroy');
Route::get('/fournisseurs', [EntrepriseController::class, 'list_fournisseurs'])->name('fournisseurs');
Route::post('/commandes/create', [CommandeController::class, 'store'])->name('commandes.store');
Route::get('/commandes', [CommandeController::class, 'index'])->name('commandes.index');
Route::get('/entreprise/livraisons', [LivraisonController::class, 'livraisonEntreprise'])->name('entreprise.livraison');
Route::get('/livraisons/pdf/{id}', [LivraisonController::class, 'downloadPDF'])->name('livraisons.pdf');
Route::get('/entreprise/telecharger_pdf/{id}/pdf', [CommandeController::class, 'telechargerPDF'])->name('entreprise.telecharger_pdf');

});

//fournisseur
Route::middleware([FournisseurMiddleware::class])->group(function () {

Route::get('/bord', [FournisseurController::class, 'index'])->name('bord');
Route::get('/fournisseur/commandes', [CommandeController::class, 'afficher_Commandes'])->name('fournisseur.commandes');
Route::put('/fournisseur/commandes/{id}', [CommandeController::class, 'updateCommandeStatus'])->name('fournisseur.update_commande_status');
Route::get('/telecharger_pdf/{id}/pdf', [CommandeController::class, 'telechargerPDF'])->name('telecharger_pdf');
Route::get('/update/{id}', [HomeController::class, 'modifier_fournisseur'])->name('fournisseur.update');
Route::post('/livraison', [LivraisonController::class, 'store'])->name('livraison.store');
Route::get('/livraisons', [LivraisonController::class, 'index'])->name('livraisons.index');
Route::get('/livraison/pdf/{id}', [LivraisonController::class, 'downloadPDF'])->name('livraison.pdf');


});

//client


