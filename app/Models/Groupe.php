<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;


    protected $fillable = [
        'libelle',
        'promotion_id',
    ];

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

    public function assignations()
    {
        return $this->hasMany(Assignation::class);
    }
}
