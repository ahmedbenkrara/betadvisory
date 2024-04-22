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
                <h3>Liste des formations</h3>
            </div>
        </div>
    </div>
    <section class="section" style="margin-top: 40px;">
        <div class="card">
            <div class="card-header">
                Toutes les formations
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Couverture</th>
                            <th>Titre</th>
                            <th>Prix</th>
                            <th>Catégorie</th>
                            <th>Les étudiants</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($formations as $key => $item)
                        <tr>
                            <td>{{ ($key+1) }}</td>
                            <td><img src="{{ url($item->cover) }}" style="width:90px; height:60px; object-fit:cover;" alt=""></td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->prix }} DH</td>
                            <td>{{ $item->category->name }}</td>
                            <td>
                                <a href="{{ url('/formation/students/'.$item->id) }}">Détails</a>
                            </td>
                            <td>
                                <a href="{{ url('/formation/edit/'.$item->id) }}" class="">Modifier</a>
                                <a href="javascript:void(0);" onclick="deleteit({{$item->id}})" data-bs-toggle="modal" data-bs-target="#danger">Supprimer</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--Danger theme Modal -->
        <div class="modal fade text-left" id="danger" tabindex="-1"
            role="dialog" aria-labelledby="myModalLabel120"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title white" id="myModalLabel120">
                            Attention
                        </h5>
                        <button type="button" class="close"
                            data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        Etes-vous sûr que vous voulez supprimer ?
                    </div>
                    <div class="modal-footer">
                        <form method="post" id="del">
                            @csrf
                            @method('DELETE')
                        
                            <button type="button"
                                class="btn btn-light-secondary"
                                data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Fermer</span>
                            </button>
                            <button type="submit" class="btn btn-danger ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Supprimer</span>
                            </button>
                        </form>
                    </div>
                </div>
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

    function deleteit(id){
        document.getElementById('del').action = '/formation/delete/'+id
    }
</script>

<script src="{{ url('assets/js/main.js') }}"></script>
@endsection