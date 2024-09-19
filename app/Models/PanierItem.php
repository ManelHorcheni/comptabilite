<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanierItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'panier_id',
        'produit_id',
        'quantite', // Quantité du produit dans le panier
    ];

    // Relation avec le panier
    public function panier()
    {
        return $this->belongsTo(Panier::class);
    }

    // Relation avec le produit
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }
    
}
