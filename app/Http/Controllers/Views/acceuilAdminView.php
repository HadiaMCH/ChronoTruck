<?php

namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class acceuilAdminView extends Controller
{
    public function acceuilAdmin(){
        return $this->headAdmin().$this->navbarAdmin().$this->contenu();
    }

}
