<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;

    protected $fillable = [
        'demande_id',
        'voiture_id',
        'montant',
        'statut_paiement',
        'financier_id',
        'code_recue',
        'pdf_recue',
        'date_vente',
    ];

    protected $casts = [
        'date_vente' => 'datetime',
        'montant' => 'decimal:2',
    ];

    // Relations
    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }

    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }

    public function financier()
    {
        return $this->belongsTo(User::class, 'financier_id');
    }
}