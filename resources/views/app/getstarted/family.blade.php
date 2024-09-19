@extends('layouts.app')
@section('pageTitle','Samepage')
@section('bodyClass','bg-dark')
@section('mainClass','page-wrapper')
@section('containerClass','container pb-100 pt-4')
@section('content')
<div class="d-flex justify-content-center align-items-center get-started">
                <h1 class="h4 text-center text-primary mb-0 page-title">Getting Started</h1>
            </div>

            <div class="mt-5 setup-status-wrapper">
                 <a href="{{route('appusergetstarted.profile')}}" class="setup-status-block d-flex align-items-center @if(auth()->user()->created_at < auth()->user()->updated_at) checked @endif">
                    <!-- <span class="sr-number">1</span> -->
                    Your profile
                    <span class="status ms-auto">Set up</span>
                </a>
                <a href="{{route('appusergetstarted.calendar')}}" class="setup-status-block d-flex align-items-center">
                    <!-- <span class="sr-number">2</span> -->
                    Calendar sync 
                    <span class="status ms-auto">Set up</span>
                </a>
                <a href="{{route('appusergetstarted.familymembers')}}" class="setup-status-block d-flex align-items-center active @if(auth()->user()->familymembers()->count()) checked @endif">
                    <!-- <span class="sr-number">3</span> -->
                    Your family
                    <span class="status ms-auto">Set up</span>
                </a>
                <a href="{{route('app.getuserwallets')}}" class="setup-status-block d-flex align-items-center @if(auth()->user()->wallets()->count()>2) checked @endif">
                    <!-- <span class="sr-number">4</span> -->
                    Your wallets
                    <span class="status ms-auto ps-3">Set up</span>
                </a>
            </div>

             <div class="text-center mt-3">
                <a href="{{route('app.getuserwallets')}}" class="text-link">Skip for now</a>
            </div>
@endsection