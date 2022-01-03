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
                            <a href="" data-toggle="modal" data-target="#wilaya"><div class="right-content">
                            <h4> les wilayas que vous comptez desservir :</h4>
                            <p>{{$user->wilaya}}</p></a>
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
                      <h2>annonces récents</h2>
                    </div>
                    <div class="content">
                      <ul>
                        @if($user->annonces->count()) 
                            @foreach ($user->annonces as $annonce)   
                                <li><a href="annonce/{{$annonce->id}}">
                                <h5>{{$annonce->titre}}</h5>
                                <span>de {{$annonce->depart}} vers {{$annonce->arriver}}</span>
                                <span>{{$annonce->created_at}}</span>
                                </a></li>
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
                            <form >
                              @csrf
                                <div class="col-md-12 col-sm-12">
                                  <fieldset>
                                    <input name="name" type="text" id="name" placeholder="nouveau nom" required="">
                                  </fieldset>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                  <fieldset>
                                    <input name="password" type="password" id="password" placeholder="mot de passe" required="">
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
                            <form >
                              @csrf
                                <div class="col-md-12 col-sm-12">
                                  <fieldset>
                                    <input name="familyname" type="text" id="familyname" placeholder="nouveau prénom" required="">
                                  </fieldset>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                  <fieldset>
                                    <input name="password" type="password" id="password" placeholder="mot de passe" required="">
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
                            <form >
                              @csrf
                                <div class="col-md-12 col-sm-12">
                                  <fieldset>
                                    <input name="phone" type="text" id="phone" placeholder="nouveau numéro de téléphone" required="">
                                  </fieldset>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                  <fieldset>
                                    <input name="password" type="password" id="password" placeholder="mot de passe" required="">
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
                            <form >
                              @csrf
                                <div class="col-md-12 col-sm-12">
                                  <fieldset>
                                    <input name="address" type="text" id="address" placeholder="adresse principale" required="">
                                  </fieldset>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                  <fieldset>
                                    <input name="password" type="password" id="password" placeholder="mot de passe" required="">
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
                            <form >
                              @csrf
                                <div class="col-md-12 col-sm-12">
                                  <fieldset>
                                    <input name="email" type="text" id="email" placeholder="nouveau email" required="">
                                  </fieldset>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                  <fieldset>
                                    <input name="password" type="password" id="password" placeholder="mot de passe" required="">
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
                            <form >
                              @csrf
                                <div class="col-md-12 col-sm-12">
                                  <fieldset>
                                    <input name="password" type="password" id="password" placeholder="mot de passe" required="">
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
                            <form >
                              @csrf
                                <div class="col-md-12 col-sm-12">
                                  <fieldset>
                                    <input name="password" type="password" id="password" placeholder="mot de passe" required="">
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
                            <form >
                              @csrf
                                <div class="col-md-12 col-sm-12">
                                  <fieldset>
                                    <input name="password" type="password" id="password" placeholder="mot de passe" required="">
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

    <div id="wilaya" class="modal fade" role="dialog">  
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
                            <form >
                              @csrf
                                <div class="col-md-12 col-sm-12 transporteur_section">
                                    <fieldset>
                                      <div class="multiselect">
                                        <div class="container-fluid h-100 bg-light text-dark">
                                        <div class="row justify-content-center align-items-center">
                                            <h1>Select Multilpe</h1>    
                                        </div>
                                        <br>
                                        <div class="row justify-content-center align-items-center h-100">
                                            <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                                <div class="form-group">
                                                    <select class="mul-select" id="wilaya" name="wilaya[]" multiple="true">
                                                        @foreach ($wilayas as $wilaya)
                                                        <option value="{{$wilaya->nom}}" >{{$wilaya->nom}}</option>
                                                        @endforeach
                                                    </select>
                                                </div> 
                                            </div>
                                        </div>
                                      </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                  <fieldset>
                                    <input name="password" type="password" id="password" placeholder="votre mot de passe" required="">
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
                  if(response)
                  {
                    
                  }
                  else{
                    //no result
                  }
              },
              error: function (response) {
                  console.log(response);
              }
            });
       });  

    </script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

@endsection