<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Panier;
use App\Models\PanierItem;
use App\Models\User;

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

    public function panier()
    {
        $itms_panier=PanierItem::get()->count();
        $user = auth()->user();
        // Vérifier si l'utilisateur a un panier
        $panier = $user->panier ?? null;
        // On récupère les items du panier pour les passer à la vue
        $produits = $panier ? $panier->items()->with('produit')->get() : [];

        $total = 0;
        if ($panier) {
            // Calculer le total en additionnant le prix de chaque produit multiplié par la quantité
            foreach ($panier->items as $item) {
            $total += $item->produit->prix * $item->quantite;
        }
    }

        return view('client.panier', compact('panier','total','produits','itms_panier'));
    }

    public function addToCart(Request $request, $produitId)
    {
        $user = auth()->user();
        $produit = Produit::findOrFail($produitId);
    
        // Vérifie si l'utilisateur a déjà un panier, sinon, en crée un
        $panier = $user->panier ?? Panier::create(['user_id' => $user->id]);

        // Ajoute le produit au panier (ou met à jour la quantité si déjà présent)
        $panierItem = $panier->items()->where('produit_id', $produitId)->first();

        if ($panierItem) {
            // Si le produit est déjà dans le panier, on augmente la quantité
            $panierItem->increment('quantite');
        } else {
            // Sinon, on ajoute le produit
            $panier->items()->create([
                'produit_id' => $produitId,
                'quantite' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Produit ajouté au panier!');
    }

    public function removeFromCart($produitId)
    {
        $user = auth()->user();
        $panier = $user->panier;

        if ($panier) {
            $panierItem = $panier->items()->where('produit_id', $produitId)->first();
        
            if ($panierItem) {
                $panierItem->delete();
            }
        }

        return redirect()->back()->with('success', 'Produit retiré du panier!');
    }


}
