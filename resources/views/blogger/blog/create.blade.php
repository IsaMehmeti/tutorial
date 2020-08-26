@extends('layouts.admin')
@section('page_name','Create a Post')
  
@section('content')
	<div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <div class="material-icons">assignment</div>
                  </div>
                </div>
                <div class="card-body ">
                  <form method="POST" action="{{route('bloggerblog.store')}}" class="form-horizontal" enctype="multipart/form-data">
                  	@csrf
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Post Title: </label>
                      <div class="col-sm-10">
                        <div class="form-group bmd-form-group">
                          <input name="title" type="text" class="form-control">
                          <span class="bmd-help">A nice title for your Post.</span>
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <label class="col-sm-2 col-form-label">Description: </label>
                      <div class="col-sm-10">
                        <div class="form-group bmd-form-group">
                        	<label class="bmd-label-floating"> A wide description for your Post.</label>
                         <textarea name="desc" class="form-control" rows="5"></textarea>
                        </div>
                      </div>
                    </div>
                       <div class="row">
                      <label class="col-sm-2 col-form-label">Image: </label>
                      <div class="col-sm-10">
                        <div class="form-group bmd-form-group">
                        <div class="col-md-4 col-sm-4">
                      <h4 class="title">Regular Image</h4>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                          <img src="../../assets/img/image_placeholder.jpg" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                        <div>
                          <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="hidden"><input name="image" type="file" name="...">
                          <div class="ripple-container"></div></span>
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                    </div>
                        </div>
                      </div>
                    </div>
                    <div style="float: right;" class="card-footer ">
	                  <button type="submit" class="btn btn-fill btn-rose">Submit<div class="ripple-container"></div></button>
	                </div>
                  </form>
                </div>
              </div>
            </div>

@endsection


