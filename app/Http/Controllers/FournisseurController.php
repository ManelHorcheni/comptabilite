<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Facture;

class FournisseurController extends Controller
{
    //retourne la page dashbordfournisseur
    public function index()
    {
        $commandes=Commande::get()->count();
        $factures=Facture::get()->count();
        return view('fournisseur.bord',compact('commandes','factures'));
    }
}
