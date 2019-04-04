<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete{{$id}}"><i class="fa fa-trash"></i></button>
<!-- Modal -->
<div id="modalDelete{{$id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{__('admin.delete')}}</h4>
      </div>
      <div class="modal-body">
      <p class="alert alert-danger">are you sure to delete<span> {{$name}}</span></p>
      </div>
      <div class="modal-footer">
      <form method="post" action="{{route('admin.destroy',$id)}}">
            {{csrf_field()}}
            {{method_field('delete')}}
            <button type="submit" class="btn btn-primary">{{__('admin.yes')}}</button>
            <button  type="button" class="btn btn-secondary" data-dismiss="modal">{{__('admin.no')}} </button>
      </form>
            
      </div>
    </div>

  </div>
</div>

