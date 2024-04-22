@extends('layouts.master')

@section('title')
    {{ $formation->title }} | Bet Advisory
@endsection

@section('body')

<!-- Shop Details Section Begin -->
<section class="shop-details">
    <div class="product__details__pic">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__breadcrumb">
                        <a style="color: #2196f3;" href="{{ url('/') }}">Accueil</a>
                        <a style="color: #2196f3;" href="{{ url('/formations') }}">Formations</a>
                        <span>Details</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__pic__item">
                                <img src="{{ url($formation->cover) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product__details__content">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="product__details__text">
                        <h4>{{ $formation->title }}</h4>
                        <h3 style="color: #2196f3;">{{ $formation->prix }} DH</h3>
                        <p>Élevez votre réussite académique grâce à nos formations exceptionnelles. Investissez dès maintenant dans votre avenir brillant et construisez les bases d'une carrière prometteuse!</p>
                        <div class="product__details__cart__option">
                            {{-- <a href="javascript:void(0);" class="primary-btn detailscart" testid="{{ $cart }}">ajouter au panier</a> --}}
                        </div>
                        <div class="product__details__last__option">
                            {{-- <h5><span>Paiement sécurisé garanti</span></h5> --}}
                            {{-- <img src="img/shop-details/details-payment.png" alt=""> --}}
                            <ul>
                                <li><span>Catégorie:</span> {{ $formation->category->name }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-7" role="tab">Je veux m'inscrire</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                <div class="product__details__tab__content">
                                    <div class="product__details__tab__content__item">
                                        <p>
                                            {!! $formation->description !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-7" role="tabpanel">
                                <div class="product__details__tab__content">
                                    <div class="contact__form">
                                        @if(Session::has('success'))
                                            <div class="alert alert-success" role="alert">
                                                {{ Session::get('success') }}
                                            </div>
                                        @endif
                                        <form action="{{ url('/saveformation') }}" method="POST">
                                            @csrf
                                            @auth
                                            <input type="hidden" name="formation_id" value="{{ $formation->id }}">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <input type="text" disabled style="cursor: no-drop;" placeholder="Prénom" value="{{ Auth::user()->fname }}">
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" disabled style="cursor: no-drop;" placeholder="Nom" value="{{ Auth::user()->lname }}">
                                                </div>
                                                <div class="col-lg-12">
                                                    <input type="text" disabled style="cursor: no-drop;" placeholder="Email" value="{{ Auth::user()->email }}">
                                                </div>
                                                <div class="col-lg-12">
                                                    <input type="text" placeholder="Cin" name="cin">
                                                </div>
                                                <div class="col-lg-12">
                                                    <input type="text" placeholder="Téléphone" name="phone">
                                                </div>
                                                <div class="col-lg-12">
                                                    <button type="submit" class="site-btn">Soumettre</button>
                                                </div>
                                            </div>
                                            @else
                                            <p style="text-align: center; font-size: 20px; padding-top: 40px;">Vous devez d'abord vous connecter avant de vous inscrire dans une formation, <a href="/login" style="color: red">à partir de ce lien !</a></p>
                                            @endauth
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Details Section End -->

<section class="related spad"></section>
@endsection
