@extends('admin.index')

@section('content')
@if(session()->has('success'))
    <p class="alert alert-success ">{{session('success')}}</p>
@endif

<form class="col-lg-6 col-lg-offset-2" method="post" action="{{route('countries.update',$item->id)}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{method_field('Patch')}}
    <div class="form-group">
        <label>{{__('admin.country_name_ar')}}</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-user"></i>
            </div>
            <input type="text" required class="form-control" name="country_name_ar" value="{{$item->country_name_ar}}" placeholder="">
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
            <input type="text" required class="form-control " name="country_name_en" value="{{$item->country_name_en}}" >
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
            <input type="text" required class="form-control" name="mob" value="{{$item->mob}}">
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
            <input type="text" required class="form-control" name="code" value="{{$item->code}}">
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
            <input type="file"  class="form-control" name="logo">
        </div>
        @if(Storage::disk('public')->exists($item->logo))
            <a target="_blank"  href="{{asset('storage/'.$item->logo)}}">logo</a>
        @endif
        @if($errors->has('logo'))
            <p class="alert alert-danger error"><i class="fa fa-warning "></i>  {{$errors->first('logo')}}</p>
        @endif
    </div>


    <button type="submit" class="btn btn-primary">{{__('admin.update')}}</button>
    <a href="{{url(adminUrl('countries'))}}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{__('admin.back')}}</a>

</form>







@endsection