@extends('layouts.appadmin')

@section('content')

<div id="client">
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h2>La gestion des clients</h2>
                <h4>Vous pouvez bannir des clients ainsi que de les filtrer, les trier et accèder aux leurs profils</h4>
              </div>
            </div> 
          </div>
        </div>
      </section>
    </div> 

    <!-- Page Content -->

    <section class="posts grid-system">
      <div class="container">
        <div class="table-responsive">
        @if (count($clients))
          <table class="example table table-striped" style="width:100%">
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
                @foreach($clients as $client)
                  <tr>
                    <th scope="row"><a href="profile/{{$client->id}}">{{$client->id}}</a></th>
                    <td>{{$client->name}}</td>
                    <td>{{$client->familyname}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->phone}}</td>
                    <td>{{$client->address}}</td>
                    <td>{{$client->password}}</td>
                    <td>
                      <div class="main-button">
                        <a class="bannir" >bannir</a>
                      </div>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        @else

        @endif
        </div>
      </div>
    </section>

</div>

<div id="transporteur">
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h2>La gestion des transporteurs</h2>
                <h4>Vous pouvez valider les inscriptions des transporteurs, les bannir, les filtrer, les trier et accèder aux leurs profils</h4>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div> 

    <!-- Page Content -->

    <section class="posts grid-system ">
      <div class="container">
        <div class="table-responsive">
        @if (count($transporteurs))
          <table class="example table table-striped" style="width:100%">
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
                <th scope="col">valider la certification</th>
                <th scope="col">bannir</th>
              </tr>
            </thead>
            <tbody>
              @foreach($transporteurs as $transporteur)
                <tr>
                  <th scope="row"><a href="profile/{{$transporteur->id}}">{{$transporteur->id}}</a></th>
                  <td>{{$transporteur->name}}</td>
                  <td>{{$transporteur->familyname}}</td>
                  <td>{{$transporteur->email}}</td>
                  <td>{{$transporteur->phone}}</td>
                  <td>{{$transporteur->address}}</td>
                  <td>{{$transporteur->password}}</td>

                  <td>tarjets</td>
                  <td>{{$transporteur->note}}</td>

                  @if($transporteur->certifie==0)
                    <td>//</td>
                    <td>//</td>
                    <td>//</td>
                  @else
                    <td>{{$transporteur->statut}}</td>
                    <td>{{$transporteur->demande}}</td>
                    @if($transporteur->statut=="refusée")
                      <td>{{$transporteur->justificatif}}</td>
                    @else
                      <td>//</td>
                    @endif
                  @endif

                  @if($transporteur->transporteur==2)
                    <td>validée</td>
                  @else
                    <td>
                      <div class="main-button">
                        <a class="valider_inscription" >valider</a>
                      </div>
                    </td>
                  @endif

                  @if($transporteur->certifie==0)
                    <td>//</td>
                  @elseif($transporteur->transporteur=="validée")
                    <td>validée</td>
                  @elseif($transporteur->statut=="refusée")
                    <td>refusée</td>
                  @elseif($transporteur->statut=="en cours de traitement" || $transporteur->statut=="en attente")
                    <td>
                      <div class="main-button">
                        <a class="valider_certification" >valider</a>
                      </div>
                    </td>
                  @else
                    <td>//</td>
                  @endif

                  <td>
                    <div class="main-button">
                      <a class="bannir" >bannir</a>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @else

        @endif
        </div>
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
                <h4>Vous pouvez voir les signalements des utilisateurs et accèder aux profils utilisateur, détails de l'annonce et textes du signalement</h4>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div> 

    <!-- Page Content -->
    <section class="posts grid-system">
      <div class="container">
      <div class="table-responsive">
      @if (count($client_annonces) || count($transporteur_annonces))
        <table class="example table table-striped" style="width:100%">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">l'identifiant et le nom de l'utilisateur</th>
              <th scope="col">le type de l'utilisateur</th>
              <th scope="col">l'identifiant de l'annonce en cause</th>
              <th scope="col">l'identifiant et le nom de l'utilisateur mis en cause</th>
              <th scope="col">le texte du signalements</th>
            </tr>
          </thead>
          <tbody>
          {{$i=1}}
          @foreach($client_annonces as $client_annonce)
            <tr>
              <th scope="row">{{$i}}</th>
              <td><a href="profile/{{$client_annonce->transporteur->id}}">{{$client_annonce->transporteur->id}}-{{$client_annonce->transporteur->name}}</a></td>
              <td>transporteur</td>
              <td><a href="annonce/{{$client_annonce->id}}">{{$client_annonce->id}}</a></td>
              <td><a href="profile/{{$client_annonce->user->id}}">{{$client_annonce->user->id}}-{{$client_annonce->user->name}}</a></td>
              <td><a class="signale_afficher">texte <span style="display:none;">{{$client_annonce->signaler_client}}</span></a></td>
            </tr>
            {{$i++}}
          @endforeach 
          @foreach($transporteur_annonces as $transporteur_annonce)
            <tr>
              <th scope="row">{{$i}}</th>
              <td><a href="profile/{{$transporteur_annonce->user->id}}">{{$transporteur_annonce->user->id}}-{{$transporteur_annonce->user->name}}</a></td>
              <td>client</td>
              <td><a href="annonce/{{$transporteur_annonce->id}}">{{$transporteur_annonce->id}}</a></td>
              <td><a href="profile/{{$transporteur_annonce->transporteur->id}}">{{$transporteur_annonce->transporteur->id}}-{{$transporteur_annonce->transporteur->name}}</a></td>
              <td><a class="signale_afficher">texte <span style="display:none;">{{$transporteur_annonce->signaler_transporteur}}</span></a></td>
            </tr>
            {{$i++}}
          @endforeach 
          
          </tbody>
        </table>
      @else
      @endif
      </div>
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
            <ul>
              <li><a id="client_show">Gestion des clients</a></li>
              <li><a id="transporteur_show">Gestion des transporteurs</a></li>
              <li><a id="signalement_show">Gestion des signalements</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <script>

    $( document ).ready(function() {
      $("#signalement").css("display","none");
      $("#transporteur").css("display","none");
      $("#client").css("display","block");
      $('.example').DataTable();
    });


      $("a").click(function (e) {
        if ($(e.target).is('.signale_afficher')){
          $(e.target).attr("data-toggle","modal");
          $(e.target).attr("data-target","#signaler");
          let texte=$(e.target).find('span').html();
          $('#signaler').find('p').empty();
          $('#signaler').find('p').html(texte);
        }

        if ($(e.target).is('.bannir')){
          let line= $(e.target).parent().parent().parent();
          let id=line.find('th').find('a').html();
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
              }
          });
          e.preventDefault();
          let formData = {
            id : id,
          };
          let type = "POST";
          let ajaxurl = "{{route('bannir')}}";

          $.ajax({
              type: type,
              url: ajaxurl,
              data: formData,
              dataType: 'json',
              success: function (response) {
                if (response.message == 'user deleted'){
                  line.remove();
                }
                else{
                    //error
                }
              },
              error: function (response) {
                  console.log(response);
              }
            });
            
        }
          if ($(e.target).is('.valider_inscription')){
          let line= $(e.target).parent().parent().parent();
          let id=line.find('th').find('a').html();
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
              }
          });
          e.preventDefault();
          let formData = {
            id : id,
          };
          let type = "POST";
          let ajaxurl = "{{route('valider_inscription')}}";

          $.ajax({
              type: type,
              url: ajaxurl,
              data: formData,
              dataType: 'json',
              success: function (response) {
                if (response.message == 'validated'){
                  let element= $(e.target).parent().parent();
                  element.empty();
                  element.html('validée');
                }
                else{
                    //error
                }
              },
              error: function (response) {
                  console.log(response);
              }
            });  
        }

        if ($(e.target).is('.valider_certification')){
          let line= $(e.target).parent().parent().parent();
          let id=line.find('th').find('a').html();
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
              }
          });
          e.preventDefault();
          let formData = {
            id : id,
          };
          let type = "POST";
          let ajaxurl = "{{route('valider_certification')}}";

          $.ajax({
              type: type,
              url: ajaxurl,
              data: formData,
              dataType: 'json',
              success: function (response) {
                if (response.message == 'validated'){
                  let element= $(e.target).parent().parent();
                  element.empty();
                  element.html('validée');
                }
                else{
                    //error
                }
              },
              error: function (response) {
                  console.log(response);
              }
            });  
        }

      });

      $("#signalement_show").click(function (e) {
        $("#signalement").css("display","block");
        $("#transporteur").css("display","none");
        $("#client").css("display","none");
      });

      $("#transporteur_show").click(function (e) {
        $("#signalement").css("display","none");
        $("#transporteur").css("display","block");
        $("#client").css("display","none");
      });

      $("#client_show").click(function (e) {
        $("#signalement").css("display","none");
        $("#transporteur").css("display","none");
        $("#client").css("display","block");
      });

    </script>
@endsection