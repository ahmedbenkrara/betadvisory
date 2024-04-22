@extends('layouts.admin')
@section('title')
    Modifier une formation | Bet Advisory
@endsection

@section('styles')
<link rel="stylesheet" href="{{ url('assets/css/bootstrap.css') }}">

<link rel="stylesheet" href="{{ url('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
<link rel="stylesheet" href="{{ url('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
<link rel="stylesheet" href="{{ url('assets/css/app.css') }}">
<link rel="shortcut icon" href="{{ url('assets/images/favicon.svg') }}" type="image/x-icon">
<style>
    .file{
        display: none;
    }
    
    .label{
        display: block;
        width:100%;
        text-align: center;
        padding: 30px;
        background: #f1f0ef;
        color: #636363;
    }
</style>
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
                <h3>Formation</h3>
            </div>

        </div>
    </div>

    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form" style="margin-top: 40px">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modifier une formation</h4>
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
                            <form action="{{ url('/formation/edit/'.$formation->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="">
                                        <div class="form-group">
                                            <label>Couverture</label>
                                            <label for="cover" class="label">Sélectionnez une image</label>
                                            <input type="file" id="cover" class="file" name="cover">
                                            <img id="coverpreview" src="{{ url($formation->cover) }}" style="width: 100px; height: 70px; margin-top:10px; object-fit: cover;" alt="">
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Titre</label>
                                            <input type="text" id="title" class="form-control"
                                                placeholder="Titre de l'étude" value="{{ $formation->title }}" name="title">
                                        </div>
                                        <div class="form-group">
                                            <label for="prix">Prix</label>
                                            <input type="number" id="prix" class="form-control"
                                                placeholder="Prix de l'étude" value="{{ $formation->prix }}" name="prix">
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Catégorie</label>
                                            <select id="category" class="form-select" name="category_id">
                                                @foreach($categories as $item)
                                                    @if($item->id == $formation->category_id)
                                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                                    @else
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description" name="description" class="form-control" placeholder="Description" style="resize: none; height: 200px;">
                                            {{ $formation->description }}
                                            </textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Modifier</button>
                                        <a href="{{ url('/formation/list') }}"
                                            class="btn btn-light-secondary me-1 mb-1">Annuler</a>
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
<script src="{{ url('assets/vendors/tinymce/tinymce.min.js') }}"></script>
<script src="{{ url('assets/vendors/tinymce/plugins/code/plugin.min.js') }}"></script>
<script>
    tinymce.init({ selector: '#description', toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code', plugins: 'code' });
</script>
<script src="{{ url('assets/js/main.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Attach an event listener to the file input
        document.getElementById('cover').addEventListener('change', function () {
            // Get the selected file
            var file = this.files[0];

            if (file) {
                // Create an object URL for the selected file
                var objectURL = URL.createObjectURL(file);

                // Update the src attribute of the image with the object URL
                document.getElementById('coverpreview').src = objectURL;
            }
        });
    });
    
</script>
@endsection