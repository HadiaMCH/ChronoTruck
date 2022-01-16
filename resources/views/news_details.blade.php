@extends( (session()->exists('admin_name') || session()->exists('super_admin_name')) ? 'layouts.appsecondadmin' : 'layouts.appsecond')

@section('content')

    <!-- Page Content -->

    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h2>{{$news->titre}}</h2>
                <h4>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $news->created_at)->format('H:i:s d-m-Y')}}</h4>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <section class="posts grid-system">
      <div class="container">
          <div class="col-lg-12">
            <div class="post">
              <div class="thumb">
                <img src="..{{$news->img}}" alt="">
              </div>
              <div class="down-content">
                <span>{{$news->description}}</span>
                <p>{{$news->paragraph}}</p>
              </div>
          </div>
        </div>
      </div>
    </section>

@endsection