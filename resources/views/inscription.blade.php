@extends('layouts.app')

@section('content')
    
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h2>Créer votre compte chronotruck! </h2>  
                @if($statut_creation=='before')
                  <a href="" data-toggle="modal" data-target="#loginModal"><h4>si vous avez un compte deja, connectez-vous maintenant</h4></a>  
                @elseif($statut_creation=='after')
                <a href="" data-toggle="modal" data-target="#loginModal"><h4>votre compte a été bien créé, connectez-vous maintenant</h4></a>  
                @endif
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <!-- Banner Ends Here -->


    <section class="formulaire">
      <div class="container">
        <form id="inscription" action="{{route('add_user')}}" method="post" enctype="multipart/form-data">
            <div class="sidebar-heading">
              <h2>remplir vos informations en dessous</h2>
            </div>
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
            </div>
            <div class="sidebar-heading">
              <h2><a class="reference" id="transporteur">voulez vous etre un transporteur ?</a></h2>
              <input name="transporteur" id="transporteur_checkbox" type="checkbox" style="display:none;">
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-12 transporteur_section">
                <fieldset>
                  <label for="depart">les points de départ :</label>
                  <select class="mul-select" id="depart" name="depart[]" multiple="true" >
                    {{$i=1}}
                    @foreach ($wilayas as $wilaya)
                      <option value="{{$i}}">{{$wilaya->nom}}</option>
                      {{$i++}}
                    @endforeach
                  </select>
                </fieldset>
              </div>
              <div class="col-md-6 col-sm-12 transporteur_section">
                <fieldset>
                  <label for="arriver">les points d'arrivée :</label>
                  <select class="mul-select col-lg-12" id="arriver" name="arriver[]" multiple="true" >
                    {{$i=1}}
                    @foreach ($wilayas as $wilaya)
                      <option value="{{$i}}">{{$wilaya->nom}}</option>
                      {{$i++}}
                    @endforeach
                  </select>
                </fieldset>
              </div>
            </div>
            <div class="transporteur_section">
              <div class="sidebar-heading">
                <h2><a class="reference" id="certifie">voulez vous etre un transporteur certifié?</a></h2>
                <input name="certifie" id="certifie_checkbox" type="checkbox" style="display:none;">
              </div>
              <div class="col-md-6 col-sm-12 certifie_section">
                <fieldset>                       
                  <label for="demande" class="custom-file-label">uploader votre demande</label>
                  <input type="file" class="custom-file-input" id="demande" name="demande" accept="image/png, image/jpeg, .doc, .docx, application/pdf" >
                </fieldset>
              </div>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <button type="submit" class="main-button">Créer votre compte</button>
              </fieldset>
            </div>
        </form>
      </div>
    </section>
    
    <script>    
        $(".mul-select").select2({
          placeholder: "select wilaya", //placeholder
          tags: true,
          tokenSeparators: ['/',',',';'," "] 
        });

        $("#transporteur").click(function(){
          if($("#transporteur_checkbox").is(':checked')){
            $("#depart").removeAttr("required");
            $("#arriver").removeAttr("required");
            $("#transporteur_checkbox").removeAttr("checked");
            $(".transporteur_section").css("display","none");
          }
          else{
            $("#depart").attr('required','');
            $("#arriver").attr('required','');
            $("#transporteur_checkbox").attr('checked','checked');
            $(".transporteur_section").css("display","block");
          }
        });

        $("#certifie").click(function(){
          if($("#certifie_checkbox").is(':checked')){
            $("#demande").removeAttr("required");
            $("#certifie_checkbox").removeAttr("checked");
            $(".certifie_section").css("display","none");
          }
          else{
            $("#demande").attr('required','');
            $("#certifie_checkbox").attr('checked','checked');
            $(".certifie_section").css("display","block");
          }
        }); 
    </script>
@endsection