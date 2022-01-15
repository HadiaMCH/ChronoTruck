<?php

namespace App\Models;

use App\Models\User;
use App\Models\annonce;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'annonce_id',
        'client_id',
        'transporteur_id',
        'contenu',
        'status',
    ];

    public function annonce()
    {
        return $this->belongsTo(annonce::class);
    }

    public function client()
    {
        return $this->belongsTo(User::class,'client_id');
    }

    public function transporteur()
    {
        return $this->belongsTo(User::class,'transporteur_id');
    }
    
}
