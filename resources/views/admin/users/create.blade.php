@extends('admin.index')

@section('content')
@if(session()->has('success'))
    <p class="alert alert-success ">{{session('success')}}</p>
@endif

    <form class="col-lg-6 col-lg-offset-2" method="post" action="{{route('user.store')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label>{{__('admin.name')}}</label>

            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                </div>
                <input type="text" required class="form-control" name="name" value="{{old('name')}}" placeholder="username">
            </div>
            @if($errors->has('name'))
                <p class="alert alert-danger error"><i class="fa fa-warning "></i>  {{$errors->first('name')}}</p>
            @endif
        </div>

        <div class="form-group">
            <label>{{__('admin.email')}}</label>

            <div class="input-group ">
                <div class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </div>
                <input type="email" required class="form-control " name="email" value="{{old('email')}}">
            </div>
            @if($errors->has('email'))
                <p class="alert alert-danger error"><i class="fa fa-warning "></i> {{$errors->first('email')}}</p>
          @endif
        </div>
        <div class="form-group">
            <label>{{__('admin.password')}}</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-key"></i>
                </div>
                <input type="text" required class="form-control" name="password">
            </div>
            @if($errors->has('password'))
                <p class="alert alert-danger error"><i class="fa fa-warning "></i>  {{$errors->first('password')}}</p>
            @endif
        </div>
            <button type="submit" class="btn btn-primary">{{__('admin.submit')}}</button>
        <a href="{{url(adminUrl('user'))}}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{__('admin.back')}}</a>

    </form>







@endsection