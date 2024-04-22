@extends('layouts.admin')
@section('title')
    Créer une catégorie | Bet Advisory
@endsection

@section('styles')
<link rel="stylesheet" href="{{ url('assets/css/bootstrap.css') }}">

<link rel="stylesheet" href="{{ url('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
<link rel="stylesheet" href="{{ url('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
<link rel="stylesheet" href="{{ url('assets/css/app.css') }}">
<link rel="shortcut icon" href="{{ url('assets/images/favicon.svg') }}" type="image/x-icon">
@endsection

@section('body')

<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Catégorie</h3>
            </div>

        </div>
    </div>

    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form" style="margin-top: 40px">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Nouvelle catégorie</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            @if(Session::has('success'))
                            <div class="alert alert-light-success color-success">
                                <i class="bi bi-check-circle"></i> {{ Session::get('success') }}
                            </div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                </div>
                            @endif
                            <form action="{{ url('/category/create') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="">
                                        <div class="form-group">
                                            <label for="first-name-column">Nom</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="Nom de catégorie" value="{{ old('name') }}" name="name">
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Créer</button>
                                        <button type="reset"
                                            class="btn btn-light-secondary me-1 mb-1">Réinitialiser</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>

@endsection

@section('scripts')
<script src="{{ url('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ url('assets/js/main.js') }}"></script>
@endsection