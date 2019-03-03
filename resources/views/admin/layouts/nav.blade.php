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



        <ul class="sidebar-menu " data-widget="tree">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tachometer"></i>
                    <span>{{trans('admin.home')}}</span>
                </a>
            </li>

            <li class="active treeview">
              <ul class="treeview-menu">

                    <li class="active treeview">
                        <a href="#">
                            <i class="fa fa-users"></i> <span>{{trans('admin.admin_account')}}</span>
                            <span class="pull-right-container">
                                 <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="{{adminUrl('admin')}}"><i class="fa fa-users"></i>{{trans('admin.admin_account')}}  </a></li>
                        </ul>
                    </li>

                  <li class="active treeview">
                      <a href="#">
                          <i class="fa fa-users"></i> <span> user infi </span>
                          <span class="pull-right-container">
                                 <i class="fa fa-angle-left pull-right"></i>
                            </span>
                      </a>
                      <ul class="treeview-menu">
                          <li class="active"><a href="{{adminUrl('admin')}}"><i class="fa fa-users"></i>arabic user  </a></li>
                      </ul>
                  </li>



              </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>