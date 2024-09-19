@extends('layouts.app')
@section('pageTitle','Samepage')
@section('bodyClass','')
@section('mainClass','page-wrapper wallet-pages pt-4')
@section('containerClass','container pb-100 pt-4')
@section('title','Life Admin')
@section('backlink',route('app.getuserwallets'))
@section('content')
    @if(auth()->user()->lifeadmins()->count())
        <div class="pets-list">
            @foreach(auth()->user()->lifeadmins as $lifeadmin)
            <div class="setup-status-block d-flex align-items-center active">
                <div class="member-image">
                    <img src="{{asset('app-assets/img/profile-image.png')}}" alt="">
                </div>
                <span class="name">Life admin {{($loop->index+1)}}</span>
                <a href="{{route('app.wallets.editlifeadmin',['personal'=>$lifeadmin->id])}}" class="status ms-auto ps-3">Edit</a>
            </div>
            @endforeach
        </div>
    @else
    <div class="empty-pets-wrapper flex-grow-1 align-items-center d-flex justify-content-center flex-column">
        <div class="image-wrapper">
            <img src="{{asset('assets/img/empty.svg')}}" alt="">
        </div>
        <h2 class="text-dark h4 text-center mt-4 mb-0">You've not added any life admin yet</h2>
    </div>
    @endif
            <div class="form-footer text-center">
                <a href="{{route('app.wallets.addlifeadmin')}}" class="btn btn-primary">Add a new life admin</a>
            </div>
@endsection