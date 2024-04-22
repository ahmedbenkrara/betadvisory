@extends('layouts.master')
@section('title')
    Mes études | Bet Advisory
@endsection

@section('body')
<div id="app">
    @if(Session::has('localStorageRemovalScript'))
    dd('here');
        {!! Session::get('localStorageRemovalScript') !!}
    @endif
    <mesetudes :etudes="{{ Auth::user()->load('orders.details.etude')->orders }}" :echanges="{{ Auth::user()->load('echange.etude')->echange }}"/>
</div>
@endsection