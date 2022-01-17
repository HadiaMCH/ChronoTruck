<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class acceuilView extends Controller
{
    public function acceuil($status,$transport_types,$fourchette_poid_mins,$fourchette_poid_maxs,$fourchette_volume_mins,$fourchette_volume_maxs,$moyen_transports,$wilayas,$news){
        return $this->headhome().$this->navbar().$this->diapo($news).$this->rechercher().$this->add_annonceModal($status,$transport_types,$fourchette_poid_mins,$fourchette_poid_maxs,$fourchette_volume_mins,$fourchette_volume_maxs,$moyen_transports,$wilayas).$this->footer();
    }

    public function headhome(){        
        return ("<!DOCTYPE html>
        <html lang=\"en\"> 
            <head> 
                <meta charset=\"utf-8\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
                <meta name=\"description\" content=\"\">
                <meta name=\"author\" content=\"MecheriHadia\">
                <meta name=\"csrf-token\" content=\"{{csrf_token()}}\">
                
                <title>ِChronoTruck</title>
        
                <!-- Bootstrap core CSS -->
                <link href=\"vendor/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
        
                <!-- Additional CSS Files -->
                <link rel=\"stylesheet\" href=\"assets/css/app.css\">
                <link rel=\"stylesheet\" href=\"assets/css/owl.css\">
                <link rel=\"stylesheet\" href=\"assets/css/font.css\">
                <link rel=\"stylesheet\" href=\"assets/css/fontawsome.css\">
                <link rel=\"stylesheet\" href=\"assets/css/select2.css\">
        
                <script src=\"vendor/jquery/jquery.min.js\"></script>
        
                <link rel=\"stylesheet\" href=\"assets/css/bootstrapTable.css\">
        
                <script src=\"assets/js/select2.js\"></script>
                <script src=\"assets/js/jquery.dataTables.min.js\"></script>
                <script src=\"assets/js/dataTables.bootstrap5.min.js\"></script>
                <script src=\"vendor/bootstrap/js/bootstrap.bundle.min.js\"></script>
        
                <!-- Additional Scripts -->
                <script src=\"assets/js/custom.js\"></script>
                <script src=\"assets/js/owl.js\"></script>
                
            </head> ");
    }
    
    public function headSecondhome(){         
      return ('<!DOCTYPE html>
      <html lang="en">
          <head>
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
              <meta name="description" content="">
              <meta name="author" content="MecheriHadia">
              <meta name="csrf-token" content="{{csrf_token()}}">
              <title>ِChronoTruck</title>
      
             <!-- Bootstrap core CSS -->
             <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      
            <!-- Additional CSS Files -->
            <link rel="stylesheet" href="../assets/css/app.css">
            <link rel="stylesheet" href="../assets/css/font.css">
            <link rel="stylesheet" href="../assets/css/fontawsome.css">
            <link rel="stylesheet" href="../assets/css/owl.css">
            <link rel="stylesheet" href="../assets/css/select2.css">
      
            <script src="../vendor/jquery/jquery.min.js"></script>
      
            <link rel="stylesheet" href="../assets/css/bootstrapTable.css">
      
            <script src="../assets/js/select2.js"></script>
            <script src="assets/js/jquery.dataTables.min.js"></script>
            <script src="assets/js/dataTables.bootstrap5.min.js"></script>
            <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      
            <!-- Additional Scripts -->
            <script src="../assets/js/custom.js"></script>
            <script src="../assets/js/owl.js"></script>
      
          </head> ');
  }

    public function navbar(){       
        $code="<body>

            <!-- Header -->
            <header >
            <nav class=\"navbar navbar-expand-lg\">
                <div class=\"container\">
                <a class=\"navbar-brand\"><h2>ِChrono<em>Truck</em></h2></a>
                <div class=\"navbar-collapse\" id=\"navbarResponsive\">
                    <ul class=\"navbar-nav ml-auto\">
                    <li class=\"nav-item active\">
                        <a class=\"nav-link\" href=\"".route('acceuil') ."\">Accueil</a>
                    </li> 
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"". route('presentation') ."\">Présentation</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"". route('news') ."\">News</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"". route('statistiques') ."\">Statistiques</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"". route('contact') ."\">Contact</a>
                    </li>";
        
        if(session('name')) {
            $code=$code."<li class=\"nav-item\">
                            <div class=\"main-button\">
                                <a rel=\"nofollow\" href=\"profile/".session('id')."\" >profile</a>
                            </div>
                        </li>
                        <li class=\"nav-item\">
                            <div class=\"main-button\">
                            <a rel=\"nofollow\" id=\"logout_botton\" href=\"". route('logout') ."\" >déconnecter</a>
                            </div>
                        </li>";

        }
        else{
            $code=$code." <li class=\"nav-item\">
                                <div class=\"main-button\">
                                    <a rel=\"nofollow\" href=\"". route('inscription') ."\" >Inscription</a>
                                </div>
                            </li>
                            <li class=\"nav-item\">
                                <div class=\"main-button\">
                                <a rel=\"nofollow\" href=\"\" data-toggle=\"modal\" data-target=\"#loginModal\">Connexion</a>
                                </div>
                            </li>";

        }
                  
        $code=$code."</ul>
                </div>
                </div>
            </nav>
            </header>
        
            ";

        $code=$code.'<!-- Modal login-->  

            <div id="loginModal_admin" class="modal fade" role="dialog">  
               <div class="modal-dialog">  
                 <div class="modal-content">    
                   <section class="formulaire formulaire-modal">
                     <div class="col-lg-12">
                       <div class="sidebar-heading">
                         <h2>connectez-vous sur votre compte admin</h2>
                       </div>
                       <form >
                       @csrf
                         <div class="row">
                           <div class="col-md-12 col-sm-12">
                             <fieldset>
                               <input name="user_admin" class="form-control" type="text" id="user_admin" placeholder="votre user name" required>
                             </fieldset>
                           </div>
                           <div class="col-md-12 col-sm-12">
                             <fieldset>
                               <input name="password_admin" class="form-control" type="password" id="password_admin" placeholder="votre mot de passe" required>
                             </fieldset>
                           </div>
                           <div class="col-md-12 col-sm-12" id="incorrect_login">
                             <fieldset>
                               <label >email ou mot de passe incorrect. Réessayez</label>
                             </fieldset>
                           </div>
                           <div class="col-lg-12 col-sm-12">
                             <fieldset>
                               <button type="submit" id="login_admin_submit" class="main-button btn btn-warning">se connecter</button>
                             </fieldset>
                           </div>
                         </div>
                       </form>
                     </div>
                   </section>
                 </div>  
               </div>  
             </div>  ';

        return $code;
    }

    public function diapo($news){        
        $code="<!-- Page Content -->
    
            <!-- Diaporama -->
        
          <div class=\"main-banner\">
            <div class=\"container-fluid\">
                <div class=\"owl-banner owl-carousel\">";
        if($news->count()){
            foreach ($news as $new){
            $code=$code.'<div class="item">
                    <img src=".'.$new->img.'" class="img-thumbnail">
                    <div class="item-content">
                      <div class="main-content">
                        <div class="meta-category">
                        <a href="news/'.$new->id.'"><span style="color:#804721">'.$new->titre.'</span></a>
                        </div>
                      </div>
                    </div>
                  </div>';
            }
        }  
        $code=$code.'</div>
                </div>
            </div>';  
        return $code;
    }

    public function rechercher(){        
      $code=' <!-- Recherche -->
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
                            <input name="ville_arriver" type="text" id="ville_arriver" placeholder="ville d\'arriver" required="">
                          </fieldset>
                        </div>
                        <div class="col-lg-12">
                          <fieldset>
                            <button type="submit" id="search-submit" class="main-button">Rechercher</button>
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
    </section>

    <!-- Resultat du recherche -->

    <section class="posts">
      <div class="container"> ';

      if(session('name')){ //Resultat du recherche       connected 
      $code=$code.'<div class="row" id="search_result_connected">  

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
    </section>';
      }
      else{ // Resultat du recherche       not connected 
      $code=$code.'<div class="row" id="search_result_not_connected">                        

        </div>
      </div>
    </section>

    <section class="posts">
      <div class="container">
        <div class="col-lg-4">
          <div class="main-button">
            <a href="'. route('presentation') .'">Comment cela fonctionne</a>
          </div>
        </div>
       </div>  
    </section> '; 
    } 

      return $code;
  }

  public function add_annonceModal($status,$transport_types,$fourchette_poid_mins,$fourchette_poid_maxs,$fourchette_volume_mins,$fourchette_volume_maxs,$moyen_transports,$wilayas)
  {
    $code='<!-- Modal add annonce -->

    <div id="addAnonceModal" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
        <div class="modal-content">    
          <section class="formulaire formulaire-modal">
            <div class="col-lg-12">
              <div class="sidebar-heading">
                <h2>connectez-vous sur votre compte</h2>
              </div>
              <form action="'.route('add_annonce').'" method="post" enctype="multipart/form-data">
                @csrf
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <fieldset>
                        <input name="titre" type="text" id="titre" placeholder="titre de l\'annonce" required="">
                      </fieldset>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <fieldset>
                        <input name="texte" type="textarea" id="texte" placeholder="contenu de l\'annonce" required="">
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
                          <option value="point d\'arriver">point de départ</option>';
                          if ($wilayas->count()){
                            $i=1;
                            foreach ($wilayas as $wilaya){      
                              $code=$code.'<option value="'.$i.'">'.$wilaya->nom.'</option>';
                              $i=$i+1;
                            }
                          } 
                          $code=$code.'</select>
                      </fieldset>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <fieldset>                       
                        <select id="arriver" name="arriver">
                          <option value="point d\'arriver">point d\'arriver</option>';
                          if ($wilayas->count()){
                            $i=1;
                            foreach ($wilayas as $wilaya){  
                            $code=$code.'<option value="'.$i.'">'.$wilaya->nom.'</option>';
                              $i=$i+1;
                            }
                          }  
                          $code=$code.'</select>
                      </fieldset>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <fieldset>                       
                        <select id="transport_type" name="transport_type">
                          <option value="type de transport">type de transport</option>';
                          if ($transport_types){
                            foreach ($transport_types as $transport_type){        
                              $code=$code.'<option value="'.$transport_type.'">'.$transport_type.'</option>';
                            }
                          } 
                          $code=$code.'</select>
                      </fieldset>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <fieldset>                       
                        <select id="fourchette_poid_min" name="fourchette_poid_min">
                          <option value="poids minimum">poids minimum</option>';
                          if ($fourchette_poid_mins){
                            foreach ($fourchette_poid_mins as $fourchette_poid_min){        
                              $code=$code.'<option value="'.$fourchette_poid_min.'">'.$fourchette_poid_min.'</option>';
                            }
                          }  
                          $code=$code.'</select>
                      </fieldset>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <fieldset>                       
                        <select id="fourchette_poid_max" name="fourchette_poid_max">
                          <option value="poids maximum">poids maximum</option>';
                          if ($fourchette_poid_maxs){
                            foreach ($fourchette_poid_maxs as $fourchette_poid_max){        
                              $code=$code.'<option value="'.$fourchette_poid_max.'">'.$fourchette_poid_max.'</option>';
                            }
                          }  
                          $code=$code.'</select>
                      </fieldset>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <fieldset>                       
                        <select id="fourchette_volume_min" name="fourchette_volume_min">
                          <option value="volume minimum">volume minimum</option>';
                          if ($fourchette_volume_mins){
                            foreach ($fourchette_volume_mins as $fourchette_volume_min){        
                            $code=$code.'<option value="'.$fourchette_volume_min.'">'.$fourchette_volume_min.'</option>';
                            }
                          }
                          $code=$code.'</select>
                      </fieldset>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <fieldset>                       
                        <select id="fourchette_volume_max" name="fourchette_volume_max">
                          <option value="volume maximum">volume maximum</option>';
                          if ($fourchette_volume_maxs){
                            foreach ($fourchette_volume_maxs as $fourchette_volume_max){        
                              $code=$code.'<option value="'.$fourchette_volume_max.'">'.$fourchette_volume_max.'</option>';
                            }
                          }
                          $code=$code.'</select>
                      </fieldset>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <fieldset>                       
                        <select id="moyen_transport" name="moyen_transport">
                          <option value="moyen de transport">moyen de transport</option>';
                          if ($moyen_transports){
                            foreach ($moyen_transports as $moyen_transport){        
                              $code=$code.'<option value="'.$moyen_transport.'">'.$moyen_transport.'</option>';
                            }
                          }
                          $code=$code.'</select>
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
    </div>';
    return $code;
  }

    public function footer(){        
        return ('<footer>
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <ul class="social-icons">
                <li><a href="'. route('acceuil') .'">Accueil</a></li>
                <li><a href="'. route('presentation') .'">Présentation</a></li>
                <li><a href="'. route('news') .'">News</a></li>
                <li><a href="'. route('statistiques') .'">Statistiques</a></li>
                <li><a href="'. route('contact') .'">Contact</a></li>
                <li><a href="'. route('inscription') .'">Inscription</a></li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
      
      </body>
  </html>');
    }

    public function footerSecond(){        
      return ('<footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <ul class="social-icons">
              <li><a href="'. route('acceuil') .'">Accueil</a></li>
              <li><a href="'. route('presentation') .'">Présentation</a></li>
              <li><a href="'. route('news') .'">News</a></li>
              <li><a href="'. route('statistiques') .'">Statistiques</a></li>
              <li><a href="'. route('contact') .'">Contact</a></li>
              <li><a href="'. route('inscription') .'">Inscription</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>');
  }

}
