@extends('layouts.app')
@section('pageTitle','Samepage')
@section('bodyClass','bg-dark')
@section('mainClass','page-wrapper appindex')
@section('containerClass','container pb-100 pt-4')
@section('content')
    <div class="main-logo-wrapper d-flex justify-content-center align-items-end pb-3">
        <div class="img-wrapper">
            <a href="#" class="d-inline-block">
                <img src="{{asset('app-assets/img/SamePage Logo.svg')}}" alt="">
            </a>
        </div>
    </div>

    <div class="quote-wrapper d-flex justify-content-center py-3 align-items-center flex-column">
        <h1 class="text-primary intro-text text-center">Families are happier
            when they're on the same page  </h1>
    </div>

    <div class="buttons-wrapper pt-4 mt-2 text-center">
        <a href="{{route('appregister')}}" class="btn btn-light">Create account</a>
        <a href="{{route('app.acceptinvite')}}" class="btn btn-primary">Accept family invite</a>
    </div>

    <div class="footer-button-wrapper text-center">
        <a href="{{route('applogin')}}" class="text-link">Or login</a>
    </div>
@endsection
