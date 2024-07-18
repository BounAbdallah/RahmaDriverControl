<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Versement;
use App\Models\Notification;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom_complet',
        'email',
        'telephone',
        'password',
        'role',
        'adresse',
        'statut',
        'numero_permis',
        'date_naissance',
    ];

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

    /**
     * Check if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Check if the user is a chauffeur.
     *
     * @return bool
     */
    public function isChauffeur(): bool
    {
        return $this->role === 'chauffeur';
    }

    /**
     * Scope a query to only include active chauffeurs.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActiveChauffeurs($query)
    {
        return $query->where('role', 'chauffeur')->where('statut', 'actif');
    }
    public function versements()
{
    return $this->hasMany(Versement::class);
}

public function notifications()
{
    return $this->hasMany(Notification::class);
}
}