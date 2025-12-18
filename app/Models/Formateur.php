<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formateur extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'specialite',
        'nom',
        'prenom',
        'email',
        'password'
    ];
    public function matieres() {
        return $this->belongsToMany(Matiere::class);
    }

    public function espaces() {
        return $this->hasMany(Espace::class);
    }
}
