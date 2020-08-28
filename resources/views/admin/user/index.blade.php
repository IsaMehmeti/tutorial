@extends('layouts.admin')
@section('page_name','View Users')

@section('content')
	<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">View all Users</h4>
                </div>
                <div class="card-body">
                  <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                    {{-- <button type="submit" onclick="openModal()" class="btn btn-default">Click me</button> --}}
                  </div>
                  <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Avatar</th>
                          <th>Name</th>
                          <th>E-mail</th>
                          <th>Type</th>
                          <th>Fav</th>
                          <th class="disabled-sorting text-right">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                        <tr id="row{{$user->id}}">
                          <td>{{$user->id}}</td>
                          <td>  <div class="photo">
                          @if(file_exists( public_path() . '/images/users/'.$user->image) && isset($user->image))
                          <img style="max-width: 50px" src="{{asset('/images/users/'.$user->image)}}" />
                          @else
                             <img style="max-width: 50px" src="{{ asset('../../assets/img/faces/avatar.png')}}"  />
                          @endif
                        </div></td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>

                          <td>
                            @if($user->type ==1)
                            <button id="changeStatusButton_{{$user->id}}" type="submit" onclick="changeStatus({{$user->id}},2)" class="btn btn-default">Admin</button> 
                            @elseif($user->type == 2)
                              <button id="changeStatusButton_{{$user->id}}" type="submit" onclick="changeStatus({{$user->id}},3)" class="btn btn-rose">Blogger</button>
                            @else 
                              <button id="changeStatusButton_{{$user->id}}" type="submit" onclick="changeStatus({{$user->id}},1)" class="btn btn-warning">User</button> 
                              @endif
                          </td>
                          <td> 
                             @if($user->favorite == 1)
                             <button id="changeButton_{{$user->id}}" type="submit" onclick="change({{$user->id}},0)"  class="btn btn-link btn-info btn-just-icon like"><i id="icon_{{$user->id}}" class="material-icons">favorite</i></button> 
                             @else
                              <button id="changeButton_{{$user->id}}" type="submit" onclick="change({{$user->id}},1)"  class="btn btn-link btn-info btn-just-icon like"><i id="icon_{{$user->id}}" class="material-icons icon-image-preview">favorite_border</i></button> 
                             @endif
                            
                          </td>

                          <td class="text-right">

                            @if($user->id == Auth::user()->id)
                            @else
                             <button type="submit" class="btn btn-link btn-danger btn-just-icon remove " onclick="showModal({{$user->id}},  '{{$user->name}}')" ><i class="material-icons">close</i></button>
                           @endif
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- end content-->
              </div>
              <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
          </div>
  <div id="applicantDeleteModal" class="modal modal-danger fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog" style="width:55%;">
          <div class="modal-content">
               
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title text-center" id="modalLabel">Delete User</h4>
              </div>
              <div id="message" class="modal-body">

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger waves-effect remove-data-from-delete-form">Delete</button>
              </div>

               </form>
          </div>
      </div>
  </div>
@endsection	


@section('custom_scripts')

<!-- <script>
  $('table tbody tr').each(function(){
    $(this).find()
  });
</script> -->
      <script type="text/javascript">
        //Show Modal From Delete User Button
        function showModal(id, name){
          var url = '{{route('adminuser.index' )}}/'+id;
           $('#applicantDeleteModal').modal('show'); 
           $('.remove-data-from-delete-form').attr('onclick', 'deleteUser('+id + ',' + "'"+ name + "'" + ')');
           $('#message').text('Are u sure you want to delete: ' + name);
           $('#modalLabel').text('User: ' + id);
        }
        //Nofitications After Delete
        function showNotificationn(from, align, name){

            $.notify({
                icon: "add_alert",
                message:  name + " Deleted Successfully "

            },{
                type: 'danger',
                timer: 5000,
                placement: {
                    from: from,
                    align: align
                }
            });
            }

        //deleteUserAJAX
        function deleteUser(id, name){
          var url = '{{route('adminuser.index' )}}/'+id;
          $.ajax({
               url: url,
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
                $('#row'+id).remove();
                  $('#applicantDeleteModal').find('button[data-dismiss="modal"]').click();
                 showNotificationn('top','right', name);

              
                 
              },
                                error: function(error) {
                  console.log(error);
              }
          });
        }

          //Change user Type
      function changeStatus(id, type) {
          $.ajax({
              url: '/admin/user/type/' + id + '/' + type,
              type: 'POST',
              data: {
                  "_token": "{{ csrf_token() }}",
              },
              success: function(data) {
                  var myJSON = new Array(JSON.stringify(data));
                  var obj = JSON.parse(myJSON);
                  if (type == 3) {
                      $('#changeStatusButton_' + id).attr('class', 'btn btn-warning');
                      $('#changeStatusButton_' + id).attr('onclick', 'changeStatus(' + id + ',' + 2 + ')');
                      $('#changeStatusButton_' + id).text('User');


                  } else if (type == 2) {
                      $('#changeStatusButton_' + id).attr('class', 'btn btn-rose');
                      $('#changeStatusButton_' + id).attr('onclick', 'changeStatus(' + id + ',' + 1 + ')');
                      $('#changeStatusButton_' + id).text('Blogger');

                  } else if (type == 1) {
                      $('#changeStatusButton_' + id).attr('class', 'btn btn-default');
                      $('#changeStatusButton_' + id).attr('onclick', 'changeStatus(' + id + ',' + 3 + ')');
                      $('#changeStatusButton_' + id).text('Admin');
                  }
              },
              error: function(error) {
                  console.log(error);
              }
          });
      }
      //User Favorite
      function change(id, status) {
          $.ajax({
              url: '/admin/user/favorite/' + id + '/' + status,
              type: 'POST',
              data: {
                  "_token": "{{ csrf_token() }}",
              },
              success: function(data) {
                  var myJSON = new Array(JSON.stringify(data));
                  var obj = JSON.parse(myJSON);
                  if (status == 0) {
                      $('#changeButton_' + id).attr('onclick', 'change(' + id + ',' + 1 + ')');
                      $('#icon_' + id).text('favorite_border');
                  } else if (status == 1) {
                      $('#changeButton_' + id).attr('onclick', 'change(' + id + ',' + 0 + ')');
                      $('#icon_' + id).text('favorite');
                  }
              },
              error: function(error) {
                  console.log(error);
              }
          });
      }
    </script>
 @endsection
 

