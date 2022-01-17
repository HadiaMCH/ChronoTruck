<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\acceuilView;
use Illuminate\Routing\Controller;


class statistiquesView extends Controller
{
    public function statistiques(){
        return (new acceuilView)->headhome().(new acceuilView)->navbar().$this->contenu().(new acceuilView)->footer();
    }

    public function contenu()
    {
        $code='';
        return $code;
    }

}