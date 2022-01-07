@extends('layouts.app')

@section('content')

        
    <!-- Page Content -->
    
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h2>Gestion du profile</h2>
                <h4></h4>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    


    <section class="blog-posts grid-system">
      <div class="container">
        <div class="row">

          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                
                <div class="col-lg-12">
                  <div class="sidebar-item comments">
                    <div class="sidebar-heading">
                      <h2>informations personnelles</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li>
                          <div class="right-content">
                            <a href="" data-toggle="modal" data-target="#name"><h4>nom :</h4>
                            <p>{{$user->name}}</p></a>
                          </div>
                        </li>
                        <li>
                          <div class="right-content">
                            <a href="" data-toggle="modal" data-target="#familyname"><h4>prénom :</h4>
                            <p>{{$user->familyname}}</p></a>
                          </div>
                        </li>
                        <li>
                          <div class="right-content">
                            <a href="" data-toggle="modal" data-target="#phone"><h4>numéro de téléphone :</h4>
                            <p>{{$user->phone}}</p></a>
                          </div>
                        </li>
                        <li>
                          <div class="right-content">
                            <a href="" data-toggle="modal" data-target="#email"><h4>email :</h4>
                            <p>{{$user->email}}</p></a>
                          </div>
                        </li>
                        <li>
                          <div class="right-content">
                            <a href="" data-toggle="modal" data-target="#mot_passe">
                            <h4> mot de passe :</h4>
                            <p>{{$user->password}}</p></a>
                          </div>
                        </li>
                        <li>
                            <a href="" data-toggle="modal" data-target="#address"><div class="right-content">
                            <h4>adresse principale :</h4>
                            <p>{{$user->address}}</p></a>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                @if($user->transporteur)
                <div class="col-lg-12">
                  <div class="sidebar-item comments">
                    <div class="sidebar-heading">
                      <h2>informations du transporteur</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li>
                            <a href="" data-toggle="modal" data-target="#wilaya_modal"><div class="right-content">
                            <h4> les wilayas que vous comptez desservir :</h4>
                            @foreach( $user->wilayas as $wilaya)
                            <p>{{$wilaya->nom}}</p>
                            @endforeach
                          </a>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
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
                            <h4>le status Le statut de votre demande  :</h4>
                            <p>{{$user->statut}}</p>
                          </div>
                        </li>
                        @if($user->certifie="refusee")
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
                @else
                <div class="col-lg-12">
                  <div class="sidebar-item comments">
                    <div class="sidebar-heading">
                      <h2><a href="" data-toggle="modal" data-target="#certifie">voulez vous etre un transporteur certifié ?</a></h2>
                    </div>
                  </div>
                </div>
                @endif
                @else
                <div class="col-lg-12">
                  <div class="sidebar-item comments">
                  <div class="sidebar-heading">
                      <h2><a href="" data-toggle="modal" data-target="#transporteur">voulez vous etre un transporteur ?</a></h2>
                    </div>
                  </div>
                </div>
                @endif

                <div class="col-lg-12">
                  <div class="sidebar-item comments">
                    <div class="sidebar-heading">
                      <h2>transactions recente</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li>
                          <div class="author-thumb">
                            <img src="assets/images/comment-author-01.jpg" alt="">
                          </div>
                          <div class="right-content">
                            <h4>Charles Kate<span>May 16, 2020</span></h4>
                            <p>Fusce ornare mollis eros. Duis et diam vitae justo fringilla condimentum eu quis leo. Vestibulum id turpis porttitor sapien facilisis scelerisque. Curabitur a nisl eu lacus convallis eleifend posuere id tellus.</p>
                          </div>
                        </li>
                        <li class="replied">
                          <div class="author-thumb">
                            <img src="assets/images/comment-author-02.jpg" alt="">
                          </div>
                          <div class="right-content">
                            <h4>Thirteen Man<span>May 20, 2020</span></h4>
                            <p>In porta urna sed venenatis sollicitudin. Praesent urna sem, pulvinar vel mattis eget.</p>
                          </div>
                        </li>
                        <li>
                          <div class="author-thumb">
                            <img src="assets/images/comment-author-03.jpg" alt="">
                          </div>
                          <div class="right-content">
                            <h4>Belisimo Mama<span>May 16, 2020</span></h4>
                            <p>Nullam nec pharetra nibh. Cras tortor nulla, faucibus id tincidunt in, ultrices eget ligula. Sed vitae suscipit ligula. Vestibulum id turpis volutpat, lobortis turpis ac, molestie nibh.</p>
                          </div>
                        </li>
                        <li class="replied">
                          <div class="author-thumb">
                            <img src="assets/images/comment-author-02.jpg" alt="">
                          </div>
                          <div class="right-content">
                            <h4>Thirteen Man<span>May 22, 2020</span></h4>
                            <p>Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra leo.</p>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                

              </div>
            </div>
          </div>
          
          <div class="col-lg-4">
            <div class="sidebar">
              <div class="row">
                <div class="col-lg-12">
                  <div class="sidebar-item search">
                    <form id="search_form" name="gs" method="GET" action="#">
                      <input type="text" name="q" class="searchText" placeholder="tapez pour rechercher..." autocomplete="on">
                    </form>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                      <h2>annonces récents {{$user->annonces->count()}}</h2>
                    </div>
                    <div class="content">
                      <ul>
                        @if($user->annonces->count()) 
                            @foreach ($user->annonces as $annonce) 
                              @if(!$annonce->archiver)  
                                <li><a href="annonce/{{$annonce->id}}">
                                <h5>{{$annonce->titre}}</h5>
                                <span>de {{$annonce->depart}} vers {{$annonce->arriver}}</span>
                                <span>{{$annonce->created_at}}</span>
                                </a></li>
                                @endif
                            @endforeach
                        @endif
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div id="name" class="modal fade" role="dialog">  
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
                    </div>
                  </div>
                </div>
              </section>
            </div>  
        </div>  
      </div>  
    </div>

    <div id="familyname" class="modal fade" role="dialog">  
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
                    </div>
                  </div>
                </div>
              </section>
            </div>  
        </div>  
      </div>  
    </div>

    <div id="phone" class="modal fade" role="dialog">  
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
                    </div>
                  </div>
                </div>
              </section>
            </div>  
        </div>  
      </div>  
    </div>

    <div id="address" class="modal fade" role="dialog">  
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
                    </div>
                  </div>
                </div>
              </section>
            </div>  
        </div>  
      </div>  
    </div>

    <div id="email" class="modal fade" role="dialog">  
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
                    </div>
                  </div>
                </div>
              </section>
            </div>  
        </div>  
      </div>  
    </div>

    <div id="mot_passe" class="modal fade" role="dialog">  
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
                    </div>
                  </div>
                </div>
              </section>
            </div>  
        </div>  
      </div>  
    </div>

    <div id="transporteur" class="modal fade" role="dialog">  
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
                            <h2>modifier votre état vers un transporteur</h2>
                          </div>
                          <div class="content">
                            <form id="transporteur_form">
                              @csrf
                                <div class="col-md-12 col-sm-12">
                                  <fieldset>
                                    <select class="mul-select" id="wilaya" name="wilaya[]" multiple="true">
                                      @foreach ($wilayas as $wilaya)
                                        <option value="{{$wilaya->nom}}" >{{$wilaya->nom}}</option>
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
                    </div>
                  </div>
                </div>
              </section>
            </div>  
        </div>  
      </div>  
    </div>

    <div id="certifie" class="modal fade" role="dialog">  
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
                    </div>
                  </div>
                </div>
              </section>
            </div>  
        </div>  
      </div>  
    </div>

    <div id="wilaya_modal" class="modal fade" role="dialog">  
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
                            <h2>les wilayas que vous comptez desservir</h2>
                          </div>
                          <div class="content">
                            <form id="wilaya_form">
                              @csrf
                                <div class="col-md-12 col-sm-12">
                                  <fieldset>
                                    <select class="mul-select" id="wilaya" name="wilaya[]" multiple="true">
                                      @foreach ($wilayas as $wilaya)
                                        <option value="{{$wilaya->nom}}" >{{$wilaya->nom}}</option>
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
                    </div>
                  </div>
                </div>
              </section>
            </div>  
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

        $("#passworde_submit").click(function (e) {
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