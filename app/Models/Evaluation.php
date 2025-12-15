<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;


    protected $fillable = [
        'livraison_id',
        'note',
        'points',
        'commentaire',
    ];

    public function livraison()
    {
        return $this->belongsTo(Livraison::class);
    }
}
