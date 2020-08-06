@extends('layouts.admin')
@section('page_name','Favorite Users')

@section('content')
	
	@foreach($users->chunk(3) as $usersChunk )		
		<div class="row">
			@foreach($usersChunk as $user)
			<div class="col-md-4">
				<div class="card card-profile">
	                <div class="card-avatar">
                    @if(isset($user->image))
	                   <a href="{{asset('/storage/'.$user->image)}}">
                    <img class="img" src="{{asset('/storage/'.$user->image)}}">
                    @else
	                   <a href="{{ asset('../../assets/img/faces/marc.jpg')}}">
                    <img class="img" src="{{ asset('../../assets/img/faces/marc.jpg')}}">
                    @endif
                  </a>
	                </div>

	               <div class="card-body">
                  <h6 class="card-title">Id: {{$user->id}}</h6>
                  <h4 class="card-title">{{$user->name}}</h4>
                  <h6 class="card-category text-gray">{{$user->job}}</h6>
                  <p class="card-description">
                   {{$user->email}}
	                  </p>
                  <h6 class="card-category text-gray">@if($user->type == 1) Admin @elseif($user->type == 2) Blogger @else User @endif</h6>
                  <p class="card-description">
                    {{$user->birth}}
                  </p>
                </div>
	            </div>
	        </div>	
	        @endforeach
	    </div>	
	    @endforeach
@endsection