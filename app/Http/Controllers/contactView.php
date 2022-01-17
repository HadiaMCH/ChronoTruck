<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\acceuilView;
use Illuminate\Routing\Controller;


class contactView extends Controller
{
    public function contact($contacts){
        return (new acceuilView)->headhome().(new acceuilView)->navbar().$this->contenu($contacts).(new acceuilView)->footer();
    }

    public function contenu($contacts)
    {
        $code='<!-- Page Content -->
        <div class="heading-page header-text">
          <section class="page-heading">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="text-content">
                    <h2>restons en contact !</h2>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
    
        <section class="contact-us">
          <div class="container">
            <div class="down-contact">
              <div class="sidebar-item contact-information">
                <div class="sidebar-heading">
                  <h2>les informations permettant de contacter les administrateurs</h2>
                </div>
                <div class="content">
                  <ul>';
                    foreach($contacts as $contact){
                        $code=$code.'<li>
                        <h5>'.$contact->contenu.'</h5>
                        <span>'.$contact->titre.'</span>
                      </li>';
                    }

                  $code=$code.'</ul>
                </div>
              </div>
            </div>
          </div>
        </section>';
        return $code;
    }

}