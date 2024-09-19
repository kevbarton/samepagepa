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
            <h5 class="text-dark mb-3">Forgot Password? </h5>
            <h1 class="text-dark mb-0 font-weight-bold">What's your email address?</h1>
        </div>

        <form  class="pt-5 single-field-form " novalidate method="post" method="post" action="{{route('app.forgotpassword')}}">
            @csrf
            <div class="form-body">
                <div class="mb-3">
                     @if(request()->session()->has('status'))
                        <div id="forgotpasswordsuccess" class="alert alert-success mb-3">{{request()->session()->get('status')}}</div>
                    @endif
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"  placeholder="Your email address" autofocus >
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-footer text-center">
                <button type="submit" class="btn btn-primary">Request Password</button>
            </div>
        </form>

        
    </div>
    
</div>

@endsection
@push('scripts')

@endpush
