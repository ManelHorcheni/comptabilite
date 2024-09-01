<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'adresse',
        'specialite',
        'description',
        'img',
        'role',
    ];

    // Relation avec les produits
    public function produits()
    {
        return $this->hasMany(Produit::class, 'id_entreprise');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //Role
    public function isAdmin()
    {
        return $this->role === 0; 
    }
    public function isEntreprise()
    {
        return $this->role === 1; 
    }
    public function isFournisseur()
    {
        return $this->role === 2; 
    }


public function commandes_Entreprise()
{
    return $this->hasMany(Commande::class, 'entreprise_id');
}

public function commandes_Fournisseur()
{
    return $this->hasMany(Commande::class, 'fournisseur_id');
}

public function livraisons_Entreprise()
{
    return $this->hasMany(Livraison::class, 'entreprise_id');
}

public function livraisons_Fournisseur()
{
    return $this->hasMany(Livraison::class, 'fournisseur_id');
}

public function factures_Entreprise()
{
    return $this->hasMany(Facture::class, 'entreprise_id');
}

public function factures_Fournisseur()
{
    return $this->hasMany(Facture::class, 'fournisseur_id');
}


}
