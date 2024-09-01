<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'entreprise_id',
        'fournisseur_id',
        'livraison_id',
        'commande_id',
        'prix_unitaire',
        'montant',
        'remise',
        'montant_total',
        'mode_de_paiement', // Mode de paiement (Cash, Chéque, etc.)
    ];

    public function entreprise()
    {
        return $this->belongsTo(User::class, 'entreprise_id');
    }

    public function fournisseur()
    {
        return $this->belongsTo(User::class, 'fournisseur_id');
    }

    public function livraison()
    {
        return $this->belongsTo(Livraison::class);
    }

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

}
