@extends('layouts.app')
@section('pageTitle','Samepage')
@section('bodyClass','')
@section('mainClass','page-wrapper wallet-pages pt-4')
@section('containerClass','container pb-100 pt-4')
@section('title','Edit Vehicle')
@section('backlink',route('app.wallets.vehicles'))
@section('content')
    <form action="{{route('app.wallets.updatevehicle',['vehicle'=>$vehicle->id])}}" class="form" method="post">
        @csrf   
                <div class="mb-3">
                    <label for="" class="form-label">Type</label>
                    <select name="vehicle_type" class="form-control">
                        <option value="">Select Type</option>
                        @foreach($vehicletypes as $vehicletype) 
                            <option value="{{$vehicletype->id}}" @if($vehicletype->id==$vehicle->vehicle_type_id) selected="selected" @endif>{{$vehicletype->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="vehicle_registration" class="form-label">Registration</label>
                    <input type="text" class="form-control" id="vehicle_registration" name="vehicle_registration" placeholder="" value="{{old('vehicle_registration',$vehicle->vehicle_registration)}}">
                </div>
                <div class="mb-3">
                    <label for="vehicle_make" class="form-label">Make</label>
                    <input type="text" class="form-control" id="vehicle_make" name="vehicle_make" placeholder="" value="{{old('vehicle_make',$vehicle->vehicle_make)}}">
                </div>
                <div class="mb-3">
                    <label for="vehicle_model" class="form-label">Model</label>
                    <input type="text" class="form-control" id="vehicle_model" name="vehicle_model" placeholder="" value="{{old('vehicle_model',$vehicle->vehicle_model)}}">
                </div>
                <h5 class="text-dark fw-bold">MOT</h5>
                <div class="mb-3">
                    <label for="mot_renewal_date" class="form-label">Renewal Date</label>
                    <input type="date" class="form-control" id="mot_renewal_date" name="mot_renewal_date" placeholder="" value="{{old('mot_renewal_date',$vehicle->mot_renewal_date)}}">
                </div>
                <div class="mb-3">
                    <label for="mot_reminder_date" class="form-label">Reminder Date</label>
                    <input type="date" class="form-control" id="mot_reminder_date" name="mot_reminder_date" placeholder="" value="{{old('mot_reminder_date',$vehicle->mot_reminder_date)}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">MOT documents</label>
                    <div class="upload-btn d-flex align-items-start">
                        <input type="file" class="form-control upload" id="mot_documents" name="mot_documents"  multiple>
                        <label for="mot_documents" class="form-label btn btn-primary mb-0">Upload</label>
                        <span class="file-name text-dark"></span>
                    </div>
                </div>
                
                <h5 class="text-dark fw-bold">Vehicle Insurance</h5>
                <div class="mb-3">
                    <input type="hidden" name="insurance_type_id" value="2">
                    <input type="hidden" name="insurance_type_name" value="Vehicle">
                    <label for="insurance_company_name" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="insurance_company_name" name="insurance_company_name" placeholder="" value="{{old('insurance_company_name',($vehicle->insurance?$vehicle->insurance->company_name:''))}}">
                </div>
                <div class="mb-3">
                    <label for="insurance_telephone_number" class="form-label">Telephone Number</label>
                    <input type="text" class="form-control" id="insurance_telephone_number" name="insurance_telephone_number" placeholder="" value="{{old('insurance_telephone_number',($vehicle->insurance?$vehicle->insurance->telephone_number:''))}}">
                </div>
                <div class="mb-3">
                    <label for="insurance_policy_number" class="form-label">Policy Number</label>
                    <input type="text" class="form-control" id="insurance_policy_number" name="insurance_policy_number" placeholder="" value="{{old('insurance_policy_number',($vehicle->insurance?$vehicle->insurance->policy_number:''))}}">
                </div>
                <div class="mb-3">
                    <label for="insurance_cost" class="form-label">Cost</label>
                    <input type="text" class="form-control" id="insurance_cost" name="insurance_cost" placeholder="" value="{{old('insurance_cost',($vehicle->insurance?$vehicle->insurance->cost:''))}}">
                </div>
                <div class="mb-3">
                    <label for="insurance_renewal_date" class="form-label">Renewal Date</label>
                    <input type="date" class="form-control" id="insurance_renewal_date" name="insurance_renewal_date" placeholder="" value="{{old('insurance_renewal_date',($vehicle->insurance?$vehicle->insurance->renewable_date:''))}}">
                </div>
                <div class="mb-3">
                    <label for="insurance_claim_number" class="form-label">Claim Number</label>
                    <input type="text" class="form-control" id="insurance_claim_number" name="insurance_claim_number" placeholder="" value="{{old('insurance_claim_number',($vehicle->insurance?$vehicle->insurance->claim_number:''))}}">
                </div>
                <div class="mb-3">
                    <label for="insurance_reminder_date" class="form-label">Reminder Date</label>
                    <input type="date" class="form-control" id="insurance_reminder_date" name="insurance_reminder_date" placeholder="" value="{{old('insurance_reminder_date',($vehicle->insurance?$vehicle->insurance->reminder_date:''))}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Insurance documents</label>
                    <div class="upload-btn d-flex align-items-start">
                        <input type="file" class="form-control upload" id="insurance_documents" name="insurance_documents"  multiple>
                        <label for="insurance_documents" class="form-label btn btn-primary mb-0">Upload</label>
                        <span class="file-name text-dark"></span>
                    </div>
                </div>
                
                <h5 class="text-dark fw-bold">Service</h5>
                <div class="mb-3">
                    <label for="service_garage" class="form-label">Garage</label>
                    <input type="text" class="form-control" id="service_garage" name="service_garage" placeholder="" value="{{old('service_garage',$vehicle->service_garage)}}">
                </div>
                <div class="mb-3">
                    <label for="service_telephone_number" class="form-label">Telephone Number</label>
                    <input type="text" class="form-control" id="service_telephone_number" name="service_telephone_number" placeholder="" value="{{old('service_telephone_number',$vehicle->service_telephone_number)}}">
                </div>
                <div class="mb-3">
                    <label for="service_cost" class="form-label">Cost</label>
                    <input type="text" class="form-control" id="service_cost" name="service_cost" placeholder="" value="{{old('service_cost',$vehicle->service_cost)}}">
                </div>
                <div class="mb-3">
                    <label for="service_last_date" class="form-label">Last Date</label>
                    <input type="date" class="form-control" id="service_last_date" name="service_last_date" placeholder="" value="{{old('service_last_date',$vehicle->service_last_date)}}">
                </div>
                <div class="mb-3">
                    <label for="service_next_date" class="form-label">Next Date</label>
                    <input type="date" class="form-control" id="service_next_date" name="service_next_date" placeholder=""  value="{{old('service_next_date',$vehicle->service_next_Date)}}">
                </div>
                <div class="mb-3">
                    <label for="service_reminder_date" class="form-label">Reminder Date</label>
                    <input type="date" class="form-control" id="service_reminder_date" name="service_reminder_date" placeholder="" value="{{old('service_reminder_date',$vehicle->service_reminder_date)}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Service documents</label>
                    <div class="upload-btn d-flex align-items-start">
                        <input type="file" class="form-control upload" id="service_documents" name="service_documents"  multiple>
                        <label for="service_documents" class="form-label btn btn-primary mb-0">Upload</label>
                        <span class="file-name text-dark"></span>
                    </div>
                </div>
                <h5 class="text-dark fw-bold">Roadside Assistance</h5>
                <div class="mb-3">
                    <label for="roadside_assistance_company_name" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="roadside_assistance_company_name" name="roadside_assistance_company_name" placeholder=""  value="{{old('roadside_assistance_company_name',$vehicle->roadside_assistance_company_name)}}">
                </div>
                <div class="mb-3">
                    <label for="roadside_assistance_amount" class="form-label">Amount</label>
                    <input type="text" class="form-control" id="roadside_assistance_amount" name="roadside_assistance_amount" placeholder="" value="{{old('roadside_assistance_amount',$vehicle->roadside_assistance_amount)}}" >
                </div>
                <div class="mb-3">
                    <label for="roadside_assistance_telephone_number" class="form-label">Telephone Number</label>
                    <input type="text" class="form-control" id="roadside_assistance_telephone_number" name="roadside_assistance_telephone_number" placeholder="" value="{{old('roadside_assistance_telephone_number',$vehicle->roadside_assistance_telephone_number)}}">
                </div>
                <div class="mb-3">
                    <label for="roadside_assistance_policy_number" class="form-label">Policy Number</label>
                    <input type="text" class="form-control" id="roadside_assistance_policy_number" name="roadside_assistance_policy_number" placeholder="" value="{{old('roadside_assistance_policy_number',$vehicle->roadside_assistance_policy_number)}}">
                </div>
                <div class="mb-3">
                    <label for="roadside_assistance_renewal_date" class="form-label">Renewal Date</label>
                    <input type="date" class="form-control" id="roadside_assistance_renewal_date" name="roadside_assistance_renewal_date" placeholder="" value="{{old('roadside_assistance_policy_number',$vehicle->roadside_assistance_renewal_date)}}">
                </div>
                <div class="mb-3">
                    <label for="roadside_assistance_reminder_date" class="form-label">Reminder Date</label>
                    <input type="date" class="form-control" id="roadside_assistance_reminder_date" name="roadside_assistance_reminder_date" placeholder="" value="{{old('roadside_assistance_reminder_date',$vehicle->roadside_assistance_reminder_date)}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Roadside Assistance documents</label>
                    <div class="upload-btn d-flex align-items-start">
                        <input type="file" class="form-control upload" id="roadside_assistance_documents" name="roadside_assistance_documents"  multiple>
                        <label for="roadside_assistance_documents" class="form-label btn btn-primary mb-0">Upload</label>
                        <span class="file-name text-dark"></span>
                    </div>
                </div>
                <h5 class="text-dark fw-bold">Loan</h5>
                <div class="mb-3">
                    <input type="hidden" name="loan_type_id" value="2">
                    <input type="hidden" name="loan_type_name" value="Vehicle">
                    <label for="" class="form-label">Company Name</label>
                    <input type="text" name="loan_company_name" class="form-control" value="{{old('loan_company_name',($vehicle->loan?$vehicle->loan->company_name:''))}}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Amount</label>
                    <input type="text" name="loan_amount" class="form-control" value="{{old('loan_amount',($vehicle->loan?$vehicle->loan->amount:''))}}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Policy Number</label>
                    <input type="text" name="loan_policy_number" class="form-control" value="{{old('loan_policy_number',($vehicle->loan?$vehicle->loan->policy_number:''))}}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Telephone Number</label>
                    <input type="text" name="loan_telephone_number" class="form-control" value="{{old('loan_telephone_number',($vehicle->loan?$vehicle->loan->telephone_number:''))}}" >
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Renewal Date</label>
                    <input type="date" name="loan_renewal_date" class="form-control" value="{{old('loan_renewal_date',($vehicle->loan?$vehicle->loan->renewal_date:''))}}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Reminder Date</label>
                    <input type="date" name="loan_reminder_date" class="form-control" value="{{old('loan_reminder_date',($vehicle->loan?$vehicle->loan->reminder_date:''))}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Loan documents</label>
                    <div class="upload-btn d-flex align-items-start">
                        <input type="file" class="form-control upload" id="loan_documents" name="loan_documents"  multiple>
                        <label for="loan_documents" class="form-label btn btn-primary mb-0">Upload</label>
                        <span class="file-name text-dark"></span>
                    </div>
                </div>
                <div class="form-footer text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

           </form>
@endsection
@push('scripts')
<script>
$(document).ready(function(){
   
   
})
</script>
@endpush