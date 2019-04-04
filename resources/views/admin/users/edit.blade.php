@extends('admin.index')

@section('content')
@if(session()->has('success'))
    <p class="alert alert-success ">{{session('success')}}</p>
@endif

    <form class="col-lg-6 col-lg-offset-2" method="post" action="{{route('user.update',$item->id)}}">
        {{ csrf_field() }}
        {{method_field('Patch')}}
        <div class="form-group">

            <label>Username:</label>

            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                </div>
                <input type="text" required class="form-control" name="name" value="{{$item->name}}" placeholder="username">
            </div>
            @if($errors->has('name'))
                <p class="alert alert-danger error"><i class="fa fa-warning "></i>  {{$errors->first('name')}}</p>
            @endif
        </div>

        <div class="form-group">

            <label>Email</label>

            <div class="input-group ">
                <div class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </div>
                <input type="email" required class="form-control " name="email" value="{{$item->email}}">
            </div>
            @if($errors->has('email'))
                <p class="alert alert-danger error"><i class="fa fa-warning "></i> {{$errors->first('email')}}</p>
          @endif
        </div>


        <div class="form-group">
            <label>{{__('admin.level')}}</label>
            <select name="level" value="{{old('level')}}" class="form-control select2" style="width: 100%;">
                <option selected disabled>choose</option>
                <option value="user" @if($item->level=='user') selected @endif>{{__('admin.user')}}</option>
                <option value="vendor" @if($item->level=='vendor') selected @endif>{{__('admin.vendor')}}</option>
                <option value="company" @if($item->level=='company') selected @endif>{{__('admin.company')}}</option>
            </select>
            @if($errors->has('level'))
                <p class="alert alert-danger error"><i class="fa fa-warning "></i> {{$errors->first('level')}}</p>
            @endif
        </div>

        <div class="form-group">
            <label>Password</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-key"></i>
                </div>
                <input type="text"  class="form-control" name="password" >
            </div>
            @if($errors->has('password'))
                <p class="alert alert-danger error"><i class="fa fa-warning "></i>  {{$errors->first('password')}}</p>
            @endif
        </div>

            <button type="submit" class="btn btn-primary">{{__('admin.submit')}}</button>
        <a href="{{url(adminUrl('user'))}}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Back</a>
    </form>







@endsection