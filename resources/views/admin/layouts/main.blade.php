<!DOCTYPE html>
<html lang="en">

@include('admin.layouts.header.head')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    @include('admin.modules.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('admin.modules.main-sidebar')

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->

    <!-- Footer -->
    @include('admin.layouts.footer.footer')

    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Script -->
@include('admin.layouts.script.script')

</body>
</html>
