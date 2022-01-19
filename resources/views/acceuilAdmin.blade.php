@extends('layouts.appadmin')

@section('content')

    <!-- Page Content -->
          
        @if(session('admin_name'))
              <div id="acceuil_admin">
                <div class="row" >
                  <div class="slide col-lg-6">
                    <a href="{{ route('gestion_users') }}"><img src="assets/images/users_management.jpg" class="img-thumbnail">
                    <span >Gestion des utilisateurs</span></a>
                  </div>
                  <div class="slide col-lg-6">
                    <a href="{{ route('gestion_annonces') }}"><img src="assets/images/annonces_management.jpg" class="img-thumbnail">
                    <span >Gestion des annonces</span></a>
                  </div>
                </div>                
                <div class="row" >
                  <div class="slide col-lg-6">
                    <a href="{{ route('gestion_news') }}"><img src="assets/images/news_management.jpg" class="img-thumbnail">
                    <span >Gestion des news</span></a>
                  </div>
                  <div class="slide col-lg-6">
                    <a href="{{ route('gestion_contenu') }}"><img src="assets/images/contenu_management.jpg" class="img-thumbnail">
                    <span >Gestion du contenu</span></a>
                  </div>
                </div>
                
                <div class="row" >
                  @if(session('super_admin_name'))
                    <div class="slide col-lg-6">
                      <a href="{{ route('super_admin') }}"><img src="assets/images/users_management.jpg" class="img-thumbnail">
                      <span >Gestion des admins</span></a>
                    </div>
                  @endif
                </div>
        @endif


@endsection