<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'entreprise_id',
        'fournisseur_id',
        'designation',
        'description',
        'quantite',
        'delai_de_livraison',
        'status', // Statut de la commande (en attente, approuvée, rejetée, etc.)
        
    ];

    public function entreprise()
    {
        return $this->belongsTo(User::class, 'entreprise_id');
    }

    public function fournisseur()
    {
        return $this->belongsTo(User::class, 'fournisseur_id');
    }

    public function livraisons()
    {
        return $this->hasMany(Livraison::class);
    }

}
