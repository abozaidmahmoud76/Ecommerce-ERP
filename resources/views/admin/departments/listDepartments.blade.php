@extends('admin.index')

@push('css')
<link rel="stylesheet" href="{{asset('design/admin/jstree/dist/themes/default/style.min.css')}}" />
@endpush

@section('content')

<div id=""></div>
<div id="jstree_demo_div">
  <ul>
    <li>Root node 1
    </li>
    <li>Root node 2</li>
  </ul>
</div>

@endsection

@push('js')
<script src="{{asset('design/admin/jstree/dist/jstree.min.js')}}"></script>
<script>
$(function () { $('#jstree_demo_div').jstree(); });

$('button').on('click', function () {
  $('#jstree').jstree(true).select_node('child_node_1');
  $('#jstree').jstree('select_node', 'child_node_1');
  $.jstree.reference('#jstree').select_node('child_node_1');
});

</script>
@endpush