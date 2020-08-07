@extends('layouts.admin')

@section('custom_head')

@endsection

@section('content')
<?php 
use App\User;

  $users = User::all();
   $usersssss = [
    array('name' => 'Isa', 'age' => 18, 'id'=> 1),
    array('name' => 'Parim', 'age' => 18, 'id'=> 2),
    array('name' => 'Diart', 'age' => 17, 'id'=> 3),
   ];
 ?>
<!-- Button trigger modal -->
<button class="btn btn-rose btn-fill" onclick="demo.showSwal('success-message')">Try me!<div class="ripple-container"></div></button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

{{-- @foreach($users as $user)
  <p>{{$user['name']}} eshte: {{$user['id']}} <button onclick="showModal({{$user->id}},  '{{$user->name}}')" class="btn btn-success">Ndrysho</button></p>
@endforeach --}}
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
     <div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;">
      <div class="swal2-header">
          <ul class="swal2-progresssteps" style="display: none;"></ul>
          <div class="swal2-icon swal2-error" style="display: none;"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div>
          <div class="swal2-icon swal2-question" style="display: none;"><span class="swal2-icon-text">?</span></div>
          <div class="swal2-icon swal2-warning swal2-animate-warning-icon" style="display: flex;"><span class="swal2-icon-text">!</span></div>
          <div class="swal2-icon swal2-info" style="display: none;"><span class="swal2-icon-text">i</span></div>
          <div class="swal2-icon swal2-success" style="display: none;">
              <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
              <div class="swal2-success-ring"></div>
              <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
              <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
          </div><img class="swal2-image" style="display: none;">
          <h2 class="swal2-title" style="display: flex;">Are you sure?</h2><button type="button" class="swal2-close" style="display: none;">×</button>
      </div>
      <div class="swal2-content">
          <div id="swal2-content" style="display: block;">You won't be able to revert this!</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;">
      </div>
        <div class="swal2-actions" style="display: flex;"><button type="button" class="swal2-confirm btn btn-success" aria-label="">Yes, delete it!</button>   
          <button type="button" data-dismiss="modal" class="swal2-cancel btn btn-danger" aria-label="" style="display: inline-block;">Cancel</button>
        </div>
        </div>
    </div>
  </div>

     {{--   <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger waves-effect remove-data-from-delete-form">Delete</button>
 --}}

@endsection
<script type="text/javascript">
  function showModal(id, name) {
     $('#exampleModal').modal('show'); 
     $('#user-name').text("Are you sure you want to delete: "+ name);
  }
</script>
