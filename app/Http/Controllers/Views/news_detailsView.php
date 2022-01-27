<?php

namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Views\acceuilView;


class news_detailsView extends Controller
{
    public function news_details($news){
        return (new acceuilView)->headSecondhome().(new acceuilView)->navbar().$this->header($news).$this->contenu($news).(new acceuilView)->footerSecond();
    }

}