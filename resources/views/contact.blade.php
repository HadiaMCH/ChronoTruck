@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h2>restons en contact !</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <section class="contact-us" >
      <div class="container">
        <div class="down-contact">
          <div class="sidebar-item contact-information">
            <div class="sidebar-heading">
              <h2>les informations permettant de contacter les administrateurs</h2>
            </div>
            <div class="content">
              <ul>
                @foreach($contacts as $contact)
                  <li>
                    <h5>{{$contact->contenu}}</h5>
                    <span>{{$contact->titre}}</span>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection