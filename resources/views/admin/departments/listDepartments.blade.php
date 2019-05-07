@extends('admin.index')


@push('css')
@endpush

@section('content')

    @if(session()->has('success'))
        <p class="alert alert-success"><i class="fa fa-check-square "></i> {{session('success')}}</p>
    @endif

<div class="main_div hidden">
    <a href="" class="btn btn-default editdep "><i class="fa fa-edit"></i> edit</a>
    <a href="" class="btn btn-danger deldep "><i class="fa fa-trash"></i>delete</a>

</div>

<input type=hidden name="parent" class="parent_id" value="{{old('parent')}}">

<div id="jstree">
</div>



@endsection

@push('js')

<script>


$(document).ready(function () {

$('#jstree').jstree({
    "core" : {
        "themes" : {
            "variant" : "large"
        },
        'data' :{!! load_department() !!},
        "animation" : 0
    },
    "checkbox" : {
        "keep_selected_style" : false
    },
    "plugins" : [ "wholerow", "radio" ]
});



{{--$('#jstree').jstree({--}}
    {{--"core" : {--}}
        {{--"themes" : {--}}
            {{--"variant" : "large"--}}
        {{--},--}}
        {{--'data' :{!! load_department() !!},--}}
    {{--},--}}
    {{--"checkbox" : {--}}
        {{--"keep_selected_style" : false--}}
    {{--},--}}
    {{--"plugins" : [ "wholerow", "" ]--}}
{{--});--}}


$('#jstree').on('changed.jstree',function (e,data) {
                 var i,j,arr=[];
                 for(i=0,j=data.selected.length;i<j;i++){
                    arr.push(data.instance.get_node(data.selected[i]).id)
                 }
               $('.parent_id').val(data.instance.get_node(data.selected).id);
                //  $('.parent_id').val(arr.join(', '));
                if(arr>0){
                    var id=$('.parent_id').val();
                    $('.main_div').removeClass('hidden');
                    $('.editdep').attr('href','{{adminUrl("departments/")}}'+'/'+id+'/edit');
                    $('.deldep').attr('href','{{adminUrl("department/")}}'+'/'+id+'/delete');
                }else{
                    alert('else');
                    $('.main_div').addClass('hidden');
                }
                $('.parent_id').val(data.instance.get_node(data.selected).id);

        });
});

</script>
@endpush

