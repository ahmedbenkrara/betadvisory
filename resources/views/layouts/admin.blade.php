<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/99be30e45a.js" crossorigin="anonymous"></script>
    @yield('styles')
    
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="{{ url('assets/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="{{ url('/request/list') }}" class='sidebar-link'>
                                <i class="fa-solid fa-arrow-right-arrow-left"></i>
                                <span>Ordres d'échange</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="fa-solid fa-layer-group"></i>
                                <span>Catégories</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ url('/category/list') }}">Liste</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ url('/category/create') }}">Créer</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="fa-solid fa-file-pdf"></i>
                                <span>Études</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ url('/etude/list') }}">Liste</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ url('/etude/create') }}">Créer</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="fa-solid fa-graduation-cap"></i>
                                <span>Formations</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ url('/formation/list') }}">Liste</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ url('/formation/create') }}">Créer</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <form action="{{ url('/logout') }}" method="post">
                                @csrf
                                <button type="submit" style="border:none; outline:none; background: white; width:100%;" class='sidebar-link'>
                                    <i class="fa-solid fa-power-off"></i>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            @yield('body')
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    </div>

    @yield('scripts')
</body>

</html>