<?php

namespace App\Models;

use App\Models\wilaya;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class wilaya extends Model
{
    use HasFactory;

    public function wilaya_departs()
    {
        return $this->belongsToMany(wilaya::class,'wilaya_wilayas','wilaya_arriver_id','wilaya_depart_id');
    }

    public function wilaya_arriver()
    {
        return $this->belongsToMany(wilaya::class,'wilaya_wilayas','wilaya_depart_id','wilaya_arriver_id');
    }
}
