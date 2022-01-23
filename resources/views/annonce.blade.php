
@extends( (session()->exists('admin_name') || session()->exists('super_admin_name')) ? 'layouts.appsecondadmin' : 'layouts.appsecond')

@section('content')

    <!-- Page Content -->

    <div class="heading-page">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-10">
              <div class="text-content">
                <h4>plus d'informations sur cette annonce</h4>
                <h2>{{$annonce->titre}}</h2>
                <h2 id="annonce_id" style="display:none;">{{$annonce->id}}</h2>
              </div>
            </div>
            @if($annonce->status =='terminée' && session('id')==$annonce->transporteur->id)
            <div class="col-lg-2">
              <div class="main-button">
                <a data-toggle="modal" data-target="#signaler_client">signaler ce client</a>
              </div>
            </div>
            @endif
          </div>
        </div>
      </section>
    </div>            

    <section class="posts grid-system">
      <div class="container"> 
        <div class="row">
          <div class="col-lg-12">
            <div class="post">
              <div class="thumb">
                <img src="..{{$annonce->img}}" alt="">
              </div>
              <div class="down-content">
                <span>{{$annonce->titre}}</span>
                <ul class="post-info">
                  <li>{{$annonce->user->name}} {{$annonce->user->familyname}}</li>
                  <li>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $annonce->created_at)->format('H:i:s d-m-Y')}}</li>
                  <li>{{$annonce->status}}</li>
                </ul>
                <p>{{$annonce->texte}}</p>
                <div class="post-options">
                  <div class="row">
                    <div class="col-6">
                      <ul class="post-tags">
                        <li>le point de départ: </li>
                        <li>{{$wilayas[$annonce->tarjet->wilaya_depart_id-1]->nom}}</li>
                      </ul>
                    </div>
                    <div class="col-6">
                      <ul class="post-share">
                        <li>le point d'arrivée: </li>
                        <li>{{$wilayas[$annonce->tarjet->wilaya_arriver_id-1]->nom}}</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="plus">
              <ul class="col-lg-12">
                <li class="col-lg-6">
                  <div class="right-content">
                    <h4>le type de transport</h4>
                    <p>{{$annonce->transport_type}}</p>
                  </div>
                </li>  
                <li class="col-lg-6"> 
                  <div class="right-content">
                    <h4>le moyen de transport</h4>
                    <p>{{$annonce->moyen_transport}}</p>
                  </div>
                </li>
              </ul>
              <ul class="col-lg-12">
                <li class="col-lg-6">
                  <div class="right-content">
                    <h4>la fourchette de poids</h4>
                    <p>{{$annonce->fourchette_poid_min}} {{$annonce->fourchette_poid_max}}</p>
                  </div>
                </li>
                <li class="col-lg-6">
                  <div class="right-content">
                    <h4>la fourchette de volume</h4>
                    <p>{{$annonce->fourchette_volume_min}} {{$annonce->fourchette_volume_max}}</p>
                  </div>
                </li>
              </ul>
              @if ($annonce->status =="validée")
                @if($annonce->user->id == session('id'))
                  @if(count($annonce->tarjet->users))
                    <ul class="col-lg-12">
                      <li class="col-lg-12">
                        <div class="right-content">
                          <h4>les transporteurs disponible pour votre tarjet</h4>
                          <div class="post-info">
                            @foreach ($annonce->tarjet->users as $transporteur)
                              @if(session('id') != $transporteur->id)
                                {{$exist=false}}
                                @foreach ($annonce->transactions as $transaction)
                                  @if($transaction->transporteur_id == $transporteur->id)
                                    <p style="display:none;">{{$exist=true}}</p>
                                  @endif
                                @endforeach
                                @if($transporteur->status == "certifié" && $exist==false)
                                  <div class="col-lg-12">
                                  <div class="submit-transporteur" style="margin-top:25px">
                                    <div class="row">
                                      <div class="col-lg-8">
                                        <a href="">{{$transporteur->name}} {{$transporteur->familyname}}</a>
                                      </div>
                                      <div class="col-lg-4">
                                        <div class="main-button">
                                          <a class="demande" href="../client_add_transaction/{{$annonce->id}}/{{$transporteur->id}}">demander</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                @endif
                              @endif
                            @endforeach
                          </div>
                        </div>
                      </li>
                    </ul>
                  @else
                  <ul class="col-lg-12">
                      <li class="col-lg-12">
                        <div class="right-content">
                          <h4>il n'existe pas des transporteurs disponible pour votre tarjet</h4>
                        </div>
                      </li>
                    </ul>
                  @endif
                @endif
                <ul class="col-lg-12">
                  <li class="col-lg-12">
                    <div class="right-content">
                      <h4>le tarif du transport</h4>
                      <p>{{$annonce->tarif}}</p>
                    </div>
                  </li>
                </ul>
              @elseif($annonce->status =="terminée")
                <ul class="col-lg-12">
                  <li class="col-lg-6">
                    <div class="right-content">
                      <h4>le transporteur</h4>
                      <p>{{$annonce->transporteur->name}} {{$annonce->transporteur->familyname}}</p>
                      <p id="transporteur_id" style="display:none;">{{$annonce->transporteur->id}}</p>
                    </div>
                  </li>

                  @if($annonce->user->id == session('id'))
                    <li class="col-lg-6">
                      <div class="col-lg-12 submit-transporteur row">
                        <div class="col-lg-6">
                          <button class="col-lg-12" class="main-button" data-toggle="modal" data-target="#noter">noter</button>
                        </div>
                        <div class="col-lg-6">
                          <button class="col-lg-12" class="main-button" data-toggle="modal" data-target="#signaler_transporteur">signaler ce transporteur</button>
                        </div>  
                      </div>
                    </li>
                  @endif
                </ul>
                <ul class="col-lg-12">
                  <li class="col-lg-12">
                    <div class="right-content">
                      <h4>le tarif du transport</h4>
                      <p>{{$annonce->tarif}}</p>
                    </div>
                  </li>
                </ul>
              @endif
            </div>
          </div>
          @if($annonce->user->id == session('id'))
            <div class="col-lg-12">
              <div class="submit-transporteur annonce_opps">
                <div class="row">
                  <div class="col-lg-4">
                    <fieldset>
                      <button class="col-lg-8" class="main-button" data-toggle="modal" data-target="#supprimer">supprimer</button>
                    </fieldset>
                  </div>
                  @if ($annonce->status =="en attente")
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
          @else
            {{$exist=false}}
            @foreach ($annonce->transactions as $transaction)
              @if($transaction->transporteur_id == session('id'))
                <p style="display:none;">{{$exist=true}}</p>
              @endif
            @endforeach
            @if(session('transporteur')==2 && $exist==false)
            <div class="col-lg-12">
              <div class="submit-transporteur annonce_opps">
                <div class="row">
                  <div class="col-lg-4">
                    <div class="main-button">
                      <a class="demande" href="../transporteur_add_transaction/{{$annonce->id}}">demander de transporter</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endif
          @endif
        </div>
      </div>
    </section>

    <!-- Modal noter-->

  <div id="noter" class="modal fade" role="dialog">  
    <div class="modal-dialog">  
      <div class="modal-content">    
        <section class="formulaire formulaire-modal">
          <div class="col-lg-12">
            <div class="sidebar-heading">
              
              @if($annonce->note == 0)
              <h2>évaluer ce transporteur</h2>
            </div>
            <div class="col-lg-12">
              <div class="rate">

                <span onmouseover="starmark(this)" onclick="starmark(this)" id="1one" class="fa fa-star checked"></span>
                <span onmouseover="starmark(this)" onclick="starmark(this)" id="2one" class="fa fa-star "></span>
                <span onmouseover="starmark(this)" onclick="starmark(this)" id="3one" class="fa fa-star "></span>
                <span onmouseover="starmark(this)" onclick="starmark(this)" id="4one" class="fa fa-star"></span>
                <span onmouseover="starmark(this)" onclick="starmark(this)" id="5one" class="fa fa-star"></span>
              </div>
            </div>
            <button id="noter_submit" type="button" class="btn btn-lg btn-success">Soumettre</button>
            @else
              <p> vous avez donner une note de {{$annonce->note}} a {{$annonce->transporteur->name}} {{$annonce->transporteur->familyname}}</p>
            @endif
          </div>
        </section>
      </div>  
    </div>  
  </div>

    <!-- Modal signaler transporteur-->
  <div id="signaler_transporteur" class="modal fade" role="dialog">  
    <div class="modal-dialog">  
      <div class="modal-content">    
        <section class="formulaire formulaire-modal">
          <div class="col-lg-12">
            <div class="sidebar-heading">
              
              @if(!$annonce->signaler_transporteur)
              <h2>signaler ce transporteur</h2>
            </div>
            <div class="col-lg-12">
                <input type="textarea" id="signaler_transporteur_texte" placeholder="pourquoi voulez_vous signaler ce transporteur ?!" required="">
            </div>
            <button id="signaler_transporteur_submit" type="button" class="btn btn-lg btn-success">Soumettre</button>
            @else
              <p> vous avez deja signaler {{$annonce->transporteur->name}} {{$annonce->transporteur->familyname}}</p>
            @endif
          </div>
        </section>
      </div>  
    </div>  
  </div>

    <!-- Modal supprimer-->

  <div id="supprimer" class="modal fade" role="dialog">  
    <div class="modal-dialog">  
      <div class="modal-content">    
        <section class="formulaire formulaire-modal">
          <div class="col-lg-12">
            <div class="sidebar-heading">
              <h2>vous voulez supprimer cette annonce ?</h2>
            </div>
            <fieldset>
              <button type="submit" id="supprimer_btn" class="main-button btn btn-warning">supprimer</button>
            </fieldset>
          </div>
        </section>
      </div>  
    </div>  
  </div>

    <!-- Modal annuler-->

  <div id="annuler" class="modal fade" role="dialog">  
    <div class="modal-dialog">  
      <div class="modal-content">    
        <section class="formulaire formulaire-modal">
          <div class="col-lg-12">
            <div class="sidebar-heading">
              <h2>vous voulez annuler cette annonce ?</h2>
            </div>
            <fieldset>
              <button type="submit" id="annuler_btn" class="main-button btn btn-warning">annuler</button>
            </fieldset>
          </div>
        </section>
      </div>  
    </div>  
  </div>  

    <!-- Modal modifier-->

  <div id="modifier" class="modal fade" role="dialog">  
    <div class="modal-dialog">  
      <div class="modal-content">    
        <section class="formulaire formulaire-modal">
          <div class="col-lg-12">
            <div class="sidebar-heading">
              <h2>modifier votre annonce</h2>
            </div>
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
                <div class="col-md-11 col-sm-12" style="margin-left: 18px;">
                  <fieldset> 
                    <label >modifier votre photo</label>
                    <img src="..{{$annonce->img}}" id="photo" alt="" style="width: 100%;">
                    <label for="image" id="image_label" class="custom-file-label" style="display:none;">modifier votre photo</label>
                    <input type="file" class="custom-file-input" id="image" name="image" accept="image/png, image/jpeg" style="display:none;">
                  </fieldset>
                </div>
                <div class="col-md-12 col-sm-12">
                  <fieldset>
                    <label >le point de départ :</label>                       
                    <select id="depart" name="depart" >
                      <option value="{{$annonce->tarjet->wilaya_depart_id}}" selected>{{$wilayas[$annonce->tarjet->wilaya_depart_id-1]->nom}}</option>
                      @if ($wilayas->count())
                      {{$i=1}} 
                        @foreach ($wilayas as $wilaya)       
                          <option value="{{$i}}">{{$wilaya->nom}}</option>
                          {{$i++}} 
                        @endforeach
                      @endif
                    </select>
                  </fieldset>
                </div>
                <div class="col-md-12 col-sm-12">
                  <fieldset> 
                    <label >le point d'arrivée :</label>                       
                    <select id="arriver" name="arriver" >
                      <option value="{{$annonce->tarjet->wilaya_arriver_id}}" selected>{{$wilayas[$annonce->tarjet->wilaya_arriver_id-1]->nom}}</option>
                      @if ($wilayas->count())
                        {{$i=1}} 
                        @foreach ($wilayas as $wilaya)        
                          <option value="{{$i}}">{{$wilaya->nom}}</option>
                          {{$i++}} 
                        @endforeach
                      @endif
                    </select>
                  </fieldset>
                </div>
                <div class="col-md-12 col-sm-12">
                  <fieldset>  
                    <label >le type de transport :</label>                      
                    <select id="transport_type" name="transport_type" >
                      <option value="{{$annonce->transport_type}}" selected>{{$annonce->transport_type}}</option>
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
                    <label >le poids minimum :</label>                      
                    <select id="fourchette_poid_min" name="fourchette_poid_min">
                      <option value="{{$annonce->fourchette_poid_min}}" selected>{{$annonce->fourchette_poid_min}}</option>
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
                    <label >le poids maximum :</label>                       
                    <select id="fourchette_poid_max" name="fourchette_poid_max" >
                      <option value="{{$annonce->fourchette_poid_max}}" selected>{{$annonce->fourchette_poid_max}}</option>
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
                    <label >le volume minimum :</label>                      
                    <select id="fourchette_volume_min" name="fourchette_volume_min" >
                      <option value="{{$annonce->fourchette_volume_min}}" selected>{{$annonce->fourchette_volume_min}}</option>
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
                    <label >le volume maximum :</label>                       
                    <select id="fourchette_volume_max" name="fourchette_volume_max" >
                      <option value="{{$annonce->fourchette_volume_max}}" selected>{{$annonce->fourchette_volume_max}}</option>
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
                    <label >le moyen de transport :</label>                        
                    <select id="moyen_transport" name="moyen_transport" >
                      <option value="{{$annonce->moyen_transport}}" selected>{{$annonce->moyen_transport}}</option>
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
                    <button type="submit" class="main-button btn btn-warning">soumettre</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </section>
      </div>  
    </div>  
  </div>  

  <!-- Modal signaler client-->
  <div id="signaler_client" class="modal fade" role="dialog">  
    <div class="modal-dialog">  
      <div class="modal-content">    
        <section class="formulaire formulaire-modal">
          <div class="col-lg-12">
            <div class="sidebar-heading">
              @if(!$annonce->signaler_client)
              <h2>signaler ce client</h2>
            </div>
            <div class="col-lg-12">
                <input type="textarea" id="signaler_client_texte" placeholder="pourquoi voulez_vous signaler ce client ?!" required="">
            </div>
            <button id="signaler_client_submit" type="button" class="btn btn-lg btn-success">Soumettre</button>
            @else
              <p> vous avez deja signaler {{$annonce->user->name}} {{$annonce->user->familyname}}</p>
            @endif
          </div>
        </section>
      </div>  
    </div>  
  </div>

    <script>
      $("#supprimer_btn").click(function (e) {
        window.location.href = "delete/{{$annonce->id}}";
      });

      $("#annuler_btn").click(function (e) {
        window.location.href = "cancel/{{$annonce->id}}";
      });

      $("#photo").click(function (e) {
        $("#image_label").css("display","block");
        $("#image").css("display","block");
        $("#image").attr("required","");
        $("#photo").css("display","none");
      });
    </script>

    <script>
      let count=0;

      function starmark(item){
        count=item.id[0];
        sessionStorage.starRating = count;
        let subid= item.id.substring(1);
        for(let i=0;i<5;i++){
            if(i<count){
              document.getElementById((i+1)+subid).style.color="orange";
            }
            else{
              document.getElementById((i+1)+subid).style.color="black";
            }
        }
      }

      $("#noter_submit").click(function (e) {
        $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
          }
        });
        e.preventDefault();
        let formData = {
          id_transporteur: $("#transporteur_id").html(),
          id_annonce:$("#annonce_id").html(), 
          note : count,
        };

        let type = "POST";
        let ajaxurl = "{{route('noter_transporteur')}}";

        $.ajax({
          type: type,
          url: ajaxurl,
          data: formData,
          dataType: 'json',
          success: function (response) {    
            if (response.status == "rated"){
              location.reload();
            }
          },
          error: function (response) {
            console.log(response);
          }
        });
      });

      $("#signaler_transporteur_submit").click(function (e) {
        $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
          }
        });
        e.preventDefault();
        let formData = {
          id_annonce:$("#annonce_id").html(), 
          texte:$("#signaler_transporteur_texte").val(),
        };

        let type = "POST";
        let ajaxurl = "{{route('signaler_transporteur')}}";

        $.ajax({
          type: type,
          url: ajaxurl,
          data: formData,
          dataType: 'json',
          success: function (response) {    
            if (response.status == "signaled"){
              location.reload();
            }
          },
          error: function (response) {
            console.log(response);
          }
        });
      });

      $("#signaler_client_submit").click(function (e) {
        $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
          }
        });
        e.preventDefault();
        let formData = {
          id_annonce:$("#annonce_id").html(), 
          texte:$("#signaler_client_texte").val(),
        };

        let type = "POST";
        let ajaxurl = "{{route('signaler_client')}}";

        $.ajax({
          type: type,
          url: ajaxurl,
          data: formData,
          dataType: 'json',
          success: function (response) {    
            if (response.status == "signaled"){
              location.reload();
            }
          },
          error: function (response) {
            console.log(response);
          }
        });
      });
    </script>

    

@endsection