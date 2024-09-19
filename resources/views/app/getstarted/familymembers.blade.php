@extends('layouts.app')
@section('pageTitle','Samepage')
@section('bodyClass','')
@section('mainClass','page-wrapper wallet-pages pt-4')
@section('containerClass','container pb-100 pt-4')
@section('title','Family')
@section('backlink',route('app.getuserwallets'))
@section('content')
@if(auth()->user()->familymembers()->count())
    <div class="pets-list">
        @foreach(auth()->user()->familymembers as $familymember)
            <div class="setup-status-block d-flex align-items-center active">
                <div class="member-image">
                    <img src="{{$familymember->getFirstMediaUrl('avatar','thumb')}}" alt="">
                </div>
                <span class="name">{{$familymember->first_name.' '.$familymember->last_name}}</span>
                <a href="{{route('appusergetstarted.editfamilymember',['user'=>$familymember->id])}}" class="status ms-auto ps-3">Edit</a>
            </div>
        @endforeach
    </div>
@else
    <div class="empty-pets-wrapper flex-grow-1 align-items-center d-flex justify-content-center flex-column">
        <div class="image-wrapper">
            <img src="{{asset('assets/img/empty.svg')}}" alt="">
        </div>
        <h2 class="text-dark h4 text-center mt-4 mb-0">You've not added any family member yet</h2>
    </div>
@endif
    <div class="form-footer text-center">
        <a href="{{route('appusergetstarted.addfamilymember')}}" class="btn btn-primary">Add family member</a>
    </div>
@endsection