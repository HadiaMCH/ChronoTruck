@extends('layouts.appadmin')

@section('content')

    <!-- Page Content -->
    <div class="main-banner header-text">
      <div class="container-fluid">
        <div class="owl-banner owl-carousel">
          
              <div class="item">
                <img src="assets/images/users_management.jpg" class="img-thumbnail">
                <div class="item-content">
                  <div class="main-content">
                    <div class="meta-category">
                    <a href="{{ route('gestion_users') }}"><span style="color:#804721">Gestion des utilisateurs</span></a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="item">
                <img src="assets/images/annonces_management.jpg" class="img-thumbnail">
                <div class="item-content">
                  <div class="main-content">
                    <div class="meta-category">
                    <a href="{{ route('gestion_annonces') }}"><span style="color:#804721">Gestion des annonces</span></a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="item">
                <img src="assets/images/news_management.jpg" class="img-thumbnail">
                <div class="item-content">
                  <div class="main-content">
                    <div class="meta-category">
                    <a href="{{ route('gestion_news') }}"><span style="color:#804721">Gestion des news</span></a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="item">
                <img src="assets/images/contenu_management.jpg" class="img-thumbnail">
                <div class="item-content">
                  <div class="main-content">
                    <div class="meta-category">
                    <a href="{{ route('gestion_contenu') }}"><span style="color:#804721">Gestion du contenu</span></a>
                    </div>
                  </div>
                </div>
              </div>
                     
        </div>
      </div>
    </div>

@endsection