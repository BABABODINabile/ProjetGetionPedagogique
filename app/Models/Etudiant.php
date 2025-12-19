<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'promotion_id',
        'filiere_id',
        'matricule',
        'nom',
        'prenom',
        'email',
        'password'
    ];

    public function user() { return $this->belongsTo(User::class); }
    public function promotion() { return $this->belongsTo(Promotion::class); }
    public function filiere() { return $this->belongsTo(Filiere::class); }
    public function assignations() { return $this->hasMany(Assignation::class); }


}
