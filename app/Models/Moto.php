<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moto extends Model
{
    use HasFactory;

    protected $fillable = [
        'marque',
        'modele',
        'numero_serie',
        'annee',
        'statut',
        'description',
        'chauffeur_id'
    ];

    public function chauffeur()
    {
        return $this->belongsTo(User::class, 'chauffeur_id');
    }
    public function finances()
    {
        return $this->hasMany(Finance::class);
    }

    public function entretiens()
    {
        return $this->hasMany(Entretien::class);
    }
}