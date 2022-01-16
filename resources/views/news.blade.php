@extends('layouts.app')

@section('content')

    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h4>les nouvelle</h4>
                <h2>À la une</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <section class="posts grid-system">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
              <div class="row">

                @if ($news->count())
                  @foreach ($news as $new)
                    <div class="col-lg-12">
                      <div class="post">
                        <div class="thumb">
                          <a href="news/{{$new->id}}"><img src=".{{$new->img}}"></a>
                        </div>
                        <div class="down-content">
                          <a href="news/{{$new->id}}"><span>{{$new->titre}}</span></a>
                          <h4>{{$new->description}}</h4>
                        </div>
                      </div>
                    </div>
                  @endforeach
                @endif
                
            </div>
          </div>
          <div class="col-lg-5">
            <div class="sidebar">
              <div class="sidebar-item recent-posts">
                <div class="sidebar-heading">
                  <h2>les grands titres de l'actualité</h2>
                </div>
                <div class="content">
                  <ul>
                    @if ($firstnews->count())
                      @foreach ($firstnews as $firstnew)
                        <li><a href="news/{{$firstnew->id}}">
                          <h5>{{$firstnew->titre}}</h5>
                          <span>{{$firstnew->description}}</span>
                        </a></li>
                      @endforeach
                     @endif   
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection