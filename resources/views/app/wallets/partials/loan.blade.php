<div class="loan-wrapper border-bottom border-secondary mb-3">
    <div class="mb-3">
        <label for="" class="form-label">Type</label>
        <select name="loan_type[]" class="form-control">
            <option value="">Select Type</option>
            @foreach($loantypes as $loantype) 
                <option value="{{$loantype->id}}">{{$loantype->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Company Name</label>
        <input type="text" name="loan_company_name[]" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Amount</label>
        <input type="text" name="loan_amount[]" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Policy Number</label>
        <input type="text" name="loan_policy_number[]" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Telephone Number</label>
        <input type="text" name="loan_telephone_number[]" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Renewal Date</label>
        <input type="date" name="loan_renewal_date[]" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Reminder Date</label>
        <input type="date" name="loan_reminder_date[]" class="form-control" >
    </div>
    <p class="text-end"><a href="" class="btn-sm btn btn-danger w-auto removeloan">Remove</a></p>
</div>