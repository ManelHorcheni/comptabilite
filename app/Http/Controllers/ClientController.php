<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;

class ClientController extends Controller
{
    //retourne la page accueil
    public function index(Request $request)
    {
        // Initialiser la requête pour récupérer les produits avec l'entreprise associée
        $query = Produit::with('entreprise');

        // Filtrer par nom de produit
        if ($request->has('name') && !empty($request->input('name'))) {
            $query->where('name', 'LIKE', '%' . $request->input('name') . '%');
        }

        // Filtrer par catégorie de produit
        if ($request->has('categorie') && !empty($request->input('categorie'))) {
            $query->where('categorie', $request->input('categorie'));
        }


    // Exécuter la requête et récupérer les résultats
    $produits = $query->get();
        return view('client.accueil',compact('produits'));
    }

    public function contact(){
        return view('client.contact');
    }

}
