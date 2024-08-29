<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'img',
        'prix',
        'quantite',
        'categorie',
        'id_entreprise',
        
    ];

    // Relation avec l'utilisateur (entreprise)
    public function entreprise()
    {
        return $this->belongsTo(User::class, 'id_entreprise');
    }
}
