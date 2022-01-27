<?php

namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Views\acceuilView;


class statistiquesView extends Controller
{
    public function statistiques($clients,$transporteurs,$transporteurs_c,$annonces_v,$annonces_e,$annonces_t){
        return (new acceuilView)->headhome().(new acceuilView)->navbar().$this->contenu($clients,$transporteurs,$transporteurs_c,$annonces_v,$annonces_e,$annonces_t).(new acceuilView)->footer();
    }

}