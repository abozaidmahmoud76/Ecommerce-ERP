@extends('admin.index')


@push('css')
@endpush

@section('content')

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
            'data' :" {!! load_department()  !!}"
        },
        "checkbox" : {
            "keep_selected_style" : false
        },
        "plugins" : [ "wholerow", "" ]
    });


});


</script>
@endpush

