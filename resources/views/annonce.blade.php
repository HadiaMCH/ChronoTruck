@extends('layouts.appsecond')

@section('content')

    <!-- Page Content -->

    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h4>plus d'informations sur cette annonce</h4>
                <h2>{{$annonce->titre}}</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>            

    <section class="blog-posts grid-system">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="all-blog-posts">
              <div class="row">
                <div class="col-lg-12">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <img src="{{$annonce->img}}" alt="">
                    </div>
                    <div class="down-content">
                      <span>{{$annonce->titre}}</span>
                      <h4>{{$annonce->tarif}}</h4>
                      <ul class="post-info">
                        <li><a href="#">{{$annonce->User->name}}</a></li>
                        <li><a href="#">{{$annonce->created_at}}</a></li>
                        <li><a href="#">{{$annonce->status}}</a></li>
                      </ul>
                      <p>{{$annonce->texte}}</p>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-6">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <li>le point de départ: </li>
                              <li> {{$annonce->depart}}</li>
                            </ul>
                          </div>
                          <div class="col-6">
                            <ul class="post-share">
                              <li><i class="fa fa-share-alt"></i></li>
                              <li>le point d'arrivée: </li>
                              <li> {{$annonce->arriver}}</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item comments">
                      <ul>
                        <li>
                          <div class="right-content">
                            <h4>le type de transport</h4>
                            <p>{{$annonce->transport_type}}</p>
                          </div>
                        
                          <div class="right-content">
                            <h4>le moyen de transport</h4>
                            <p>{{$annonce->moyen_transport}}</p>
                          </div>
                        </li>
                        <li>
                          <div class="right-content">
                            <h4>la fourchette de poids</h4>
                            <p>{{$annonce->fourchette_poid_min}}   {{$annonce->fourchette_poid_max}}</p>
                          </div>
                       
                          <div class="right-content">
                            <h4>la fourchette de volume</h4>
                            <p>{{$annonce->fourchette_volume_min}}   {{$annonce->fourchette_volume_max}}</p>
                          </div>
                        </li>
                      </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item submit-comment">
                    <div class="content">
                        <div class="row">
                          <div class="col-lg-4">
                            <fieldset>
                              <button class="col-lg-8" type="submit" id="form-submit" class="main-button">supprimer</button>
                            </fieldset>
                          </div>
                          <div class="col-lg-4">
                            <fieldset>
                              <button class="col-lg-8" type="submit" id="form-submit" class="main-button">modifier</button>
                            </fieldset>
                          </div>
                          <div class="col-lg-4">
                            <fieldset>
                              <button class="col-lg-8" type="submit" id="form-submit" class="main-button">annuler</button>
                            </fieldset>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>

@endsection