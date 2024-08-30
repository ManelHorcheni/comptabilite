<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    //retourne la page dashbordfournisseur
    public function index()
    {
        return view('fournisseur.bord');
        /* $commande=Commande::get()->count();
        $vente=Vente::get()->count();
        return view('fournisseur.dashbordfournisseur',compact('commande','vente')); */
    }
}
