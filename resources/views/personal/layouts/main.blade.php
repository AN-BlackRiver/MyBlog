<!DOCTYPE html>
<html lang="en">

@include('admin.layouts.header.head')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    @include('personal.modules.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('personal.modules.main-sidebar')

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->

    <!-- Footer -->
    @include('personal.layouts.footer.footer')

    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Script -->
@include('personal.layouts.script.script')

</body>
</html>
