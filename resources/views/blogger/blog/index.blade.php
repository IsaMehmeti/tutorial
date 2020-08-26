@extends('layouts.admin')
@section('page_name','View My Posts')

@section('content')
			<div class="row">
				@foreach($blogs->chunk(3) as $blogsChunks)

				@foreach($blogsChunks as $blog)
              <div class="col-md-4">
                <div class="card card-product">
                  <div class="card-header card-header-image" data-header-animation="true">
                       @if(file_exists( public_path() . '/images/blogs/'.$blog->image))
                      <img class="img" src="{{asset('/images/blogs/'.$blog->image)}}">
                      @else
                      <img class="img" src="../assets/img/clint-mckoy.jpg">
                      @endif		
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="card-actions text-center">
                      <button type="button" class="btn btn-danger btn-link fix-broken-card">
                        <i class="material-icons">build</i> Fix {{$blog->title}}!
                      </button>
                     
                      <button onclick="edit({{$blog->id}},'{{$blog->title}}', '{{$blog->desc}}')" data-id="{{$blog->id}}" data-title="{{$blog->title}}" data-desc="{{$blog->desc}}" type="button" class="btn btn-success btn-link edit" rel="tooltip" data-placement="bottom" title="Edit">
                        <i class="material-icons">edit</i>
                      </button>
                      <button onclick="deleteBlog({{$blog->id}},'{{$blog->title}}')" data-id="{{$blog->id}}" data-name="{{$blog->title}}" type="button" class="btn btn-danger btn-link delete" rel="tooltip" data-placement="bottom" title="Remove">
                        <i class="material-icons">close</i>
                      </button>
                    </div>
                    <h4 class="card-title" id="titleText{{$blog->id}}">
                      {{$blog->title}}
                    </h4>
                    <div class="card-description" id="descText{{$blog->id}}">
                      {{$blog->desc}}
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="price">
                      <h4>{{$blog->date}}</h4>
                    </div>
                  </div>
                </div>
              </div>
           	@endforeach
           @endforeach
          </div>
              

{{-- Modal Edit --}}
      
<div id="blogEditModal" class="modal modal-danger fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <form action="" id="deleteForm" method="POST">
        @method('delete')
        @csrf
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title text-center" id="modalLabel">Edit Blog</h4>
                </div>
                <div id="message" class="modal-body">
                  <div class="form-group bmd-form-group">
                      <label for="exampleEmail" class="bmd">Title</label>
                      <input type="text" name="title" class="form-control" id="title" value="">
                    </div>
                    <div class="form-group bmd-form-group">
                      <label for="exampleEmail" class="bmd">Description</label>
                      <textarea type="text" name="desc" class="form-control" id="desc"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button id="submitEdit" type="button" class="btn btn-success waves-effect remove-data-from-delete-form">Edit</button>
                </div>
            </div>
        </div>
    </form>
</div>

{{-- End of - Modal Edit --}}
{{-- Modal Delete --}}
      
<div id="blogDeleteModal" class="modal modal-danger fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <form action="" method="POST">
        @method('delete')
        @csrf
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title text-center" id="modalLabel">Delete Blog</h4>
                </div>
                <div id="message" class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect remove-data-from-delete-form">Delete</button>
                </div>
            </div>
        </div>
    </form>
</div>

{{-- End of - Modal Delete --}}
@endsection
  
  @section('custom_footer')

    <script type="text/javascript">
          //delete data modal   
          function deleteBlog(id, name){
          var url = '{{route('bloggerblog.index')}}' + '/'+id;
           $('form').attr('action', url);
           $('#message').html('Are u sure you want to delete: <strong>' + name + '</strong>');
           $('#blogDeleteModal').modal('show'); 
        }
        //Notify User
          function showNotificationn(from, align){

            $.notify({
                icon: "add_alert",
                message:  name + " Edited Successfully "

            },{
                type: 'success',
                timer: 5000,
                placement: {
                    from: from,
                    align: align
                }
            });
            }

          //edit data modal-ajax
          function edit(id, title, desc){
            var url = '{{ route('bloggerblog.index') }}';
            $('#blogEditModal').modal('show'); 
            $('#title').val(title);
            $('#desc').val(desc);
           $('#submitEdit').on('click', function(){
            
            $.ajax({
                    type: "PUT",
                    url: 'blog/'+ id,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        title: $("#title").val(),
                        desc: $("#desc").val(),
                    },
                    cache: false,
                    success: function(data){
                       var myJSON = new Array(JSON.stringify(data));
                       var obj = JSON.parse(myJSON);
                        console.log(data.title);
                       $('#titleText'+ id).text(data.title);
                       $('#descText'+ id).html(data.desc);
                       $('[data-id="'+id+'"]').data('title', data.title);
                       $('[data-id="'+id+'"]').data('desc', data.desc);
                       $("#blogEditModal").modal('hide');
                       showNotificationn('top','right');

                    }
                });
                
           });

          }

    </script>
  @endsection

