@extends('layouts.master')
@section('title')
    Panier | Bet Advisory
@endsection

@section('body')
@if(Session::has('localStorageRemovalScript'))
    {!! Session::get('localStorageRemovalScript') !!}
@endif

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Panier</h4>
                    <div class="breadcrumb__links">
                        <a style="color: #2196f3;" href="{{ url('/') }}">Accueil</a>
                        <a style="color: #2196f3;" href="{{ url('/etudes') }}">Études</a>
                        <span>Panier</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>PRODUIT</th>
                                <th></th>
                                <th>Type</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="carttable">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart__total">
                    <h6>PANIER TOTAL</h6>
                    <ul>
                        <li>Total <span id="total" style="color: #2196f3;">169.50 DH</span></li>
                    </ul>
                    <form action="{{ url('/checkout') }}" method="post" id="payment">
                        @csrf
                        @auth 
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        @endauth
                        <button type="submit" class="primary-btn" style="outline: none; border: none; width:100%; background: #2196f3;">Passer à la caisse</button>
                    </form>
                    <p style="margin: 10px 0; text-align: center;">ou</p>
                    <a style="background: #2196f3;" href="javascript:void(0);" class="primary-btn" data-toggle="modal" data-target="#exampleModalCenter">Échange</a>
                </div>
            </div>
        </div>
    </div>
    @if(Session::has('success'))
        {!! Session::get('success') !!}
    @endif

    @if(Session::has('fail'))
        {!! Session::get('fail') !!}
    @endif
  
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <form action="{{ url('/exchange') }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Demande d'échange</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @auth
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="form-group">
                        <label for="itemsc">Sélectionnez une étude</label>
                        <select class="form-control" id="itemsc" name="etude_id">
                            <option selected disabled>Sélectionnez une étude</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="etude">Votre étude</label>
                        <input type="file" class="form-control-file" id="etude" name="file">
                    </div>
                    @else
                    <p>Vous devez vous connecter avant d'effectuer cette action, <a href="/login" style="color: red">à partir de ce lien !</a></p>
                    @endauth
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Fermer</button>
                    @auth
                    <button type="submit" class="btn btn-dark">Soumettre</button>
                    @else
                    <button type="button" class="btn btn-dark" disabled>Soumettre</button>
                    @endauth
                </div>
            </div>
        </div>
    </form>
    </div>
</section>
<!-- Shopping Cart Section End -->

<style>
    .nice-select{
        display: none !important;
    }

    select{
        display: block !important;
    }
</style>

<script>
    if(localStorage.key('cart')){
        let payment = document.getElementById('payment')
        var cart = JSON.parse(localStorage.getItem('cart'))
        for(let i=0; i<cart.length; i++){
            payment.innerHTML += `<input type="hidden" name="etude[]" value="${cart[i].id}"/>`
        }
    }
</script>
@endsection