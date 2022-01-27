<?php

namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Views\acceuilAdminView;


class gestion_annoncesView extends Controller
{
    public function gestion_annonces($wilayas,$annonces){
        return (new acceuilAdminView)->headAdmin().(new acceuilAdminView)->navbarAdmin().$this->contenu($wilayas,$annonces);
    }

}