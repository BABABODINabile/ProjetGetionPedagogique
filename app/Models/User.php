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
use App\Models\Etudiant;
use App\Models\Administration;
use App\Models\Formateur;
use Filament\Models\Contracts\FilamentUser; //Pour Filament Admin
use Filament\Panel; // Pour Filament Admin
class User extends Authenticatable
{
    /**
     * Traits utilisés par le modèle
     */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Les champs autorisés à l'insertion ou à la mise à jour
     * (protection contre les attaques de type "mass assignment")
     *
     * Exemple :
     * User::create([...]) n'acceptera QUE ces champs
     */
    protected $fillable = [
        'email',
        'password',
        'role',
        'is_active'
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

    public function canAccessPanel(Panel $panel): bool
    {
        // Seul le rôle 'admin' (Directeur) peut accéder au dashboard
        return $this->fonction === 'admin' && $this->is_active;
    }

    public function getNameAttribute(): string
    {
        // On vérifie d'abord si la relation administration existe
        if ($this->administration) {
            return "{$this->administration->prenom} {$this->administration->nom}";
        }

        // Fallback (sécurité) : si ce n'est pas un admin, on affiche l'email
        return $this->email;
    }
    

}
