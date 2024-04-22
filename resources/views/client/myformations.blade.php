@extends('layouts.master')
@section('title')
    Mes formations | Bet Advisory
@endsection

@section('body')
<div id="app">
    <mesformations :formations="{{ Auth::user()->load('formationstudent.formation')->formationstudent }}" />
</div>
@endsection