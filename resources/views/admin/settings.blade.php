@extends('admin.index')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $title }}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form method="post" action="{{adminUrl('website/settings')}}" enctype="multipart/form-data">
                {{csrf_field()}}
            <div class="form-group">
                <label>{{__('admin.sitename_ar')}}</label>
                <input type="text" name="sitename_ar" class="form-control">

            </div>
            <div class="form-group">
                <label>{{__('admin.sitename_en')}}</label>
                <input type="text" name="sitename_en" class="form-control">
            </div>
            <div class="form-group">
                <label>{{__('admin.email')}}</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>{{__('admin.logo')}}</label>
                <input type="file" name="logo" class="form-control">
            </div>
            <div class="form-group">
                <label>{{__('admin.icon')}}</label>
                <input type="file" name="icon" class="form-control">
            </div>
            <div class="form-group">
                <label>{{__('admin.description')}}</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>{{__('admin.keywords')}}</label>
                <textarea name="keywords" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>{{__('admin.main_lang')}}</label>
                <select name="main_lang" class="form-control">
                    <option value="ar">{{trans('admin.ar')}}</option>
                    <option value="en">{{trans('admin.en')}}</option>
                </select>

            </div>
            <div class="form-group">
                <label>{{__('admin.status')}}</label>
                <select name="status" class="form-control">
                    <option value="open">{{trans('admin.open')}}</option>
                    <option value="close">{{trans('admin.closed')}}</option>
                </select>

            </div>
            <div class="form-group">
                <label>{{__('admin.message_maintenance')}}</label>
                <textarea name="message_maintenance" class="form-control"></textarea>
            </div>
            {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
            </form>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection