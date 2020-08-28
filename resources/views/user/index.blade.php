@extends('layouts.admin')
@section('page_name','User')


@section('content')
 <div class="col-md-8 col-12 mr-auto ml-auto">
      <div class="card">
                  <div class="card-header card-header-icon card-header-primary">
                    <div class="card-icon">
                      <i class="material-icons">timeline</i>
                    </div>
                    <h4 class="card-title">Profile Completed <span class="number">{{$user->completion}}</span  >%
                    </h4>
                  </div>
              <div class="card-body">
            
      				<div style="height: 30px;" class="progress-rose">
      				  <div class="progress-bar" data-id="{{$user->completion}}" role="progressbar" style="max-width: 100%;max-height: 22px; display: inline-block; border-radius: 5px;" aria-valuenow="{{$user->completion}}" aria-valuemin="0" aria-valuemax="100"><span class="number">{{$user->completion}}  </span>%</div>
      				</div>
            </div>
        </div>

    </div>
     <div class="col-md-13 col-12 mr-auto">
      <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-icon card-header-primary">
                  <div class="card-icon">
                    <i class="material-icons">perm_identity</i>
                  </div>
                  <h4 class="card-title">Edit Profile 
                  </h4>
                </div>
                <div class="card-body">
                  <form action="{{route('editProfile', $user->id)}}" method="POST">
                  @csrf
                  @method('PUT')
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" name="name" class="form-control" value="{{$user->name}}">
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Job</label>
                          <input type="text" name="job" class="form-control" value="{{$user->job}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" name="email" class="form-control" value="{{$user->email}}" autocomplete="username">
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Birth</label>
                          <input type="date" name="birth" class="form-control" value="{{$user->birth}}" autocomplete="birth">
                        </div>
                      </div>
                      </div>   
                         <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" name="password" class="form-control" autocomplete="current-password">
                        </div>
                      </div>
               {{--         <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Confirm</label>
                          <input type="password" name="password-confirmation" class="form-control">
                        </div>
                      </div> --}}
                    </div>
                    @if($user->completion == 100)
                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                    @else
                    <button type="submit" class="btn btn-primary pull-right" disabled>Update Profile</button>
                    Complete profile to update.
                    @endif
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            @if($user->completion >= 100)
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                    @if(file_exists( public_path() . '/images/users/'.$user->image))
                      <a href="{{asset('/images/users/'.$user->image)}}">
                    <img class="img" src="{{asset('/images/users/'.$user->image)}}">
                    @else
                    <img class="img" src="{{ asset('../../assets/img/faces/avatar.png')}}">
                    @endif
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">{{$user->job}}</h6>
                  <h6 class="card-category text-gray">@if($user->type == 1) Admin @elseif($user->type == 2) Blogger @else User @endif</h6>
                  <h4 class="card-title">{{$user->name}}</h4>
                  <p class="card-description">
                    {{$user->birth}}
                  </p>
                </div>
              </div>
            </div>
            @else
            @endif
          </div>
     </div>


@endsection

@section('custom_footer')
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js?ver=5.2.3'></script>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js?ver=5.2.3'></script>
  <script type="text/javascript">
  $(document).ready(function () {
    id = $('.progress-bar').data('id');
    $('.number').counterUp({delay:10,time:1250});
function update_progress(_val){
    if (_val <= id){
      $('.progress-bar').css('width', _val.toString()+'%');
      setTimeout(function(){
         update_progress(_val+2);
      }, 25);
    }
  }
  update_progress(0);
    
  })
  </script>
@endsection