@extends('admin.index')

@section('content')
@if(session()->has('success'))
    <p class="alert alert-success ">{{session('success')}}</p>
@endif

    <form class="col-lg-6 col-lg-offset-2" method="post" action="{{route('departments.store')}}" >
        {{ csrf_field() }}
        <div class="form-group">
            <label>{{__('admin.city_name_ar')}}</label>

            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                </div>
                <input type="text" required class="form-control" name="city_name_ar" value="{{old('city_name_ar')}}" placeholder="">
            </div>
            @if($errors->has('city_name_ar'))
                <p class="alert alert-danger error"><i class="fa fa-warning "></i>  {{$errors->first('city_name_ar')}}</p>
            @endif
        </div>

        <div class="form-group">
            <label>{{__('admin.city_name_en')}}</label>
            <div class="input-group ">
                <div class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </div>
                <input type="text" required class="form-control " name="city_name_en" value="{{old('city_name_en')}}">
            </div>
            @if($errors->has('city_name_en'))
                <p class="alert alert-danger error"><i class="fa fa-warning "></i> {{$errors->first('city_name_en')}}</p>
           @endif
        </div>
        <div class="form-group">
            <label>Select</label>
            <select class="form-control" name="country_id">
                @foreach($countries as $country)
                    <option value="{{$country->id}}">{{session('lang')=='ar'?$country->country_name_ar:$country->country_name_en}}</option>
                @endforeach

            </select>
        </div>
        @if($errors->has('country_id'))
            <p class="alert alert-danger error"><i class="fa fa-warning "></i> {{$errors->first('country_id')}}</p>
        @endif



            <button type="submit" class="btn btn-primary">{{__('admin.submit')}}</button>
        <a href="{{url(adminUrl('departments'))}}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{__('admin.back')}}</a>

    </form>







@endsection