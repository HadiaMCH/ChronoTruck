@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    
    <!-- Diaporama -->

    <div class="main-banner">
      <div class="container-fluid">
        <div class="owl-banner owl-carousel">
          
          @if ($news->count())
            @foreach ($news as $new)
              <div class="item">
                <img src=".{{$new->img}}" class="img-thumbnail">
                <div class="item-content">
                  <div class="main-content">
                    <div class="meta-category">
                    <a href="news/{{$new->id}}"><span style="color:#804721">{{$new->titre}}</span></a>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          @endif          
        </div>
      </div>
    </div>

    <!-- Recherche -->
    <section id="recherche">
      <div class="container">
        <div class="main-content">
            <h4>Véhicule de Transport avec Chauffeur</h4>
            <span>la meilleure façon de transporter de marchandises et colis!</span>
        </div>
        <section class="formulaire">
          <div class="container">
            <div class="row"> 
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="sidebar-heading">
                      <h2>Trouver un target</h2>
                    </div>
                    <form id="search">
                    @csrf
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                          <fieldset>
                            <input name="ville_depart" type="text" id="ville_depart" placeholder="ville de départ" required="">
                          </fieldset>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <fieldset>
                            <input name="ville_arriver" type="text" id="ville_arriver" placeholder="ville d'arriver" required="">
                          </fieldset>
                        </div>
                        <div class="col-lg-12">
                          <fieldset>
                            <button type="submit" id="search-submit" class="main-button">Rechercher</button>
                        </fieldset>
                      </div>
                    </form>
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
        </section>
      </div>
    </section>

    <!-- Resultat du recherche -->

    <section class="posts">
      <div class="container">

      @if(session('name')) <!-- Resultat du recherche       connected -->
        <div class="row" id="search_result_connected">  

        </div>
      </div>
    </section>

    <section class="posts">
      <div class="container">
        <div class="col-lg-4">
          <div class="main-button">
            <a data-toggle="modal" data-target="#addAnonceModal">ajouter une annonce de transport</a>
          </div>
        </div>
      </div>  
    </section>

      @else <!-- Resultat du recherche       not connected -->
        <div class="row" id="search_result_not_connected">                        

        </div>
      </div>
    </section>

    <section class="posts">
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
      <div class="modal-content">    
        <section class="formulaire formulaire-modal">
          <div class="col-lg-12">
            <div class="sidebar-heading">
              <h2>connectez-vous sur votre compte</h2>
            </div>
            <form action="{{route('add_annonce')}}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <fieldset>
                      <input name="titre" type="text" id="titre" placeholder="titre de l'annonce" required="">
                    </fieldset>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <fieldset>
                      <input name="texte" type="textarea" id="texte" placeholder="contenu de l'annonce" required="">
                    </fieldset>
                  </div>
                  <div class="col-md-11 col-sm-12" style="margin-left: 18px;">
                    <fieldset>                       
                      <label for="image" class="custom-file-label">Choisir une photo</label>
                      <input type="file" id="image" name="image" class="custom-file-input col-md-12" accept="image/png, image/jpeg" required="">
                    </fieldset>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <fieldset>                       
                      <select id="depart" name="depart">
                        <option value="point d'arriver">point de départ</option>
                        @if ($wilayas->count())
                          {{$i=1}}
                          @foreach ($wilayas as $wilaya)        
                            <option value="{{$i}}">{{$wilaya->nom}}</option>
                            {{$i=$i+1}}
                          @endforeach
                        @endif  
                      </select>
                    </fieldset>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <fieldset>                       
                      <select id="arriver" name="arriver">
                        <option value="point d'arriver">point d'arriver</option>
                        @if ($wilayas->count())
                          {{$i=1}}
                          @foreach ($wilayas as $wilaya)  
                            <option value="{{$i}}">{{$wilaya->nom}}</option>
                            {{$i=$i+1}}
                           @endforeach
                        @endif  
                      </select>
                    </fieldset>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <fieldset>                       
                      <select id="transport_type" name="transport_type">
                        <option value="type de transport">type de transport</option>
                        @if ($transport_types)
                          @foreach ($transport_types as $transport_type)        
                            <option value="{{$transport_type}}">{{$transport_type}}</option>
                          @endforeach
                        @endif  
                      </select>
                    </fieldset>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <fieldset>                       
                      <select id="fourchette_poid_min" name="fourchette_poid_min">
                        <option value="poids minimum">poids minimum</option>
                        @if ($fourchette_poid_mins)
                          @foreach ($fourchette_poid_mins as $fourchette_poid_min)        
                            <option value="{{$fourchette_poid_min}}">{{$fourchette_poid_min}}</option>
                          @endforeach
                        @endif  
                      </select>
                    </fieldset>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <fieldset>                       
                      <select id="fourchette_poid_max" name="fourchette_poid_max">
                        <option value="poids maximum">poids maximum</option>
                        @if ($fourchette_poid_maxs)
                          @foreach ($fourchette_poid_maxs as $fourchette_poid_max)        
                            <option value="{{$fourchette_poid_max}}">{{$fourchette_poid_max}}</option>
                          @endforeach
                        @endif  
                      </select>
                    </fieldset>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <fieldset>                       
                      <select id="fourchette_volume_min" name="fourchette_volume_min">
                        <option value="volume minimum">volume minimum</option>
                        @if ($fourchette_volume_mins)
                          @foreach ($fourchette_volume_mins as $fourchette_volume_min)        
                            <option value="{{$fourchette_volume_min}}">{{$fourchette_volume_min}}</option>
                          @endforeach
                        @endif
                      </select>
                    </fieldset>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <fieldset>                       
                      <select id="fourchette_volume_max" name="fourchette_volume_max">
                        <option value="volume maximum">volume maximum</option>
                        @if ($fourchette_volume_maxs)
                          @foreach ($fourchette_volume_maxs as $fourchette_volume_max)        
                            <option value="{{$fourchette_volume_max}}">{{$fourchette_volume_max}}</option>
                          @endforeach
                        @endif
                      </select>
                    </fieldset>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <fieldset>                       
                      <select id="moyen_transport" name="moyen_transport">
                        <option value="moyen de transport">moyen de transport</option>
                        @if ($moyen_transports)
                          @foreach ($moyen_transports as $moyen_transport)        
                            <option value="{{$moyen_transport}}">{{$moyen_transport}}</option>
                          @endforeach
                        @endif
                      </select>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" class="main-button btn btn-warning">ajouter</button>
                    </fieldset>
                  </div>
                </div>
            </form>
          </div>
        </section>
      </div>  
    </div>  
  </div>  

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
                  if(!response['status_code'])
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
                      $("#search_result_not_connected").prepend('<div class="col-lg-3"><div><div class="post"><div class="thumb"><img src="..'+response[i].img+'" alt=""></div><div class="down-content"><span>'+response[i].titre+'</span><ul class="post-info"><li>'+d.getHours() + ":" + d.getMinutes() + " " + d.getDate()+'-'+ d.getMonth()+'-'+d.getFullYear()+'</li></ul><p>'+text+'<a href="" data-toggle="modal" data-target="#loginModal" >...lire la suite</a></p><ul class="post-info"><li>de '+response[i].depart+' vers '+response[i].arriver+'</li></ul></div></div></div></div>');                
                      $("#search_result_connected").prepend('<div class="col-lg-3"><div><div class="post"><div class="thumb"><img src="..'+response[i].img+'" alt=""></div><div class="down-content"><span>'+response[i].titre+'</span><ul class="post-info"><li>'+d.getHours() + ":" + d.getMinutes() + " " + d.getDate()+'-'+ d.getMonth()+'-'+d.getFullYear()+'</li></ul><p>'+text+'<a href="annonce/'+response[i].id+'" >...lire la suite</a></p><ul class="post-info"><li>de '+response[i].depart+' vers '+response[i].arriver+'</li></ul></div></div></div></div>');                   
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
                  if(!response['status_code'])
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
                      $("#search_result_not_connected").prepend('<div class="col-lg-3"><div><div class="post"><div class="thumb"><img src="..'+response[i].img+'" alt=""></div><div class="down-content"><span>'+response[i].titre+'</span><ul class="post-info"><li>'+d.getHours() + ":" + d.getMinutes() + " " + d.getDate()+'-'+ d.getMonth()+'-'+d.getFullYear()+'</li></ul><p>'+text+'<a href="" data-toggle="modal" data-target="#loginModal" >...lire la suite</a></p><ul class="post-info"><li>de '+response[i].depart+' vers '+response[i].arriver+'</li></ul><ul class="post-info"><li>'+response[i].transport_type+'</li></ul><ul class="post-info"><li>entre '+response[i].fourchette_poid_min+'et'+response[i].fourchette_poid_max+'</li></ul><ul class="post-info"><li>entre '+response[i].fourchette_volume_min+'et'+response[i].fourchette_volume_max+'</li></ul></div></div></div></div>');                     
                      $("#search_result_connected").prepend('<div class="col-lg-3"><div"><div class="post"><div class="thumb"><img src="..'+response[i].img+'" alt=""></div><div class="down-content"><span>'+response[i].titre+'</span><ul class="post-info"><li>'+d.getHours() + ":" + d.getMinutes() + " " + d.getDate()+'-'+ d.getMonth()+'-'+d.getFullYear()+'</li></ul><p>'+text+'<a href="annonce/'+response[i].id+'" >...lire la suite</a></p><ul class="post-info"><li>de '+response[i].depart+' vers '+response[i].arriver+'</li></ul><ul class="post-info"><li>'+response[i].transport_type+'</li></ul><ul class="post-info"><li>entre '+response[i].fourchette_poid_min+'et'+response[i].fourchette_poid_max+'</li></ul><ul class="post-info"><li>entre '+response[i].fourchette_volume_min+'et'+response[i].fourchette_volume_max+'</li></ul></div></div></div></div>');                     
                    }
                  }
                  else{
                    if(response['status_code']==503){
                      $("#ville_depart").css("border-color", "#d93025");
                      $("#ville_depart").css("color", "#d93025");
                      $("#ville_arriver").css("border-color", "#d93025");
                      $("#ville_arriver").css("color", "#d93025");
                      $("#ville_depart").attr("placeholder","Ville de départ");
                      $("#ville_arriver").attr("placeholder","Ville d'arriver");
                    }
                    else{
                      //no annonce dans la bdd
                    }
                  }
              },
              error: function (response) {
                  console.log(response);
              }
            });
       });  
    </script>
     
@endsection