@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    <!-- Diaporama -->
    <div class="main-banner header-text">
      <div class="container-fluid">
        <div class="owl-banner owl-carousel">
          
          <!-- Diaporama -->
          @if ($news->count())
            @foreach ($news as $new)
              <div class="item">
                <img src="{{$new->img}}" >
                <div class="item-content">
                  <div class="main-content">
                    <div class="meta-category">
                    <a href="news/{{$new->id}}"><span style="color:#804721">{{$new->titre}}</span></a>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          @endif
          
        </div>
      </div>
    </div>
    <!-- Diaporama -->

    <!-- Recherche -->
    <section id="recherche">
      <div class="container">
        <div class="main-content">
            <span>Véhicule de Transport avec Chauffeur</span>
            <h4>la meilleure façon de transporter de marchandises et colis!</h4>
        </div>
        <section class="contact-us">
            <div class="container">
                    <div class="row"> 
                        <div class="col-lg-12">
                            <div class="down-contact">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="sidebar-item contact-form">
                                            <div class="sidebar-heading">
                                            <h2>Trouver un target</h2>
                                            </div>
                                            <div class="content">
                                              @if($errors->any())
                                                @foreach ($errors->all() as $error)
                                                  <div class="text-red-500">{{$error}}</div>
                                                @endforeach
                                              @endif
                                                <form id="search">
                                                  @csrf
                                                        <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <fieldset>
                                                            <input name="ville_depart" type="text" id="ville_depart" placeholder="Ville de départ" required="">
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <fieldset>
                                                            <input name="ville_arriver" type="text" id="ville_arriver" placeholder="Ville d'arriver" required="">
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <fieldset>
                                                            <button type="submit" id="search-submit" class="main-button">Rechercher</button>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4"> 
                                      <div id="map">
                                        <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="450px" frameborder="0" style="border:0" allowfullscreen></iframe>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
      </div>
    </section>

    <!-- Resultat du recherche -->
    <section class="blog-posts">
      <div class="container">
        <div class="row" id="search-result">
          
        </div>
      </div>
    </section>

    <section class="blog-posts">
      <div class="container">
        <div class="col-lg-4">
          <div class="main-button">
            <a href="{{ route('presentation') }}">Comment cela fonctionne</a>
          </div>
        </div>
      </div>  
    </section>   
    
     <!-- Jquery definition -->
     <script src="vendor/jquery/jquery.min.js"></script>

    <script>
      $("#search-submit").click(function (e) {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
              }
          });
          e.preventDefault();
          var formData = {
            ville_depart : $("#ville_depart").val(),
            ville_arriver : $("#ville_arriver").val(),
          };
          var type = "POST";
          var ajaxurl = "{{route('search')}}";

          $.ajax({
              type: type,
              url: ajaxurl,
              data: formData,
              dataType: 'json',
              success: function (response) {
                  if(response != null && response.length > 0)
                  {
                    for (let i=0; i < response.length ;i++)
                    {
                      j=0;
                      let text="";
                      while (j < response[i].text.length && j< 100){
                        text[j]= response[i].text[j];
                        j++;
                      }
                      $("#search-result").prepend('<div class="col-lg-3"><div class="all-blog-posts"><div class="blog-post"><div class="blog-thumb"><img src="'+response[i].img+'" alt=""></div><div class="down-content"><span>'+response[i].titre+'</span><p>'+text+'...<a href="{{ route('annonce') }}" >lire la suite</a></p></div></div></div></div>');
                    }
                  }
                  else{

                  }
              },
              error: function (response) {
                  console.log(response);
              }
            });
       });  


    </script>
     
@endsection