<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Livraison;
use Barryvdh\DomPDF\Facade\Pdf;

class LivraisonController extends Controller
{
    //retourne la page livraison du fournisseur
    public function index()
    {
        $fournisseurId = Auth::user()->id;
        // Récupère toutes les livraisons associées à ce fournisseur
        $livraisons = Livraison::where('fournisseur_id', $fournisseurId)->get();
        return view('fournisseur.livraisons', compact('livraisons'));
    }

    //ajouter une livraison
    public function store(Request $request)
    {
        $request->validate([
            'commande_id' => 'required|exists:commandes,id',
        ]);

        $commande = Commande::findOrFail($request->commande_id);

        $livraison = Livraison::create([
            'entreprise_id' => $commande->entreprise_id,
            'fournisseur_id' => auth()->user()->id,
            'commande_id' => $request->commande_id,
        ]);

        return redirect()->back()->with('success', 'Bon de livraison créé avec succès.');
    }

    //télécharger pdf
    public function downloadPDF($livraisonId)
    {
        $livraison = Livraison::findOrFail($livraisonId);
        $entreprise = $livraison->commande->entreprise;
        $fournisseur = $livraison->fournisseur;

        $pdf = Pdf::loadView('pdf.bon_de_livraison', compact('livraison', 'entreprise', 'fournisseur'));
        return $pdf->download('bon_de_livraison.pdf');
    }

    //retourne la page livraison de l'entreprise
    public function livraisonEntreprise()
    {
        $entrepriseId = Auth::user()->id;

        // Récupère toutes les livraisons associées à cette entreprise
        $livraisons = Livraison::where('entreprise_id', $entrepriseId)->get();

        return view('entreprise.livraison', compact('livraisons'));
    }

}
