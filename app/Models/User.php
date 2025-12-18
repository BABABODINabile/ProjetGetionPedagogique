<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Etudiant;
use App\Models\Administration;
use App\Models\Formateur;
use Filament\Models\Contracts\FilamentUser; //Pour Filament Admin
use Filament\Panel; // Pour Filament Admin
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'role',
        'is_active'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function etudiant() { return $this->hasOne(Etudiant::class); }
    public function formateur() { return $this->hasOne(Formateur::class); }
    public function administration() { return $this->hasOne(Administration::class); }

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
