@extends('layouts.admin')
@section('page_name','Dashboard')
	

@section('content')
		
	 <div class="container-fluid">
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">perm_identity</i>
                    </div>
                    <p class="card-category">Users</p>
                    <h3 class="card-title">{{$user_count}}</h3>
                  </div>
                  <div class="card-footer">
                  <p class="card-category">Favorite Users: </p>
                  {{$favorite_count}}
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">face</i>
                    </div>
                    <p class="card-category">Bloggers</p>
                    <h3 class="card-title">{{$blogger_count}}</h3>
                  </div>
                  <div class="card-footer">
                   
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">account_box</i>
                    </div>
                    <p class="card-category">Admins</p>
                    <h3 class="card-title">{{$admin_count}}</h3>
                  </div>
                  <div class="card-footer">
                    
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">article</i>
                    </div>
                    <p class="card-category">Blogs</p>
                    <h3 class="card-title">{{$blog_count}}</h3>
                  </div>
                  <div class="card-footer">
                   
                  </div>
                </div>
              </div>
            </div>
            <h3>Manage Listings</h3>
            <br>
            <div class="row">
        @foreach($blogs->chunk(3) as $blogsChunks)

        @foreach($blogsChunks as $blog)
              <div class="col-md-4">
                <div class="card card-product">
                  <div class="card-header card-header-image" data-header-animation="true">
                        @if(file_exists( public_path() . '/images/blogs/'.$blog->image))
                      <img class="img" src="{{asset('/images/blogs/'.$blog->image)}}">
                      @else
                      <img class="img" src="../assets/img/clint-mckoy.jpg">
                      @endif  
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="card-actions text-center">
                      <button type="button" class="btn btn-danger btn-link fix-broken-card">
                        <i class="material-icons">build</i> Fix {{$blog->title}}!
                      </button>
                   
                    </div>
                    <h4 class="card-title">
                      <a href="#pablo">{{$blog->title}}</a>
                    </h4>
                    <div class="card-description">
                      {{$blog->desc}}
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="price">
                      <h4>{{$blog->date}}</h4>
                    </div>
                    <div class="stats">
                      <p class="card-category"><i class="material-icons">place</i> Barcelona, Spain</p>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
           @endforeach
          </div>
          </div>
        </div> 	

@endsection