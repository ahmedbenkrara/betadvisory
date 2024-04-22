@extends('layouts.master')
@section('title')
    Se connecter | Bet Advisory
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

        @if(Session::has('localStorageRemovalScript'))
            {!! Session::get('localStorageRemovalScript') !!}
        @endif

        <div class="row">
            <div class="col-lg-6 col-md-6 mb-4">
                <img style="width: 100%; height: 450px;" src="https://images.unsplash.com/photo-1559131397-f94da358f7ca?q=80&w=1469&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__form" style="height: 100%; display: flex; align-items: center;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 section-title" style="text-align: left; margin-bottom: 40px;">
                                <h2 style="color: #2196f3;">Bienvenu</h2>
                            </div>
                            <div class="col-lg-12">
                                <input type="text" placeholder="Email" name="email" :value="old('email')">
                            </div>
                            <div class="col-lg-12">
                                <input type="password" placeholder="Mot de passe" name="password">
                            </div>
                            <div class="col-lg-12 mb-4">
                                <a href="{{ route('password.request') }}" style="color: black;">Mot de passe oublié ?</a>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="site-btn" style="background: #2196f3;">se connecter</button>
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