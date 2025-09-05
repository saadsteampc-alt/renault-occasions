<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'voiture_id',
        'date_visite',
        'statut',
        'vendeur_id',
    ];

    protected $casts = [
        'date_visite' => 'datetime',
    ];

    // Relations
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }

    public function vendeur()
    {
        return $this->belongsTo(User::class, 'vendeur_id');
    }

    public function vente()
    {
        return $this->hasOne(Vente::class);
    }
}