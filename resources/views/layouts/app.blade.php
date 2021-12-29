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
                  <a rel="nofollow" href="" data-toggle="modal" data-target="#loginModal">Connexion</a>
                  </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

        @yield('content')
    
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
     
 <div id="loginModal" class="modal fade" role="dialog">  
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
                                <form id="connexion" action="{{route('check_user')}}" method="post">
                                      <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                          <fieldset>
                                            <input name="email" type="text" id="email" placeholder="votre email" required="">
                                          </fieldset>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                          <fieldset>
                                            <input name="password" type="password" id="password" placeholder="votre mot de passe">
                                          </fieldset>
                                        </div>
                                        <div class="col-lg-12">
                                          <fieldset>
                                            <button type="submit" id="form_submit" class="main-button btn btn-warning">se connecter</button>
                                          </fieldset>
                                        </div>
                                        <div class="text-content">
                                          <a href="{{route('inscription')}}"><h4 style="margin-top: 15px">vous n'avez pas de compte, inscrivez-vous ici</h4></a>  
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
      $('#form_submit').click(function(){  
           
      }); 

     <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>
  </body>
</html>