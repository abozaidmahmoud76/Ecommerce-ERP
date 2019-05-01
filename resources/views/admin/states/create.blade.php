@extends('admin.index')

@section('content')
@if(session()->has('success'))
    <p class="alert alert-success ">{{session('success')}}</p>
@endif
    <form class="col-lg-6 col-lg-offset-2" method="post" action="{{route('states.store')}}" >
        {{ csrf_field() }}
        <div class="form-group">
            <label>{{__('admin.state_name_ar')}}</label>

            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                </div>
                <input type="text" required class="form-control" name="state_name_ar" value="{{old('state_name_ar')}}" placeholder="">
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
                <input type="text" required class="form-control " name="state_name_en" value="{{old('state_name_en')}}">
            </div>
            @if($errors->has('state_name_en'))
                <p class="alert alert-danger error"><i class="fa fa-warning "></i> {{$errors->first('state_name_en')}}</p>
           @endif
        </div>
        <div class="form-group">
            <label>{{__('admin.countries')}}</label>
            <select class="form-control country" name="country_id" >
                <option selected disabled>...</option>
                @foreach($countries as $country)
                    <option value="{{$country->id}}" @if($country->id==old('country_id')) selected @endif>{{session('lang')=='ar'?$country->country_name_ar:$country->country_name_en}}</option>
                @endforeach

            </select>
        </div>
        @if($errors->has('country_id'))
            <p class="alert alert-danger error"><i class="fa fa-warning "></i> {{$errors->first('country_id')}}</p>
        @endif

        <div class="form-group">
            <label>{{__('admin.cities')}}</label>
            {{--<select class="form-control city" name="city_id" >--}}

            {{--</select>--}}
            <div class="city"> </div>
        </div>
        @if($errors->has('city_id'))
            <p class="alert alert-danger error"><i class="fa fa-warning "></i> {{$errors->first('city_id')}}</p>
        @endif



            <button type="submit" class="btn btn-primary">{{__('admin.submit')}}</button>
        <a href="{{url(adminUrl('states'))}}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{__('admin.back')}}</a>
    </form>
@endsection



@push('js')
    <script>
        $(document).ready(function () {


            @if(old('country_id'))
            $.ajax({
                url:'{{adminUrl("states/create")}}',
                type:'get',
                dataType:'html',
                data:{country_id:'{{old('country_id')}}',select:"{{old('city_id')}}"},
                success:function (data) {
                    $('.city').html(data);
                },
                error:function (err) {
                    alert('errorr');
                }
            });

            @endif



            $('.country').on('change',function () {
                $.ajax({
                    url:'{{adminUrl("states/create")}}',
                    type:'get',
                    dataType:'html',
                    data:{country_id:$(this).val(),select:''},
                    success:function (data) {
                        $('.city').html(data);
                    },
                    error:function (err) {
                        alert('errorr');
                    }
                });
            });
        });
    </script>
@endpush