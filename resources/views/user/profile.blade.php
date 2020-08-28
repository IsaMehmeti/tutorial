@extends('layouts.admin')
@section('page_name','Complete Profile') 



@section('content')
<div class="container-fluid">
          <div class="col-md-8 col-12 mr-auto ml-auto">
            <div class="card">
                  <div class="card-header card-header-icon card-header-primary">
                    <div class="card-icon">
                      <i class="material-icons">timeline</i>
                    </div>
                    <h4 class="card-title">Profile Completed currently: <span class="number">{{$user->completion}}</span  >%
                    
                    </h4>
                  </div>
                  <div class="card-body">
            
        <div style="height: 30px;" class="progress-rose">
          <div class="progress-bar" data-id="{{$user->completion}}" role="progressbar" style="max-width: 100%;max-height: 22px; display: inline-block; border-radius: 5px;" aria-valuenow="{{$user->completion}}" aria-valuemin="0" aria-valuemax="100"><span class="number">{{$user->completion}}  </span>%</div>
        </div>
                  </div>
                </div>
            <!--      Wizard container        -->
            <div class="wizard-container">
              <div class="card card-wizard active" data-color="rose" id="wizardProfile">
                <form action="{{route('updateProfile', $user->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                  <div class="card-header text-center">
                    <h3 class="card-title">
                      Complete Your Profile
                    </h3>
                    <h5 class="card-description">This information will let us know more about you.</h5>
                  </div>
               
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="about">
                        <div class="row justify-content-center">
                          <div class="col-sm-4">
                            <div class="picture-container">
                              <div class="picture">
                                <img src="../../assets/img/default-avatar.png" alt="" class="picture-src" id="wizardPicturePreview" title="" style="width: 100%; height: 100%; object-fit: cover;object-position: center;" >
                                <input type="file" id="wizard-picture" name="image">
                              </div>
                              <h6 class="description">Choose Picture</h6>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="input-group form-control-lg">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="material-icons">face</i>
                                </span>
                              </div>
                              <div class="form-group bmd-form-group ">
                                <label for="exampleInput1" class="bmd-label-floating">Name</label>
                                <input type="text" class="form-control" id="exampleInput1" name="name" value="{{$user->name}}">
                              </div>
                            </div>
                            <div class="input-group form-control-lg">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="material-icons">record_voice_over</i>
                                </span>
                              </div>
                              <div class="form-group bmd-form-group ">
                                <label for="exampleInput11" class="bmd-label-floating">Job</label>
                                <input type="text" class="form-control" id="exampleInput11" name="job"value="{{$user->job}}">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-10 mt-3">
                            <div class="input-group form-control-lg">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="material-icons">email</i>
                                </span>
                              </div>
                              <div class="form-group bmd-form-group ">
                                <label for="exampleInput1" class="bmd-label-floating">Email </label>
                                <input type="email" class="form-control" id="exampleemalil" name="email" required="" aria-required="true" aria-invalid="true" value="{{$user->email}}">
                              </div>
                            </div>
                          </div> 
                             <div class="col-lg-10 mt-3">
                            <div class="input-group form-control-lg">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="material-icons">library_books</i>
                                </span>
                              </div>
                              <div class="form-group bmd-form-group ">
                                <label for="exampleInput1" class="bmd-label-floating">Date </label>
                                <input type="date" name="birth" class="form-control datepicker" value="{{$user->birth}}">
                              </div>
                            </div>
                          </div> 
                             <div class="col-lg-9 mt-4">
                            <div class="input-group form-control-lg">
                             <label class="">Account type: </label>
                            <div class="col-sm-10 checkbox-radios">
                              <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" @if($user->type == '1') checked @else @endif  disabled>  Admin
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                              <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" @if($user->type == '2') checked @else @endif   disabled> Blogger
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                              <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value=""@if($user->type >= '3') checked @else @endif   disabled> User
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                   
                    <div class="ml-auto">
                      <button type="submit" class="btn btn-next btn-fill btn-rose btn-wd">Submit</button>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </form>
              </div>
            </div>
            <!-- wizard container -->
          </div>
        </div>


@endsection

@section('custom_scripts')

  <script type="text/javascript">
    $(':file').on('change', function () {
      // var value = $(this).val();
      // var name = this.files[0].name;
      $('.picture-src').attr('src',URL.createObjectURL(this.files[0]));
    })
  </script>
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
  
@endsection
