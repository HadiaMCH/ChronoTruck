<?php

namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Views\acceuilView;
use App\Http\Controllers\Views\annonceView;


class news_detailsView extends Controller
{
    public function news_details($news){
        return (new annonceView)->head().(new annonceView)->navbar().$this->header($news).$this->contenu($news).$this->script($news).(new annonceView)->footer();
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
                  <h4>'.Carbon::createFromFormat('Y-m-d H:i:s', $news->created_at)->format('H:i:s d-m-Y').'</h4>';
                  $views=$news->views+1;
                  $code=$code.'<h4>'.$views.' vues</h4>
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

    public function script($news)
    {
        $code='<script>
        $( document ).ready(function() {
            let formData = {
              id : "'.$news->id.'",
            };
            let type = "GET";
            let ajaxurl = "'.route('views_news').'";
  
            $.ajax({
                type: type,
                url: ajaxurl,
                data: formData,
                dataType: \'json\',
                success: function (response) {
                },
                error: function (response) {
                    console.log(response);
                }
              });
         });
      </script>';
        return $code;
    }

}