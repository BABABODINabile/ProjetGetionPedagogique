<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'annee',
    ];

    public function groupes()
    {
        return $this->hasMany(Groupe::class);
    }

    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }

    public function espaces()
    {
        return $this->hasMany(Espace::class);
    }
}
