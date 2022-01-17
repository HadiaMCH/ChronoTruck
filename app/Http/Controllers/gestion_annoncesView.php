<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\acceuilAdminView;


class gestion_annoncesView extends Controller
{
    public function gestion_annonces($wilayas,$annonces){
        return (new acceuilAdminView)->headAdmin().(new acceuilAdminView)->navbarAdmin().$this->contenu($wilayas,$annonces);
    }

    public function contenu($wilayas,$annonces)
    {
        $code='<div class="heading-page header-text">
        <section class="page-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-10">
                <div class="text-content">
                  <h2>La gestion des annonces</h2>
                  <h4>Vous pouvez gérer les annonces, les valider, les filtrer et les trier selon différents critères</h4>
                </div>
              </div>
              <div class="col-lg-2">
                <div class="main-button">
                  <a data-toggle="modal" data-target="#rechercher_annonces">rechercher</a>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div> 
      
      <!-- Page Content -->
      
      <section class="posts" style="margin-bottom:100px">
        <div class="container">
          <div class="table-responsive">';
          if (count($annonces)){
          $code=$code.'<table class="example table table-striped" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">titre</th>
                  <th scope="col">image</th>
                  <th scope="col">texte</th>
                  <th scope="col">point de départ</th>
                  <th scope="col">point d\'arrivée</th>
                  <th scope="col">type de transport</th>
                  <th scope="col">moyen de transport</th>
                  <th scope="col">poids minimum</th>
                  <th scope="col">poids maximum</th>
                  <th scope="col">volume minimum</th>
                  <th scope="col">volume maximum</th>
                  <th scope="col">utilisateur</th>
                  <th scope="col">status</th>
                  <th scope="col">tarif</th>
                  <th scope="col">note donnée au transporteur</th>
                  <th scope="col">transporteur</th>
                  <th scope="col">archiver</th>
                  <th scope="col">valider</th>
                  <th scope="col">annuler</th>
                </tr>
              </thead>
              <tbody>';
                  foreach($annonces as $annonce){
                  $code=$code.'<tr>
                      <th scope="row"><a href="annonce/'.$annonce->id.'">'.$annonce->id.'</a></th>
                      <td>'.$annonce->titre.'</td>
                      <td><img src=".'.$annonce->img.'" id="photo" alt="" style="width: 100%;"></td>
                      <td>'.$annonce->texte.'</td>
  
                      <td>'.$wilayas[$annonce->tarjet->wilaya_depart_id-1]->nom.'</td>
                      <td>'.$wilayas[$annonce->tarjet->wilaya_arriver_id-1]->nom.'</td>
  
                      <td>'.$annonce->transport_type.'</td>
                      <td>'.$annonce->moyen_transport.'</td>
                      <td>'.$annonce->fourchette_poid_min.'</td>
                      <td>'.$annonce->fourchette_poid_max.'</td>
                      <td>'.$annonce->fourchette_volume_min.'</td>
                      <td>'.$annonce->fourchette_volume_max.'</td>
                      <td>'.$annonce->user->id.'-'.$annonce->user->name.'</td>
                      <td class="annonce_status">'.$annonce->status.'</td>
                      <td class="annonce_tarif">'.$annonce->tarif.'</td>
                      <td>'.$annonce->note.'</td>';
                      if($annonce->transporteur){
                      $code=$code.'<td>'.$annonce->transporteur->id.'-'.$annonce->transporteur->name.'</td> ';
                      }
                      else{
                      $code=$code.'<td>//</td>'; 
                      }
                      $code=$code.'<td>'.$annonce->archiver.'</td>';
                      if($annonce->status=='en attente'){
                      $code=$code.'<td class="col-lg-12">
                          <div class="main-button">
                            <a class="valider_annonce">valider</a>
                          </div>
                        </td>';
                      }
                      else{
                      $code=$code.'<td>validée</td>';
                      }
                      if($annonce->status!='terminée'){
                      $code=$code.'<td class="col-lg-12">
                          <div class="main-button">
                            <a class="annuler_annonce">annuler</a>
                          </div>
                        </td>';
                      }
                      else{
                      $code=$code.'<td>//</td>';
                      }
                      $code=$code.'</tr>';
                    }
                  $code=$code.'</tbody>
            </table>';
            }
          $code=$code.'</div>
        </div>
      </section>';
        return $code;
    }

}