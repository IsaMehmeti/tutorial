@extends('layouts.admin')
@section('page_name', 'Test')


@section('custom_head')

@endsection

@section('content')
<?php 
use App\User;
use App\Models\Blog;

  $users = User::all();
  $blogs = Blog::all();
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
  {{-- <p id="heading"></p> --}}

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- jQuery CDN -->
    <div class="col-md-6">
              <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">mail_outline</i>
                  </div>
                  <h4 class="card-title">Stacked Form</h4>
                </div>
                <div class="card-body ">
                  {{-- <form action="{{route('test.store')}}" method="POST">
                    @csrf --}}
                    <div class="form-group bmd-form-group">
                      <label for="exampleEmail" class="bmd-label-floating"> Name</label>
                      <input type="text" id="title" name="title" class="form-control" id="exampleEmail">
                    </div>
                      {{-- <div class="form-group bmd-form-group">
                        <label for="exampleEmail" class="bmd-label-floating">Email Address</label>
                        <input type="text" id="email" name="email" class="form-control" id="exampleEmail">
                      </div>
                      <div class="form-group bmd-form-group">
                        <label for="examplePass" class="bmd-label-floating">Password</label>
                        <input type="text" id="password" name="password" class="form-control" id="examplePass">
                      </div>
                      <div class="form-group bmd-form-group">
                        <label for="examplePass" class="bmd-label-floating">Password-Confirmation</label>
                        <input type="text" id="password_confirmation" name="password-confirmation" class="form-control" id="examplePass">
                      </div>
                      <div class="form-check">
                     
                      </div> --}}
                </div>
                <div class="card-footer ">
                  <button id="insert" type="submit" class="btn btn-fill btn-rose">Submit</button>
                </div>
                {{-- </form> --}}
              </div>
            </div>
{{-- sajkdaklsdaodskasdlkjadlkajdklahjaslkh qiuodhaosdhmaoidhoaidhjmapodmoadhmadosaldjaldsj --}}


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
                          <tr>
                          <th>
                            Name
                          </th> 
                          <th>
                            Delete
                          </th>
                        </tr></thead>
                        <tbody>
                          @foreach($blogs as $blog)
                          <tr>
                          <td>{{$blog->title}}</td>
                          <td><button class="btn btn-danger">Delete</button></td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
        <script type="text/javascript">
 
              $(document).ready(function() {
                $('#insert').on('click', function() {
                  var title = $('#title').val();
                  var url = '{{route('test.store' )}}';
                  if(title!=""){
                      $.ajax({
                          url: url,
                          type: "POST",
                          data: {
                              "_token": "{{ csrf_token() }}",
                              title: title,
                          },
                          cache: false,
                          success: function(data){
                            var blog = data['blog']
                            $('tbody').prepend("<tr><td>" + title + "</td>" + "<td><button class='btn btn-danger'>Delete</button><td>" + "</tr>");
                              $("input[type=text]").val("");
                              console.log(blog['id']);
                          }
                      });
                  }
                  else{
                      showNotificationn('top','right');
                  }
              });
            });
               function showNotificationn(from, align){
    
             $.notify({
                 icon: "add_alert",
                 message:  "Type something please."
    
             },{
                 type: 'danger',
                 timer: 5000,
                 placement: {
                     from: from,
                     align: align
                 }
             });
             }
              // $('#heading').html('Height:' + e.clientY + ' Width:' + e.clientX );
              // // $(this).find('tbody td:first-child ').append('Aded from jquery');
            $('.btn-danger').on('click', function(){
              if (confirm('Are u sure')) {
                  alert('hello');
              }else{
                  alert('bye');

              }
            });

</script>
        <script type="text/javascript"></script>
           <!--  $('.table tbody tr').each(function(){
               
             $(this).find('.btn').click(function(){
               var id = $(this).parent().parent().find('.id').attr('data-id');
               console.log(id)
             })
           }); -->
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




