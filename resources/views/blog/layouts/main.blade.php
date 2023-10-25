<!DOCTYPE html>
<html lang="en">

<!--Head-->
@include('blog.layouts.header.head')
<body>

<!--Loader-->
<div class="edica-loader"></div>

<!--Navbar-->
@include('blog.modules.navbar')

<!--Content-->
@yield('content')

<!--Footer-->
@include('blog.layouts.footer.footer')

<!--Javascript-->
@include('blog.layouts.script.script')
</body>

</html>
