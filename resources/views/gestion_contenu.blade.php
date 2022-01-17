@extends('layouts.appadmin')

@section('content')

    <div class="heading-page header-text">
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
        <div class="row">
          @if($presentation)
            <table class="example table table-striped" style="width:100%">
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
                  <td><img src=".{{$presentation->img}}" id="photo" alt="" style="width: 100%;"></td>
                  <td>{{$presentation->texte}}</td>
                  <td>
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="{{$presentation->video}}" allowfullscreen></iframe>
                    </div>
                  </td>
                  <td>{{$presentation->fonctionnement}}</td>
              </tbody>
            </table>
            <div class="col-lg-12">           
                <div class="main-button">
                  <a href="" data-toggle="modal" data-target="#modifier_presentation">modifier</a>
                </div>
            </div>
          @else
            <div class="col-lg-12">           
              <div class="main-button">
                <a href="" data-toggle="modal" data-target="#add_presentation">ajouter</a>
              </div>
            </div>
          @endif
        </div>
      </div>
    </section>

    <!-- contact -->

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
              <ul id="contacts_ul">
                @foreach($contacts as $contact)
                  <li>
                    <h5>{{$contact->contenu}}</h5>
                    <span>{{$contact->titre}}</span>
                  </li>
                @endforeach   
                <li>
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

    <!-- criteres de selection des annonce -->

    <section class="header_contenu">
      <div class="container">
        <div class="main-content">
            <h4>La gestion des critères de sélection des annonces à publier sur la page principale</h4>
        </div>
      </div>
    </section>

    <!-- style et diapo -->

    <section class="header_contenu">
      <div class="container">
        <div class="main-content">
            <h4>La gestion des diaporamas et les options de styles du site</h4>
        </div>  
      </div>
    </section>

    <!-- Modal add contact-->  

 <div id="add_contact" class="modal fade" role="dialog">  
    <div class="modal-dialog">  
      <div class="modal-content">    
        <section class="formulaire formulaire-modal">
          <div class="col-lg-12">
            <div class="sidebar-heading">
              <h2>ajouter un nouveau contact</h2>
            </div>
            <form >
            @csrf
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
  
  <!-- Modal add presentation-->  

 <div id="add_presentation" class="modal fade" role="dialog">  
    <div class="modal-dialog">  
      <div class="modal-content">    
        <section class="formulaire formulaire-modal">
          <div class="col-lg-12">
            <div class="sidebar-heading">
              <h2>ajouter un nouvelle presenation</h2>
            </div>
            <form action="{{route('add_presentation')}}" method="POST">
            @csrf
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
    
  <script>
      $("#add_contact_submit").click(function (e) {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
              }
          });
          e.preventDefault();
          let formData = {
            titre : $("#titre").val(),
            contenu : $("#contenu").val(),
          };
          let type = "POST";
          let ajaxurl = "{{route('add_contact')}}";

          $.ajax({
              type: type,
              url: ajaxurl,
              data: formData,
              dataType: 'json',
              success: function (response) {
                if (response['status_code']==500){
                  $("#titre").css("border-color", "#d93025");
                  $("#contenu").css("border-color", "#d93025");
                  $("#titre").attr("placeholder","titre du contact");
                  $("#contenu").attr("placeholder","contenu du contact");
                }
                else if (response['status_code']==502) {
                  $("#titre").css("border-color", "#d93025");
                  $("#contenu").css("border-color", "#d93025");
                  $("#titre").attr("placeholder",response['message']);
                  $("#contenu").attr("placeholder",response['message']);
                }
                else{
                  $("#contacts_ul").prepend('<li><h5>'+$("#titre").val()+'</h5><span>'+$("#contenu").val()+'</span></li>');
                }
              },
              error: function (response) {
                  console.log(response);
              }
            });
       });  
    </script>

@endsection