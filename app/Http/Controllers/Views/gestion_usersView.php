<?php

namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Views\acceuilAdminView;


class gestion_usersView extends Controller
{
    public function gestion_users($clients,$transporteurs,$transporteur_annonces,$client_annonces){
        return (new acceuilAdminView)->headAdmin().(new acceuilAdminView)->navbarAdmin().$this->contenu($clients,$transporteurs,$transporteur_annonces,$client_annonces);
    }

}
