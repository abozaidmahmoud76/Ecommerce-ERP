@extends('admin.index')

@section('style_css')
    <link rel="stylesheet" href="{{ asset('design/admin/css/upload_style.css')}}">
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ __('admin.settings') }}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form method="post" action="{{adminUrl('website/settings')}}" enctype="multipart/form-data">
                {{csrf_field()}}
            <div class="form-group">
                <label>{{__('admin.sitename_ar')}}</label>
                <input type="text" name="sitename_ar" value="{{@$item->sitename_ar}}" class="form-control">

            </div>
            <div class="form-group">
                <label>{{__('admin.sitename_en')}}</label>
                <input type="text" name="sitename_en"  value="{{@$item->sitename_en}}" class="form-control">
            </div>
            <div class="form-group">
                <label>{{__('admin.email')}}</label>
                <input type="email" name="email" value="{{@$item->email}}" class="form-control">
            </div>
                <div class="form-group">
                    <div class="file-upload btn btn-primary">
                        <span> <label>{{__('admin.logo')}}</label></span>
                        <input type="file" name="logo" id="FileAttachment" class="upload" />
                    </div>
                    <input type="text" id="fileuploadurl" readonly placeholder="Maximum file size is 5mb">
                    {{--@if(Storage::disk('public')->exists(@$item->logo))--}}

                    @if(Storage::disk('public')->exists(@$item->logo))
                        <a target="_blank"  href="{{asset('storage/'.$item->logo)}}">Logo</a>
                    @endif
                @if($errors->has('logo'))
                    <p class="alert alert-danger error"><i class="fa fa-warning "></i>  {{$errors->first('logo')}}</p>
                    @endif
                </div>

                <div class="form-group">
                    <div class="file-upload btn btn-primary">
                        <span> <label>{{__('admin.icon')}}</label></span>
                        <input type="file" name="icon" id="FileAttachment" class="upload" />
                    </div>
                    <input type="text" id="fileuploadurl" readonly placeholder="Maximum file size is 5mb">
                    @if(Storage::disk('public')->exists(@$item->icon))
                        <a target="_blank"  href="{{asset('storage/'.$item->icon)}}">icon</a>
                    @endif

                @if($errors->has('icon'))
                    <p class="alert alert-danger error"><i class="fa fa-warning "></i>  {{$errors->first('icon')}}</p>
                    @endif
                </div>
            <div class="form-group"
                <label>{{__('admin.description')}}</label>
                <textarea name="description" class="form-control">{{@$item->description}}</textarea>
            </div>
            <div class="form-group">
                <label>{{__('admin.keywords')}}</label>
                <textarea name="keywords"  class="form-control">{{@$item->keywords}}</textarea>
            </div>
            <div class="form-group">
                <label>{{__('admin.main_lang')}}</label>
                <select name="main_lang" class="form-control">
                    <option value="ar" @if(@$item->main_lang=='ar') selected @endif>{{trans('admin.ar')}}</option>
                    <option value="en" @if(@$item->main_lang=='en') selected @endif>{{trans('admin.en')}}</option>
                </select>

            </div>
            <div class="form-group">
                <label>{{__('admin.status')}}</label>
                <select name="status" class="form-control">
                    <option value="open" @if(@$item->status=='open') selected @endif >{{trans('admin.open')}}</option>
                    <option value="close" @if(@$item->status=='close') selected @endif>{{trans('admin.closed')}}</option>
                </select>

            </div>
            <div class="form-group">
                <label>{{__('admin.message_maintenance')}}</label>
                <textarea name="message_maintenance" class="form-control">{{@$item->message_maintenance}}</textarea>
            </div>
            {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
            </form>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection

@section('js_script')
    <script>
        document.getElementById("FileAttachment").onchange = function () {
            document.getElementById("fileuploadurl").value = this.value;
        };
    </script>

@endsection