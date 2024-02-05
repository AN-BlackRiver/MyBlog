<header class="edica-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="index.html"><img src="{{'assets/images/logo.svg'}}" alt="Edica"></a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav"
                    aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="edicaMainNav">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{route('main.index')}}" id="blogDropdown" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Блог</a>
                        <div class="dropdown-menu" aria-labelledby="blogDropdown">
                            <a class="dropdown-item" href="blog.html">Blog Archive</a>
                            <a class="dropdown-item" href="blog-single.html">Blog Post</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav mt-2 mt-lg-0">
                    <li class="nav-item">
                        <form method="post" action="{{route('logout')}}">
                            @csrf
                            <input type="submit" class="btn btn-outline-secondary" value="Выход">
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
