@extends('layouts.master')
@section('title')
    Contact | Bet Advisory
@endsection

@section('body')
<!-- Map Begin -->
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3372.6609728118315!2d-9.23612692519501!3d32.29409180851047!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdac219f07c95e3b%3A0x75103191e8233736!2sBeT%20Advisory!5e0!3m2!1sfr!2sma!4v1700965407154!5m2!1sfr!2sma" height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<!-- Map End -->

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="contact__text">
                    <div class="section-title">
                        <span style="color: #2196f3;">Information</span>
                        <h2 style="color: #2196f3;">Contactez-nous</h2>
                        <p>Comme on peut s’y attendre d’une entreprise qui a débuté comme entrepreneur en intérieur haut de gamme, nous y prêtons une attention particulière.</p>
                    </div>
                    <ul>
                        <li>
                            <h4 style="color: #2196f3;">Safi, Maroc</h4>
                            <p>Rue Ahmed Taib Benhima, Immeuble Goumzirid, Appartement N 5, Safi 46000<br />Office@bet-advisory.com <br />+212 661328113</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__form">
                    <form action="{{ url('contact') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="Nom" name="name">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Email" name="email">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" placeholder="Sujet" name="sujet">
                            </div>
                            <div class="col-lg-12">
                                <textarea placeholder="Message" name="message"></textarea>
                                <button style="background: #2196f3;" type="submit" class="site-btn">envoyer</button>
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