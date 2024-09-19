@extends('layouts.app')
@section('pageTitle','Samepage')
@section('bodyClass','bg-dark')
@section('mainClass','page-wrapper')
@section('containerClass','container pb-100 pt-4')
@section('backlink',route('appusergetstarted.familymembers'))
@section('content')
<div class="progress-bars-wrapper three-bars">
    <span class="bar fill"></span>
    <span class="bar "></span>
</div>

<div class="page-title mt-4">
    <h1 class="text-primary h4 text-center mb-0 px-4 page-title">Edit family member</h1>
    <a href="{{route('appusergetstarted.familymembers')}}" class="btn-close btn-close-white btn-nav-small" aria-label="Close"></a>
</div>

<form class="dark-form mt-5 add-family-form" method="post" action="{{route('appusergetstarted.updatefamilymember',['user'=>$user->id])}}">
    @csrf
    <div class="mb-0">
        <label for="gender" class="form-label mb-3">Type of account</label>
        <div class="options-wrapper ms-3">
            <div class=" form-check mb-3">
                <input class="form-check-input" type="radio" name="account" id="admin"  @if(old('account',$user->role)=='FamilyAdmin') checked="checked" @endif value="FamilyAdmin">
                <label class="form-check-label" for="admin">
                    Admin
                </label>
            </div>
            <div class=" form-check mb-3">
                <input class="form-check-input" type="radio" name="account" id="user-edit"  @if(old('account',$user->role)=='FamilyUserEdit') checked="checked" @endif  value="FamilyUserEdit">
                <label class="form-check-label" for="user-edit">
                    User (with edit rights)
                </label>
            </div>
            <div class=" form-check mb-3">
                <input class="form-check-input" type="radio" name="account" id="user-noedit"   @if(old('account',$user->role)=='FamilyUser') checked="checked" @endif  value="FamilyUser">
                <label class="form-check-label" for="user-noedit">
                    User (without edit rights)
                </label>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="first_name" class="form-label">First name</label>
        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name"  placeholder="First Name" value="{{old('first_name',$user->first_name)}}">
        @error('first_name')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="last_name" class="form-label">Last name</label>
        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name"  placeholder="Last Name" value="{{old('last_name',$user->last_name)}}">
        @error('last_name')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Mobile</label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"  placeholder="Mobile" value="{{old('phone',$user->phone)}}">
        @error('phone')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"  placeholder="Email" value="{{old('email',$user->email)}}">
        @error('email')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="mb-0">
        <label for="" class="form-label mb-3">Gender</label>
        <div class="options-wrapper ms-3">
            <div class=" form-check mb-3">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male" @if(old('gender',$user->gender)=='male') checked="checked" @endif>
                <label class="form-check-label" for="male">
                Male
                </label>
            </div>
            <div class=" form-check mb-3">
                <input class="form-check-input" type="radio" name="gender" id="female"  value="female" @if(old('gender',$user->gender)=='female') checked="checked" @endif>
                <label class="form-check-label" for="female">
                Female
                </label>
            </div>
            <div class=" form-check">
                <input class="form-check-input" type="radio" name="gender" id="other" value="other" @if(old('gender',$user->gender)=='other') checked="checked" @endif>
                <label class="form-check-label" for="other">
                Something else
                </label>
            </div>
        </div>
    </div>

    <div class="form-footer text-center">
        <button type="submit" class="btn btn-primary">Next</button>
    </div>


</form>
@endsection