<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse_physique',
        'adresse_email',
        'telephone',
        'ville',
        'pays',
        'code_postal',
        'siret',
        'description',
        'logo',
        'site_web',
        'user_id',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relations
    public function users()
    {
        return $this->hasMany(User::class);
    }
    
    /**
     * Get the user who owns/created this entreprise
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function voitures()
    {
        return $this->hasMany(Voiture::class);
    }
}