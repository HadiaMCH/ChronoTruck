<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class annonce extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'titre',
        'texte',
        'img',
        'depart',
        'arriver',
        'transport_type',
        'fourchette_poid_min',
        'fourchette_poid_max',
        'fourchette_volume_min',
        'fourchette_volume_max',
        'moyen_transport',
        'user_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
