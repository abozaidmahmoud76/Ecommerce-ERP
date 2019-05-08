@extends('admin.index')

@section('content')
    @if(session()->has('success'))
        <p class="alert alert-success ">{{session('success')}}</p>
    @endif

    <form class="col-lg-6 col-lg-offset-2" method="post" action="{{route('tradebrands.update',$item->id)}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{method_field('patch')}}
        <div class="form-group">
            <label>{{__('admin.tradeBrand_name_ar')}}</label>

            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                </div>
                <input type="text" required class="form-control" name="brand_name_ar" value="{{$item->brand_name_ar}}" placeholder="">
            </div>
            @if($errors->has('brand_name_ar'))
                <p class="alert alert-danger error"><i class="fa fa-warning "></i>  {{$errors->first('brand_name_ar')}}</p>
            @endif
        </div>

        <div class="form-group">
            <label>{{__('admin.tradeBrand_name_en')}}</label>
            <div class="input-group ">
                <div class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </div>
                <input type="text" required class="form-control " name="brand_name_en"  value="{{$item->brand_name_en}}" >
            </div>
            @if($errors->has('brand_name_en'))
                <p class="alert alert-danger error"><i class="fa fa-warning "></i> {{$errors->first('brand_name_en')}}</p>
            @endif
        </div>



        <div class="form-group">
            <div class="file-upload btn btn-primary">
                <span> <label>{{__('admin.brand_logo')}}</label></span>
                <input type="file" name="logo" id="FileAttachment" class="upload" />
            </div>
            @if(Storage::disk('public')->exists(@$item->logo))
                <a target="_blank"  href="{{asset('storage/'.$item->logo)}}">Icon</a>
            @endif
            @if($errors->has('logo'))
                <p class="alert alert-danger error"><i class="fa fa-warning "></i>  {{$errors->first('logo')}}</p>
            @endif
        </div>


        <button type="submit" class="btn btn-primary">{{__('admin.update')}}</button>
        <a href="{{url(adminUrl('tradebrands'))}}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{__('admin.back')}}</a>

    </form>







@endsection