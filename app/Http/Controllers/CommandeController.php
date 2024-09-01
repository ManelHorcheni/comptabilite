<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\User;
use App\Models\Fournisseur;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;


class CommandeController extends Controller
{
    public function index()
    {
        // Récupère toutes les commandes associées à l'utilisateur connecté
        $commandes = Commande::where('entreprise_id', Auth::id())->get();
        
        return view('entreprise.commande', compact('commandes'));
    }
    //afficher la page du commande dans la partie du fournisseur
    public function afficher_Commandes()
    {
        $fournisseurId = Auth::user()->id;
        $commandes = Commande::where('fournisseur_id', $fournisseurId)->get();

        return view('fournisseur.commandes', compact('commandes'));
    }

    //Modifier Status du commande dans la partie du fournisseur
    public function updateCommandeStatus(Request $request, $id)
    {
        $commande = Commande::findOrFail($id);
        $commande->status = $request->input('status');
        $commande->save();

        return redirect()->route('fournisseur.commandes')->with('success', 'Le statut de la commande a été mis à jour.');
    }

 /*    public function telechargerPDF($id)
{
    // Récupérer la commande par son ID
    $commande = Commande::findOrFail($id);

    // Charger la vue qui sera utilisée pour générer le PDF
    $pdf = Pdf::loadView('pdf.bon_commande', compact('commande'));

    // Retourner le PDF pour téléchargement
    return $pdf->download('bon_commande_'.$commande->id.'.pdf');
} */

    // Fonction pour stocker la commande
    public function store(Request $request)
{
    $request->validate([
        'fournisseur_id' => 'required|exists:users,id',
        'designation' => 'required|string|max:255',
        'description' => 'nullable|string',
        'quantite' => 'required|integer|min:1',  // Utilisation correcte de min:1
        'delai_de_livraison' => 'required|date',
    ]);
    //dd($request->all());

    // Créer la commande
    $commande = new Commande([
        'entreprise_id' => auth()->user()->id,
        'fournisseur_id' => $request->fournisseur_id,
        'designation' => $request->designation,
        'description' => $request->description,
        'quantite' => $request->quantite,
        'delai_de_livraison' => $request->delai_de_livraison,
        'status' => 'en attente',
    ]);

    $commande->save();

    return redirect()->back()->with('success', 'Commande envoyée avec succès au fournisseur.');
}

}
