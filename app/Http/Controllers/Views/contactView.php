<?php

namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Views\acceuilView;


class contactView extends Controller
{
    public function contact($contacts){
        return (new acceuilView)->headhome().(new acceuilView)->navbar().$this->contenu($contacts).(new acceuilView)->footer();
    }

}