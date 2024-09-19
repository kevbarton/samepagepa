@extends('layouts.app')
@section('pageTitle','Samepage')
@section('bodyClass','')
@section('mainClass','page-wrapper wallet-pages pt-4')
@section('containerClass','container pb-100 pt-4')
@section('title','Add Pet')
@section('backlink',route('app.wallets.pets'))
@section('content')
    <form action="{{route('app.wallets.savepet')}}" class="form" method="post">
        @csrf   
                
                <div class="mb-3">
                    <label for="pet_name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="pet_name" name="pet_name" placeholder="" >
                </div>
                <div class="mb-3">
                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="" >
                </div>
                <div class="mb-3">
                    <label for="checkup" class="form-label">Checkup</label>
                    <input type="text" class="form-control" id="checkup" name="checkup" placeholder="" >
                </div>

                <div class="mb-3">
                    <label for="chip_number" class="form-label">Chip Number</label>
                    <input type="text" class="form-control" id="chip_number" name="chip_number" placeholder="" >
                </div>
                <div class="mb-3">
                    <label for="pedigree_certificate" class="form-label">Pedigree Certificate</label>
                    <input type="text" class="form-control" id="pedigree_certificate" name="pedigree_certificate" placeholder="" >
                </div>
                <div class="mb-3">
                    <label for="vet_name" class="form-label">Vet Name</label>
                    <input type="text" class="form-control" id="vet_name" name="vet_name" placeholder="" >
                </div>
                <div class="mb-3">
                    <label for="vet_telephone_number" class="form-label">Vet Telephone Number</label>
                    <input type="text" class="form-control" id="vet_telephone_number" name="vet_telephone_number" placeholder="" >
                </div>
                <h5 class="text-dark fw-bold">Medications</h5>
                <div class="" >
                    <div id="medication_wrapper"></div>
                    <div class="add-btn mb-3">
                        <a  class="add btn btn-primary mb-0" id="addmedication">Add</a>
                    </div>
                </div>
                <h5 class="text-dark fw-bold">Pet Insurance</h5>
                <div class="mb-3">
                    <input type="hidden" name="insurance_type_id" value="3">
                    <input type="hidden" name="insurance_type_name" value="Pet">
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
                
               
                <div class="form-footer text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

           </form>
@endsection
@push('scripts')
<script>
$(document).ready(function(){
   
   $('#addmedication').click(function(e){
        e.preventDefault();
        $('#medication_wrapper').append(`<div class="border-bottom border-secondary p-2 mb-3"><div class="row">
                                            <div class="col-12">
                                                <input type="text" name="medications[]" class="form-control" />
                                            </div>
                                            <div class="col-12 text-end"><a href="" class="text-dark removemedication">Remove</a></div>
                                        </div></div>`);
   });

   $(document).on('click','.removemedication',function(){
        $(this).parent().parent().parent().remove();
   });

   
})
</script>
@endpush