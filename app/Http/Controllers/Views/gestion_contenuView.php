<?php

namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Views\acceuilAdminView;


class gestion_contenuView extends Controller
{
    public function gestion_contenu($contacts,$presentation,$documents,$transactions,$criteres_picked,$criteres){
        return (new acceuilAdminView)->headAdmin().(new acceuilAdminView)->navbarAdmin().$this->gestion_Presentation($presentation).$this->gestion_contact($contacts).$this->gestion_documents($documents).$this->gestion_transaction($transactions).$this->gestion_criteres($criteres_picked).$this->modals($criteres).$this->scripts().(new acceuilAdminView)->modals().(new acceuilAdminView)->scripts();
    }

    public function gestion_Presentation($presentation)
    {
        $code='<div class="heading-page header-text">
        <section class="page-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="text-content">
                  <h2>La gestion de contenu</h2>
                  <h4>Vous pouvez rajouter et gérer le contenu de la page présentation, le contenu de la page contact, les critères de sélection des annonces à publier sur la page principale, la gestion des diaporamas et les options de styles du site.</h4>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      
      <!-- Page Content -->
  
      <!-- Presentation -->
  
      <section class="header_contenu">
        <div class="container">
          <div class="main-content">
              <h4>La gestion de contenu de la page présentation</h4>
          </div>
        </div>
      </section>
  
      <section class="about-us">
        <div class="container">
          <div class="row">';
            if($presentation){
                $code=$code.'<table class="example table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">image</th>
                    <th scope="col">texte</th>
                    <th scope="col">video</th>
                    <th scope="col">comment il fonctionne</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><img src=".'.$presentation->img.'" id="photo" alt="" style="width: 100%;"></td>
                    <td>'.$presentation->texte.'</td>
                    <td>
                      <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="'.$presentation->video.'" allowfullscreen></iframe>
                      </div>
                    </td>
                    <td>'.$presentation->fonctionnement.'</td>
                </tbody>
              </table>
              <div class="col-lg-12">           
                  <div class="main-button">
                    <a href="" data-toggle="modal" data-target="#modifier_presentation">modifier</a>
                  </div>
              </div>';
            }else{
                $code=$code.'<div class="col-lg-12">           
                <div class="main-button">
                  <a href="" data-toggle="modal" data-target="#add_presentation">ajouter</a>
                </div>
              </div>';
            }
            $code=$code.'</div>
        </div>
      </section>
  ';

        return $code;
    }

    public function gestion_contact($contacts)
    {
        $code='<!-- contact -->

        <section class="header_contenu">
          <div class="container">
            <div class="main-content">
                <h4>La gestion de contenu de la page contact</h4>
            </div>
          </div>
        </section>
    
        <section class="contact-us">
          <div class="container">
            <div class="down-contact">
              <div class="sidebar-item contact-information">
                <div class="sidebar-heading">
                  <h2>les informations permettant de contacter les administrateurs</h2>
                </div>
                <div class="content">
                  <ul id="contacts_ul">';
                    foreach($contacts as $contact){
                        $code=$code.'<li>
                        <h5>'.$contact->contenu.'</h5>
                        <span>'.$contact->titre.'</span>
                      </li>';
                    }   
                    $code=$code.'<li>
                      <div class="main-button">
                        <a href="" data-toggle="modal" data-target="#add_contact">ajouter</a>
                      </div>
                    </li>            
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>
    ';
        return $code;
    }

    public function gestion_documents($documents)
    {
        $code='<!-- document de certification -->

        <section class="header_contenu">
          <div class="container">
            <div class="main-content">
                <h4>La gestion de la liste de documents à rapporter au bureau de l\'entreprise afin de signer les contrats de certification</h4>
            </div>
          </div>
        </section>
    
        <section class="posts ">
          <div class="container">
            <div class="table-responsive">';
            if (count($documents)){
                $code=$code.'<table class="example table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">document</th>
                    <th scope="col">supprimer</th>
                  </tr>
                </thead>
                <tbody> ';
                    foreach($documents as $document){
                        $code=$code.'<tr>
                        <th scope="row">'.$document->name.'</th>
                        <td>
                          <form action="'.route('supp_document').'" method="post">
                            <input name="id" class="form-control" type="text" value="'.$document->id.'" style="display:none;">
                            <button type="submit"class="main-button">supprimer</button>
                          </form>
                        </td>
                      </tr>';
                    }
                    $code=$code.'</tbody>
              </table>';
                }
                $code=$code.'<div class="main-button col-lg-2">
              <a data-toggle="modal" data-target="#add_document">ajouter</a>
            </div>
            </div>
          </div>
        </section>
    ';
        return $code;
    }

