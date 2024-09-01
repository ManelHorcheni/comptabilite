<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory;

    protected $fillable = [
        'entreprise_id',
        'fournisseur_id',
        'commande_id',
    ];

    public function entreprise()
    {
        return $this->belongsTo(User::class, 'entreprise_id');
    }

    public function fournisseur()
    {
        return $this->belongsTo(User::class, 'fournisseur_id');
    }

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

    public function facture()
    {
        return $this->hasOne(Facture::class);
    }

}
