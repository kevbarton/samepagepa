@extends('layouts.app')
@section('pageTitle','Samepage')
@section('bodyClass','bg-dark')
@section('mainClass','page-wrapper getstartedindex')
@section('containerClass','container pb-100 pt-4')
@section('content')
<div class="main-logo-wrapper d-flex justify-content-center align-items-center pb-0 get-started pt-5">
    <h1 class="h4 text-center text-primary mb-0 page-title">Let's get your SamePage set up</h1>
</div>

<div class="quote-wrapper d-flex justify-content-center py-3 align-items-center">
    <p class="large text-center">
        To get the most out of your SamePage app, we need a little information.
    </p>
</div>

<div class="buttons-wrapper pt-4 mt-2 text-center">
    <a href="{{route('appusergetstarted.menu')}}" class="btn btn-primary">Get Started</a>
</div>

<div class="footer-button-wrapper text-center">
    <a href="{{route('appusergetstarted.menu')}}" class="text-link">Skip for now</a>
</div>
@endsection
