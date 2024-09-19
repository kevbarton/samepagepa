@extends('layouts.app')
@section('pageTitle','Samepage')
@section('bodyClass','')
@section('mainClass','page-wrapper wallet-pages pt-4')
@section('containerClass','container pb-100 pt-4')
@section('title','Add Life Admin')
@section('backlink',route('app.wallets.lifeadmin'))
@section('content')
    <form action="{{route('app.wallets.savelifeadmin')}}" class="form" method="post">
    @csrf
                <h5 class="text-dark fw-bold">Life Insurance</h5>
                <div class="mb-3">
                    <input type="hidden" name="insurance_type_id" value="1">
                    <input type="hidden" name="insurance_type_name" value="Life">
                    <label for="insurance_company_name" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="insurance_company_name" name="insurance_company_name" placeholder="" >
                </div>
                <div class="mb-3">
                    <label for="insurance_telephone_number" class="form-label">Telephone Number</label>
                    <input type="text" class="form-control" id="insurance_telephone_number" name="insurance_telephone_number" placeholder="" >
                </div>
                <div class="mb-3">
                    <label for="insurance_policy_number" class="form-label">Policy Number</label>
                    <input type="text" class="form-control" id="insurance_policy_number" name="insurance_policy_number" placeholder="" >
                </div>
                <div class="mb-3">
                    <label for="insurance_cost" class="form-label">Cost</label>
                    <input type="text" class="form-control" id="insurance_cost" name="insurance_cost" placeholder="" >
                </div>
                <div class="mb-3">
                    <label for="insurance_renewal_date" class="form-label">Renewal Date</label>
                    <input type="date" class="form-control" id="insurance_renewal_date" name="insurance_renewal_date" placeholder="" >
                </div>
                <div class="mb-3">
                    <label for="insurance_claim_number" class="form-label">Claim Number</label>
                    <input type="text" class="form-control" id="insurance_claim_number" name="insurance_claim_number" placeholder="" >
                </div>
                <div class="mb-3">
                    <label for="insurance_reminder_date" class="form-label">Reminder Date</label>
                    <input type="date" class="form-control" id="insurance_reminder_date" name="insurance_reminder_date" placeholder="" >
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
                    <div id="loan_wrapper"></div>
                    <div class="add-btn ">
                        <a  class="add btn btn-primary mb-0" id="addloan">Add</a>
                    </div>
                </div>
                <h5 class="text-dark fw-bold">Passport</h5>
                <div class="mb-3">
                    <label for="passport_number" class="form-label">Passport Number</label>
                    <input type="text" class="form-control" id="passport_number" name="passport_number" placeholder="" >
                </div>
                <div class="mb-3">
                    <label for="passport_start_date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="passport_start_date" name="passport_start_date" placeholder="" >
                </div>
                <div class="mb-3">
                    <label for="passport_expire_date" class="form-label">Expire Date</label>
                    <input type="date" class="form-control" id="passport_expire_date" name="passport_expire_date" placeholder="" >
                </div>
                
                <div class="mb-3">
                    <label for="passport_issued_location" class="form-label">Issued Location</label>
                    <input type="text" class="form-control" id="passport_issued_location" name="passport_issued_location" placeholder="" >
                </div>
                <div class="mb-3">
                    <label for="passport_reminder_date" class="form-label">Reminder Date</label>
                    <input type="date" class="form-control" id="passport_reminder_date" name="passport_reminder_date" placeholder="" >
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
                    <input type="text" class="form-control" id="driving_license_number" name="driving_license_number" placeholder="" >
                </div>
                <div class="mb-3">
                    <label for="driving_license_start_date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="driving_license_start_date" name="driving_license_start_date" placeholder="" >
                </div>
                <div class="mb-3">
                    <label for="driving_license_expire_date" class="form-label">Expire Date</label>
                    <input type="date" class="form-control" id="driving_license_expire_date" name="driving_license_expire_date" placeholder="" >
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
                    <div id="other_wrapper"></div>
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