<form name="frmeditwallet" id="frmeditwallet" method="post" action="{{route('app.updatewallet',['wallet'=>$wallet->id])}}" class="text-dark">
    @csrf
    <div class="alert alert-danger" style="display:none"></div>
    <div class="row mb-3">
        <div class="col-md-12">
            <label>Name</label>
            <input type="text" name="name" id="walletname" class="form-control" value="{{$wallet->name}}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label>Colour</label>
            <input type="color" name="colour" id="colour" class="form-control form-control-color" value="{{$wallet->colour}}">
        </div>
        <div class="col-md-6">
            <label>icon</label>
            <input type="text" name="icon" id="icon" class="form-control" value="{{$wallet->icon}}">
        </div>
    </div>
    <div class="row justify-content-end mb-3">
        <div class="col md-12"><button type="submit" class="btn btn-primary">Update</button></div>
    </div>
</form>
@push('scripts')
<script>
    $(document).ready(function(){
        
    })
</script>
@endpush