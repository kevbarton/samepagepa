@extends('layouts.app')
@section('pageTitle','Samepage')
@section('bodyClass','')
@section('mainClass','page-wrapper wallet-pages pt-4')
@section('containerClass','container pb-100 pt-4')
@section('title','Edit Home')
@section('backlink',route('app.wallets.homes'))
@section('content')
    <form action="{{route('app.wallets.updatehome',['home'=>$home->id])}}" class="form" method="post">
        @csrf   
                <div class="mb-3">
                    <label for="home_address_label" class="form-label">Label</label>
                    <input type="text" class="form-control" id="home_address_label" name="home_address_label" placeholder="" value="{{old('home_address_label',$home->home_address_label)}}">
                </div>
                <div class="mb-3">
                    <label for="home_address_1" class="form-label">Address</label>
                    <input type="text" class="form-control" id="home_address_1" name="home_address_1" placeholder="" value="{{old('home_address_1',$home->home_address_1)}}">
                </div>
                <div class="mb-3">
                    <label for="home_address_2" class="form-label">Address 2</label>
                    <input type="text" class="form-control" id="home_address_2" name="home_address_2" placeholder="" value="{{old('home_address_2',$home->home_address_2)}}">
                </div>
                <div class="mb-3">
                    <label for="home_address_town" class="form-label">Town</label>
                    <input type="text" class="form-control" id="home_address_town" name="home_address_town" placeholder="" value="{{old('home_address_town',$home->home_address_town)}}">
                </div>
                <div class="mb-3">
                    <label for="home_address_city" class="form-label">City</label>
                    <input type="text" class="form-control" id="home_address_city" name="home_address_city" placeholder="" value="{{old('home_address_city',$home->home_address_city)}}">
                </div>
                <div class="mb-3">
                    <label for="home_address_postcode" class="form-label">Postcode</label>
                    <input type="text" class="form-control" id="home_address_postcode" name="home_address_postcode" placeholder="" value="{{old('home_address_postcode',$home->home_address_postcode)}}">
                </div>
                <h5 class="text-dark fw-bold">Home Insurance</h5>
                <div class="mb-3">
                    <input type="hidden" name="insurance_type_id" value="4">
                    <input type="hidden" name="insurance_type_name" value="Home">
                    <label for="insurance_company_name" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="insurance_company_name" name="insurance_company_name" placeholder="" value="{{old('insurance_company_name',($home->insurance?$home->insurance->company_name:''))}}">
                </div>
                <div class="mb-3">
                    <label for="insurance_telephone_number" class="form-label">Telephone Number</label>
                    <input type="text" class="form-control" id="insurance_telephone_number" name="insurance_telephone_number" placeholder="" value="{{old('insurance_telephone_number',($home->insurance?$home->insurance->telephone_number:''))}}">
                </div>
                <div class="mb-3">
                    <label for="insurance_policy_number" class="form-label">Policy Number</label>
                    <input type="text" class="form-control" id="insurance_policy_number" name="insurance_policy_number" placeholder="" value="{{old('insurance_policy_number',($home->insurance?$home->insurance->policy_number:''))}}">
                </div>
                <div class="mb-3">
                    <label for="insurance_cost" class="form-label">Cost</label>
                    <input type="text" class="form-control" id="insurance_cost" name="insurance_cost" placeholder="" value="{{old('insurance_cost',($home->insurance?$home->insurance->cost:''))}}">
                </div>
                <div class="mb-3">
                    <label for="insurance_renewal_date" class="form-label">Renewal Date</label>
                    <input type="date" class="form-control" id="insurance_renewal_date" name="insurance_renewal_date" placeholder="" value="{{old('insurance_renewal_date',($home->insurance?$home->insurance->renewable_date:''))}}">
                </div>
                <div class="mb-3">
                    <label for="insurance_claim_number" class="form-label">Claim Number</label>
                    <input type="text" class="form-control" id="insurance_claim_number" name="insurance_claim_number" placeholder="" value="{{old('insurance_claim_number',($home->insurance?$home->insurance->claim_number:''))}}">
                </div>
                <div class="mb-3">
                    <label for="insurance_reminder_date" class="form-label">Reminder Date</label>
                    <input type="date" class="form-control" id="insurance_reminder_date" name="insurance_reminder_date" placeholder="" value="{{old('insurance_reminder_date',($home->insurance?$home->insurance->reminder_date:''))}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Insurance documents</label>
                    <div class="upload-btn d-flex align-items-start">
                        <input type="file" class="form-control upload" id="insurance_documents" name="insurance_documents"  multiple>
                        <label for="insurance_documents" class="form-label btn btn-primary mb-0">Upload</label>
                        <span class="file-name text-dark"></span>
                    </div>
                </div>
                
                <h5 class="text-dark fw-bold">Mortgage</h5>
                <div class="mb-3">
                    <label for="home_mortgage_company_name" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="home_mortgage_company_name" name="home_mortgage_company_name" placeholder="" value="{{old('home_mortgage_company_name',$home->home_mortgage_company_name)}}">
                </div>
                <div class="mb-3">
                    <label for="home_mortgage_amount" class="form-label">Amount</label>
                    <input type="text" class="form-control" id="home_mortgage_amount" name="home_mortgage_amount" placeholder="" value="{{old('home_mortgage_amount',$home->home_mortgage_amount)}}">
                </div>
                <div class="mb-3">
                    <label for="home_mortgage_policy_number" class="form-label">Policy Number</label>
                    <input type="text" class="form-control" id="home_mortgage_policy_number" name="home_mortgage_policy_number" placeholder="" value="{{old('home_mortgage_policy_number',$home->home_mortgage_policy_number)}}">
                </div>
                <div class="mb-3">
                    <label for="home_mortgage_telephone_number" class="form-label">Telephone Number</label>
                    <input type="text" class="form-control" id="home_mortgage_telephone_number" name="home_mortgage_telephone_number" placeholder="" value="{{old('home_mortgage_telephone_number',$home->home_mortgage_telephone_number)}}">
                </div>
                <div class="mb-3">
                    <label for="home_mortgage_renewal_date" class="form-label">Renewal Date</label>
                    <input type="date" class="form-control" id="home_mortgage_renewal_date" name="home_mortgage_renewal_date" placeholder="" value="{{old('home_mortgage_renewal_date',$home->home_mortgage_renewal_date)}}">
                </div>
                <div class="mb-3">
                    <label for="home_mortgage_reminder_date" class="form-label">Reminder Date</label>
                    <input type="date" class="form-control" id="home_mortgage_reminder_date" name="home_mortgage_reminder_date" placeholder="" value="{{old('home_mortgage_reminder_date',$home->home_mortgage_reminder_date)}}">
                </div>
                
                <h5 class="text-dark fw-bold">Others</h5>
                <div class="" >
                    <div id="other_wrapper">
                        @foreach($home->others as $other)
                            <div class="other-wrapper border-bottom border-secondary mb-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">Type</label>
                                    <select name="other_type[]" class="form-control">
                                    <option value="">Select Type</option>
                                        @foreach($othertypes as $othertype) 
                                            <option value="{{$othertype->id}}" @if($othertype->id==$other->homeother_type_id) selected="selected" @endif>{{$othertype->name}}</option>
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
   
    $('#addother').click(function(e){
        e.preventDefault();
        $.get('{{route('app.getotherpartial',['type'=>'home'])}}',function(dt){
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