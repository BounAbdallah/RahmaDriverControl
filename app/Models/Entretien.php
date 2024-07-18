<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entretien extends Model
{
    use HasFactory;

    protected $fillable = ['moto_id', 'date', 'type', 'description', 'cout'];

    public function moto()
    {
        return $this->belongsTo(Moto::class);
    }
}