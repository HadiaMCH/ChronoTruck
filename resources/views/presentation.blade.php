@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    
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
            <img src=".{{$presentation->img}}" >
            <p>{{$presentation->texte}}</p> 
            <section class="header_contenu" style="margin-bottom:80px;">
              <div class="container">
                <div class="main-content">
                  <h4>Les objectifs du site web</h4>
                </div>
              </div>
            </section>
            <div class="embed-responsive embed-responsive-16by9"> 
              <iframe class="embed-responsive-item" src="{{$presentation->video}}" frameborder="0" allow="accelerometer;autoplay;encrypted-media;gyroscope;picture-in-picture" allowfullscreen></iframe>
            </div>            
          </div>
          <div class="col-lg-12">       
            <section class="header_contenu">
              <div class="container">
                <div class="main-content">
                    <h4>Comment le site web fonctionne</h4>
                </div>
              </div>
            </section>    
            <p>{{$presentation->fonctionnement}}</p>
          </div>
        </div>
      </div>
    </section>

@endsection