<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="MecheriHadia">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
        
        <title>ِChronoTruck</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Additional CSS Files -->
        <link rel="stylesheet" href= "assets/css/app.css">
        <link rel="stylesheet" href="assets/css/owl.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    </head>
    <body>
    
    <!-- Header -->
    <header >
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>ِChrono<em>Truck</em></h2></a>
          <div class="navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{ route('acceuil') }}">Accueil</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="{{ route('presentation') }}">Présentation</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('news') }}">News</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('statistiques') }}">Statistiques</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
              </li>
              
              <li class="nav-item">
                  <div class="main-button">
                    <a rel="nofollow" href="{{ route('inscription') }}" >Inscription</a>
                  </div>
              </li>
              <li class="nav-item">
                  <div class="main-button">
                    <a rel="nofollow" href="" >Connexion</a>
                  </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h2>Créer votre compte chronotruck! </h2>  
                @if($statut_creation=='before')
                  <a href="" data-toggle="modal" data-target="#loginModal"><h4 style="margin-top: 15px">si vous avez un compte deja, connectez-vous maintenant</h4></a>  
                @elseif($statut_creation=='after')
                <a href="" data-toggle="modal" data-target="#loginModal"><h4 style="margin-top: 15px">votre compte a été bien créé, connectez-vous maintenant</h4></a>  
                @endif
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <!-- Banner Ends Here -->


    <section class="contact-us">
      <div class="container">
            <div class="down-contact">
                  <div class="sidebar-item contact-form">
                    <div class="sidebar-heading">
                      <h2>remplir vos informations en dessous</h2>
                    </div>
                    <div class="content">
                      <form id="inscription" action="{{route('add_user')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="col-md-4 col-sm-12">
                            <fieldset>
                              <input name="nom" type="text" id="nom" placeholder="votre nom" required="">
                            </fieldset>
                          </div>
                          <div class="col-md-4 col-sm-12">
                            <fieldset>
                              <input name="prenom" type="text" id="prenom" placeholder="votre prénom" required="">
                            </fieldset>
                          </div>
                          <div class="col-md-4 col-sm-12">
                            <fieldset>
                              <input name="phone" type="text" id="phone" placeholder="votre numéro de téléphone" required="">
                            </fieldset>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input name="email" type="text" id="email" placeholder="votre email" required="">
                            </fieldset>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input name="password" type="password" id="password" placeholder="votre mot de passe" required="">
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <input name="adresse" type="text" id="adresse" placeholder="votre adresse principale" required="">
                            </fieldset>
                          </div>

                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <input name="transporteur" type="checkbox" id="transporteur" >
                              <label for="transporteur">être un transporteur</label>
                            </fieldset>
                          </div>

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

                          <div class="col-md-6 col-sm-12 transporteur_section">
                            <fieldset>
                              <input name="certifie" type="checkbox" id="certifie" >
                              <label for="certifie">être un transporteur certifié</label>
                            </fieldset>
                          </div>

                            <div class="col-md-6 col-sm-12 certifie_section">
                              <fieldset>                       
                              <label for="demande">uploader votre demande</label>
                              <input type="file"
                                    id="demande" name="demande"
                                    accept="image/png, image/jpeg, .doc, .docx, application/pdf">
                              </fieldset>
                            </div>

                          <div class="col-lg-12">
                            <fieldset>
                              <button type="submit" id="form-submit" class="main-button">Créer votre compte</button>
                            </fieldset>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
        </div>
      </div>
    </section>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <ul class="social-icons">
              <li><a href="{{ route('acceuil') }}">Accueil</a></li>
              <li><a href="{{ route('presentation') }}">Présentation</a></li>
              <li><a href="{{ route('news') }}">News</a></li>
              <li><a href="{{ route('statistiques') }}">Statistiques</a></li>
              <li><a href="{{ route('contact') }}">Contact</a></li>
              <li><a href="{{ route('inscription') }}">Inscription</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

     <!-- Bootstrap core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>

    <script>
      
        $(".mul-select").select2({
          placeholder: "select country", //placeholder
          tags: true,
          tokenSeparators: ['/',',',';'," "] 
        });

        $("#transporteur").click(function(){
          if( $("#transporteur").is(':checked') ){
              $(".transporteur_section").css("display","block");
            } else {
              $(".transporteur_section").css("display","none");

            }
        });

        $("#certifie").click(function(){
          if( $("#certifie").is(':checked') ){
              $(".certifie_section").css("display","block");
            } else {
              $(".certifie_section").css("display","none");

            }
        }); 

    </script>
  </body>
</html>