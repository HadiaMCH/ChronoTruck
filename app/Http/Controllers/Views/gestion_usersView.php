<?php

namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\acceuilAdminView;


class gestion_usersView extends Controller
{
    public function gestion_users($clients,$transporteurs,$transporteur_annonces,$client_annonces){
        return (new acceuilAdminView)->headAdmin().(new acceuilAdminView)->navbarAdmin().$this->contenu($clients,$transporteurs,$transporteur_annonces,$client_annonces);
    }

    public function contenu($clients,$transporteurs,$transporteur_annonces,$client_annonces)
    {
        $code='<div id="client">
        <div class="heading-page header-text">
          <section class="page-heading">
            <div class="container">
              <div class="row">
                <div class="col-lg-10">
                  <div class="text-content">
                    <h2>La gestion des clients</h2>
                    <h4>Vous pouvez bannir des clients ainsi que de les filtrer, les trier et accèder aux leurs profils</h4>
                  </div>
                </div>
                <div class="col-lg-2">
                  <div class="main-button">
                    <a data-toggle="modal" data-target="#rechercher_client">rechercher</a>
                  </div>
                </div> 
              </div>
            </div>
          </section>
        </div> 
    
        <!-- Page Content -->
    
        <section class="posts grid-system">
          <div class="container">
            <div class="table-responsive">';
            if (count($clients)){
                $code=$code.'<table class="example table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">nom</th>
                    <th scope="col">prénom</th>
                    <th scope="col">email</th>
                    <th scope="col">numéro de téléphone</th>
                    <th scope="col">adresse principale</th>
                    <th scope="col">mot de passe</th>
                    <th scope="col">bannir</th>
                  </tr>
                </thead>
                <tbody>
                    ';
                    foreach($clients as $client){
                        $code=$code.'<tr>
                        <th scope="row"><a href="profile/'.$client->id.'">'.$client->id.'</a></th>
                        <td>'.$client->name.'</td>
                        <td>'.$client->familyname.'</td>
                        <td>'.$client->email.'</td>
                        <td>'.$client->phone.'</td>
                        <td>'.$client->address.'</td>
                        <td>'.$client->password.'</td>
                        <td>
                          <div class="main-button">
                            <a class="bannir" >bannir</a>
                          </div>
                        </td>
                      </tr>';
                    }
                    $code=$code.'</tbody>
              </table>';
            }
            $code=$code.'</div>
          </div>
        </section>
    
    </div>
    
    <div id="transporteur">
        <div class="heading-page header-text">
          <section class="page-heading">
            <div class="container">
              <div class="row">
                <div class="col-lg-10">
                  <div class="text-content">
                    <h2>La gestion des transporteurs</h2>
                    <h4>Vous pouvez valider les inscriptions des transporteurs, les bannir, les filtrer, les trier et accèder aux leurs profils</h4>
                  </div>
                </div>
                <div class="col-lg-2">
                  <div class="main-button">
                    <a data-toggle="modal" data-target="#rechercher_transporteur">rechercher</a>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div> 
    
        <!-- Page Content -->
    
        <section class="posts grid-system ">
          <div class="container">
            <div class="table-responsive">';
            if (count($transporteurs)){
                $code=$code.'<table class="example table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">nom</th>
                    <th scope="col">prénom</th>
                    <th scope="col">email</th>
                    <th scope="col">numéro de téléphone</th>
                    <th scope="col">adresse principale</th>
                    <th scope="col">mot de passe</th>
    
                    <th scope="col">tarjets</th>
                    <th scope="col">note</th>
    
                    <th scope="col">status de certification</th>
                    <th scope="col">demande de certification</th>
                    <th scope="col">justificatif de refuse</th>
    
                    <th scope="col">valider les inscriptions</th>
                    <th scope="col">bannir</th>
                  </tr>
                </thead>
                <tbody>';
                  foreach($transporteurs as $transporteur){
                    $code=$code.'<tr>
                      <th scope="row"><a href="profile/{{$transporteur->id}}">{{$transporteur->id}}</a></th>
                      <td>{{$transporteur->name}}</td>
                      <td>{{$transporteur->familyname}}</td>
                      <td>{{$transporteur->email}}</td>
                      <td>{{$transporteur->phone}}</td>
                      <td>{{$transporteur->address}}</td>
                      <td>{{$transporteur->password}}</td>
    
                      <td>tarjets</td>
                      <td>{{$transporteur->note}}</td>';
    
                      if($transporteur->certifie==0){
                        $code=$code.'<td>//</td>
                        <td>//</td>
                        <td>//</td>';
                      }
                      else{
                        if($transporteur->statut=="validée"){
                            $code=$code.'<td>validée</td>';
                        }
                        else{
                            $code=$code.'<td>list de validation</td>';
                        }
                        $code=$code.'<td>{{$transporteur->demande}}</td>';
                        if($transporteur->statut=="refusée"){
                            $code=$code.'<td>{{$transporteur->justificatif}}</td>';
                        }
                        else{
                            $code=$code.'<td>//</td>';
                        }
                    }
    
                      if($transporteur->transporteur==2){
                        $code=$code.'<td>validée</td>';
                      }
                      else{
                        $code=$code.'<td>
                          <div class="main-button">
                            <a class="valider_inscription" >valider</a>
                          </div>
                        </td>';
                      }
                      $code=$code.'<td>
                        <div class="main-button">
                          <a class="bannir" >bannir</a>
                        </div>
                      </td>
                    </tr>';
                    }
                    $code=$code.'</tbody>
              </table>';
            }
            $code=$code.'</div>
          </div>
        </section>
    
    </div>
    
    <div id="signalement">
        <div class="heading-page header-text">
          <section class="page-heading">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="text-content">
                    <h2>La gestion des signalements</h2>
                    <h4>Vous pouvez voir les signalements des utilisateurs et accèder aux profils utilisateur, détails de l\'annonce et textes du signalement</h4>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div> 
    
        <!-- Page Content -->
        <section class="posts grid-system">
          <div class="container">
          <div class="table-responsive">';
          if (count($client_annonces) || count($transporteur_annonces)){
            $code=$code.'<table class="example table table-striped" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">l\'identifiant et le nom de l\'utilisateur</th>
                  <th scope="col">le type de l\'utilisateur</th>
                  <th scope="col">l\'identifiant de l\'annonce en cause</th>
                  <th scope="col">l\'identifiant et le nom de l\'utilisateur mis en cause</th>
                  <th scope="col">le texte du signalements</th>
                </tr>
              </thead>
              <tbody>';
              $i=1;
              foreach($client_annonces as $client_annonce){
                $code=$code.'<tr>
                  <th scope="row">{{$i}}</th>
                  <td><a href="profile/{{$client_annonce->transporteur->id}}">{{$client_annonce->transporteur->id}}-{{$client_annonce->transporteur->name}}</a></td>
                  <td>transporteur</td>
                  <td><a href="annonce/{{$client_annonce->id}}">{{$client_annonce->id}}</a></td>
                  <td><a href="profile/{{$client_annonce->user->id}}">{{$client_annonce->user->id}}-{{$client_annonce->user->name}}</a></td>
                  <td><a class="signale_afficher">texte <span style="display:none;">{{$client_annonce->signaler_client}}</span></a></td>
                </tr>';
                $i++;
              }
              foreach($transporteur_annonces as $transporteur_annonce){
                $code=$code.'<tr>
                  <th scope="row">{{$i}}</th>
                  <td><a href="profile/{{$transporteur_annonce->user->id}}">{{$transporteur_annonce->user->id}}-{{$transporteur_annonce->user->name}}</a></td>
                  <td>client</td>
                  <td><a href="annonce/{{$transporteur_annonce->id}}">{{$transporteur_annonce->id}}</a></td>
                  <td><a href="profile/{{$transporteur_annonce->transporteur->id}}">{{$transporteur_annonce->transporteur->id}}-{{$transporteur_annonce->transporteur->name}}</a></td>
                  <td><a class="signale_afficher">texte <span style="display:none;">{{$transporteur_annonce->signaler_transporteur}}</span></a></td>
                </tr>';
                $i++;
              }
              $code=$code.'
              </tbody>
            </table>';
          }
          $code=$code.'</div>
          </div>
        </section>
    
    </div>
    
        <!-- Modal signaler-->
        <div id="signaler" class="modal fade" role="dialog">  
        <div class="modal-dialog">  
          <div class="modal-content">    
            <section class="formulaire formulaire-modal">
              <div class="col-lg-12">
                <div class="sidebar-heading">              
                  <h2>le texte de signalement de cette annonce</h2>
                </div>
                <p></p>
              </div>
            </section>
          </div>  
        </div>  
      </div>
      
      <footer>
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <ul class="social-icons">
                  <li><a id="client_show">Gestion des clients</a></li>
                  <li><a id="transporteur_show">Gestion des transporteurs</a></li>
                  <li><a id="signalement_show">Gestion des signalements</a></li>
                </ul>
              </div>
            </div>
          </div>
        </footer>';
        return $code;
    }

}
