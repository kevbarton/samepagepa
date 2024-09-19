@extends('layouts.app')
@section('pageTitle','Samepage')
@section('bodyClass','bg-dark')
@section('mainClass','page-wrapper')
@section('containerClass','container pb-100 pt-4')
@section('backlink',route('app.getuserwallets'))
@section('content')
<div class="d-flex justify-content-center align-items-center get-started ">
                <h1 class="h4 text-center text-primary mb-0 page-title">Getting Started</h1>
            </div>

            <div class="mt-5 calendar-setup setup-status-wrapper">
                <a href="{{route('app.user.calendar.add')}}" class="setup-status-block d-flex align-items-center active">
                  <img src="{{asset('app-assets/img/gmail-icon.png')}}" height="24" class="me-3"/>  Add Google Calendar  
                </a>
                @if(auth()->user()->googlecalendars()->count())
                    <h4 class="my-4">Synced Calendars</h4>
                    @foreach(auth()->user()->googlecalendars as $googlecalendar)
                    <div class="setup-status-block d-flex align-items-center justify-content-between active">
                        <span><img src="{{asset('app-assets/img/gmail-icon.png')}}" height="24" class="me-3"/> Google Calendar ({{$googlecalendar->email}}) </span><span><a href="{{route('app.user.calendar.sync',['calendar'=>$googlecalendar->id])}}" class="btn btn-primary  h6 fw-normal me-1" style="height: 24px;line-height:24px;border-radius:4px;padding-top:0px;padding-bottom:0px;">Sync</a><a href="{{route('app.user.calendar.activate',['calendar'=>$googlecalendar->id])}}" class="btn btn-primary  h6 fw-normal me-1" style="height: 24px;line-height:24px;border-radius:4px;padding-top:0px;padding-bottom:0px;">{{$googlecalendar->active?'Deactivate':'Activate'}}</a></span>
                    </div>
                    @endforeach
                @endif
            </div>

             <div class="text-center mt-3">
                <a href="{{route('app.getuserwallets')}}" class="text-link">Skip for now</a>
            </div>
@endsection