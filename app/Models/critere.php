<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class critere extends Model
{
    use HasFactory;
    protected $fillable = [
        'texte',
        'picked'
    ]; 
}
