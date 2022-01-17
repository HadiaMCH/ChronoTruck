<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\acceuilView;
use Illuminate\Routing\Controller;


class news_detailsView extends Controller
{
    public function news_details($news){
        return (new acceuilView)->headSecondhome().(new acceuilView)->navbar().$this->header($news).$this->contenu($news).(new acceuilView)->footerSecond();
    }

    public function header($news)
    {
        $code='<div class="heading-page header-text">
        <section class="page-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="text-content">
                  <h2>'.$news->titre.'</h2>
                  <h4>'.Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $news->created_at)->format('H:i:s d-m-Y').'</h4>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>';
        return $code;
    }

    public function contenu($news)
    {
        $code='<section class="posts grid-system">
        <div class="container">
            <div class="col-lg-12">
              <div class="post">
                <div class="thumb">
                  <img src="..'.$news->img.'" alt="">
                </div>
                <div class="down-content">
                  <span>'.$news->description.'</span>
                  <p>'.$news->paragraph.'</p>
                </div>
            </div>
          </div>
        </div>
      </section>';
        return $code;
    }

}