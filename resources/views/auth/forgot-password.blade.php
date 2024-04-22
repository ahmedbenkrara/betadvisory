@extends('layouts.master')
@section('title')
    Mot de passe oublié | Bet Advisory
@endsection

@section('body')

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-4">
                <img style="width: 100%; height: 400px;" src="https://images.unsplash.com/photo-1559131397-f94da358f7ca?q=80&w=1469&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__form" style="height: 100%; display: flex; align-items: center;">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 section-title" style="text-align: left; margin-bottom: 40px;">
                                <h2 style="color: #2196f3;">Réinitialiser le mot de passe</h2>
                                Mot de passe oublié? Aucun problème. Indiquez-nous simplement votre adresse e-mail et nous vous enverrons par e-mail un lien de réinitialisation de mot de passe qui vous permettra d'en choisir un nouveau.
                            </div>
                            <div class="col-lg-12">
                                <input type="text" placeholder="Email" name="email" :value="old('email')">
                            </div>
                            <div class="col-lg-12">
                                <button style="background: #2196f3;" type="submit" class="site-btn">Réinitialiser</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->
@endsection