<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wilaya_wilaya extends Model
{
    use HasFactory;

    protected $fillable = [
        'wilaya_depart_id',
        'wilaya_arriver_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'user_wilayas');
    }

    public function annonces()
    {
        return $this->hasMany(annonce::class);
    }
}
