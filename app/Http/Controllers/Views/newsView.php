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

    public function header()
    {
        $code='<div class="heading-page header-text">
        <section class="page-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="text-content">
                  <h4>les nouvelle</h4>
                  <h2>À la une</h2>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>';
        return $code;
    }

    public function contenu($firstnews,$news)
    {
        $code='<section class="posts grid-system">
        <div class="container">
          <div class="row">
            <div class="col-lg-7">
                <div class="row">';
  
                  if ($news->count()){
                    foreach ($news as $new){
                    $code=$code.'<div class="col-lg-12">
                        <div class="post">
                          <div class="thumb">
                            <a href="news/'.$new->id.'"><img src=".'.$new->img.'"></a>
                          </div>
                          <div class="down-content">
                            <a href="news/'.$new->id.'"><span>'.$new->titre.'</span></a>
                            <h4>'.$new->description.'</h4>
                          </div>
                        </div>
                      </div>';
                    }
                }
                  
                  $code=$code.'</div>
            </div>
            <div class="col-lg-5">
              <div class="sidebar">
                <div class="sidebar-item recent-posts">
                  <div class="sidebar-heading">
                    <h2>les grands titres de l\'actualité</h2>
                  </div>
                  <div class="content">
                    <ul>';
                      if ($firstnews->count()){
                        foreach ($firstnews as $firstnew){
                        $code=$code.'<li><a href="news/'.$firstnew->id.'">
                            <h5>'.$firstnew->titre.'</h5>
                            <span>'.$firstnew->description.'</span>
                          </a></li>';
                        }
                    }   
                       $code=$code.'</ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>';
        return $code;
    }

}