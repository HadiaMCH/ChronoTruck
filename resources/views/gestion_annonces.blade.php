@extends('layouts.appadmin')

@section('content')

    <div class="heading-page header-text">
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
    
    <section class="posts grid-system">
      <div class="container">
        <div class="table-responsive">
        @if (count($annonces))
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">titre</th>
                <th scope="col">image</th>
                <th scope="col">texte</th>
                <th scope="col">point de départ</th>
                <th scope="col">point d'arrivée</th>
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
              </tr>
            </thead>
            <tbody>
                @foreach($annonces as $annonce)
                  <tr>
                    <th scope="row"><a href="annonce/{{$annonce->id}}">{{$annonce->id}}</a></th>
                    <td>{{$annonce->titre}}</td>
                    <td><img src=".{{$annonce->img}}" id="photo" alt="" style="width: 100%;"></td>
                    <td>{{$annonce->texte}}</td>

                    <td>{{$wilayas[$annonce->tarjet->wilaya_depart_id-1]->nom}}</td>
                    <td>{{$wilayas[$annonce->tarjet->wilaya_arriver_id-1]->nom}}</td>

                    <td>{{$annonce->transport_type}}</td>
                    <td>{{$annonce->moyen_transport}}</td>
                    <td>{{$annonce->fourchette_poid_min}}</td>
                    <td>{{$annonce->fourchette_poid_max}}</td>
                    <td>{{$annonce->fourchette_volume_min}}</td>
                    <td>{{$annonce->fourchette_volume_max}}</td>
                    <td>{{$annonce->user->id}}-{{$annonce->user->name}}</td>
                    <td>{{$annonce->status}}</td>
                    <td>{{$annonce->tarif}}</td>
                    <td>{{$annonce->note}}</td>
                    @if($annonce->transporteur)
                      <td>{{$annonce->transporteur->id}}-{{$annonce->transporteur->name}}</td> 
                    @else
                    <td>//</td> 
                    @endif
                    <td>{{$annonce->archiver}}</td>
                    @if($annonce->status=='en attente')
                      <td class="col-lg-12">
                        <div class="main-button">
                          <a rel="nofollow" href="">valider</a>
                        </div>
                      </td>
                    @else
                    <td>//</td>
                    @endif
                  </tr>
                @endforeach
            </tbody>
          </table>
        @else

        @endif
        </div>
      </div>
    </section>

@endsection