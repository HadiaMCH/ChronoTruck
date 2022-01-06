@extends('layouts.app')

@section('content')
    
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h2>Créer votre compte chronotruck! </h2>  
                @if($statut_creation=='before')
                  <a href="" data-toggle="modal" data-target="#loginModal"><h4 style="margin-top: 15px">si vous avez un compte deja, connectez-vous maintenant</h4></a>  
                @elseif($statut_creation=='after')
                <a href="" data-toggle="modal" data-target="#loginModal"><h4 style="margin-top: 15px">votre compte a été bien créé, connectez-vous maintenant</h4></a>  
                @endif
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <!-- Banner Ends Here -->


    <section class="contact-us">
      <div class="container">
            <div class="down-contact">
                  <div class="sidebar-item contact-form">
                    <div class="sidebar-heading">
                      <h2>remplir vos informations en dessous</h2>
                    </div>
                    <div class="content">
                      <form id="inscription" action="{{route('add_user')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="col-md-4 col-sm-12">
                            <fieldset>
                              <input name="nom" type="text" id="nom" placeholder="votre nom" required="">
                            </fieldset>
                          </div>
                          <div class="col-md-4 col-sm-12">
                            <fieldset>
                              <input name="prenom" type="text" id="prenom" placeholder="votre prénom" required="">
                            </fieldset>
                          </div>
                          <div class="col-md-4 col-sm-12">
                            <fieldset>
                              <input name="phone" type="text" id="phone" placeholder="votre numéro de téléphone" required="">
                            </fieldset>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input name="email" type="text" id="email" placeholder="votre email" required="">
                            </fieldset>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input name="password" type="password" id="password" placeholder="votre mot de passe" required="">
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <input name="adresse" type="text" id="adresse" placeholder="votre adresse principale" required="">
                            </fieldset>
                          </div>

                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <input name="transporteur" type="checkbox" id="transporteur" >
                              <label for="transporteur">être un transporteur</label>
                            </fieldset>
                          </div>

                          <div class="col-md-12 col-sm-12 transporteur_section">
                            <fieldset>
                              <div class="multiselect">
                                <div class="container-fluid h-100 bg-light text-dark">
                                  <div class="row justify-content-center align-items-center">
                                      <h1>Select Multilpe</h1>    
                                  </div>
                                  <br>
                                  <div class="row justify-content-center align-items-center h-100">
                                      <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                          <div class="form-group">
                                              <select class="mul-select" id="wilaya" name="wilaya[]" multiple="true">
                                                {{$i=1}}
                                                @foreach ($wilayas as $wilaya)
                                                  <option value="{{$i}}" >{{$wilaya->nom}}</option>
                                                  {{$i=$i+1}}
                                                @endforeach
                                              </select>
                                          </div> 
                                    </div>
                                  </div>
                              </div>
                            </fieldset>
                          </div>

                          <div class="col-md-6 col-sm-12 transporteur_section">
                            <fieldset>
                              <input name="certifie" type="checkbox" id="certifie" >
                              <label for="certifie">être un transporteur certifié</label>
                            </fieldset>
                          </div>

                            <div class="col-md-6 col-sm-12 certifie_section">
                              <fieldset>                       
                              <label for="demande">uploader votre demande</label>
                              <input type="file"
                                    id="demande" name="demande"
                                    accept="image/png, image/jpeg, .doc, .docx, application/pdf">
                              </fieldset>
                            </div>

                          <div class="col-lg-12">
                            <fieldset>
                              <button type="submit" id="form-submit" class="main-button">Créer votre compte</button>
                            </fieldset>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
        </div>
      </div>
    </section>

    <script>
      
        $(".mul-select").select2({
          placeholder: "select country", //placeholder
          tags: true,
          tokenSeparators: ['/',',',';'," "] 
        });

        $("#transporteur").click(function(){
          if( $("#transporteur").is(':checked') ){
              $(".transporteur_section").css("display","block");
            } else {
              $(".transporteur_section").css("display","none");

            }
        });

        $("#certifie").click(function(){
          if( $("#certifie").is(':checked') ){
              $(".certifie_section").css("display","block");
            } else {
              $(".certifie_section").css("display","none");

            }
        }); 

    </script>
  
@endsection