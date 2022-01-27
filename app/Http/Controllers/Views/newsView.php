<?php

namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Views\acceuilView;


class newsView extends Controller
{
    public function news($firstnews,$news){
        return (new acceuilView)->headhome().(new acceuilView)->navbar().$this->header().$this->contenu($firstnews,$news).(new acceuilView)->footer();
    }
    
}