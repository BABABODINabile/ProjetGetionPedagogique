<?php

/**
 * Namespace : indique que cette classe appartient au dossier App\Models
 * Tous les modèles Laravel sont dans ce namespace
 */
namespace App\Models;

/**
 * Importation des classes nécessaires au fonctionnement du modèle
 */

// Permet de créer des données de test (factories)
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Classe de base pour l'authentification (login, logout, session)
use Illuminate\Foundation\Auth\User as Authenticatable;

// Permet l'envoi de notifications (mail, base de données, etc.)
use Illuminate\Notifications\Notifiable;

// Permet l'authentification via API (tokens, Sanctum)
use Laravel\Sanctum\HasApiTokens;

/**
 * Classe User : représente la table "users" dans la base de données
 * Elle étend Authenticatable car les utilisateurs peuvent se connecter
 */
class User extends Authenticatable
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'specialite',
    ];

    /**
     * Champs cachés lors de la conversion en JSON ou tableau
     * (API, retour AJAX, debug)
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Conversion automatique des champs
     * Laravel transforme les valeurs de la base en types PHP
     */
    protected $casts = [
        // Convertit automatiquement en objet DateTime
        'email_verified_at' => 'datetime',

        // Hash automatiquement le mot de passe (Laravel 10+)
        'password' => 'hashed',
    ];

    /**
     * RELATIONS ELOQUENT
     */

    /**
     * Relation : un utilisateur peut être UN étudiant
     * Table users → table etudiants
     */
    public function etudiant()
    {
        return $this->hasOne(Etudiant::class);
    }

    /**
     * Relation : un utilisateur peut être UN formateur
     * Table users → table formateurs
     */
    public function formateur()
    {
        return $this->hasOne(Formateur::class);
    }

    /**
     * Relation : un utilisateur peut être UN membre de l'administration
     * Table users → table administrations
     */
    public function administration()
    {
        return $this->hasOne(Administration::class);
    }
}
