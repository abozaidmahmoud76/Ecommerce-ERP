

    {!! settings()->message_maintenance !!}
    <div id="jquery-accordion-menu" class="jquery-accordion-menu">
        <ul>
            <li class="active"><a href="#">{{__('admin.home')}} </a>
                <ul class="submenu">
                    <li><a href="{{adminUrl('website/settings')}}">{{__('admin.settings')}}</a></li>

                </ul>

            </li>
            {{--<li><a href="#"><i class="fa fa-file-image-o"></i>Gallery </a><span class="jquery-accordion-menu-label">12 </span></li>--}}
            <li><a href="{{adminUrl('admin')}}">{{__('admin.admin_account')}} </a>
                <ul class="submenu">
                    <li><a href="#">
                            Web Design </a></li>
                    <li><a href="#">Hosting </a></li>
                    <li><a href="#">Design </a>
                        <ul class="submenu">
                            <li><a href="#">Graphics </a></li>
                        </ul>
                    </li>
                    <li><a href="#">Consulting </a></li>
                </ul>
            </li>
            <li><a href="#"> {{__('admin.users')}} </a>
                <ul class="submenu">
                    <li ><a href="{{adminUrl('user')}}">{{__('admin.users')}} </a></li>
                    <li ><a href="{{adminUrl('user?level=user')}}">{{__('admin.user')}} </a></li>
                    <li ><a href="{{adminUrl('user?level=vendor')}}">{{__('admin.vendor')}} </a></li>
                    <li><a href="{{adminUrl('user?level=company')}}">{{__('admin.company')}} </a></li>
                </ul>
            </li>
        </ul>
    </div>