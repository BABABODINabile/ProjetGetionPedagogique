<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory;

    protected $fillable = [
        'assignation_id',
        'contenu ',
        'date_livraison',
    ];

    public function assignation() { return $this->belongsTo(Assignation::class); }
    public function evaluation() { return $this->hasOne(Evaluation::class); }
}
