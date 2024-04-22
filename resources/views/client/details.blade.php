@extends('layouts.master')

@section('title')
    {{ $etude->title }} | Bet Advisory
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
                        <a style="color: #2196f3;" href="{{ url('/etudes') }}">Études</a>
                        <span>Details</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__pic__item">
                                <img src="{{ url($etude->cover) }}" alt="">
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
                        <h4>{{ $etude->title }}</h4>
                        <h3 style="color: #2196f3;">{{ $etude->prix }} DH</h3>
                        <p>Élevez votre succès académique avec nos études d'exception. Investissez dans votre avenir brillant dès maintenant!</p>
                        <div class="product__details__cart__option">
                            <a style="background-color: #2196f3;" href="javascript:void(0);" class="primary-btn detailscart" testid="{{ $cart }}">ajouter au panier</a>
                        </div>
                        <div class="product__details__last__option">
                            <h5><span>Paiement sécurisé garanti</span></h5>
                            {{-- <img src="img/shop-details/details-payment.png" alt=""> --}}
                            <ul>
                                <li><span>Catégorie:</span> {{ $etude->category->name }}</li>
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
                                <a class="nav-link" data-toggle="tab" href="#tabs-7" role="tab">Démo</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                <div class="product__details__tab__content">
                                    <div class="product__details__tab__content__item">
                                        <p>
                                            {!! $etude->description !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-7" role="tabpanel">
                                <div class="product__details__tab__content">
                                    {{-- PDF HERE --}}
                                    @if($etude->demo)
                                    <iframe style="width: 100%; height:600px;" src="{{ url($etude->demo) }}#toolbar=0" frameborder="0"></iframe>
                                    @else 
                                    <p style="text-align: center; font-size: 20px; padding-top: 40px;">Aucune démo trouvée</a></p>
                                    @endif
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
