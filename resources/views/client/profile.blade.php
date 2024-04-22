@extends('layouts.master')
@section('title')
    {{ Auth::user()->fname.' '.Auth::user()->lname }} | Bet Advisory
@endsection

@section('body')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Profil</h4>
                    <div class="breadcrumb__links">
                        <a style="color: #2196f3;" href="{{ url('/') }}">Accueil</a>
                        <span>Profil</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form action="{{ url('/profilec') }}" method="POST">
                @csrf 
                @method('patch')
                <div class="">
                    @if(Session::has('success'))
                    <h6 class="coupon__code" style="border-color: #2196f3;"><span class="icon_tag_alt"></span> {{ Session::get('success') }}</h6>
                    @endif
                    <h6 class="checkout__title">Informations sur le profil</h6>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <p>Prénom</p>
                                <input name="fname" type="text" value="{{ Auth::user()->fname }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <p>Nom</p>
                                <input name="lname" type="text" value="{{ Auth::user()->lname }}">
                            </div>
                        </div>
                    </div>
                    <div class="checkout__input">
                        <p>Email</p>
                        <input name="email" type="text" value="{{ Auth::user()->email }}">
                    </div>
                    <button type="submit" class="primary-btn" style="outline: none; border: none; width:100%; max-width:400px; background: #2196f3;">Sauvegarder</button>
                </div>
                
            </form>
            <div style="margin-top: 100px;"></div>
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                @method('put')
                <div class="">
                    <h6 class="checkout__title">Mettre à jour le mot de passe</h6>
                    <div class="checkout__input">
                        <p>Mot de passe actuel</p>
                        <input type="password" name="current_password">
                    </div>
                    <div class="checkout__input">
                        <p>Nouveau mot de passe</p>
                        <input type="password" name="password">
                    </div>
                    <div class="checkout__input">
                        <p>Confirmez le mot de passe</p>
                        <input type="password" name="password_confirmation">
                    </div>
                    <button type="submit" class="primary-btn" style="outline: none; border: none; width:100%; max-width:400px; background: #2196f3;">Sauvegarder</button>
                </div>
                
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection