@extends('layouts.appsecond')

@section('content')

    <!-- Page Content -->

    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h2>{{$news->titre}}</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <section class="blog-posts grid-system">
      <div class="container">
          <div class="col-lg-12">
            <div class="all-blog-posts">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <img src="{{$news->img}}">
                    </div>
                    <div class="down-content">
                      <span>{{$news->description}}</span>
                      <p>{{$news->paragraph}}</p>
                    </div>
              </div>
          </div>
        </div>
      </div>
    </section>

@endsection