<div class="event-popup-wrapper  position-relative" style="border-radius:12px;" id="event-short">
            <div class="event-popup-inner justify-content-start">
                <div class="popup-content-wrapper mw-100 w-100" style="border-left-color: #599C90;">
                    <div class="popup-header d-flex align-items-center">
                        <h6 class="text-dark font-weight-bold mb-1">{{$event->title}}</h6>
                        @if(!empty($event->time1)||!empty($event->time2))
                            <div class="task-tag ms-auto ps-4 mb-1">
                                @if(!empty($event->time1))<h6 class="task-tag-text mb-0 text-dark">{{date('g:i a',strtotime($event->date.' '.$event->time1))}}</h6>@endif
                                @if(!empty($event->time2))<h6 class="task-tag-text mb-0 text-dark">{{date('g:i a',strtotime($event->date.' '.$event->time2))}}</h6>@endif
                            </div>
                        @endif
                    </div>
                    <div class="location-wrapper paragraph-wrapper">
                        <p>{{$event->location}}</p>
                    </div>
                    <!-- <div class="notification-category mt-2 d-flex">
                        <span class="options-item has-icon active">
                            <span class="options-text"><span class="icon" style="background-color: #8861DC;"><img src="app-assets/img/fi-rr-inbox.svg" alt=""></span> </span>
                        </span>
                    </div> -->
                     <!-- Profile List Bar Starts -->
                     <div class="mb-3 add-people mt-3">
                        <h6 class="text-dark small-text mb-1">Add People</h6>
                        <div class="profile-main-wrapper pe-4">
                            <ul class="profiles-list pt-1">
                                @foreach(auth()->user()->familymembers as $fam)
                                <li class="profile-wrapper @if(in_array($fam->id,$event->members->pluck('id')->toArray())) added @else not-added @endif">
                                        <a href="" class="fam-member" data-member="{{$fam->id}}"  data-event="{{$event->id}}">
                                            <div class="image-wrapper">
                                                @if($fam->getMedia('avatar')->first())
                                                <img src="{{$fam->getMedia('avatar')->first()->getUrl('thumb')}}" alt="{{$fam->first_name.''.$fam->last_name}}" />
                                                @else
                                                <img src="{{asset('app-assets/img/Ellipse 8.png')}}" alt="">
                                                @endif
                                            </div>
                                            <span class="cross-icon icon-wrap"></span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- Profile List Bar Ends -->
                    <div class="form-footer text-left pt-3 mt-3 add-event-footer d-flex align-items-center gap-3">
                        <!-- <button type="submit" class="btn btn-primary">Add a new pet</button> -->
    
                        <div class="edit-btn-wrapper" id="event-short-view">
                            <button class="btn btn-light btn-small">View</button>
                        </div>
    
                        <div class="cancel-button d-flex">
                            <a href="#" class="text-link cancel-link text-dark" data-bs-dismiss="modal" >Cancel</a>
                        </div>
    
                    </div>
    
                </div>
            </div>
</div>
<form class="event-details-wrapper p-3" id="event-details" style="display:none;"> 
                
                <div class="event-title-wrapper event-detail-block">
                    <h6 class="text-dark small-text mb-1">Title</h6>
                    <div class="paragraph-wrapper">
                        <p class="text-dark">{{$event->title}}</p>
                    </div>
                </div>

                <div class="event-description-wrapper mt-3 event-detail-block">
                    <h6 class="text-dark small-text mb-1">Description</h6>
                    <div class="paragraph-wrapper">
                        <p class="text-dark">{{$event->description}}</p>
                    </div>
                </div>

                <!-- <div class="assign-wallet-bar mt-3 event-detail-block">
                    <h6 class="text-dark small-text mb-1">Wallet</h6>
                    <div class="options-navigation-bar justify-content-start">
                        <ul class="options-list">
                            <li class="options-item has-icon"><span class="options-text">
                                <span class="icon" style="background-color: #DB383E;"><img src="app-assets/img/important-dates.svg" alt=""></span> </span>
                            </li>
                            
                        </ul>
                    </div>
                </div> -->

                 <!-- Profile List Bar Starts -->
                 <div class="mt-4 add-people event-detail-block">
                    <h6 class="text-dark small-text mb-1">Family Members</h6>
                    <div class="profile-main-wrapper pe-4">
                        <ul class="profiles-list pt-1">
                        @foreach(auth()->user()->familymembers as $fam)
                                    <li class="profile-wrapper @if(in_array($fam->id,$event->members->pluck('id')->toArray())) added @else not-added @endif">
                                        <a href="" class="fam-member" data-member="{{$fam->id}}"  data-event="{{$event->id}}">
                                            <div class="image-wrapper">
                                                @if($fam->getMedia('avatar')->first())
                                                <img src="{{$fam->getMedia('avatar')->first()->getUrl('thumb')}}" alt="{{$fam->first_name.''.$fam->last_name}}" />
                                                @else
                                                <img src="{{asset('app-assets/img/Ellipse 8.png')}}" alt="">
                                                @endif
                                            </div>
                                            <span class="cross-icon icon-wrap"></span>
                                        </a>
                                    </li>
                                @endforeach
                        </ul>
                    </div>
                </div>
                <!-- Profile List Bar Ends -->

                <div class="mt-4 event-detail-block map-block">
                    <h6 class="text-dark small-text mb-1">Location</h6>
                    <p>{{$event->location}}</p>
                    @if(!empty($event->lat)&&!empty($event->long))
                        <div class="map-wrapper">
                            <div id="map" class="w-100" style="height: 400px"></div>
                        </div>
                    @endif
                </div>

               

                <div class="form-footer text-left pt-3 mt-3 update-event-footer d-flex align-items-center gap-3">
                    <!-- <button type="submit" class="btn btn-primary">Add a new pet</button> -->

                    <div class="edit-event">
                        <a href="{{route('app.events.edit',['appevent'=>$event->id])}}" class="btn btn-dark btn-small">Edit Event</a>
                    </div>

                    <div class="cancel-button " id="event-detail-cancel">
                        <a href="#" class="text-link cancel-link text-dark">Cancel</a>
                    </div>

                </div>

            </form>

<script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
    ({key: "{{env('GOOGLE_MAPS_API_KEY')}}", v: "weekly"});</script>

<script>
    async function initMap() {
  // Request needed libraries.
  const { Map } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
  const map = new Map(document.getElementById("map"), {
    center: { lat: {{$event->lat}}, lng: {{$event->long}} },
    zoom: 14,
    mapId: "4504f8b37365c3d0",
  });
  const marker = new AdvancedMarkerElement({
    map,
    position: { lat: {{$event->lat}}, lng: {{$event->long}} },
  });
}

initMap();
</script>
