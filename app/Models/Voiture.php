<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;

    protected $fillable = [
        'marque',
        'modele',
        'annee',
        'kilometrage',
        'prix',
        'prix_promotion',
        'date_fin_promotion',
        'en_promotion',
        'description',
        'etat_diagnostic',
        'statut',
        'entreprise_id',
        'image',
    ];

    protected $casts = [
        'annee' => 'integer',
        'kilometrage' => 'integer',
        'prix' => 'decimal:2',
        'prix_promotion' => 'decimal:2',
        'en_promotion' => 'boolean',
        'date_fin_promotion' => 'date',
    ];
    
    protected $appends = ['prix_actuel', 'est_en_promotion', 'pourcentage_reduction'];
    
    /**
     * Get the current price (promo price if available, otherwise regular price)
     */
    public function getPrixActuelAttribute()
    {
        return $this->en_promotion && $this->prix_promotion 
            ? $this->prix_promotion 
            : $this->prix;
    }
    
    /**
     * Check if the car is currently on promotion
     */
    public function getEstEnPromotionAttribute()
    {
        if (!$this->en_promotion || !$this->prix_promotion) {
            return false;
        }
        
        if ($this->date_fin_promotion) {
            return now()->lte($this->date_fin_promotion);
        }
        
        return true;
    }
    
    /**
     * Calculate the discount percentage
     */
    public function getPourcentageReductionAttribute()
    {
        if (!$this->est_en_promotion || $this->prix <= 0) {
            return 0;
        }
        
        return round((($this->prix - $this->prix_promotion) / $this->prix) * 100);
    }

    // Relations
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class)->withDefault([
            'nom' => 'Aucune entreprise',
            'id' => null
        ]);
    }
    
    // Scopes
    public function scopeEnPromotion($query)
    {
        return $query->where('en_promotion', true)
            ->where(function($q) {
                $q->whereNull('date_fin_promotion')
                  ->orWhere('date_fin_promotion', '>=', now());
            });
    }
    
    public function scopeDisponibles($query)
    {
        return $query->where('statut', 'disponible');
    }
    
    public function scopeVendues($query)
    {
        return $query->where('statut', 'vendu');
    }

    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }

    public function ventes()
    {
        return $this->hasMany(Vente::class);
    }
}