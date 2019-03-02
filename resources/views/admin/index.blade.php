<!DOCTYPE html>
<html>
    @include('admin.layouts.header')
    <body>

        @include('admin.layouts.nav')
        @include('admin.layouts.message')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <small>{{$title}}</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                @include('admin.layouts.message')
                @yield('content')
            </section>
        </div>

        @include('admin.layouts.footer')
    </body>

</html>