<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    protected $fillable = ['moto_id', 'type', 'montant', 'date', 'description'];

    public function moto()
    {
        return $this->belongsTo(Moto::class);
    }
}