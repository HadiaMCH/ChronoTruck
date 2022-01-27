<?php

namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Views\acceuilAdminView;


class gestion_newsView extends Controller
{
    public function gestion_news($news){
        return (new acceuilAdminView)->headAdmin().(new acceuilAdminView)->navbarAdmin().$this->contenu($news);
    }

}