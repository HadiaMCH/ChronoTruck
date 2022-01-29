<?php

namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class acceuilView extends Controller
{
    public function acceuil($status,$transport_types,$fourchette_poid_mins,$fourchette_poid_maxs,$fourchette_volume_mins,$fourchette_volume_maxs,$moyen_transports,$wilayas,$news){
        return $this->headhome().$this->navbar().$this->diapo($news).$this->rechercher($wilayas).$this->add_annonceModal($status,$transport_types,$fourchette_poid_mins,$fourchette_poid_maxs,$fourchette_volume_mins,$fourchette_volume_maxs,$moyen_transports,$wilayas).$this->scripts().$this->footer().$this->modal_login().$this->script_login();
    }

    public function headhome(){
        $code='<!DOCTYPE html>
        <html lang="en"> 
            <head> 
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta name="description" content="">
                <meta name="author" content="MecheriHadia">
                
                <title>ِChronoTruck</title>
        
                <!-- Bootstrap core CSS -->
                <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        
                <!-- Additional CSS Files -->
                <link rel="stylesheet" href="assets/css/app.css">
                <link rel="stylesheet" href="assets/css/owl.css">
                <link rel="stylesheet" href="assets/css/font.css">
                <link rel="stylesheet" href="assets/css/fontawsome.css">
                <link rel="stylesheet" href="assets/css/select2.css">
        
                <script src="vendor/jquery/jquery.min.js"></script>
        
                <link rel="stylesheet" href="assets/css/bootstrapTable.css">
        
                <script src="assets/js/select2.js"></script>
                <script src="assets/js/jquery.dataTables.min.js"></script>
                <script src="assets/js/dataTables.bootstrap5.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        
                <!-- Additional Scripts -->
                <script src="assets/js/custom.js"></script>
                <script src="assets/js/owl.js"></script>
                
            </head> 
            
            <body>';

            return $code;
    }

    public function navbar(){
        $code='<!-- Header -->
        <header >
          <nav class="navbar navbar-expand-lg">
            <div class="container">
              <a class="navbar-brand"><h2>ِChrono<em>Truck</em></h2></a>
              <div class="navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="'. route('acceuil').'">Accueil</a>
                  </li> 
                  <li class="nav-item">
                    <a class="nav-link" href="'. route('presentation') .'">Présentation</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="'. route('news') .'">News</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="'. route('statistiques') .'">Statistiques</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="'. route('contact') .'">Contact</a>
                  </li>';
                  if(session('name')) {
                    $code=$code.'<li class="nav-item">
                      <div class="main-button">
                        <a rel="nofollow" href="profile/'.session('id').'" >profile</a>
                      </div>
                  </li>
                  <li class="nav-item">
                      <div class="main-button">
                      <a rel="nofollow" id="logout_botton" href="'. route('logout') .'" >déconnecter</a>
                      </div>
                  </li>';
                  }else{
                    $code=$code.'<li class="nav-item">
                      <div class="main-button">
                        <a rel="nofollow" href="'. route('inscription') .'" >Inscription</a>
                      </div>
                  </li>
                  <li class="nav-item">
                      <div class="main-button">
                      <a rel="nofollow" href="" data-toggle="modal" data-target="#loginModal">Connexion</a>
                      </div>
                  </li>';
                  }
                  $code=$code.'</ul>
              </div>
            </div>
          </nav>
        </header>';

            return $code;
    }

    public function diapo($news){
      $code='<!-- Page Content -->
    
      <!-- Diaporama -->
  
      <div class="slider">';
        if ($news->count()){
          $code=$code.'<div class="slide-track">';
                foreach ($news as $new){
                  $code=$code.'<div class="slide">
                  <a href="news/'.$new->id.'"><img src=".'.$new->img.'" class="img-thumbnail">
                    <span >'.$new->titre.'</span></a>
                  </div>';
                }
                foreach ($news as $new){
                  $code=$code.'<div class="slide">
                  <a href="news/'.$new->id.'"><img src=".'.$new->img.'" class="img-thumbnail">
                    <span >'.$new->titre.'</span></a>
                  </div>';
                }
                foreach ($news as $new){
                  $code=$code.'<div class="slide">
                  <a href="news/'.$new->id.'"><img src=".'.$new->img.'" class="img-thumbnail">
                    <span >'.$new->titre.'</span></a>
                  </div>';
                }
                $code=$code.'</div>';
        } 
        $code=$code.'</div>';

      return $code;  
    }

    public function rechercher($wilayas){

      $code='<!-- Recherche -->
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
                        <div class="row">
                        <div class="col-md-5 col-sm-12">
                          <fieldset>                       
                            <select id="depart" name="depart">
                              <option value="">point de départ</option>';
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
                        <div class="col-md-5 col-sm-12">
                          <fieldset>                       
                            <select id="arriver" name="arriver">
                              <option value="">point d\'arriver</option>';
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
        <div class="container">';
  
        if(session('name')){ // Resultat du recherche       connected 
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
  
        }else{ //-- Resultat du recherche       not connected 
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
      </section>';  
        }         
      
      return $code;
    }

    public function add_annonceModal($status,$transport_types,$fourchette_poid_mins,$fourchette_poid_maxs,$fourchette_volume_mins,$fourchette_volume_maxs,$moyen_transports,$wilayas){
      
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
                            <option value="">point de départ</option>';
                            if ($wilayas->count()){
                              $i=1;
                              foreach ($wilayas as $wilaya){        
                                $code=$code.'<option value="'.$i.'" id="depart'.$i.'">'.$wilaya->nom.'</option>';
                                $i=$i+1;
                              }
                            }  
                            $code=$code.'</select>
                        </fieldset>
                      </div>
                      <div class="col-md-12 col-sm-12">
                        <fieldset>                       
                          <select id="arriver" name="arriver">
                            <option value="">point d\'arriver</option>';
                            if ($wilayas->count()){
                              $i=1;
                              foreach ($wilayas as $wilaya){  
                                $code=$code.'<option value="'.$i.'" id="arriver'.$i.'">'.$wilaya->nom.'</option>';
                                $i=$i+1;
                              }
                            } 
                            $code=$code.'</select>
                        </fieldset>
                      </div>
                      <div class="col-md-12 col-sm-12">
                        <fieldset>                       
                          <select id="transport_type" name="transport_type">
                            <option value="">type de transport</option>';
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
                            <option value="">poids minimum</option>';
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
                            <option value="">poids maximum</option>';
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
                            <option value="">volume minimum</option>';
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
                            <option value="">volume maximum</option>';
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
                            <option value="">moyen de transport</option>';
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
      </div>  
    ';

      return $code;
    }

    public function scripts(){
      $code='<script>
      $( document ).ready(function() {
          let type = "GET";
          let ajaxurl = "'.route('show').'";
          $.ajax({
              type: type,
              url: ajaxurl,
              dataType: \'json\',
              success: function (response) {
                  if(!response[\'status_code\'])
                  {
                    let j=0;
                    for (let i=0; i < response[\'annonces\'].length ;i++)
                    {
                      j=0;
                      let text="";
                      while (j < response[\'annonces\'][i].texte.length && j< 75){
                        text += response[\'annonces\'][i].texte[j];
                        j++;
                      }
                      let d = new Date(response[\'annonces\'][i].created_at);
                      $("#search_result_not_connected").append(\'<div class="col-lg-3"><div><div class="post"><div class="thumb"><img src=".\'+response[\'annonces\'][i].img+\'" alt=""></div><div class="down-content"><span>\'+response[\'annonces\'][i].titre+\'</span><ul class="post-info"><li>\'+d.getHours() + ":" + d.getMinutes() + " " + d.getDate()+\'-\'+ d.getMonth()+\'-\'+d.getFullYear()+\'</li><li>\'+response[\'annonces\'][i].views+\' vues</li></ul><p>\'+text+\'<a href="" data-toggle="modal" data-target="#loginModal" >...lire la suite</a></p><ul class="post-info"><li>de \'+response[\'depart\'][i]+\' vers \'+response[\'arriver\'][i]+\'</li></ul></div></div></div></div>\');                
                      $("#search_result_connected").append(\'<div class="col-lg-3"><div><div class="post"><div class="thumb"><img src=".\'+response[\'annonces\'][i].img+\'" alt=""></div><div class="down-content"><span>\'+response[\'annonces\'][i].titre+\'</span><ul class="post-info"><li>\'+d.getHours() + ":" + d.getMinutes() + " " + d.getDate()+\'-\'+ d.getMonth()+\'-\'+d.getFullYear()+\'</li><li>\'+response[\'annonces\'][i].views+\' vues</li></ul><p>\'+text+\'<a href="annonce/\'+response[\'annonces\'][i].id+\'" >...lire la suite</a></p><ul class="post-info"><li>de \'+response[\'depart\'][i]+\' vers \'+response[\'arriver\'][i]+\'</li></ul></div></div></div></div>\');                   
                    }
                  }
                  else{
                    $("#search_result_connected").empty();
                    $("#search_result_not_connected").empty();
                    $("#search_result_not_connected").append(\'<div class="sidebar-heading"><h2 style="border-bottom: 0;">pas de resultat trouvée pour votre recherche</h2></div>\');
                    $("#search_result_connected").append(\'<div class="sidebar-heading"><h2 style="border-bottom: 0;">pas de resultat trouvée pour votre recherche</h2></div>\');
                    
                  }
              },
              error: function (response) {
                  console.log(response);
              }
            });
       });

      $("#search-submit").click(function (e) {
          e.preventDefault();
          let formData = {
            ville_depart : $("#depart").val(),
            ville_arriver : $("#arriver").val(),
          };
          let type = "POST";
          let ajaxurl = "'.route('search').'";

          $.ajax({
              type: type,
              url: ajaxurl,
              data: formData,
              dataType: \'json\',
              success: function (response) {
                  if(!response[\'status_code\'])
                  {
                    $("#search_result_connected").empty();
                    $("#search_result_not_connected").empty();
                    for (let i=0; i < response[\'annonces\'].length ;i++)
                    {
                        j=0;
                        let text="";
                        while (j < response[\'annonces\'][i].texte.length && j<75){
                          text += response[\'annonces\'][i].texte[j];
                          j++;
                        }
                        let d = new Date(response[\'annonces\'][i].created_at);
                        let depart = $("#depart").val();
                        let arriver = $("#arriver").val();
                        $("#search_result_not_connected").append(\'<div class="col-lg-3"><div><div class="post"><div class="thumb"><img src=".\'+response[\'annonces\'][i].img+\'" alt=""></div><div class="down-content"><span>\'+response[\'annonces\'][i].titre+\'</span><ul class="post-info"><li>\'+d.getHours() + ":" + d.getMinutes() + " " + d.getDate()+\'-\'+ d.getMonth()+\'-\'+d.getFullYear()+\'</li><li>\'+response[\'annonces\'][i].views+\' vues</li></ul><p>\'+text+\'<a href="" data-toggle="modal" data-target="#loginModal" >...lire la suite</a></p><ul class="post-info"><li>de \'+$(\'#depart\'+depart+\'\').html()+\' vers \'+$(\'#arriver\'+arriver+\'\').html()+\'</li></ul><ul class="post-info"><li>\'+response[\'annonces\'][i].transport_type+\'</li></ul><ul class="post-info"><li>entre \'+response[\'annonces\'][i].fourchette_poid_min+\' et \'+response[\'annonces\'][i].fourchette_poid_max+\'</li></ul><ul class="post-info"><li>entre \'+response[\'annonces\'][i].fourchette_volume_min+\' et \'+response[\'annonces\'][i].fourchette_volume_max+\'</li></ul></div></div></div></div>\');                     
                        $("#search_result_connected").append(\'<div class="col-lg-3"><div"><div class="post"><div class="thumb"><img src=".\'+response[\'annonces\'][i].img+\'" alt=""></div><div class="down-content"><span>\'+response[\'annonces\'][i].titre+\'</span><ul class="post-info"><li>\'+d.getHours() + ":" + d.getMinutes() + " " + d.getDate()+\'-\'+ d.getMonth()+\'-\'+d.getFullYear()+\'</li><li>\'+response[\'annonces\'][i].views+\' vues</li></ul><p>\'+text+\'<a href="annonce/\'+response[\'annonces\'][i].id+\'" >...lire la suite</a></p><ul class="post-info"><li>de \'+$(\'#depart\'+depart+\'\').html()+\' vers \'+$(\'#arriver\'+arriver+\'\').html()+\'</li></ul><ul class="post-info"><li>\'+response[\'annonces\'][i].transport_type+\'</li></ul><ul class="post-info"><li>entre \'+response[\'annonces\'][i].fourchette_poid_min+\' et \'+response[\'annonces\'][i].fourchette_poid_max+\'</li></ul><ul class="post-info"><li>entre \'+response[\'annonces\'][i].fourchette_volume_min+\' et \'+response[\'annonces\'][i].fourchette_volume_max+\'</li></ul></div></div></div></div>\');                     
                    }
                  }
                  else{
                    if(response[\'status_code\']==503){
                      $("#ville_depart").css("border-color", "#d93025");
                      $("#ville_depart").css("color", "#d93025");
                      $("#ville_arriver").css("border-color", "#d93025");
                      $("#ville_arriver").css("color", "#d93025");
                      $("#ville_depart").attr("placeholder","Ville de départ");
                      $("#ville_arriver").attr("placeholder","Ville d\'arriver");
                    }
                    else{
                      $("#search_result_connected").empty();
                      $("#search_result_not_connected").empty();
                      $("#search_result_not_connected").append(\'<div class="sidebar-heading"><h2 style="border-bottom: 0;">pas de resultat trouvée pour votre recherche</h2></div>\');
                      $("#search_result_connected").append(\'<div class="sidebar-heading"><h2 style="border-bottom: 0;">pas de resultat trouvée pour votre recherche</h2></div>\');
                    }
                  }
              },
              error: function (response) {
                  console.log(response);
              }
            });
       });  
    </script>';

      return $code;
    }

    public function footer(){
      $code='<footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <ul>
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
    </footer>';
      return $code;
    }

    public function modal_login()
    {
      $code='<!-- Modal login-->  

      <div id="loginModal" class="modal fade" role="dialog">  
         <div class="modal-dialog">  
           <div class="modal-content">    
             <section class="formulaire formulaire-modal">
               <div class="col-lg-12">
                 <div class="sidebar-heading">
                   <h2>connectez-vous sur votre compte</h2>
                 </div>
                 <form >
                   <div class="row">
                     <div class="col-md-12 col-sm-12">
                       <fieldset>
                         <input name="email_login" class="form-control" type="text" id="email_login" placeholder="votre email" required>
                       </fieldset>
                     </div>
                     <div class="col-md-12 col-sm-12">
                       <fieldset>
                         <input name="password_login" class="form-control" type="password" id="password_login" placeholder="votre mot de passe" required>
                       </fieldset>
                     </div>
                     <div class="col-md-12 col-sm-12" id="incorrect_login">
                       <fieldset>
                         <label >email ou mot de passe incorrect. Réessayez</label>
                       </fieldset>
                     </div>
                     <div class="col-lg-12 col-sm-12">
                       <fieldset>
                         <button type="submit" id="login_submit" class="main-button btn btn-warning">se connecter</button>
                       </fieldset>
                     </div>
                     <div class="text-content">
                       <a href="'.route('inscription').'"><h4>vous n\'avez pas de compte, inscrivez-vous ici</h4></a>  
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

    public function script_login(){
      $code='<script>
      $("#login_submit").click(function (e) {
          e.preventDefault();
          let formData = {
            email : $("#email_login").val(),
            password : $("#password_login").val(),
          };
          let type = "POST";
          let ajaxurl = "'.route('login').'";

          $.ajax({
              type: type,
              url: ajaxurl,
              data: formData,
              dataType: \'json\',
              success: function (response) {
                if (response[\'status_code\']==500){
                  $("#email_login").css("border-color", "#d93025");
                  $("#email_login").css("color", "#d93025");
                  $("#password_login").css("border-color", "#d93025");
                  $("#password_login").css("color", "#d93025");
                  $("#email_login").attr("placeholder","votre email");
                  $("#password_login").attr("placeholder","votre mot de passe");
                  $("#incorrect_login").css("display","block");
                  $("#password_login").css("margin-bottom","5px");
                }
                else{
                  window.location.replace("http://localhost/chronotruck/public/acceuil");
                }
              },
              error: function (response) {
                  console.log(response);
              }
            });
       });  
    </script>
  </body>
</html>';
      return $code;
    }

    public function headSecondhome()
    {
      $code='<!DOCTYPE html> 
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
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      
            <script src="../vendor/jquery/jquery.min.js"></script>
      
            <link rel="stylesheet" href="../assets/css/bootstrapTable.css">
      
            <script src="../assets/js/select2.js"></script>
            <script src="assets/js/jquery.dataTables.min.js"></script>
            <script src="assets/js/dataTables.bootstrap5.min.js"></script>
            <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      
            <!-- Additional Scripts -->
            <script src="../assets/js/custom.js"></script>
            <script src="../assets/js/owl.js"></script>
      
          </head>
          
          <body>';

            return $code;
    }

    public function navbarSecond(){
      $code='<!-- Header -->
      <header >
        <nav class="navbar navbar-expand-lg">
          <div class="container">
            <a class="navbar-brand"><h2>ِChrono<em>Truck</em></h2></a>
            <div class="navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="'. route('acceuil') .'">Accueil</a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="'. route('presentation') .'">Présentation</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="'. route('news') .'">News</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="'. route('statistiques') .'">Statistiques</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="'. route('contact') .'">Contact</a>
                </li>';
                if(session('name')){ 
                  $code=$code.'<li class="nav-item">
                    <div class="main-button">
                      <a rel="nofollow" href="../profile/'.session('id').'" >profile</a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="main-button">
                    <a rel="nofollow" id="logout_botton" href="'. route('logout') .'" >déconnecter</a>
                    </div>
                </li>';
                }else{
                  $code=$code.'<li class="nav-item">
                    <div class="main-button">
                      <a rel="nofollow" href="'. route('inscription') .'" >Inscription</a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="main-button">
                    <a rel="nofollow" href="" data-toggle="modal" data-target="#loginModal">Connexion</a>
                    </div>
                </li>';
                }
                $code=$code.'</ul>
            </div>
          </div>
        </nav>
      </header>';

          return $code;
  }


}
