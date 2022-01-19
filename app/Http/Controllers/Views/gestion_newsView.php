<?php

namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\acceuilAdminView;


class gestion_newsView extends Controller
{
    public function gestion_news($news){
        return (new acceuilAdminView)->headAdmin().(new acceuilAdminView)->navbarAdmin().$this->contenu($news);
    }

    public function contenu($news)
    {
        $code='<div class="heading-page header-text">
        <section class="page-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-10">
                <div class="text-content">
                  <h2>La gestion des news</h2>
                  <h4>Vous pouvez rajouter et gérer les news</h4> 
                </div>
              </div>
              <div class="col-lg-2">
                <div class="main-button">
                  <a data-toggle="modal" data-target="#ajouter_news">ajouter</a>
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
          if (count($news)){
            $code=$code.'<table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">titre</th>
                  <th scope="col">description</th>
                  <th scope="col">paragraph</th>
                  <th scope="col">image</th>
                  <th scope="col">date d\'ajout</th>
                </tr>
              </thead>
              <tbody>';
                  foreach($news as $new){
                    $code=$code.'<tr>
                      <th scope="row"><a href="news/'.$new->id.'">'.$new->id.'</a></th>
                      <td>'.$new->titre.'</td>
                      <td>'.$new->description.'</td>
                      <td>'.$new->paragraph.'</td>
                      <td><img src=".'.$new->img.'" alt="" style="width: 100%;"></td>
                      <td>'.$new->created_at.'</td>
                    </tr>';
                  }
                  $code=$code.'</tbody>
            </table>';
                }
                $code=$code.'</div>
        </div>
      </section>
  
         <!-- Modal add annonce -->
  
    <div id="ajouter_news" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
        <div class="modal-content">    
          <section class="formulaire formulaire-modal">
            <div class="col-lg-12">
              <div class="sidebar-heading">
                <h2>ajouter news</h2>
              </div>
              <form action="'.route('add_news').'" method="post" enctype="multipart/form-data">
                @csrf
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <fieldset>
                        <input name="titre" type="text" id="titre" placeholder="titre du news" required="">
                      </fieldset>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <fieldset>
                        <input name="description" type="textarea" id="description" placeholder="descriptif du news" required="">
                      </fieldset>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <fieldset>
                        <input name="paragraph" type="textarea" id="paragraph" placeholder="contenu du news" required="">
                      </fieldset>
                    </div>
                    <div class="col-md-11 col-sm-12" style="margin-left: 18px;">
                      <fieldset>                       
                        <label for="image" class="custom-file-label">Choisir une photo</label>
                        <input type="file" id="image" name="image" class="custom-file-input col-md-12" accept="image/png, image/jpeg" required="">
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
    </div> ';
        return $code;
    }

}