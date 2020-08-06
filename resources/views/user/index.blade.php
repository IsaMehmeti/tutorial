@extends('layouts.admin')
@section('page_name','User')


@section('content')
 <div class="col-md-8 col-12 mr-auto ml-auto">
      <div class="card">
                  <div class="card-header card-header-icon card-header-primary">
                    <div class="card-icon">
                      <i class="material-icons">timeline</i>
                    </div>
                    <h4 class="card-title">Profile Completed {{$user->completion}}%
                    </h4>
                  </div>
              <div class="card-body">
            
      				<div style="height: 30px;" class="progress-rose">
      				  <div  class="progress-bar" role="progressbar" style="max-width: 100%; width: {{$user->completion}}%;" aria-valuenow="{{$user->completion}}" aria-valuemin="0" aria-valuemax="100">{{$user->completion}}%</div>
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
                          <input type="text" name="email" class="form-control" value="{{$user->email}}">
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Birth</label>
                          <input type="date" name="birth" class="form-control" value="{{$user->birth}}">
                        </div>
                      </div>
                      </div>   
                         <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" name="password" class="form-control">
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
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="{{asset('/storage/'.$user->image)}}">
                    @if(isset($user->image))
                    <img class="img" src="{{asset('/storage/'.$user->image)}}">
                    @else
                    <img class="img" src="{{ asset('../../assets/img/faces/marc.jpg')}}">
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
          </div>
     </div>
@endsection