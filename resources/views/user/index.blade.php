@extends('layouts.admin')
@section('page_name','User')


@section('content')
  <style type="text/css">
      .card-avatar {
     -webkit-transition: all 1s ease;
     -moz-transition: all 1s ease;
     -o-transition: all 1s ease;
     -ms-transition: all 1s ease;
     transition: all 1s ease;
  }

  .card-avatar:hover {
     -webkit-filter: brightness(70%);
     filter: brightness(70%);
  }
  .text {
    position: absolute;
    top: 0;
    color:#f00;
    background-color:rgba(255,255,255,0.8);
    width: 100px;
    height: 100px;
    line-height:100px;
    text-align: center;
    z-index: 10;
    opacity: 0;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

  </style>
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
                    <button type="submit" class="btn btn-primary pull-right">Edit Profile</button>
                    @else
                    <button type="submit" class="btn btn-primary pull-right" disabled>Edit Profile</button>
                    Complete profile to Edit.
                    @endif
                    <div class="clearfix"></div>
                  </form>
                    <div class="row">
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <button id="deleteAccBtn" type="button" class="btn btn-danger btn-block">Delete My Account</button>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            @if($user->completion >= 100)
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                    @if(file_exists( public_path() . '/images/users/'.$user->image))
                    <img class="img" src="{{asset('/images/users/'.$user->image)}}">
                       <span class="text">
                          14
                      </span>
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

{{-- Modal For Delete Account --}}
     <div class="modal fade" id="accountDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        Are you sure. You will not be able to undo this action.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="{{route('deleteProfile', $user->id)}}" method="POST">
          @csrf
          @method('Delete')
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- Modal For Delete Account --}}


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
  $('#deleteAccBtn').on('click', function(){
    $('#accountDeleteModal').modal('show');

  })

  // $('.card-avatar').on('mouseenter', function(){
  // })
  </script>
@endsection