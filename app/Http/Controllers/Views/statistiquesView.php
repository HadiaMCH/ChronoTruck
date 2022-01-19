<?php

namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Views\acceuilView;


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