<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Commande;
use App\Models\Livraison;
use App\Models\Facture;


class FactureController extends Controller
{
    public function store(Request $request, $commandeId)
{
    // Récupérer la commande correspondante
    $commande = Commande::findOrFail($commandeId);
    $entreprise = $commande->entreprise;
    $fournisseur = $commande->fournisseur;

    // Vérifier si une livraison existe pour cette commande
    $livraison = Livraison::where('commande_id', $commande->id)->first();
    
    if (!$livraison) {
        // Créer une nouvelle livraison si elle n'existe pas encore
        $livraison = new Livraison();
        $livraison->entreprise_id = $entreprise->id;
        $livraison->fournisseur_id = $fournisseur->id;
        $livraison->commande_id = $commande->id;
        $livraison->save();
    }

    // Calculer le montant en fonction de la quantité
    $montant = $request->prix_unitaire * $commande->quantite;

    // Calculer la remise en pourcentage
    $remise = ($request->remise / 100) * $montant;

    // Calculer le montant total après application de la remise
    $montant_total = $montant - $remise;

    // Créer la facture
    $facture = new Facture();
    $facture->entreprise_id = $entreprise->id;
    $facture->fournisseur_id = $fournisseur->id;
    $facture->livraison_id = $livraison->id;
    $facture->commande_id = $commande->id;
    $facture->prix_unitaire = $request->prix_unitaire;
    $facture->montant = $montant;
    $facture->remise = $request->remise ?? 0;
    $facture->montant_total = $montant_total;
    $facture->mode_de_paiement = $request->mode_de_paiement;

    // Enregistrer la facture
    $facture->save();

    // Rediriger avec un message de succès
    return redirect()->back()->with('success', 'Facture envoyée avec succès.');
}

public function index_Entreprise()
{
    $factures = Facture::where('entreprise_id', auth()->user()->id)->get();
    return view('entreprise.facture', compact('factures'));
}

public function index_Fourisseur()
{
    $factures = Facture::where('fournisseur_id', auth()->user()->id)->get();
    return view('fournisseur.factures', compact('factures'));
}

public function downloadPDF($factureId)
{
    $facture = Facture::findOrFail($factureId);
    $pdf = Pdf::loadView('pdf.facture', compact('facture'));
    return $pdf->download('facture_'.$facture->id.'.pdf');
}





}