

<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        @include('admin.layouts.menu')
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('design/AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{admin()->user()->name}} </p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>

        <ul class="sidebar-menu" data-widget="tree">
{{--القائمه الرئيسيه--}}
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>{{__('admin.home')}} </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{adminUrl('website/settings')}}"><i class="fa fa-circle-o"></i>{{__('admin.settings')}}</a></li>
                </ul>
            </li>
{{--حساب المشرفين--}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>{{__('admin.admin_account')}}</span>
                    <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                    <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                    <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                    <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                </ul>
            </li>
{{--حساب الاعضاء--}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>{{__('admin.users')}}</span>
                    <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{adminUrl('user')}}"><i class="fa fa-circle-o"></i> {{__('admin.users')}}</a></li>
                    <li><a href="{{adminUrl('user?level=user')}}"><i class="fa fa-circle-o"></i> {{__('admin.user')}}</a></li>
                    <li><a href="{{adminUrl('user?level=vendor')}}"><i class="fa fa-circle-o"></i> {{__('admin.vendor')}}</a></li>
                    <li><a href="{{adminUrl('user?level=company')}}"><i class="fa fa-circle-o"></i> {{__('admin.company')}} </a></li>
                </ul>
            </li>
 {{-- الدول --}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>{{__('admin.countries')}}</span>
                    <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{adminUrl('countries')}}"><i class="fa fa-flag"></i> {{__('admin.conturies')}}</a></li>
                    <li><a href="{{adminUrl('countries/create')}}"><i class="fa fa-plus"></i> {{__('admin.Add')}}</a></li>
                </ul>
            </li>

            {{-- المدن --}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>{{__('admin.cities')}}</span>
                    <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{adminUrl('cities')}}"><i class="fa fa-flag"></i> {{__('admin.cities')}}</a></li>
                    <li><a href="{{adminUrl('cities/create')}}"><i class="fa fa-plus"></i> {{__('admin.Add')}}</a></li>
                </ul>
            </li>

            {{-- المناطق والاحياء --}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>{{__('admin.states')}}</span>
                    <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{adminUrl('states')}}"><i class="fa fa-flag"></i> {{__('admin.states')}}</a></li>
                    <li><a href="{{adminUrl('states/create')}}"><i class="fa fa-plus"></i> {{__('admin.Add')}}</a></li>
                </ul>
            </li>

            {{--  الاقسام --}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>{{__('admin.departments')}}</span>
                    <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{adminUrl('departments')}}"><i class="fa fa-flag"></i> {{__('admin.departments')}}</a></li>
                    <li><a href="{{adminUrl('departments/create')}}"><i class="fa fa-plus"></i> {{__('admin.Add')}}</a></li>
                </ul>
            </li>


            {{--  الاقسام --}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>{{__('admin.tradebrands')}}</span>
                    <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{adminUrl('tradebrands')}}"><i class="fa fa-flag"></i> {{__('admin.tradebrands')}}</a></li>
                    <li><a href="{{adminUrl('tradebrands/create')}}"><i class="fa fa-plus"></i> {{__('admin.Add')}}</a></li>
                </ul>
            </li>







        </ul>


    </section>
    <!-- /.sidebar -->
</aside>