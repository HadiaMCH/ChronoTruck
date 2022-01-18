@extends( (session()->exists('admin_name') || session()->exists('super_admin_name')) ? 'layouts.appsecondadmin' : 'layouts.appsecond')

@section('content')

        
    <!-- Page Content -->
    
    <div class="heading-page">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h2>Gestion du profile</h2>
                <h4>{{$user->familyname}} {{$user->name}}</h4>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <section class="posts">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="profile">
              <div class="col-lg-12">
                  <div class="sidebar-heading">
                    <h2>informations personnelles</h2>
                  </div>
                  <div>
                    <ul>
                      <li>
                        <div class="right-content">
                          @if($user->id == session('id') || session()->exists('super_admin_name'))
                            <a href="" data-toggle="modal" data-target="#name"><h4>nom :</h4>
                            <p>{{$user->name}}</p></a>
                          @else
                            <h4>nom :</h4>
                            <p>{{$user->name}}</p>
                          @endif
                        </div>
                      </li>
                      <li>
                        <div class="right-content">
                          @if($user->id == session('id') || session()->exists('super_admin_name'))
                            <a href="" data-toggle="modal" data-target="#familyname"><h4>prénom :</h4>
                            <p>{{$user->familyname}}</p></a>
                          @else
                            <h4>prénom :</h4>
                            <p>{{$user->familyname}}</p>
                          @endif
                        </div>
                      </li>
                      <li>
                        <div class="right-content">
                          @if($user->id == session('id') || session()->exists('super_admin_name'))
                            <a href="" data-toggle="modal" data-target="#phone"><h4>numéro de téléphone :</h4>
                            <p>{{$user->phone}}</p></a>
                          @else
                            <h4>numéro de téléphone :</h4>
                            <p>{{$user->phone}}</p>
                          @endif
                        </div>
                      </li>
                      <li>
                        <div class="right-content">
                          @if($user->id == session('id') || session()->exists('super_admin_name'))
                            <a href="" data-toggle="modal" data-target="#email"><h4>email :</h4>
                            <p>{{$user->email}}</p></a>
                          @else
                            <h4>email :</h4>
                            <p>{{$user->email}}</p>
                          @endif
                        </div>
                      </li>
                      <li>
                        <div class="right-content">
                          @if($user->id == session('id') || session()->exists('super_admin_name'))
                            <a href="" data-toggle="modal" data-target="#mot_passe">
                            <h4>mot de passe :</h4>
                            <p>{{$user->password}}</p></a>
                          @else
                            <h4>mot de passe :</h4>
                            <p>{{$user->password}}</p>
                          @endif
                        </div>
                      </li>
                      <li>
                        <div class="right-content">
                          @if($user->id == session('id') || session()->exists('super_admin_name'))
                            <a href="" data-toggle="modal" data-target="#address">
                            <h4>adresse principale :</h4>
                            <p>{{$user->address}}</p></a>
                          @else
                            <h4>adresse principale :</h4>
                            <p>{{$user->address}}</p>
                          @endif
                        </div>
                      </li>
                    </ul>
                  </div>
              </div>
              @if($user->transporteur==2)
                <div class="col-lg-12">
                    <div class="sidebar-heading">
                      <h2>informations du transporteur</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li>
                          <div class="right-content">
                            @if($user->id == session('id') || session()->exists('super_admin_name'))
                              <a href="" data-toggle="modal" data-target="#wilaya_modal">
                              @if (session()->exists('super_admin_name'))
                                <h4> les wilayas que ce transporteur compte desservir :</h4>
                              @else
                                <h4> les wilayas que vous comptez desservir :</h4>
                              @endif
                              @foreach ($user->tarjets as $tarjet)
                                <p>de {{$wilayas[$tarjet->wilaya_depart_id-1]->nom}} vers {{$wilayas[$tarjet->wilaya_arriver_id-1]->nom}}</p>
                              @endforeach
                              </a>
                            @else
                              <h4> les wilayas que ce transporteur compte desservir :</h4>
                              @foreach ($user->tarjets as $tarjet)
                                <p>de {{$wilayas[$tarjet->wilaya_depart_id-1]->nom}} vers {{$wilayas[$tarjet->wilaya_arriver_id-1]->nom}}</p>
                              @endforeach
                            @endif
                          </div>
                        </li>
                      </ul>
                  </div>
                  @if($user->certifie)
                    <div class="col-lg-12">
                      <div class="sidebar-item comments">
                        <div class="sidebar-heading">
                          <h2>informations de la certification du transporteur</h2>
                        </div>
                        <div class="content">
                          <ul>
                            <li>
                              <div class="right-content">
                                <h4>le status Le statut de la demande de certification :</h4>
                                <p>{{$user->statut}}</p>
                              </div>
                            </li>
                            @if($user->certifie=="refusée")
                            <li>
                              <div class="right-content">
                                <h4>justificatif  :</h4>
                                <p>{{$user->justificatif}}</p>
                              </div>
                            </li>
                            @endif
                          </ul>
                        </div>
                      </div>
                    </div>
                  @elseif($user->id == session('id'))
                    <div class="col-lg-12">
                      <div class="sidebar-item comments">
                        <div class="sidebar-heading">
                          <h2><a href="" data-toggle="modal" data-target="#certifie">voulez vous etre un transporteur certifié ?</a></h2>
                        </div>
                      </div>
                    </div>
                  @endif
              @elseif($user->transporteur==1)
                @if($user->id == session('id'))
                  <div class="col-lg-12">
                    <div class="sidebar-heading">
                      <h2>votre inscription comme un transporteur n'est pas encore validée.</h2>
                    </div>
                @endif
              @elseif($user->id == session('id'))
                <div class="col-lg-12">
                    <div class="sidebar-heading">
                      <h2><a href="" data-toggle="modal" data-target="#transporteur">voulez vous etre un transporteur ?</a></h2>
                    </div>
              @else
                <div>
              @endif

              @if(count($user->transactions_client))
                <div>
                  <div class="sidebar-item comments">
                    <div class="sidebar-heading">
                      <h2>les demandes de transport que vous avez comme client</h2>
                    </div>
                    <div>
                      <ul>
                        @foreach ($user->transactions_client as $transaction)
                          <li>
                            <div class="right-content">
                              @if($transaction->contenu=='il vous demande de vous transporter')
                                <h4>{{$transaction->client->name}} {{$transaction->client->familyname}} vous demande de vous transporter :</h4>
                                <p><a href="../annonce/{{$transaction->annonce->id}}">voir ici l'annonce</a></p>
                                <div class="col-lg-12">
                                  <div class="row">
                                    <div class="col-lg-4">
                                      <div class="main-button">
                                        <a href="../accepter_transaction/{{$transaction->id}}">accepter</a>
                                      </div>
                                    </div>
                                    <div class="col-lg-4">
                                      <div class="main-button">
                                        <a href="../refuser_transaction/{{$transaction->id}}">refuser</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              @else
                                <h4>votre demande de transport a {{$transaction->transporteur->name}} {{$transaction->transporteur->familyname}} est {{$transaction->status}}</h4>
                                <p><a href="../annonce/{{$transaction->annonce->id}}">voir ici l'annonce</a></p>
                              @endif
                            </div>
                          </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
              @else
                <div>
                  <div class="sidebar-item comments">
                    <div class="sidebar-heading">
                      <h2>aucune demandes de transport que vous avez comme client</h2>
                    </div>
                  </div>
                </div>
              @endif
                @if($user->transporteur == 2)
                  @if(count($user->transactions_transporteur))
                    <div >
                      <div class="sidebar-item comments">
                        <div class="sidebar-heading">
                          <h2>les demandes de transport que vous avez comme transporteur</h2>
                        </div>
                        <div>
                          <ul>
                            @foreach ($user->transactions_transporteur as $transaction)
                              <li>
                                <div class="right-content">
                                  @if($transaction->contenu=='il vous demande de le transporter')
                                    <h4>{{$transaction->client->name}} {{$transaction->client->familyname}} vous demande de le transporter :</h4>
                                    <p><a href="../annonce/{{$transaction->annonce->id}}">voir ici l'annonce</a></p>
                                    <div class="col-lg-12">
                                      <div class="row">
                                        <div class="col-lg-4">
                                          <div class="main-button">
                                            <a href="../accepter_transaction/{{$transaction->id}}">accepter</a>
                                          </div>
                                        </div>
                                        <div class="col-lg-4">
                                          <div class="main-button">
                                            <a href="../refuser_transaction/{{$transaction->id}}">refuser</a>
                                          </div>
                                        </div> 
                                      </div>
                                    </div>
                                  @else
                                    <h4>votre demande de transport a {{$transaction->transporteur->name}} {{$transaction->transporteur->familyname}} est {{$transaction->status}}</h4>
                                    <p><a href="../annonce/{{$transaction->annonce->id}}">voir ici l'annonce</a></p>
                                  @endif
                                </div>
                              </li>
                            @endforeach
                          </ul>
                        </div>
                      </div>
                    </div>
                  @else
                    <div class="col-lg-12">
                      <div class="sidebar-item comments">
                        <div class="sidebar-heading">
                          <h2>aucune demandes de transport que vous avez comme transporteur</h2>
                        </div>
                      </div>
                    </div>
                  @endif
                @endif  
                
              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="sidebar">
              <div class="row">
                <div class="col-lg-12">
                  <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                      <h2>annonces récents</h2>
                    </div>
                    <div class="content">
                      <ul>
                        @if(count($user->annonces_user)) 
                            @foreach ($user->annonces_user as $annonce) 
                              @if(!$annonce->archiver)  
                                <li><a href="../annonce/{{$annonce->id}}">
                                <h5>{{$annonce->titre}}</h5>
                                <span>de {{$wilayas[$annonce->tarjet->wilaya_depart_id-1]->nom}} vers {{$wilayas[$annonce->tarjet->wilaya_arriver_id-1]->nom}}</span>
                                <span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $annonce->created_at)->format('H:i:s d-m-Y');}}</span>
                                </a></li>
                                @endif
                            @endforeach
                        @else
                          <li>
                            <span>vous n'avez pas fait d'annonce </span>
                          </li>
                        @endif
                      </ul>
                    </div>
                  </div>
                </div>
                @if($user->transporteur==1)
                <div class="col-lg-12">
                  <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                      <h2>annonces dont vous étiez un transporteur </h2>
                    </div>
                    <div class="content">
                      <ul>
                        @if(count($user->annonces_transporteur)) 
                            @foreach ($user->annonces_transporteur as $annonce) 
                              @if(!$annonce->archiver)  
                                <li><a href="../annonce/{{$annonce->id}}">
                                <h5>{{$annonce->titre}}</h5>
                                <span>de {{$wilayas[$annonce->tarjet->wilaya_depart_id-1]->nom}} vers {{$wilayas[$annonce->tarjet->wilaya_arriver_id-1]->nom}}</span>
                                <span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $annonce->created_at)->format('H:i:s d-m-Y');}}</span>
                                </a></li>
                                @endif
                            @endforeach
                        @else
                        <li>
                          <span>vous n'avez pas tranporter deja</span>
                        </li>
                        @endif
                      </ul>
                    </div>
                  </div>
                </div>
                @endif

              </div>
            </div>
          </div>
        </div>
    </section>

    <div id="name" class="modal fade" role="dialog">  
          <div class="modal-dialog">  
            <div class="modal-content">    
              <section class="formulaire formulaire-modal">
                <div class="col-lg-12">
                  <div class="sidebar-heading">
                    <h2>modifier votre nom</h2>
                  </div>
                  <div class="content">
                    <form id="name_form">
                      @csrf
                      <div class="col-md-12 col-sm-12">
                        <fieldset>
                          <input name="name" type="text" id="name" placeholder="nouveau nom" required="">
                        </fieldset>
                      </div>
                      <div class="col-md-12 col-sm-12">
                        <fieldset>
                          <input name="password" type="password" id="name_password" placeholder="mot de passe" required="">
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <button type="submit" id="name_submit" class="main-button btn btn-warning">modifier</button>
                        </fieldset>
                      </div>
                    </form>
                  </div>
                </div>
              </section>
            </div>  
          </div>  
    </div>  

    <div id="familyname" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
        <div class="modal-content">    
          <section class="formulaire formulaire-modal">
            <div class="col-lg-12">
              <div class="sidebar-heading">
                <h2>modifier votre prénom</h2>
              </div>
              <div class="content">
                <form id="familyname_form">
                  @csrf
                  <div class="col-md-12 col-sm-12">
                    <fieldset>
                      <input name="familyname" type="text" id="familyname" placeholder="nouveau prénom" required="">
                    </fieldset>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <fieldset>
                      <input name="password" type="password" id="familyname_password" placeholder="mot de passe" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="familyname_submit" class="main-button btn btn-warning">modifier</button>
                    </fieldset>
                  </div>
                </form>
              </div>
            </div>
          </section>
        </div>  
      </div>  
    </div>

    <div id="phone" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
        <div class="modal-content">    
          <section class="formulaire formulaire-modal">
            <div class="col-lg-12">
              <div class="sidebar-heading">
                <h2>modifier votre numéro de téléphone</h2>
              </div>
              <div class="content">
                <form id="phone_form">
                  @csrf
                  <div class="col-md-12 col-sm-12">
                    <fieldset>
                      <input name="phone" type="text" id="phone" placeholder="nouveau numéro de téléphone" required="">
                    </fieldset>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <fieldset>
                      <input name="password" type="password" id="phone_password" placeholder="mot de passe" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="phone_submit" class="main-button btn btn-warning">modifier</button>
                    </fieldset>
                  </div>
                </form>
              </div>
            </div>
          </section>
        </div>  
      </div>  
    </div>

    <div id="address" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
        <div class="modal-content">    
          <section class="formulaire formulaire-modal">
            <div class="col-lg-12">
              <div class="sidebar-heading">
                <h2>modifier votre adresse principale</h2>
              </div>
              <div class="content">
                <form id="address_form">
                  @csrf
                  <div class="col-md-12 col-sm-12">
                    <fieldset>
                      <input name="address" type="text" id="address" placeholder="adresse principale" required="">
                    </fieldset>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <fieldset>
                      <input name="password" type="password" id="address_password" placeholder="mot de passe" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="address_submit" class="main-button btn btn-warning">modifier</button>
                    </fieldset>
                  </div>
                </form>
              </div>
            </div>
          </section>
        </div>  
      </div>  
    </div>

    <div id="email" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
        <div class="modal-content">    
          <section class="formulaire formulaire-modal">
            <div class="col-lg-12">
              <div class="sidebar-heading">
                <h2>modifier votre email</h2>
              </div>
              <div class="content">
                <form id="email_form">
                  @csrf
                  <div class="col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="text" id="email" placeholder="nouveau email" required="">
                    </fieldset>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <fieldset>
                      <input name="password" type="password" id="email_password" placeholder="mot de passe" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="email_submit" class="main-button btn btn-warning">modifier</button>
                    </fieldset>
                  </div>
                </form>
              </div>
            </div>
          </section>
        </div>  
      </div>  
    </div>

    <div id="mot_passe" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
        <div class="modal-content">    
          <section class="formulaire formulaire-modal">
            <div class="col-lg-12">
              <div class="sidebar-heading">
                <h2>modifier votre mot de passe</h2>
              </div>
              <div class="content">
                <form id="password_form">
                  @csrf
                  <div class="col-md-12 col-sm-12">
                    <fieldset>
                      <input name="password" type="password" id="pass_password" placeholder="mot de passe" required="">
                    </fieldset>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <fieldset>
                      <input name="new_password" type="password" id="new_password" placeholder="nouveau mot de passe" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="password_submit" class="main-button btn btn-warning">modifier</button>
                    </fieldset>
                  </div>
                </form>
              </div>
            </div>
          </section>
        </div>  
      </div>  
    </div>

    <div id="transporteur" class="modal fade" role="dialog"> 
      <div class="modal-dialog">  
        <div class="modal-content">    
          <section class="formulaire formulaire-modal">
            <div class="col-lg-12">
              <div class="sidebar-heading"> 
                <h2>modifier votre état vers un transporteur</h2>
              </div>
              <div class="content">
                <form id="transporteur_form">
                  @csrf
                  <div class="col-md-12 col-sm-12">
                    <fieldset>
                      <label for="depart">les points de départ :</label>
                      <select class="mul-select" id="depart" name="depart[]" multiple="true" >
                        {{$i=1}}
                        @foreach ($wilayas as $wilaya)
                          <option value="{{$i}}">{{$wilaya->nom}}</option>
                          {{$i++}}
                        @endforeach
                      </select>
                    </fieldset>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <fieldset>
                      <label for="arriver">les points d'arrivée :</label>
                      <select class="mul-select col-lg-12" id="arriver" name="arriver[]" multiple="true" >
                        {{$i=1}}
                        @foreach ($wilayas as $wilaya)
                          <option value="{{$i}}">{{$wilaya->nom}}</option>
                          {{$i++}}
                        @endforeach
                      </select>
                    </fieldset>
                  </div>
                    <div class="col-md-12 col-sm-12">
                      <fieldset>
                        <input name="password" type="password" id="transporteur_password" placeholder="mot de passe" required="">
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="transporteur_submit" class="main-button btn btn-warning">modifier</button>
                      </fieldset>
                    </div>
                </form>
              </div>
            </div>
          </section>
        </div>  
      </div>  
    </div>

    <div id="certifie" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
        <div class="modal-content">    
          <section class="formulaire formulaire-modal">
            <div class="col-lg-12">
              <div class="sidebar-heading">
                <h2>modifier votre état vers un transporteur certifié</h2>
              </div>
              <div class="content">
                <form id="certifie_form">
                @csrf
                  <div class="col-md-12 col-sm-12">
                    <fieldset>
                      <label for="demande">uploader votre demande</label>
                      <input type="file" id="demande" name="demande" accept="image/png, image/jpeg, .doc, .docx, application/pdf">
                    </fieldset>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <fieldset>
                      <input name="password" type="password" id="certifie_password" placeholder="mot de passe" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="certifie_submit" class="main-button btn btn-warning">modifier</button>
                    </fieldset>
                  </div>
                </form>
              </div>
            </div>
          </section>
        </div>  
      </div>  
    </div>

    <div id="wilaya_modal" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
        <div class="modal-content">    
          <section class="formulaire formulaire-modal">
            <div class="col-lg-12">
              <div class="sidebar-heading">
                <h2>les wilayas que vous comptez desservir</h2>
              </div>
              <div class="content">
                <form id="wilaya_form">
                  @csrf
                  <div class="col-md-12 col-sm-12 ">
                    <fieldset>
                      <label for="depart">les points de départ :</label>
                      <select class="mul-select" id="depart" name="depart[]" multiple="true" >
                        {{$i=1}}
                        @foreach ($wilayas as $wilaya)
                          <option value="{{$i}}">{{$wilaya->nom}}</option>
                          {{$i++}}
                        @endforeach
                      </select>
                    </fieldset>
                  </div>
                  <div class="col-md-12 col-sm-12 ">
                    <fieldset>
                      <label for="arriver">les points d'arrivée :</label>
                      <select class="mul-select col-lg-12" id="arriver" name="arriver[]" multiple="true" >
                        {{$i=1}}
                        @foreach ($wilayas as $wilaya)
                          <option value="{{$i}}">{{$wilaya->nom}}</option>
                          {{$i++}}
                        @endforeach
                      </select>
                    </fieldset>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <fieldset>
                      <input name="password" type="password" id="wilaya_password" placeholder="votre mot de passe" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="wilaya_submit" class="main-button btn btn-warning">modifier</button>
                    </fieldset>
                  </div>
                </form>
              </div>
            </div>
          </section>
        </div>  
      </div>  
    </div>

    <script>
      
        $(".mul-select").select2({
          placeholder: "select country", //placeholder
          tags: true,
          tokenSeparators: ['/',',',';'," "] 
        });

        $("#name_submit").click(function (e) {
            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
              }
            });
            e.preventDefault();
            let formData = {
              password : $("#name_password").val(),
            };
            let type = "POST";
            let ajaxurl = "{{route('check_password')}}";

            $.ajax({
                type: type,
                url: ajaxurl,
                data: formData,
                dataType: 'json',
                success: function (response) {      
                  if (response.status == "true"){
                    $("#name_form").attr("action","{{route('modifier')}}");
                    $("#name_form").attr("method","post");
                    $("#name_form").submit();
                  }
                  else{
                    $("#name_password").css("border-color", "#d93025");
                    $("#name_password").css("color", "#d93025");
                  }
                },
                error: function (response) {
                    console.log(response);
                }
              });
        }); 

        $("#familyname_submit").click(function (e) {
            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
              }
            });
            e.preventDefault();
            let formData = {
              password : $("#familyname_password").val(),
            };
            let type = "POST";
            let ajaxurl = "{{route('check_password')}}";

            $.ajax({
                type: type,
                url: ajaxurl,
                data: formData,
                dataType: 'json',
                success: function (response) {      
                  if (response.status == "true"){
                    $("#familyname_form").attr("action","{{route('modifier')}}");
                    $("#familyname_form").attr("method","post");
                    $("#familyname_form").submit();
                  }
                  else{
                    $("#familyname_password").css("border-color", "#d93025");
                    $("#familyname_password").css("color", "#d93025");
                  }
                },
                error: function (response) {
                    console.log(response);
                }
              });
        }); 

        $("#phone_submit").click(function (e) {
            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
              }
            });
            e.preventDefault();
            let formData = {
              password : $("#phone_password").val(),
            };
            let type = "POST";
            let ajaxurl = "{{route('check_password')}}";

            $.ajax({
                type: type,
                url: ajaxurl,
                data: formData,
                dataType: 'json',
                success: function (response) {      
                  if (response.status == "true"){
                    $("#phone_form").attr("action","{{route('modifier')}}");
                    $("#phone_form").attr("method","post");
                    $("#phone_form").submit();
                  }
                  else{
                    $("#phone_password").css("border-color", "#d93025");
                    $("#phone_password").css("color", "#d93025");
                  }
                },
                error: function (response) {
                    console.log(response);
                }
              });
        }); 

        $("#email_submit").click(function (e) {
            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
              }
            });
            e.preventDefault();
            let formData = {
              password : $("#email_password").val(),
            };
            let type = "POST";
            let ajaxurl = "{{route('check_password')}}";

            $.ajax({
                type: type,
                url: ajaxurl,
                data: formData,
                dataType: 'json',
                success: function (response) {      
                  if (response.status == "true"){
                    $("#email_form").attr("action","{{route('modifier')}}");
                    $("#email_form").attr("method","post");
                    $("#email_form").submit();
                  }
                  else{
                    $("#email_password").css("border-color", "#d93025");
                    $("#email_password").css("color", "#d93025");
                  }
                },
                error: function (response) {
                    console.log(response);
                }
              });
        }); 

        $("#address_submit").click(function (e) {
            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
              }
            });
            e.preventDefault();
            let formData = {
              password : $("#address_password").val(),
            };
            let type = "POST";
            let ajaxurl = "{{route('check_password')}}";

            $.ajax({
                type: type,
                url: ajaxurl,
                data: formData,
                dataType: 'json',
                success: function (response) {      
                  if (response.status == "true"){
                    $("#address_form").attr("action","{{route('modifier')}}");
                    $("#address_form").attr("method","post");
                    $("#address_form").submit();
                  }
                  else{
                    $("#address_password").css("border-color", "#d93025");
                    $("#address_password").css("color", "#d93025");
                  }
                },
                error: function (response) {
                    console.log(response);
                }
              });
        });

        $("#password_submit").click(function (e) {
            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
              }
            });
            e.preventDefault();
            let formData = {
              password : $("#pass_password").val(),
            };
            let type = "POST";
            let ajaxurl = "{{route('check_password')}}";

            $.ajax({
                type: type,
                url: ajaxurl,
                data: formData,
                dataType: 'json',
                success: function (response) {      
                  if (response.status == "true"){
                    $("#password_form").attr("action","{{route('modifier')}}");
                    $("#password_form").attr("method","post");
                    $("#password_form").submit();
                  }
                  else{
                    $("#pass_password").css("border-color", "#d93025");
                    $("#pass_password").css("color", "#d93025");
                  }
                },
                error: function (response) {
                    console.log(response);
                }
              });
        }); 

        $("#wilaya_submit").click(function (e) {
            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
              }
            });
            e.preventDefault();
            let formData = {
              password : $("#wilaya_password").val(),
            };
            let type = "POST";
            let ajaxurl = "{{route('check_password')}}";

            $.ajax({
                type: type,
                url: ajaxurl,
                data: formData,
                dataType: 'json',
                success: function (response) {      
                  if (response.status == "true"){
                    $("#wilaya_form").attr("action","{{route('modifier')}}");
                    $("#wilaya_form").attr("method","post");
                    $("#wilaya_form").submit();
                  }
                  else{
                    $("#wilaya_password").css("border-color", "#d93025");
                    $("#wilaya_password").css("color", "#d93025");
                  }
                },
                error: function (response) {
                    console.log(response);
                }
              });
        });

        $("#transporteur_submit").click(function (e) {
            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
              }
            });
            e.preventDefault();
            let formData = {
              password : $("#transporteur_password").val(),
            };
            let type = "POST";
            let ajaxurl = "{{route('check_password')}}";

            $.ajax({
                type: type,
                url: ajaxurl,
                data: formData,
                dataType: 'json',
                success: function (response) {      
                  if (response.status == "true"){
                    $("#transporteur_form").attr("action","{{route('etre_transporteur')}}");
                    $("#transporteur_form").attr("method","post");
                    $("#transporteur_form").submit();
                  }
                  else{
                    $("#transporteur_password").css("border-color", "#d93025");
                    $("#transporteur_password").css("color", "#d93025");
                  }
                },
                error: function (response) {
                    console.log(response);
                }
              });
        });

        $("#certifie_submit").click(function (e) {
            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
              }
            });
            e.preventDefault();
            let formData = {
              password : $("#certifie_password").val(),
            };
            let type = "POST";
            let ajaxurl = "{{route('check_password')}}";

            $.ajax({
                type: type,
                url: ajaxurl,
                data: formData,
                dataType: 'json',
                success: function (response) {      
                  if (response.status == "true"){
                    $("#certifie_form").attr("action","{{route('etre_certifie')}}");
                    $("#certifie_form").attr("method","post");
                    $("#certifie_form").submit();
                  }
                  else{
                    $("#certifie_password").css("border-color", "#d93025");
                    $("#certifie_password").css("color", "#d93025");
                  }
                },
                error: function (response) {
                    console.log(response);
                }
              });
        }); 

    </script>

@endsection