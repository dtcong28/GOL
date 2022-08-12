<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="/template/admin/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        @include('layout.navbar')
        @include('layout.siderbar')
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        
        @include('layout.footer')
    </div>
</body>