    public function gestion_transaction($transactions)
    {
        $code='<!-- gestion des transactions -->

        <section class="header_contenu">
          <div class="container">
            <div class="col-sm-12">
              <div class="row">
                <div class="main-content col-sm-12">
                    <h4>La gestion des transactions entres les utilisateurs</h4>
                    <span> le pourcentage des transactions par defaut est: 20% vous pouvez le modifier</span>
                </div>
              </div>
            </div>
          </div>
        </section>
    
        <section class="posts ">
          <div class="container">
            <div class="table-responsive">';
              if (count($transactions)){
                $code=$code.'<table class="example table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">l\'identifiant de l\'annonce en cause</th>
                    <th scope="col">tarif</th>
                    <th scope="col">pourcentage %</th>
                    <th scope="col">modifier le poucentage</th>
                  </tr>
                </thead>
                <tbody>';
                    foreach($transactions as $transaction){
                        $code=$code.'<tr>
                        <th scope="row">'.$transaction->id.'</th>
                        <td><a href="annonce/'.$transaction->annonce_id.'">'.$transaction->annonce_id.'</a></td>
                        <td>'.$transaction->annonce->tarif.'</td>
                        <td>'.$transaction->pourcentage.'</td>
                        <td>
                          <div class="main-button">
                            <a class="modifier_pourcentage">modifier</a>
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
    ';
        return $code;
    }

    public function gestion_criteres($criteres_picked)
    {
        $code='<!-- criteres de selection des annonce -->

        <section class="header_contenu">
          <div class="container">
            <div class="main-content">
                <h4>La gestion des critères de sélection des annonces à publier sur la page principale</h4>
            </div>
          </div>
        </section>
    
        <section class="posts" style="margin-bottom:100px;">
          <div class="container">
            <div class="table-responsive">';
              if (count($criteres_picked)){
                $code=$code.'<table class="example table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Texte du critère</th>
                  </tr>
                </thead>
                <tbody>';
                    foreach($criteres_picked as $critere_picked){
                        $code=$code.'<tr>
                        <th scope="row">'.$critere_picked->id.'</th>
                        <td>'.$critere_picked->texte.'</td>
                      </tr>';
                    }
                    $code=$code.'</tbody>
              </table>
              <div class="main-button col-lg-4">
                <a data-toggle="modal" data-target="#critere_add">modifier</a>
              </div>';
                }else{
                    $code=$code.'<div class="sidebar-heading">
                  <h2 style="border-bottom: 0;">pas de resultat trouvée pour votre recherche</h2>
                </div>
                <div class="main-button col-lg-4">
                  <a data-toggle="modal" data-target="#critere_add">ajouter</a>
                </div>';
                }
                $code=$code.'</div>
          </div>
        </section>
    ';
        return $code;
    }

    public function modals($criteres)
    {
        $code='<!-- Modal add contact-->  

        <div id="add_contact" class="modal fade" role="dialog">  
           <div class="modal-dialog">  
             <div class="modal-content">    
               <section class="formulaire formulaire-modal">
                 <div class="col-lg-12">
                   <div class="sidebar-heading">
                     <h2>ajouter un nouveau contact</h2>
                   </div>
                   <form >
                     <div class="row">
                       <div class="col-md-12 col-sm-12">
                         <fieldset>
                           <input name="titre" class="form-control" type="text" id="titre" placeholder="titre du contact" required>
                         </fieldset>
                       </div>
                       <div class="col-md-12 col-sm-12">
                         <fieldset>
                           <input name="contenu" class="form-control" type="text" id="contenu" placeholder="contenu du contact" required>
                         </fieldset>
                       </div>
                       <div class="col-lg-12 col-sm-12">
                         <fieldset>
                           <button type="submit" id="add_contact_submit" class="main-button btn btn-warning">ajouter</button>
                         </fieldset>
                       </div>
                     </div>
                   </form>
                 </div>
               </section>
             </div>  
           </div>  
         </div>
       
         <!-- Modal add critere-->  
       
        <div id="critere_add" class="modal fade" role="dialog">  
           <div class="modal-dialog">  
             <div class="modal-content">    
               <section class="formulaire formulaire-modal">
                 <div class="col-lg-12">
                   <div class="sidebar-heading">
                     <h2>modifier la liste des critères de sélection des annonces à publier sur la page principale</h2>
                   </div>
                   <form method="POST" action="'.route('critere_add').'">
                     <div class="row">
                       <div class="col-md-12 col-sm-12">
                         <fieldset>
                           <label for="criteres">les critères disponibles :</label>
                           <select class="mul-select col-lg-12" id="criteres" name="criteres[]" multiple="true" >';
                             foreach ($criteres as $critere){
                                $code=$code.'<option value="'.$critere->id.'">'.$critere->texte.'</option>';
                             }
                             $code=$code.'</select>
                         </fieldset>
                       </div>
                       <div class="col-lg-12 col-sm-12">
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
         
           <!-- Modal add contact-->  
       
        <div id="add_document" class="modal fade" role="dialog">  
           <div class="modal-dialog">  
             <div class="modal-content">    
               <section class="formulaire formulaire-modal">
                 <div class="col-lg-12">
                   <div class="sidebar-heading">
                     <h2>ajouter un nouveau contact</h2>
                   </div>
                   <form action="'.route('add_document').'" method="post" enctype="multipart/form-data">
                     <div class="row">
                       <div class="col-md-12 col-sm-12">
                         <fieldset>
                           <input name="document" class="form-control" type="text" id="document" placeholder="nom du document" required>
                         </fieldset>
                       </div>
                       <div class="col-lg-12 col-sm-12">
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
       
         <!-- Modal modif presentation-->  
       
        <div id="modifier_presentation" class="modal fade" role="dialog">  
           <div class="modal-dialog">  
             <div class="modal-content">    
               <section class="formulaire formulaire-modal">
                 <div class="col-lg-12">
                   <div class="sidebar-heading">
                     <h2>ajouter un nouvelle presenation</h2>
                   </div>
                   <form action="'.route('modifier_presentation').'" method="POST" enctype="multipart/form-data">
                     <div class="row">
                       <div class="col-md-11 col-sm-12" style="margin-left: 18px;">
                         <fieldset> 
                           <label for="img" id="image_label" class="custom-file-label" >choisir votre photo</label>
                           <input type="file" class="custom-file-input" id="img" name="img" accept="image/png, image/jpeg">
                         </fieldset>
                       </div>
                       <div class="col-md-12 col-sm-12">
                         <fieldset>
                           <input name="texte" class="form-control" type="text" id="texte" placeholder="le texte" required>
                         </fieldset>
                       </div>
                       <div class="col-md-12 col-sm-12">
                         <fieldset>
                           <input name="video" class="form-control" type="text" id="video" placeholder="la video" required>
                         </fieldset>
                       </div>
                       <div class="col-md-12 col-sm-12">
                         <fieldset>
                           <input name="fonctionnement" class="form-control" type="text" id="fonctionnement" placeholder="comment il fonctionne" required>
                         </fieldset>
                       </div>
                       <div class="col-lg-12 col-sm-12">
                         <fieldset>
                           <button type="submit"class="main-button btn btn-warning">ajouter</button>
                         </fieldset>
                       </div>
                     </div>
                   </form>
                 </div>
               </section>
             </div>  
           </div>  
         </div>
           
         <!-- Modal modifier pourcentage-->
         <div id="modif_p" class="modal fade" role="dialog">  
           <div class="modal-dialog">  
             <div class="modal-content">    
               <section class="formulaire formulaire-modal">
                 <div class="col-lg-12">
                   <div class="sidebar-heading">              
                     <h2>modifier le pourcentage de cette transaction</h2>
                   </div>
                   <form action="'.route('pourcentage').'" method="post" enctype="multipart/form-data">
                       <div class="row">
                         <div class="col-md-12 col-sm-12">
                           <fieldset>
                             <input name="pourcentage" type="number" placeholder="le pourcentage" required="">
                           </fieldset>
                         </div>
                         <div class="col-md-12 col-sm-12" style="display:none;">
                           <fieldset>
                             <input name="id" type="text" id="id_transaction" >
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
       ';
        return $code;
    }

    public function scripts()
    {
        $code='<script>

        $(".mul-select").select2({
          placeholder: "select critere", //placeholder
          tags: true,
          tokenSeparators: [\'/\',\',\',\';\'," "] 
        });

      $("a").click(function (e) {
        if ($(e.target).is(\'.modifier_pourcentage\')){
          $(e.target).attr("data-toggle","modal");
          $(e.target).attr("data-target","#modif_p");
          let id=$(e.target).parent().parent().parent().children(":first").html();
          $(\'#modif_p\').find(\'#id_transaction\').attr(\'value\',id);
        }
      });

      $("#add_contact_submit").click(function (e) {
          
          e.preventDefault();
          let formData = {
            titre : $("#titre").val(),
            contenu : $("#contenu").val(),
          };
          let type = "POST";
          let ajaxurl = "'.route('add_contact').'";

          $.ajax({
              type: type,
              url: ajaxurl,
              data: formData,
              dataType: \'json\',
              success: function (response) {
                if (response[\'status_code\']==500){
                  $("#titre").css("border-color", "#d93025");
                  $("#contenu").css("border-color", "#d93025");
                  $("#titre").attr("placeholder","titre du contact");
                  $("#contenu").attr("placeholder","contenu du contact");
                }
                else if (response[\'status_code\']==502) {
                  $("#titre").css("border-color", "#d93025");
                  $("#contenu").css("border-color", "#d93025");
                  $("#titre").attr("placeholder",response[\'message\']);
                  $("#contenu").attr("placeholder",response[\'message\']);
                }
                else{
                  $("#contacts_ul").prepend(\'<li><h5>\'+$("#contenu").val()+\'</h5><span>\'+$("#titre").val()+\'</span></li>\');
                }
              },
              error: function (response) {
                  console.log(response);
              }
            });
       });  
    </script>
';
        return $code;
    }

}