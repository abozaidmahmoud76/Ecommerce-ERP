@extends('admin.index')

@section('content')
@if(session()->has('success'))
    <p class="alert alert-success ">{{session('success')}}</p>
@endif

    <form class="col-lg-6 col-lg-offset-2" method="post" action="{{route('countries.store')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label>{{__('admin.country_name_ar')}}</label>

            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                </div>
                <input type="text" required class="form-control" name="country_name_ar" value="{{old('country_name_ar')}}" placeholder="">
            </div>
            @if($errors->has('country_name_ar'))
                <p class="alert alert-danger error"><i class="fa fa-warning "></i>  {{$errors->first('country_name_ar')}}</p>
            @endif
        </div>

        <div class="form-group">
            <label>{{__('admin.country_name_en')}}</label>
            <div class="input-group ">
                <div class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </div>
                <input type="text" required class="form-control " name="country_name_en" value="{{old('country_name_en')}}">
            </div>
            @if($errors->has('country_name_en'))
                <p class="alert alert-danger error"><i class="fa fa-warning "></i> {{$errors->first('country_name_en')}}</p>
          @endif
        </div>
        <div class="form-group">
            <label>{{__('admin.mob')}}</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-key"></i>
                </div>
                <input type="text" required class="form-control" name="mob">
            </div>
            @if($errors->has('mob'))
                <p class="alert alert-danger error"><i class="fa fa-warning "></i>  {{$errors->first('mob')}}</p>
            @endif
        </div>

        <div class="form-group">
            <label>{{__('admin.code')}}</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-key"></i>
                </div>
                <input type="text" required class="form-control" name="code">
            </div>
            @if($errors->has('code'))
                <p class="alert alert-danger error"><i class="fa fa-warning "></i>  {{$errors->first('code')}}</p>
            @endif
        </div>

        <div class="form-group">
            <label>{{__('admin.logo')}}</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-key"></i>
                </div>
                <input type="file" required class="form-control" name="logo">
            </div>
            @if($errors->has('logo'))
                <p class="alert alert-danger error"><i class="fa fa-warning "></i>  {{$errors->first('logo')}}</p>
            @endif
        </div>


            <button type="submit" class="btn btn-primary">{{__('admin.submit')}}</button>
        <a href="{{url(adminUrl('countries'))}}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{__('admin.back')}}</a>

    </form>







@endsection