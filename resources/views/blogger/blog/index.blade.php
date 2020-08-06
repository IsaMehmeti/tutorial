@extends('layouts.admin')
@section('page_name','View My Posts')

@section('content')
			<div class="row">
				@foreach($blogs->chunk(3) as $blogsChunks)

				@foreach($blogsChunks as $blog)
              <div class="col-md-4">
                <div class="card card-product">
                  <div class="card-header card-header-image" data-header-animation="true">
                    <a href="#pablo">
                      @if(isset($blog->image))
                      <img class="img" src="{{asset('/storage/'.$blog->image)}}">
                      @else
                      <img class="img" src="../assets/img/card-2.jpg">
                      @endif		
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="card-actions text-center">
                      <button type="button" class="btn btn-danger btn-link fix-broken-card">
                        <i class="material-icons">build</i> Fix {{$blog->title}}!
                      </button>
                      <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
                        <i class="material-icons">art_track</i>
                      </button>
                      <button type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="Edit">
                        <i class="material-icons">edit</i>
                      </button>
                      <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="Remove">
                        <i class="material-icons">close</i>
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
            
@endsection
  
