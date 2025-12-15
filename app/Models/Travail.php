<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travail extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'consigne',
        'date_limite',
        'espace_id',
    ];

    public function espace() {
        return $this->belongsTo(Espace::class);
    }

    public function assignations() {
        return $this->hasMany(Assignation::class);
    }
}
