<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    {{-- <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('css/style.css') }}" type="text/css"> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @vite([
        'public/css/bootstrap.min.css',
        'public/css/font-awesome.min.css',
        'public/css/elegant-icons.css',
        'public/css/magnific-popup.css',
        'public/css/nice-select.css',
        'public/css/owl.carousel.min.css',
        'public/css/slicknav.min.css',
        'public/css/style.css',
    ])
    @vite(['resources/js/addTocart.js', 'resources/js/app.js'])
    <style>
        .header__top{
            background: #2196f3 !important;
        }

        header a::after{
            background: #2196f3 !important;
        }

        a.active{
            border-color: #2196f3 !important;
        }

        #pay{
            max-width: 200px;
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            @auth
                <div class="offcanvas__top__hover">
                    <span>Bonjour, {{ Auth::user()->fname }} <i class="arrow_carrot-down"></i></span>
                    <ul>
                        <li><a style="color:white;" href="{{ url('/profile') }}">profil</a></li>
                        <li><a style="color:white;" href="{{ url('/mesetudes') }}">Mes études</a></li>
                        <li> <a style="color:white;" href="{{ url('/mesformations') }}">Mes formation</a></li>
                        <li>
                            <form action="{{ url('/logout') }}" method="post">
                                @csrf
                                <button type="submit" style="background:transparent; color:white; border:none; outline: none;">Se déconnecter</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <div class="offcanvas__links">
                    <a href="{{ url('/login') }}">Se connecter</a>
                    <a href="{{ url('/register') }}">Registre</a>
                </div>
            @endauth
        </div>
        <div class="offcanvas__nav__option">
            <a href="{{ url('/cart') }}"><img src="{{ url('img/icon/cart.png') }}" alt=""> <span class="itemscounter">0</span></a>
            <div class="price pricetop">0.00 DH</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Libérez votre potentiel, embrassez l'excellence.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Libérez votre potentiel, embrassez l'excellence.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            @auth 
                                <div class="header__top__hover">
                                    <span>Bonjour, {{ Auth::user()->fname }} <i class="arrow_carrot-down"></i></span>
                                    <ul>
                                        <li><a style="color:black;" href="{{ url('/profile') }}">profil</a></li>
                                        <li><a style="color:black;" href="{{ url('/mesetudes') }}">Mes études</a></li>
                                        <li><a style="color:black;" href="{{ url('/mesformations') }}">Mes formation</a></li>
                                        <li>
                                            <form action="{{ url('/logout') }}" method="post">
                                                @csrf
                                                <button type="submit" style="background:transparent; border:none; outline: none;">Se déconnecter</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @else 
                                <div class="header__top__links">
                                    <a href="{{ url('/login') }}">Se connecter</a>
                                    <a href="{{ url('/register') }}">Registre</a>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="{{ url('/') }}"><img src="{{ url('img/logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="{{ url('/') }}">Accueil</a></li>
                            <li><a href="{{ url('/etudes') }}">Études</a></li>
                            <li><a href="{{ url('/formations') }}">Formations</a></li>
                            <li><a href="{{ url('/contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="{{ url('/cart') }}"><img src="{{ url('img/icon/cart.png') }}" alt=""> <span class="itemscounter">0</span></a>
                        <div class="price pricetop">0.00 DH</div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

    @yield('body')

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="{{url('/')}}"><img src="{{ url('img/footer-logo.png') }}" alt=""></a>
                        </div>
                        <p>Notre modèle économique unique met le client au cœur, intégrant la conception.</p>
                        <a href="#"><img id="pay" src="{{ url('assets/images/payment.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Liens</h6>
                        <ul>
                            <li><a href="{{ url('/') }}">Accueil</a></li>
                            <li><a href="{{ url('/etudes') }}">Études</a></li>
                            <li><a href="{{ url('/formations') }}">Formations</a></li>
                            <li><a href="{{ url('/contact') }}">Contact</a></li>
                            <li><a href="{{ url('/cgv') }}">CGV</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Trouve nous</h6>
                        <ul>
                            <li><a href="https://m.facebook.com/p/BeT-Advisory-100072101675924">Facebook</a></li>
                            <li><a href="https://www.linkedin.com/company/bet-advisory">LinkedIn</a></li>
                            <li><a href="mailto:office@bet-advisory.com">Email</a></li>
                            <li><a href="tel:+212 661328113">Téléphone</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewLetter</h6>
                        <div class="footer__newslatter">
                            <p>Soyez informés ! Abonnez-vous pour tout savoir !</p>
                            <form action="{{ url('/newsletter') }}" method="POST">
                                @csrf
                                <input type="email" name="email" placeholder="Votre email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script> 2020
                            All rights reserved | This template is made with <i style="color: #2196f3;" class="fa fa-heart-o"
                            aria-hidden="true"></i> by <a style="color: #2196f3;" href="https://colorlib.com" target="_blank">Colorlib</a>
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    {{-- <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script> --}}
    <!-- Js Plugins -->
    {{-- <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ url('js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ url('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ url('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ url('js/jquery.slicknav.js') }}"></script>
    <script src="{{ url('js/mixitup.min.js') }}"></script>
    <script src="{{ url('js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('js/main.js') }}"></script> --}}
    @vite([
        // 'public/js/jquery-3.3.1.min.js',
        'public/js/bootstrap.min.js',
        'public/js/jquery.nice-select.min.js',
        'public/js/jquery.nicescroll.min.js',
        'public/js/jquery.magnific-popup.min.js',
        'public/js/jquery.countdown.min.js',
        'public/js/jquery.slicknav.js',
        'public/js/mixitup.min.js',
        'public/js/owl.carousel.min.js',
        'public/js/main.js',
    ])
</body>

</html>