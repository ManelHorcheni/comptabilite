<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;

class EntrepriseController extends Controller
{
    //retourne la page dashbord
    public function index()
    {
        $produits=Produit::get()->count();
        return view('entreprise.dashbord',compact('produits'));
    }

    //retourne la page AddProduit
    public function add()
    {
        return view('entreprise.addproduit');
    }

    //ajouter produit
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'nullable|string|max:255',
            'img' => 'nullable|image|max:2048',
            'quantite' => 'nullable|integer',
            'categorie' => 'nullable|string|max:255',
        ]);

        // Traitement de l'image
        
        if ($request->hasFile('img')) {
        $image = $request->file('img');
            $imageName = time().'.'.$request->img->extension();  
            $request->img->move(public_path('images'), $imageName);
        } else {
            $imageName = 'produitt.png';
        }

        // Création du produit
        Produit::create([
            'name' => $request->name,
            'description' => $request->description,
            'prix' => $request->prix,
            'img' => $imageName,
            'quantite' => $request->quantite,
            'categorie' => $request->categorie,
        ]);

        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'Produit ajouté avec succès');
    }

    //retourne la page produits avec filtre
public function allproduits(Request $request)
{
    $query = Produit::query();

    // Filtrer par nom
    if ($request->has('name') && !empty($request->input('name'))) {
        $query->where('name', 'LIKE', '%' . $request->input('name') . '%');
    }

    // Filtrer par catégorie
    if ($request->has('categorie') && !empty($request->input('categorie'))) {
        $query->where('categorie', $request->input('categorie'));
    }

    // Filtrer par prix minimum
    if ($request->has('prix_min') && !empty($request->input('prix_min'))) {
        $query->where('prix', '>=', $request->input('prix_min'));
    }

    // Filtrer par prix maximum
    if ($request->has('prix_max') && !empty($request->input('prix_max'))) {
        $query->where('prix', '<=', $request->input('prix_max'));
    }

    // Obtenir les produits filtrés
    $produits = $query->get();

    return view('entreprise.produits', compact('produits'));
}

    //retourne la page parametre
    public function modifier($id)
    {
    $produit = Produit::findOrFail($id);
    return view('entreprise.parametre', compact('produit'));
    }

    //modifier produit
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'string',
        'description' => 'nullable|string|min:8',
        'prix' => 'nullable|string',
        'quantite' => 'nullable|integer',
        'categorie' => 'nullable|string',
        'img' => 'nullable|image',
    ]);

    $produit = Produit::findOrFail($id);

    $produit->name = $request->input('name');
    $produit->description = $request->input('description');
    $produit->prix = $request->input('prix');
    $produit->quantite = $request->input('quantite');
    $produit->categorie = $request->input('categorie');

    // Handle profile image upload
    if ($request->hasFile('img')) {
        $image = $request->file('img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $produit->img = $imageName;
    }

    $produit->save();

    return redirect()->back()->with('success', 'Produit mis à jour avec succès');
}

//supprimer produit
public function destroy($id)
{
    $produit = Produit::find($id);
    if ($produit) {
        $produit->delete();
        return redirect()->back()->with('success', 'Produit supprimé avec succès.');
    } else {
        return redirect()->back()->with('error', 'Produit non trouvé.');
    }
}


}
