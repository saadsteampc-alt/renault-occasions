<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'entreprise_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relations
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
    
    /**
     * Get the entreprise owned by the user (for admins or users who own an entreprise)
     */
    public function ownedEntreprise()
    {
        return $this->hasOne(Entreprise::class, 'user_id');
    }

    public function ventes()
    {
        return $this->hasMany(Vente::class, 'financier_id');
    }

    public function demandesTraitees()
    {
        return $this->hasMany(Demande::class, 'vendeur_id');
    }
}