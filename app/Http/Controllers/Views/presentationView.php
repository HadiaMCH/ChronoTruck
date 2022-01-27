<?php

namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Views\acceuilView;

class presentationView extends Controller
{
    public function presentation($presentation){
        return (new acceuilView)->headhome().(new acceuilView)->navbar().$this->contenu($presentation).(new acceuilView)->footer();
    }

}