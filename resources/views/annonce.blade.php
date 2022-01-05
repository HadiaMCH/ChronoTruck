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
                      <img src="..{{$annonce->img}}" alt="">
                    </div>
                    <div class="down-content">
                      <span>{{$annonce->titre}}</span>
                      @if($annonce->status =="validée")
                      <h4>{{$annonce->tarif}}</h4>
                      @endif
                      <ul class="post-info">
                        <li>{{$annonce->User->name}} {{$annonce->User->familyname}}</li>
                        <li>{{$annonce->created_at}}</li>
                        <li>{{$annonce->status}}</li>
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
                            <h4>la fourchette de poids</h4>
                            <p>{{$annonce->fourchette_poid_min}}   {{$annonce->fourchette_poid_max}}</p>
                          </div>
                        </li>
                        <li>
                          <div class="right-content">
                            <h4>le moyen de transport</h4>
                            <p>{{$annonce->moyen_transport}}</p>
                          </div>
                       
                          <div class="right-content">
                            <h4>la fourchette de volume</h4>
                            <p>{{$annonce->fourchette_volume_min}}   {{$annonce->fourchette_volume_max}}</p>
                          </div>
                        </li>
                      </ul>
                    </div>
                </div>
                @if($annonce->User->id == session('id'))
                <div class="col-lg-12">
                  <div class="sidebar-item submit-comment">
                    <div class="content">
                        <div class="row">
                          <div class="col-lg-4">
                            <fieldset>
                              <button class="col-lg-8" class="main-button" data-toggle="modal" data-target="#supprimer">supprimer</button>
                            </fieldset>
                          </div>
                          @if ($annonce->status !="validée")
                            <div class="col-lg-4">
                              <fieldset>
                                <button class="col-lg-8" data-toggle="modal" data-target="#modifier" class="main-button">modifier</button>
                              </fieldset>
                            </div>
                            <div class="col-lg-4">
                              <fieldset>
                                <button class="col-lg-8" data-toggle="modal" data-target="#annuler" class="main-button">annuler</button>
                              </fieldset>
                            </div>
                          @endif
                        </div>
                    </div>
                  </div>
                </div>
                @endif
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>

    <div id="supprimer" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
   <!-- Modal content-->  
        <div class="modal-content">  
          <div class="modal-body">  
            <section class="contact-us">
              <div class="container">
                <div class="down-contact">
                  <div class="col-lg-12">
                    <div class="sidebar-item contact-form">
                      <div class="sidebar-heading">
                        <h2>vous voulez supprimer cette annonce ?</h2>
                      </div>
                      <div class="content">
                        <fieldset>
                          <button type="submit" id="supprimer_btn" class="main-button btn btn-warning">supprimer</button>
                        </fieldset>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>  
        </div>  
      </div>  
    </div>

    <div id="annuler" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
   <!-- Modal content-->  
        <div class="modal-content">  
          <div class="modal-body">  
            <section class="contact-us">
              <div class="container">
                <div class="down-contact">
                  <div class="col-lg-12">
                    <div class="sidebar-item contact-form">
                      <div class="sidebar-heading">
                        <h2>vous voulez annuler cette annonce ?</h2>
                      </div>
                      <div class="content">
                        <fieldset>
                          <button type="submit" id="annuler_btn" class="main-button btn btn-warning">annuler</button>
                        </fieldset>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>  
        </div>  
      </div>  
    </div>

    <div id="modifier" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
        <!-- Modal content-->  
        <div class="modal-content">   
          <div class="modal-body">  
            <section class="contact-us">
              <div class="container">
                <div class="down-contact">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="sidebar-item contact-form">
                        <div class="sidebar-heading">
                          <h2>ajouter une annonce</h2>
                        </div>
                        <div class="content">
                          <form action="modifier/{{$annonce->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                              <div class="col-md-12 col-sm-12">
                                <fieldset>
                                  <label>le titre :</label>
                                  <input name="titre" type="text" id="titre" value="{{$annonce->titre}}" required="">
                                </fieldset>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <fieldset>
                                  <label >le texte :</label>
                                  <input name="texte" type="textarea" id="texte" value="{{$annonce->texte}}" required="">
                                </fieldset>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <fieldset> 
                                  <label >modifier votre photo</label>
                                  <img src="..{{$annonce->img}}" id="photo" alt="">
                                  <input type="file" id="image" name="image" accept="image/png, image/jpeg" style="display:none;">
                                </fieldset>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <fieldset>
                                  <label >le point de départ :</label>                       
                                  <select id="depart" name="depart" >
                                    <option value="{{$annonce->depart}}">{{$annonce->depart}}</option>
                                    @if ($wilayas->count())
                                      @foreach ($wilayas as $wilaya)        
                                        <option value="{{$wilaya->nom}}">{{$wilaya->nom}}</option>
                                      @endforeach
                                    @else
                                    
                                    @endif
                                  </select>
                                </fieldset>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <fieldset> 
                                  <label >le point d'arrivée :</label>                       
                                  <select id="arriver" name="arriver" >
                                    <option value="{{$annonce->arriver}}">{{$annonce->arriver}}</option>
                                    @if ($wilayas->count())
                                      @foreach ($wilayas as $wilaya)        
                                        <option value="{{$wilaya->nom}}">{{$wilaya->nom}}</option>
                                      @endforeach
                                    @else
                                    
                                    @endif
                                  </select>
                                </fieldset>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <fieldset>  
                                  <label >le type de transport :</label>                      
                                  <select id="transport_type" name="transport_type" >
                                    <option value="{{$annonce->transport_type}}">{{$annonce->transport_type}}</option>
                                    @if ($transport_types)
                                      @foreach ($transport_types as $transport_type)        
                                        <option value="{{$transport_type}}">{{$transport_type}}</option>
                                      @endforeach
                                    @else
                                    
                                    @endif
                                  </select>
                                </fieldset>
                              </div>
                              <div class="col-md-6 col-sm-12">
                                <fieldset>  
                                  <label >le poids minimum :</label>                      
                                  <select id="fourchette_poid_min" name="fourchette_poid_min">
                                  <option value="{{$annonce->fourchette_poid_min}}">{{$annonce->fourchette_poid_min}}</option>
                                    @if ($fourchette_poid_mins)
                                      @foreach ($fourchette_poid_mins as $fourchette_poid_min)        
                                      <option value="{{$fourchette_poid_min}}">{{$fourchette_poid_min}}</option>
                                      @endforeach
                                    @else
                                    
                                    @endif
                                  </select>
                                </fieldset>
                              </div>
                              <div class="col-md-6 col-sm-12">
                                <fieldset> 
                                  <label >le poids maximum :</label>                       
                                  <select id="fourchette_poid_max" name="fourchette_poid_max" >
                                    <option value="{{$annonce->fourchette_poid_max}}">{{$annonce->fourchette_poid_max}}</option>
                                    @if ($fourchette_poid_maxs)
                                      @foreach ($fourchette_poid_maxs as $fourchette_poid_max)        
                                      <option value="{{$fourchette_poid_max}}">{{$fourchette_poid_max}}</option>
                                      @endforeach
                                    @else
                                    
                                    @endif
                                  </select>
                                </fieldset>
                              </div>
                              <div class="col-md-6 col-sm-12">
                                <fieldset> 
                                  <label >le volume minimum :</label>                      
                                  <select id="fourchette_volume_min" name="fourchette_volume_min" >
                                    <option value="{{$annonce->fourchette_volume_min}}">{{$annonce->fourchette_volume_min}}</option>
                                    @if ($fourchette_volume_mins)
                                      @foreach ($fourchette_volume_mins as $fourchette_volume_min)        
                                      <option value="{{$fourchette_volume_min}}">{{$fourchette_volume_min}}</option>
                                      @endforeach
                                    @else
                                    
                                    @endif
                                  </select>
                                </fieldset>
                              </div>
                              <div class="col-md-6 col-sm-12">
                                <fieldset>
                                  <label >le volume maximum :</label>                       
                                  <select id="fourchette_volume_max" name="fourchette_volume_max" >
                                    <option value="{{$annonce->fourchette_volume_max}}">{{$annonce->fourchette_volume_max}}</option>
                                    @if ($fourchette_volume_maxs)
                                      @foreach ($fourchette_volume_maxs as $fourchette_volume_max)        
                                      <option value="{{$fourchette_volume_max}}">{{$fourchette_volume_max}}</option>
                                      @endforeach
                                    @else
                                    
                                    @endif
                                  </select>
                                </fieldset>
                              </div>
                              <div class="col-md-6 col-sm-12">
                                <fieldset>
                                  <label >le moyen de transport :</label>                        
                                  <select id="moyen_transport" name="moyen_transport" >
                                    <option value="{{$annonce->moyen_transport}}">{{$annonce->moyen_transport}}</option>
                                    @if ($moyen_transports)
                                      @foreach ($moyen_transports as $moyen_transport)        
                                      <option value="{{$moyen_transport}}">{{$moyen_transport}}</option>
                                      @endforeach
                                    @else
                                    
                                    @endif
                                  </select>
                                </fieldset>
                              </div>
                              <div class="col-lg-12">
                                <fieldset>
                                  <button type="submit" class="main-button btn btn-warning">soumettre</button>
                                </fieldset>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>  
        </div>  
      </div>  
    </div>

    <script>
      $("#supprimer_btn").click(function (e) {
        window.location.href = "c";
      });

      $("#annuler_btn").click(function (e) {
        window.location.href = "cancel/{{$annonce->id}}";
      });

      $("#photo").click(function (e) {
        $("#image").css("display","block");
        $("#image").attr("required","");
        $("#photo").css("display","none");
      });
    </script>

@endsection