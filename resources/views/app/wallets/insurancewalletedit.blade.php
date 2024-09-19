@extends('layouts.app')
@section('pageTitle','Samepage')
@section('bodyClass','')
@section('mainClass','page-wrapper wallet-pages pt-4')
@section('containerClass','container pb-100 pt-4')
@section('title','Edit Insurance')
@section('backlink',route('app.wallets.insurances'))
@section('content')
<form action="{{route('app.wallets.updateinsurance',['insurance'=>$insurance->id])}}" class="form" method="post">
@csrf   
<div class="mb-3">
    <label for="insurance_type" class="form-label">Type</label>
    <select name="insurance_type" class="form-control">
        <option value="">Select</option>
        @foreach($insurancetypes as $insurancetype)
            <option value="{{$insurancetype->id}}" @if($insurance->insurance_type_id==$insurancetype->id) selected="selected" @endif>{{$insurancetype->name}}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="insurance_company_name" class="form-label">Company Name</label>
    <input type="text" class="form-control" id="insurance_company_name" name="insurance_company_name" placeholder="" value="{{old('insurance_company_name',$insurance->company_name)}}">
</div>
<div class="mb-3">
    <label for="insurance_telephone_number" class="form-label">Telephone Number</label>
    <input type="text" class="form-control" id="insurance_telephone_number" name="insurance_telephone_number" placeholder="" value="{{old('insurance_telephone_number',$insurance->telephone_number)}}">
</div>
<div class="mb-3">
    <label for="insurance_policy_number" class="form-label">Policy Number</label>
    <input type="text" class="form-control" id="insurance_policy_number" name="insurance_policy_number" placeholder="" value="{{old('insurance_policy_number',$insurance->policy_number)}}">
</div>
<div class="mb-3">
    <label for="insurance_cost" class="form-label">Cost</label>
    <input type="text" class="form-control" id="insurance_cost" name="insurance_cost" placeholder="" value="{{old('insurance_policy_number',$insurance->cost)}}">
</div>
<div class="mb-3">
    <label for="insurance_renewal_date" class="form-label">Renewal Date</label>
    <input type="date" class="form-control" id="insurance_renewal_date" name="insurance_renewal_date" placeholder="" value="{{old('insurance_renewal_date',$insurance->renewable_date)}}">
</div>
<div class="mb-3">
    <label for="insurance_claim_number" class="form-label">Claim Number</label>
    <input type="text" class="form-control" id="insurance_claim_number" name="insurance_claim_number" placeholder="" value="{{old('insurance_claim_number',$insurance->claim_number)}}">
</div>
<div class="mb-3">
    <label for="insurance_reminder_date" class="form-label">Reminder Date</label>
    <input type="date" class="form-control" id="insurance_reminder_date" name="insurance_reminder_date" placeholder="" value="{{old('insurance_reminder_date',$insurance->reminder_date)}}">
</div>
<div class="mb-3">
    <label class="form-label">Insurance documents</label>
    <div class="upload-btn d-flex align-items-start">
        <input type="file" class="form-control upload" id="insurance_documents" name="insurance_documents"  multiple>
        <label for="insurance_documents" class="form-label btn btn-primary mb-0">Upload</label>
        <span class="file-name text-dark"></span>
    </div>
</div>
 <div class="form-footer text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
@endsection