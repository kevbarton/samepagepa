@extends('layouts.app')
@section('pageTitle','Samepage')
@section('bodyClass','bg-light')
@section('mainClass','page-wrapper')
@section('containerClass','container pb-100 pt-5')
@section('content')
<div class="navigation-control">
    <a href="{{route('applogin')}}" class="btn-close btn-close-dark btn-nav" aria-label="Close" id="btnclose"></a>

</div>
<div class="loginsteps">
    <div class="" id="step-1">
        <div class="page-description pt-5 mt-2">
            <h5 class="text-dark mb-3">Reset Your Password </h5>
        </div>

        <form  class="pt-5  " novalidate method="post" method="post" action="{{route('app.passwordupdate')}}">
            @csrf
            <input type="hidden" name="token" value="{{$token}}" />
            <div class="form-body">
                @if(request()->session()->has('status'))
                    <div id="forgotpasswordsuccess" class="alert alert-success mb-3">{{request()->session()->get('status')}}</div>
                @endif
                <div class="mb-3">
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"  placeholder="Your email address" autofocus >
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"  placeholder="New Password"  >
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control " id="password_confirmation" name="password_confirmation"  placeholder="Confirm New Password"  >
                </div>
            </div>
            <div class="form-footer text-center">
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </div>
        </form>

        
    </div>
    
</div>

@endsection
@push('scripts')

@endpush
