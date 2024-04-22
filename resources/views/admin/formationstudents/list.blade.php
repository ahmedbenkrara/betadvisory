@extends('layouts.admin')
@section('title')
    Liste des formations | Bet Advisory
@endsection

@section('styles')
<link rel="stylesheet" href="{{ url('assets/css/bootstrap.css') }}">

<link rel="stylesheet" href="{{ url('assets/vendors/simple-datatables/style.css') }}">

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
                <h3>Liste des étudiants</h3>
            </div>
        </div>
    </div>
    <section class="section" style="margin-top: 40px;">
        <div class="card">
            <div class="card-header">
                Tous les étudiants
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>CIN</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Formation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($formation->students as $key => $item)
                        <tr>
                            <td>{{ ($key+1) }}</td>
                            <td>{{ $item->cin }}</td>
                            <td>{{ $item->user->fname }}</td>
                            <td>{{ $item->user->lname }}</td>
                            <td>{{ $item->user->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $formation->title }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection

@section('scripts')
<script src="{{ url('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ url('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);

</script>

<script src="{{ url('assets/js/main.js') }}"></script>
@endsection