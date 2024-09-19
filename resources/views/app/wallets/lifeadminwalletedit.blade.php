@extends('layouts.app')
@section('pageTitle','Samepage')
@section('bodyClass','')
@section('mainClass','page-wrapper wallet-pages pt-4')
@section('containerClass','container pb-100 pt-4')
@section('title','Edit Life Admin')
@section('backlink',route('app.wallets.lifeadmin'))
@section('content')
    <form action="{{route('app.wallets.updatelifeadmin',['personal'=>$personal->id])}}" class="form" method="post">
    @csrf
                <h5 class="text-dark fw-bold">Life Insurance</h5>
                <div class="mb-3">
                    <input type="hidden" name="insurance_type_id" value="1">
                    <input type="hidden" name="insurance_type_name" value="Life">
                    <label for="insurance_company_name" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="insurance_company_name" name="insurance_company_name" placeholder="" value="{{old('insurance_company_name',($personal->insurance?$personal->insurance->company_name:''))}}">
                </div>
                <div class="mb-3">
                    <label for="insurance_telephone_number" class="form-label">Telephone Number</label>
                    <input type="text" class="form-control" id="insurance_telephone_number" name="insurance_telephone_number" placeholder="" value="{{old('insurance_telephone_number',($personal->insurance?$personal->insurance->telephone_number:''))}}">
                </div>
                <div class="mb-3">
                    <label for="insurance_policy_number" class="form-label">Policy Number</label>
                    <input type="text" class="form-control" id="insurance_policy_number" name="insurance_policy_number" placeholder="" value="{{old('insurance_policy_number',($personal->insurance?$personal->insurance->policy_number:''))}}">
                </div>
                <div class="mb-3">
                    <label for="insurance_cost" class="form-label">Cost</label>
                    <input type="text" class="form-control" id="insurance_cost" name="insurance_cost" placeholder="" value="{{old('insurance_cost',($personal->insurance?$personal->insurance->cost:''))}}">
                </div>
                <div class="mb-3">
                    <label for="insurance_renewal_date" class="form-label">Renewal Date</label>
                    <input type="date" class="form-control" id="insurance_renewal_date" name="insurance_renewal_date" placeholder="" value="{{old('insurance_renewal_date',($personal->insurance?$personal->insurance->renewable_date:''))}}">
                </div>
                <div class="mb-3">
                    <label for="insurance_claim_number" class="form-label">Claim Number</label>
                    <input type="text" class="form-control" id="insurance_claim_number" name="insurance_claim_number" placeholder="" value="{{old('insurance_claim_number',($personal->insurance?$personal->insurance->claim_number:''))}}">
                </div>
                <div class="mb-3">
                    <label for="insurance_reminder_date" class="form-label">Reminder Date</label>
                    <input type="date" class="form-control" id="insurance_reminder_date" name="insurance_reminder_date" placeholder="" value="{{old('insurance_reminder_date',($personal->insurance?$personal->insurance->reminder_date:''))}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Insurance documents</label>
                    <div class="upload-btn d-flex align-items-start">
                        <input type="file" class="form-control upload" id="insurance_documents" name="insurance_documents"  multiple>
                        <label for="insurance_documents" class="form-label btn btn-primary mb-0">Upload</label>
                        <span class="file-name text-dark"></span>
                    </div>
                </div>
                <h5 class="text-dark fw-bold">Loans</h5>
                <div class="mb-3" >
                    <div id="loan_wrapper">
                        @foreach($personal->loans as $loan)
                            <div class="loan-wrapper border-bottom border-secondary mb-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">Type</label>
                                    <select name="loan_type[]" class="form-control">
                                        <option value="">Select Type</option>
                                        @foreach($loantypes as $loantype) 
                                            <option value="{{$loantype->id}}" @if($loantype->id==$loan->loan_type_id) selected="selected" @endif>{{$loantype->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Company Name</label>
                                    <input type="text" name="loan_company_name[]" class="form-control" value="{{$loan->company_name}}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Amount</label>
                                    <input type="text" name="loan_amount[]" class="form-control" value="{{$loan->amount}}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Policy Number</label>
                                    <input type="text" name="loan_policy_number[]" class="form-control" value="{{$loan->policy_number}}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Telephone Number</label>
                                    <input type="text" name="loan_telephone_number[]" class="form-control" value="{{$loan->telephone_number}}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Renewal Date</label>
                                    <input type="date" name="loan_renewal_date[]" class="form-control" value="{{$loan->renewal_date}}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Reminder Date</label>
                                    <input type="date" name="loan_reminder_date[]" class="form-control" value="{{$loan->reminder_date}}">
                                </div>
                                <p class="text-end"><a href="" class="btn-sm btn btn-danger w-auto removeloan">Remove</a></p>
                            </div>
                        @endforeach
                    </div>
                    <div class="add-btn ">
                        <a  class="add btn btn-primary mb-0" id="addloan">Add</a>
                    </div>
                </div>
                <h5 class="text-dark fw-bold">Passport</h5>
                <div class="mb-3">
                    <label for="passport_number" class="form-label">Passport Number</label>
                    <input type="text" class="form-control" id="passport_number" name="passport_number" placeholder="" value="{{old('passport_number',$personal->passport_number)}}">
                </div>
                <div class="mb-3">
                    <label for="passport_start_date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="passport_start_date" name="passport_start_date" placeholder="" value="{{old('passport_start_date',$personal->passport_start_date)}}">
                </div>
                <div class="mb-3">
                    <label for="passport_expire_date" class="form-label">Expire Date</label>
                    <input type="date" class="form-control" id="passport_expire_date" name="passport_expire_date" placeholder="" value="{{old('passport_expire_date',$personal->passport_expire_date)}}">
                </div>
                
                <div class="mb-3">
                    <label for="passport_issued_location" class="form-label">Issued Location</label>
                    <input type="text" class="form-control" id="passport_issued_location" name="passport_issued_location" placeholder="" value="{{old('passport_issued_location',$personal->passport_issued_location)}}">
                </div>
                <div class="mb-3">
                    <label for="passport_reminder_date" class="form-label">Reminder Date</label>
                    <input type="date" class="form-control" id="passport_reminder_date" name="passport_reminder_date" placeholder="" value="{{old('passport_reminder_date',$personal->passport_reminder_date)}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Passport documents</label>
                    <div class="upload-btn d-flex align-items-start">
                        <input type="file" class="form-control upload" id="passport_documents" name="passport_documents"  multiple>
                        <label for="passport_documents" class="form-label btn btn-primary mb-0">Upload</label>
                        <span class="file-name text-dark"></span>
                    </div>
                </div>
                <h5 class="text-dark fw-bold">Driving License</h5>
                <div class="mb-3">
                    <label for="driving_license_number" class="form-label">Driving License Number</label>
                    <input type="text" class="form-control" id="driving_license_number" name="driving_license_number" placeholder="" value="{{old('driving_license_number',$personal->driving_license_number)}}">
                </div>
                <div class="mb-3">
                    <label for="driving_license_start_date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="driving_license_start_date" name="driving_license_start_date" placeholder="" value="{{old('driving_license_start_date',$personal->driving_license_start_date)}}">
                </div>
                <div class="mb-3">
                    <label for="driving_license_expire_date" class="form-label">Expire Date</label>
                    <input type="date" class="form-control" id="driving_license_expire_date" name="driving_license_expire_date" placeholder="" value="{{old('driving_license_expire_date',$personal->driving_license_expire_date)}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Driving License documents</label>
                    <div class="upload-btn d-flex align-items-start">
                        <input type="file" class="form-control upload" id="driving_license_documents" name="driving_license_documents"  multiple>
                        <label for="driving_license_documents" class="form-label btn btn-primary mb-0">Upload</label>
                        <span class="file-name text-dark"></span>
                    </div>
                </div>
                <h5 class="text-dark fw-bold">Others</h5>
                <div class="" >
                    <div id="other_wrapper">
                        @foreach($personal->others as $other)
                            <div class="other-wrapper border-bottom border-secondary mb-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">Type</label>
                                    <select name="other_type[]" class="form-control">
                                    <option value="">Select Type</option>
                                        @foreach($othertypes as $othertype) 
                                            <option value="{{$othertype->id}}" @if($othertype->id==$other->personalother_type_id) selected="selected" @endif>{{$othertype->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Label</label>
                                    <input type="text" name="other_label[]" class="form-control" value="{{$other->label}}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Company Name</label>
                                    <input type="text" name="other_company_name[]" class="form-control" value="{{$other->company_name}}">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="" class="form-label">Telephone Number</label>
                                    <input type="text" name="other_telephone_number[]" class="form-control" value="{{$other->telephone_number}}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Renewal Date</label>
                                    <input type="date" name="other_renewal_date[]" class="form-control" value="{{$other->renewal_date}}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Reminder Date</label>
                                    <input type="date" name="other_reminder_date[]" class="form-control" value="{{$other->reminder_date}}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Contact</label>
                                    <input type="text" name="other_contact[]" class="form-control" value="{{$other->contact}}">
                                </div>
                                <p class="text-end"><a href="" class="btn-sm btn btn-danger w-auto removeother">Remove</a></p>
                            </div>
                        @endforeach
                    </div>
                    <div class="add-btn ">
                        <a  class="add btn btn-primary mb-0" id="addother">Add</a>
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
    $('#addloan').click(function(e){
        e.preventDefault();
        $.get('{{route('app.getloanpartial')}}',function(dt){
            $('#loan_wrapper').append(dt);
        })
    })
    $(document).on('click','.removeloan',function(e){
        e.preventDefault();
        $(this).parent().parent().remove();
    })
    $('#addother').click(function(e){
        e.preventDefault();
        $.get('{{route('app.getotherpartial',['type'=>'personal'])}}',function(dt){
            $('#other_wrapper').append(dt);
        })
    })
    $(document).on('click','.removeother',function(e){
        e.preventDefault();
        $(this).parent().parent().remove();
    })
})
</script>
@endpush