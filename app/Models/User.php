<?php

namespace App\Models;

use App\Models\annonce;
use App\Models\wilaya_wilaya;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
 
    protected $fillable = [
        'name',
        'familyname',
        'email',
        'password',
        'address',
        'phone',
        'transporteur',
        'demande',
        'statut',
        'justificatif'
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
    ];

    public function annonces_user() // les annonces postees par le user
    {
        return $this->hasMany(annonce::class,'user_id');
    }

    public function annonces_transporteur() // les annonces transporter par le transporteur
    {
        return $this->hasMany(annonce::class,'transporteur_id');
    }

    public function tarjets()
    {
        return $this->belongsToMany(wilaya_wilaya::class,'user_wilayas');
    } 

    public function transactions_client() 
    {
        return $this->hasMany(transaction::class,'client_id');
    }

    public function transactions_transporteur() 
    {
        return $this->hasMany(transaction::class,'transporteur_id');
    }

}
