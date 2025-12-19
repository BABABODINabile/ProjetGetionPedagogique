<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Travail;
use App\Models\Etudiant;
use App\Models\Groupe;
use App\Models\Livraison;
class Assignation extends Model
{
    use HasFactory;
    protected $fillable = [
        'travail_id',
        'etudiant_id',
        'groupe_id',
        'date_debut',
        'date_fin',
    ];

    public function travail() { return $this->belongsTo(Travail::class); }
    public function etudiant() { return $this->belongsTo(Etudiant::class); }
    public function groupe() { return $this->belongsTo(Groupe::class); }
    public function livraison() { return $this->hasOne(Livraison::class); }
}
