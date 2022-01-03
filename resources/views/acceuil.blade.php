@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    <!-- Diaporama -->
    <div class="main-banner header-text">
      <div class="container-fluid">
        <div class="owl-banner owl-carousel">
          
          <!-- Diaporama -->
          @if ($news->count())
            @foreach ($news as $new)
              <div class="item">
                <img src="{{$new->img}}" >
                <div class="item-content">
                  <div class="main-content">
                    <div class="meta-category">
                    <a href="news/{{$new->id}}"><span style="color:#804721">{{$new->titre}}</span></a>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          @else


          @endif
          
        </div>
      </div>
    </div>
    <!-- Diaporama -->

    <!-- Recherche -->
    <section id="recherche">
      <div class="container">
        <div class="main-content">
            <span>Véhicule de Transport avec Chauffeur</span>
            <h4>la meilleure façon de transporter de marchandises et colis!</h4>
        </div>
        <section class="contact-us">
            <div class="container">
                    <div class="row"> 
                        <div class="col-lg-12">
                            <div class="down-contact">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="sidebar-item contact-form">
                                            <div class="sidebar-heading">
                                            <h2>Trouver un target</h2>
                                            </div>
                                            <div class="content">
                                                <form id="search">
                                                  @csrf
                                                        <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <fieldset>
                                                            <input name="ville_depart" type="text" id="ville_depart" placeholder="Ville de départ" required="">
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <fieldset>
                                                            <input name="ville_arriver" type="text" id="ville_arriver" placeholder="Ville d'arriver" required="">
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <fieldset>
                                                            <button type="submit" id="search-submit" class="main-button">Rechercher</button>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--
                                    <div class="col-lg-4 "> 
                                      <div id="map">
                                        <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="450px" frameborder="0" style="border:0" allowfullscreen></iframe>
                                      </div>
                                    </div>    -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
      </div>
    </section>

    <!-- Resultat du recherche -->
    <section class="blog-posts">
      <div class="container">
      @if(session('name')) <!-- Resultat du recherche       connected -->
        <div class="row" id="search_result_connected">  

        </div>
      </div>
    </section>

    <section class="blog-posts">
      <div class="container">
        <div class="col-lg-4">
          <div class="main-button">
            <a href="" data-toggle="modal" data-target="#addAnonceModal">ajouter une annonce de transport</a>
          </div>
        </div>
      </div>  
    </section> 
      @else <!-- Resultat du recherche       not connected -->
        <div class="row" id="search_result_not_connected">                        

        </div>
      </div>
    </section>

    <section class="blog-posts">
      <div class="container">
        <div class="col-lg-4">
          <div class="main-button">
            <a href="{{ route('presentation') }}">Comment cela fonctionne</a>
          </div>
        </div>
      </div>  
    </section>  
      @endif         
    
    <!-- Modal add annonce -->

    <div id="addAnonceModal" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
        <!-- Modal content-->  

        <div class="modal-content">  
          <div class="modal-header">  
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
            <h4 class="modal-title">Login</h4>  
          </div>  
          <div class="modal-body">  
            <section class="contact-us">
              <div class="container">
                <div class="down-contact">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="sidebar-item contact-form">
                        <div class="sidebar-heading">
                          <h2>connectez-vous sur votre compte</h2>
                        </div>
                        <div class="content">
                          <form action="{{route('add_annonce')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                              <div class="col-md-12 col-sm-12">
                                <fieldset>
                                  <input name="titre" type="text" id="titre" placeholder="le titre de l'annonce" required="">
                                </fieldset>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <fieldset>
                                  <input name="texte" type="textarea" id="texte" placeholder="le contenu de l'annonce" required="">
                                </fieldset>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <fieldset>                       
                                  <label for="image">Choisir une photo</label>
                                  <input type="file" id="image" name="image" accept="image/png, image/jpeg" required="">
                                </fieldset>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <fieldset>                       
                                  <select id="depart" name="depart">
                                    <option value="le point d'arriver">le point de départ</option>
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
                                  <select id="arriver" name="arriver">
                                    <option value="le point d'arriver">le point d'arriver</option>
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
                                  <select id="transport_type" name="transport_type">
                                    <option value="le type de transport">le type de transport</option>
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
                                  <select id="fourchette_poid_min" name="fourchette_poid_min">
                                  <option value="le poids minimum">le poids minimum</option>
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
                                  <select id="fourchette_poid_max" name="fourchette_poid_max">
                                    <option value="le poids maximum">le poids maximum</option>
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
                                  <select id="fourchette_volume_min" name="fourchette_volume_min">
                                    <option value="le volume minimum">le volume minimum</option>
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
                                  <select id="fourchette_volume_max" name="fourchette_volume_max">
                                    <option value="le volume maximum">le volume maximum</option>
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
                                  <select id="moyen_transport" name="moyen_transport">
                                    <option value="le type de transport">le type de transport</option>
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
                                  <button type="submit" id="add_annonce_submit" class="main-button btn btn-warning">ajouter</button>
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

     <!-- Jquery definition -->
     <script src="vendor/jquery/jquery.min.js"></script>

    <script>
      $( document ).ready(function() {
        $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
              }
          });
          let type = "GET";
          let ajaxurl = "{{route('show')}}";
          $.ajax({
              type: type,
              url: ajaxurl,
              dataType: 'json',
              success: function (response) {
                  if(response != null && response.length > 0)
                  {
                    let j=0;
                    for (let i=0; i < response.length ;i++)
                    {
                      j=0;
                      let text="";
                      while (j < response[i].texte.length && j< 75){
                        text += response[i].texte[j];
                        j++;
                      }
                      let d = new Date(response[i].created_at);
                      $("#search_result_not_connected").prepend('<div class="col-lg-3"><div class="all-blog-posts"><div class="blog-post"><div class="blog-thumb"><img src="'+response[i].img+'" alt=""></div><div class="down-content"><span>'+response[i].titre+'</span><ul class="post-info"><li>'+d.getHours() + ":" + d.getMinutes() + " " + d.getDate()+'-'+ d.getMonth()+'-'+d.getFullYear()+'</li></ul><p>'+text+'<a href="" data-toggle="modal" data-target="#loginModal" >...lire la suite</a></p><ul class="post-info"><li>de '+response[i].depart+' vers '+response[i].arriver+'</li></ul></div></div></div></div>');                
                      $("#search_result_connected").prepend('<div class="col-lg-3"><div class="all-blog-posts"><div class="blog-post"><div class="blog-thumb"><img src="'+response[i].img+'" alt=""></div><div class="down-content"><span>'+response[i].titre+'</span><ul class="post-info"><li>'+'    '+'</li><li>'+d.getHours() + ":" + d.getMinutes() + " " + d.getDate()+'-'+ d.getMonth()+'-'+d.getFullYear()+'</li></ul><p>'+text+'<a href="annonce/'+response[i].id+'" >...lire la suite</a></p><ul class="post-info"><li>de '+response[i].depart+' vers '+response[i].arriver+'</li></ul></div></div></div></div>');                   
                    }
                  }
                  else{
                    //no annonce dans la bdd
                  }
              },
              error: function (response) {
                  console.log(response);
              }
            });
       });

      $("#search-submit").click(function (e) {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
              }
          });
          e.preventDefault();
          let formData = {
            ville_depart : $("#ville_depart").val(),
            ville_arriver : $("#ville_arriver").val(),
          };
          let type = "POST";
          let ajaxurl = "{{route('search')}}";

          $.ajax({
              type: type,
              url: ajaxurl,
              data: formData,
              dataType: 'json',
              success: function (response) {
                  if(response != null && response.length > 0)
                  {
                    $("#search_result_not_connected").empty();
                    for (let i=0; i < response.length ;i++)
                    {
                      j=0;
                      let text="";
                      while (j < response[i].texte.length && j<75){
                        text += response[i].texte[j];
                        j++;
                      }
                      let d = new Date(response[i].created_at);
                      $("#search_result_not_connected").prepend('<div class="col-lg-3"><div class="all-blog-posts"><div class="blog-post"><div class="blog-thumb"><img src="'+response[i].img+'" alt=""></div><div class="down-content"><span>'+response[i].titre+'</span><ul class="post-info"><li>'+d.getHours() + ":" + d.getMinutes() + " " + d.getDate()+'-'+ d.getMonth()+'-'+d.getFullYear()+'</li></ul><p>'+text+'<a href="" data-toggle="modal" data-target="#loginModal" >...lire la suite</a></p><ul class="post-info"><li>de '+response[i].depart+' vers '+response[i].arriver+'</li></ul><ul class="post-info"><li>'+response[i].transport_type+'</li></ul><ul class="post-info"><li>entre '+response[i].fourchette_poid_min+'et'+response[i].fourchette_poid_max+'</li></ul><ul class="post-info"><li>entre '+response[i].fourchette_volume_min+'et'+response[i].fourchette_volume_max+'</li></ul></div></div></div></div>');                     
                      $("#search_result_connected").prepend('<div class="col-lg-3"><div class="all-blog-posts"><div class="blog-post"><div class="blog-thumb"><img src="'+response[i].img+'" alt=""></div><div class="down-content"><span>'+response[i].titre+'</span><ul class="post-info"><li>'+'    '+'</li><li>'+d.getHours() + ":" + d.getMinutes() + " " + d.getDate()+'-'+ d.getMonth()+'-'+d.getFullYear()+'</li></ul><p>'+text+'<a href="annonce/'+response[i].id+'" >...lire la suite</a></p><ul class="post-info"><li>de '+response[i].depart+' vers '+response[i].arriver+'</li></ul><ul class="post-info"><li>'+response[i].transport_type+'</li></ul><ul class="post-info"><li>entre '+response[i].fourchette_poid_min+'et'+response[i].fourchette_poid_max+'</li></ul><ul class="post-info"><li>entre '+response[i].fourchette_volume_min+'et'+response[i].fourchette_volume_max+'</li></ul></div></div></div></div>');                     
                    }
                  }
                  else{
                    //no annonce search result
                  }
              },
              error: function (response) {
                  console.log(response);
              }
            });
       });  
    </script>
     
@endsection