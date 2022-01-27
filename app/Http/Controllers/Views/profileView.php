<?php

namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Views\acceuilView;


class profileView extends Controller
{
    public function profile($wilayas,$user){
        return (new acceuilView)->headhome().(new acceuilView)->navbar().$this->contenu($wilayas,$user).(new acceuilView)->footer();
    }

}