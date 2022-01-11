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
        @if (count($clients))
          <table class="table" id="users">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">nom</th>
                <th scope="col">prénom</th>
                <th scope="col">email</th>
                <th scope="col">numéro de téléphone</th>
                <th scope="col">adresse principale</th>
                <th scope="col">mot de passe</th>
                <th scope="col">bannir des clients</th>
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
                        <a rel="nofollow" href="" >bannir</a>
                      </div>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        @else

        @endif
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
    <section class="posts grid-system">
      <div class="container">
      @if (count($transporteurs))
          <table class="table" id="users">
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
                <th scope="col">justificatif de refuse de certification</th>

                <th scope="col">valider les inscriptions des transporteurs</th>
                <th scope="col">bannir des transporteurs</th>
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
                    @if($transporteur->statut=="validée")
                      <td>validée</td>
                    @else
                      <td>list de validation</td>
                    @endif
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
                    <td>valider les inscriptions des transporteurs</td>
                  @endif
                  <td>
                    <div class="main-button">
                      <a rel="nofollow" href="" >bannir</a>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @else

        @endif
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
      @if (count($annonces))
        <table class="table" id="users">
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
          @foreach($annonces as $annonce)
            <tr>
              <th scope="row">{{$i}}</th>
              <td><a href="profile/{{$annonce->user->id}}">{{$annonce->user->id}}-{{$annonce->user->name}}</a></td>
              @if($annonce->user->transporteur == 0)
                <td>client</td>
              @else
              <td>transporteur</td>
              @endif
              <td><a href="annonce/$annonce->id">{{$annonce->id}}</a></td>
              <td><a href="profile/{{$annonce->transporteur->id}}">{{$annonce->transporteur->id}}-{{$annonce->transporteur->name}}</a></td>
              <td><a data-toggle="modal" data-target="#">texte <span>{{$annonce->signale}}</span></a></td>
            </tr>
            {{$i++}}
          @endforeach 
          </tbody>
        </table>
      @else
      @endif
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
            <p>                         </p>
          </div>
        </section>
      </div>  
    </div>  
  </div>

    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <ul class="social-icons">
              <li><a href="">Gestion des transporteurs</a></li>
              <li><a href="">Gestion des clients</a></li>
              <li><a href="">Gestion des signalements</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
@endsection