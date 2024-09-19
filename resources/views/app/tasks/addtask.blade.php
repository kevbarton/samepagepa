@extends('layouts.app')
@section('pageTitle','Samepage')
@section('bodyClass','')
@section('mainClass','page-wrapper page-sticky-wrapper wallet-pages pt-4')
@section('containerClass','container pb-100 pt-4')
@section('title','Add Task')
@section('backlink',route('appusergetstarted.menu'))
@section('content')
<form action="{{route('app.tasks.save')}}" method="post" class="add-event-form">
<!-- <div class="assign-wallet-bar my-3">
                    <h6 class="text-dark">Assign Wallet</h6>
                    <div class="options-navigation-bar justify-content-start">
                        <ul class="options-list">
                            @foreach(auth()->user()->wallets as $wallet)
                            <li class="options-item has-icon wallet-option">
                            <input type="radio" @if($loop->index==0) checked="checked" @endif name="wallet_id" id="wallet_id-{{$wallet->id}}" value="{{$wallet->id}}" class="wallet-radio" >
                                <label class="options-text" for="wallet_id-{{$wallet->id}}" >
                                    <span class="icon"></span> {{$wallet->name}}
                                </label>
                            </li>
                            @endforeach
                            
                        </ul>
                    </div>
            </div> -->
            
<div class="add-event-form-wrapper">
                    
                        @csrf    
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="" value="{{old('title','')}}">
                            @error('title')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3 d-flex field-group align-items-center gap-3">
                            <div class="field-row">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control @error('title') is-invalid @enderror" id="date" name="date" placeholder="" value="{{old('date','')}}">
                                @error('date')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="field-row repeat-dropdown-wrapper">
                                <label for="date" class="form-label">Repeat</label>
                                <div class="dropdown">
                                    <button class="dropdown-toggle repeat-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        value="{{old('repeat','No Repeat')}}"
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item repeat-item" data-repeat="No Repeat" href="#">No Repeat</a></li>
                                      <li><a class="dropdown-item repeat-item" data-repeat="Anually" href="#">Anually</a></li>
                                      <li><a class="dropdown-item repeat-item" data-repeat="Quarterly" href="#">Quarterly</a></li>
                                      <li><a class="dropdown-item repeat-item" data-repeat="Monthly" href="#">Monthly</a></li>
                                      
                                    </ul>
                                    <input type="hidden" name="repeat" id="repeat" value="{{old('repeat','No Repeat')}}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="time-start" class="form-label">Time</label>
                            <div class="multi-inputs d-flex w-100 justify-content-between gap-2 align-items-center">
                                <div class="flex-fill">
                                    <input type="time" class="form-control @error('timeStart') is-invalid @enderror" id="time-start" name="timeStart" placeholder="" value="{{old('timeStart','')}}">
                                    @error('timeStart')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="separator"></div>
                                <div class="flex-fill">
                                    <input type="time" class="form-control @error('timeEnd') is-invalid @enderror" id="time-end" name="timeEnd" placeholder=""  value="{{old('timeEnd','')}}">
                                    @error('timeEnd')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                               
                            </div>
                        </div>

                        <div class="mb-3 location-field">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" placeholder="" value="{{old('location','')}}">
                            <input type="hidden" name="place_id" id="place_id" value="{{old('place_id','')}}">
                            <input type="hidden" name="lat" id="lat" value="{{old('lat','')}}">
                            <input type="hidden" name="long" id="long" value="{{old('long','')}}">
                            @error('location')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" name="description" cols="30" rows="10" class="w-100">{{old('description','')}}</textarea>
                        </div>

                        <!-- Profile List Bar Starts -->
                        <div class="mb-3 add-people">
                            <label class="form-label">Add People</label>
                            <div class="profile-main-wrapper pe-4">
                                <ul class="profiles-list pt-1">
                                @foreach(auth()->user()->familymembers as $fam)
                                    <li class="profile-wrapper not-added">
                                        <a href="" class="family-member" data-fammember="#fam-{{$fam->id}}">
                                            <div class="image-wrapper">
                                                @if($fam->getMedia('avatar')->first())
                                                <img src="{{$fam->getMedia('avatar')->first()->getUrl('thumb')}}" alt="{{$fam->first_name.''.$fam->last_name}}" />
                                                @else
                                                <img src="{{asset('app-assets/img/Ellipse 8.png')}}" alt="">
                                                @endif
                                            </div>
                                            <span class="cross-icon icon-wrap"></span>
                                            <input type="checkbox" name="familymember[]" id="fam-{{$fam->id}}" value="{{$fam->id}}" class="d-none">
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- Profile List Bar Ends -->

                        <div class="form-footer text-left pt-3 mt-3 add-event-footer d-flex align-items-center gap-3">
                            <!-- <button type="submit" class="btn btn-primary">Add a new pet</button> -->

                            <div class="upload-btn ">
                                <input type="submit" class="form-control add" id="submit">
                                <label for="submit" class="form-label btn btn-dark text-light mb-0">Add Task</label>
                                <span class="file-name text-dark"></span>
                            </div>

                            <div class="cancel-button">
                                <a href="#" class="text-link cancel-link text-dark">Cancel</a>
                            </div>

                        </div>

                    
                </div>
                </form>
@endsection
@push('scripts')
<script 
    src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&loading=async&libraries=places">
</script>

<script>
$(document).ready(function(){
    input=document.getElementById('location');
    const options = {
  fields: ["place_id", "geometry","name"],
};
const autocomplete = new google.maps.places.Autocomplete(input, options);
autocomplete.addListener("place_changed", getplaceid);
function getplaceid(){
    const place = autocomplete.getPlace();
    $('#place_id').val(place.place_id);
    $('#lat').val(place.geometry.location.lat);
    $('#long').val(place.geometry.location.lng);
}
   $('.repeat-item').click(function(e){
    e.preventDefault();
    txt=$(this).data('repeat');
    $('#repeat').val(txt);
    $('.repeat-btn').html(txt);
   })

   $('.family-member').click(function(e){
    e.preventDefault();
    
    fam=$(this).data('fammember');
    console.log(fam)
    //$(fam).trigger('click');
    if($(fam).is(':checked')){
        $(fam).prop('checked',false);
    }else{
        $(fam).prop('checked',true);
    }
    if($(this).parent().hasClass('not-added')){
        $(this).parent().removeClass('not-added').addClass('added');
    }else{
        $(this).parent().removeClass('added').addClass('not-added');
    }
   })
   
})
</script>
@endpush