<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\acceuilView;
use Illuminate\Routing\Controller;

class presentationView extends Controller
{
    public function presentation($presentation){
        return (new acceuilView)->headhome().(new acceuilView)->navbar().$this->contenu($presentation).(new acceuilView)->footer();
    }

    public function contenu($presentation)
    {
        $code='<!-- Page Content -->
    
        <!-- Banner Starts Here -->
        <div class="heading-page header-text">
          <section class="page-heading">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="text-content">
                    <h4>présentation du site</h4>
                    <h2>en savoir plus sur nous!</h2>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        
        <!-- Banner Ends Here -->
    
        <section class="about-us">
          <div class="container">
            <div class="row">
    
              <div class="col-lg-12">
                <img src=".'.$presentation->img.'" >
                <p>'.$presentation->texte.'</p> 
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="'.$presentation->video.'" allowfullscreen></iframe>
                </div>            
              </div>
              <div class="col-lg-12">           
                <p>'.$presentation->fonctionnement.'</p>
              </div>
            </div>
          </div>
        </section>';
        return $code;
    }

}