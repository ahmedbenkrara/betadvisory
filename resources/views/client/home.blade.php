@extends('layouts.master')
@section('title')
    Page d'accueil | Bet Advisory
@endsection

@section('body')
<!-- Hero Section Begin -->
<section class="hero">
    <div class="hero__slider owl-carousel">
        <div class="hero__items set-bg" data-setbg="img/hero/hero-1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <h6 style="color: #2196f3;">la vente et l'échange</h6>
                            <h2>ÉtudeHub: Connecter, Vendre, Échanger</h2>
                            <p>Explorez et échangez des études de valeur sur notre plateforme dédiée, pour enrichir votre parcours éducatif en toute simplicité.</p>
                            <a style="background: #2196f3;" href="{{ url('/etudes') }}" class="primary-btn">Explorer <span class="arrow_right"></span></a>
                            <div class="hero__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero__items set-bg" data-setbg="img/hero/hero-2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <h6 style="color: #2196f3;">Maître Rapid</h6>
                            <h2>FormaÉtudes: Découvrez et Formez-vous"</h2>
                            <p>Découvrez des formations de qualité pour enrichir vos compétences et sculpter votre avenir académique sur FormaÉtudes.</p>
                            <a style="background: #2196f3;" href="{{ url('/formations') }}" class="primary-btn">Explorer <span class="arrow_right"></span></a>
                            <div class="hero__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- About Section Begin -->
<section class="about spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="about__pic">
                    <img src="https://images.unsplash.com/photo-1531403009284-440f080d1e12?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="about__item">
                    <h4 style="color: #2196f3;">Qui nous sommes ?</h4>
                    <p>BeT Advisory, expert en conseil et études économiques, propose une gamme étendue de services adaptés aux besoins des particuliers, entreprises, et collectivités locales. Notre expertise couvre le conseil économique et financier, la réalisation d'études, l'audit sur demande, l'organisation administrative, la gestion des archives, et la formation avec élaboration de plans d'action. Que vous soyez un particulier, une entreprise ou une collectivité, notre savoir-faire est à votre disposition pour des décisions éclairées. Nous prenons en charge des études socioéconomiques, financières, ainsi que des audits spécifiques à votre activité.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="about__item">
                    <h4 style="color: #2196f3;">Qui faisons-nous ?</h4>
                    <p>BeT Advisory offre une gamme complète de services, allant de la création de sociétés de développement local et régional à l'élaboration de plans d'action locaux et provinciaux. Nous sommes experts en analyse financière, montage financier des programmes d'investissements, et en facilitation des relations avec partenaires financiers et investisseurs nationaux et étrangers. De plus, nous réalisons des études économiques, mettons en place des systèmes d'information et de gestion, élaborons des plans de formation, et assurons des services d'audit, de gestion des archives, ainsi que la création de manuels de procédures et structures organisationnelles conformes aux normes en vigueur.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="about__item">
                    <h4 style="color: #2196f3;">Pourquoi nous choisir</h4>
                    <p>BeT Advisory excelle dans la formation et la gestion spécialisée des projets stratégiques. Nous proposons des formations en achats stratégiques et gestion des contrats, ainsi que des services de gestion d'ingénierie, chiffrage budgétaire, planification par niveaux, gestion de la construction, mise en service, sécurité, paiements par attachements, études de faisabilité, et gestion de la maintenance et des opérations dans les projets stratégiques. De plus, nous sommes compétents dans l'implantation de l'industrie 4.0 dans les PME. Optez pour notre expertise pour assurer le succès de vos projets stratégiques.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

<!-- Testimonial Section Begin -->
<section class="testimonial">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="testimonial__text" style="padding: 100px 52px 100px;">
                    <h1 style="margin-bottom:10px; font-size:30px; font-weight:bold; color: #2196f3;">Talents & Expertise Exceptionnels</h1>
                    <p>En plus d’une équipe de 10 cadres expérimentés et spécialisés dans les domaines juridique, économique et financier nous mettons à votre disposition un réseau de plus de 100 experts de métiers nationaux et étrangers soigneusement sélectionnés dans tous les domaines d’activité, pouvant apporter des réponses à tous vos besoins financiers, de gestion, et /ou d’organisation. Notre réseau d’experts comprend des références de renommée nationale mais également, des bureaux d’étude, et des experts freelances de France, d’Espagne, du Canada. Notre cabinet est aussi partenaire avec un bureau d’avocat de droit d’affaires, un cabinet de conseil fiscal, et un cabinet d’étude marketing. Nous sommes également membre d’un réseau de cabinets de formation professionnelle.</p>
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="testimonial__pic set-bg" style="height: 100%;" data-setbg="https://images.unsplash.com/photo-1542626991-cbc4e32524cc?q=80&w=1469&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"></div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial Section End -->

<!-- Product Section Begin -->
<section class="product spad" style="margin-top: 100px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span style="color: #2196f3;">quelques exemples</span>
                    <h2>Nos anciens projets</h2>
                    <p><a href="{{ url('/etudes') }}" style="color: black;">Voir tout</a></p>
                </div>
            </div>
        </div>
        <div class="row product__filter">
            @foreach($etudes as $item)
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ $item->cover }}">
                        <ul class="product__hover">
                            {{-- <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li> --}}
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>{{ $item->title }}</h6>
                        <a style="color: #2196f3;" href="{{ url('/etude/details/'.$item->id) }}" class="add-cart">voir les détails</a>
                        <h5>{{ $item->prix }}DH</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Team Section Begin -->
<section class="team spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span style="color: #2196f3;">NOTRE ÉQUIPE</span>
                    <h2>Rencontrez notre équipe</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team__item">
                    <img src="https://images.unsplash.com/photo-1635185481431-661b09594e6c?q=80&w=1527&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                    <h4>Khaldoun EL OUAZZANI</h4>
                    {{-- <span>A.D.G</span> --}}
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team__item">
                    <img src="https://images.unsplash.com/photo-1635185481431-661b09594e6c?q=80&w=1527&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                    <h4>Khadija CHERRADI</h4>
                    {{-- <span>D.A.F</span> --}}
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team__item">
                    <img src="https://images.unsplash.com/photo-1635185481431-661b09594e6c?q=80&w=1527&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                    <h4>Ghali BAHIRI</h4>
                    {{-- <span>Manager</span> --}}
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team__item">
                    <img src="https://images.unsplash.com/photo-1635185481431-661b09594e6c?q=80&w=1527&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                    <h4>Yassine LAMHADOUAL</h4>
                    {{-- <span>Delivery</span> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Team Section End -->

@endsection