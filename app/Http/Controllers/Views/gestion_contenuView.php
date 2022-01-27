<?php

namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Views\acceuilAdminView;


class gestion_contenuView extends Controller
{
    public function gestion_contenu($contacts,$presentation){
        return (new acceuilAdminView)->headAdmin().(new acceuilAdminView)->navbarAdmin().$this->contenu($contacts,$presentation);
    }

}