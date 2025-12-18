<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    /**
     * Nom de la table associée au modèle.
     * 
     * Optionnel ici car Laravel devine automatiquement
     * "promotions" à partir de "Promotion".
     */
    protected $table = 'promotions';

    /**
     * Attributs autorisés pour l’insertion et la mise à jour
     * via create() ou update().
     * 
     * Protection contre les failles de type Mass Assignment.
     */
    protected $fillable = [
        'libelle',
        // 'annee', // à décommenter si tu ajoutes la colonne plus tard
    ];

    /**
     * Relation (exemple futur)
     * 
     * Une promotion peut avoir plusieurs étudiants.
     * À utiliser plus tard si tu ajoutes la table etudiants.
     */
    // public function etudiants()
    // {
    //     return $this->hasMany(Etudiant::class);
    // }
}
