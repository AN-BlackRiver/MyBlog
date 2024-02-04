<nav class="main-header navbar navbar-expand navbar-white navbar-light d-flex justify-content-between">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item">
            <form method="post" action="{{route('logout')}}">
                @csrf
                <input type="submit" class="btn btn-secondary" value="Выход">
            </form>
        </li>
    </ul>
</nav>
