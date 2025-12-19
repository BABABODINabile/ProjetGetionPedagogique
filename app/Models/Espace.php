<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espace extends Model
{
    use HasFactory;



    protected $fillable = [
        'matiere_id',
        'formateur_id',
        'promotion_id',
    ];

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function formateur()
    {
        return $this->belongsTo(Formateur::class);
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

    public function travails()
    {
        return $this->hasMany(Travail::class);
    }
}
