@extends('admin.index')

@section('content')


<div class="box">
    <div class="box-header">
        <h3 class="box-title">{{$title}}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form id="formDeleteAdmin" method="post" action="{{url('admin/delete/all')}}">
            {{ csrf_field() }}
        {!! $dataTable->table([
            'class'=>'dataTable table table-bordered '
        ],true) !!}
        </form>
    </div>



    <!--Modal: modalConfirmDelete-->
    <div class="modal" id="deleteModel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3>delete <span class="item_deleted_count"></span> recorde</h3>
                </div>
                <div class="modal-body">

                    <p hidden class="alert alert-danger no_record_delete">{{__('admin.select_record_to_delete')}} </p>
                    <p hidden class="alert alert-danger record_delete">are you sure to delete <span class="item_deleted_count text-gray"></span> recorde</p>
                </div>
                <div class="modal-footer">
                    <button disabled type="button" class="btn btn-primary yes submitBtn_del"> {{__('admin.yes')}} </button>
                    <button disabled type="button" class="btn btn-secondary no" data-dismiss="modal">{{__('admin.no')}} </button>
                </div>
            </div>
        </div>
    </div>    <!--Modal: modalConfirmDelete-->




@push('js')
    {{$dataTable->scripts()}}
    <script src="{{asset('js/admin.js')}}"></script>
@endpush
</div>


@endsection