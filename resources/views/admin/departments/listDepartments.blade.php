@extends('admin.index')


@push('css')
@endpush

@section('content')
<div class="main_div hidden">
    <a href="" class="btn btn-default editdep ">edit</a>
    <a href="" class="btn btn-dabger deldep ">delete</a>
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
        'data' :{!! load_department() !!}
    },
    "checkbox" : {
        "keep_selected_style" : true
    },
    "plugins" : [ "wholerow", "radio" ]
});

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
                }else{
                    alert('else');
                    $('.main_div').addClass('hidden');
                }
                $('.parent_id').val(data.instance.get_node(data.selected).id);

        });
});

</script>
@endpush

