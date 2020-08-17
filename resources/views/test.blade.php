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
{{-- <button class="btn btn-rose btn-fill" onclick="demo.showSwal('success-message')">Try me!<div class="ripple-container"></div></button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> --}}

<!-- Modal -->
{{--   <div id="exampleModal" class="modal modal-danger fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog" style="width:55%;">
          <div class="modal-content">
               <form action="" method="POST" id="editForm" class="remove-record-model">
                @csrf
                @method('PATCH')
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title text-center" id="modalLabel">Delete User</h4>
              </div>
              <div id="message" class="modal-body">
                <input id="name-input" type="text" name="name" class="form-control">
                <input id="id-input" type="text" name="name" class="form-control">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger waves-effect remove-data-from-delete-form">Delete</button>
              </div>

               </form>
          </div>
      </div>
  </div> --}}

     {{--   <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger waves-effect remove-data-from-delete-form">Delete</button>
 --}}
     {{-- <input  type='button' class="btn btn-rose" value='Fetch all records' id='fetchAllRecord'> --}}

 
     <!-- Script -->
     <div style="display: none;" class="alert alert-danger" id="notify" >
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span id="notifyText">
                      </span>
    </div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- jQuery CDN -->
 
     <div class="container-fluid">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-rose">
                    <div class="card-icon">
                      <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title ">Simple Table</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table" id='userTable' style='border-collapse: collapse;'>
                        <thead class=" text-primary">
                          <tr><th>
                            ID
                          </th>
                          <th>
                            Name
                          </th> 
                          <th>
                            E-mail
                          </th>
                          <th>
                            Delete
                          </th>
                        </tr></thead>
                          @foreach($users as $user)
                        <tbody>
                          <td>{{$user->id}}</td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td><button class="btn btn-danger">Delete</button></td>
                        </tbody>
                          @endforeach
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script type="text/javascript">
            $('table tbody tr').each(function(){
              $(this).find()
            });
        </script>
    <!--  <script type='text/javascript'>
    $(document).ready(function(){
        // function fetchRecords(id) {
       
         $.ajax({
        url: 'getData/'+0,
        type: 'get',
        dataType: 'json',
        success: function(response){
     
          var len = 0;
          $('#userTable tbody').empty(); // Empty <tbody>
          if(response['data'] != null){
            len = response['data'].length;
          }
     
          if(len > 0){
            for(var i=0; i<len; i++){
              var id = response['data'][i].id;
              var name = response['data'][i].name;
              var email = response['data'][i].email;
     
              var tr_str = "<tr id='changeLine"+id+"'>" +
                  "<td >" + id + "</td>" +
                  "<td >" + name + "</td>" +
                  "<td >" + email + "</td>" +
                  "<td >" + "<button onclick=deleteUser("+ id + ',' +"'"+name+"') class='btn btn-danger'>Delete</button>" + "</td>" +
              "</tr>";
     
              $("#userTable tbody").append(tr_str);
            }
          }else if(response['data'] != null){
             var tr_str = "<tr>" +
                 "<td >1</td>" +
                 "<td >" + response['data'].name + "</td>" +
                 "<td >" + response['data'].email + "</td>" +
             "</tr>";
     
             $("#userTable tbody").append(tr_str);
          }else{
             var tr_str = "<tr>" +
                 "<td align='center' colspan='4'>No record found.</td>" +
             "</tr>";
     
             $("#userTable tbody").append(tr_str);
          }
        }
      });
     
        // }
      // Fetch all records
      // $('#fetchAllRecord').click(function(){
      //        fetchRecords(0);
      //        $(this).hide();
      // });
        
    });
     
    </script>
        <script type="text/javascript">
     function showNotificationn(from, align, name){
    
             $.notify({
                 icon: "add_alert",
                 message:  name + "Was Deleted Successfully "
    
             },{
                 type: 'danger',
                 timer: 5000,
                 placement: {
                     from: from,
                     align: align
                 }
             });
             }
    
       function deleteUser(id, name){
             $.ajax({
             url: 'test/' + id ,
             type: 'DELETE',
             data: {
                 "_token": "{{ csrf_token() }}",
             },
             cache: false,
             dataType: 'json',
             success: function(data) {
             /*  $("#notify").show().delay(2000).queue(function(n) {
               $(this).hide(); n();
               });*/
               // $('#notifyText').text(name + ' was deleted Successfuly');
               $('#changeLine' + id).hide();
                showNotificationn('top','right', name);
    
             
                
             },
             error: function(error) {
                 console.log(error);
             }
         });
       }
     </script> -->


@endsection
{{-- <script type="text/javascript">
  function editModal(id, name) {
     var url = '{{route('adminuser.index' )}}/'+id;
     $('#exampleModal').modal('show'); 
     $('#editModalForm').attr('action', url);
     $('#user-name').text("Are you sure you want to delete: "+ name);
     $('#name-input').attr('value', name);
     $('#id-input').attr('value', id);
  }
</script>



 function deleteUser(id, name){
          var url = '{{route('adminuser.index' )}}/'+id;
           $('#applicantDeleteModal').modal('show'); 
           $('#deleteForm').attr('action', url);
           $('#form').attr('action', url);
           $('#message').text('Are u sure you want to delete: ' + name);
           $('#modalLabel').text('User: ' + id);
 --}}




