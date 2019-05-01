@extends('admin.index')

@section('content')
@if(session()->has('success'))
    <p class="alert alert-success ">{{session('success')}}</p>
@endif

<form class="col-lg-6 col-lg-offset-2" method="post" action="{{route('states.update',$item->id)}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{method_field('Patch')}}
    <div class="form-group">
        <label>{{__('admin.state_name_ar')}}</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-user"></i>
            </div>
            <input type="text" required class="form-control" name="state_name_ar" value="{{$item->state_name_ar}}" placeholder="">
        </div>
        @if($errors->has('state_name_ar'))
            <p class="alert alert-danger error"><i class="fa fa-warning "></i>  {{$errors->first('state_name_ar')}}</p>
        @endif
    </div>

    <div class="form-group">
        <label>{{__('admin.state_name_en')}}</label>
        <div class="input-group ">
            <div class="input-group-addon">
                <i class="fa fa-envelope"></i>
            </div>
            <input type="text" required class="form-control " name="state_name_en" value="{{$item->state_name_en}}" >
        </div>
        @if($errors->has('state_name_en'))
            <p class="alert alert-danger error"><i class="fa fa-warning "></i> {{$errors->first('state_name_en')}}</p>
        @endif
    </div>


    <div class="form-group">
        <label>{{__('admin.countries')}}</label>
        <select class="form-control country" name="country_id">
            @foreach($countries as $country)
                <option value="{{$country->id}}" @if($item->country_id==$country->id) selected @endif> {{session('lang')=='ar'?$country->country_name_ar:$country->country_name_en}}</option>
            @endforeach

        </select>
    </div>
    @if($errors->has('country_id'))
        <p class="alert alert-danger error"><i class="fa fa-warning "></i> {{$errors->first('country_id')}}</p>
    @endif

    <div class="form-group">
        <label>{{__('admin.cities')}}</label>
        <div class="city"> </div>
    </div>
    @if($errors->has('city_id'))
        <p class="alert alert-danger error"><i class="fa fa-warning "></i> {{$errors->first('city_id')}}</p>
    @endif

    <button type="submit" class="btn btn-primary">{{__('admin.update')}}</button>
    <a href="{{url(adminUrl('states'))}}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{__('admin.back')}}</a>

</form>
@endsection

@push('js')
    <script>
        $('.country').on('change',function (){
            $.ajax({
                url:'{{adminUrl("states/create")}}',
                type:'get',
                dataType:'html',
                data:{country_id:$(this).val()},
                success:function (data) {
                    $('.city').html(data);
                },
                error:function (err) {
                    alert('errorr');
                }
            });
        });


        @if(isset($item->country_id))
        $.ajax({
            url:'{{adminUrl("states/create")}}',
            type:'get',
            dataType:'html',
            data:{country_id:'{{$item->country_id}}',select:"{{$item->city_id}}"},
            success:function (data) {
                $('.city').html(data);
            },
            error:function (err) {
                alert('errorr');
            }
        });

        @endif
    </script>
@endpush