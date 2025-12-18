<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'nom',
        'prenom',
        'email',
        'password',
        'fonction',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
