<?php

namespace App\Models;

use App\Models\User;
use App\Models\transaction;
use App\Models\wilaya_wilaya;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class annonce extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'titre',
        'texte',
        'img',
        'wilaya_wilaya_id',
        'transport_type',
        'fourchette_poid_min',
        'fourchette_poid_max',
        'fourchette_volume_min',
        'fourchette_volume_max',
        'moyen_transport',
        'user_id',
        'transporteur_id',
        'views'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function transporteur()
    {
        return $this->belongsTo(User::class,'transporteur_id');
    }

    public function tarjet()
    {
        return $this->belongsTo(wilaya_wilaya::class,'wilaya_wilaya_id');
    }

    public function transactions() // les annonces postees par le user
    {
        return $this->hasMany(transaction::class);
    }

}
