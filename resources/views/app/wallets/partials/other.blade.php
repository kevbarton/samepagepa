<div class="other-wrapper border-bottom border-secondary mb-3">
    <div class="mb-3">
        <label for="" class="form-label">Type</label>
        <select name="other_type[]" class="form-control">
        <option value="">Select Type</option>
            @foreach($othertypes as $othertype) 
                <option value="{{$othertype->id}}">{{$othertype->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Label</label>
        <input type="text" name="other_label[]" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Company Name</label>
        <input type="text" name="other_company_name[]" class="form-control" >
    </div>
    
    <div class="mb-3">
        <label for="" class="form-label">Telephone Number</label>
        <input type="text" name="other_telephone_number[]" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Renewal Date</label>
        <input type="date" name="other_renewal_date[]" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Reminder Date</label>
        <input type="date" name="other_reminder_date[]" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Contact</label>
        <input type="text" name="other_contact[]" class="form-control" >
    </div>
    <p class="text-end"><a href="" class="btn-sm btn btn-danger w-auto removeother">Remove</a></p>
</div>