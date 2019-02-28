@extends('admin.index')

@section('content')


    <form class="col-lg-6 col-lg-offset-2" method="post" action="{{route('admin.store')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Username:</label>

            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                </div>
                <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="username">

            </div>
            <!-- /.input group -->
        </div>
        <div class="form-group">
            <label>Email</label>

            <div class="input-group ">
                <div class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </div>
                <input type="email"  class="form-control " name="email" value="{{old('name')}}">

            </div>
            <!-- /.input group -->
        </div>
        <div class="form-group">
            <label>Password</label>

            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-key"></i>
                </div>
                <input type="text" class="form-control" name="password">
            </div>
            <!-- /.input group -->
        </div>
            <button type="submit" class="btn btn-primary">{{__('admin.submit')}}</button>

    </form>







@endsection