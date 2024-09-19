@extends('layouts.app')
@section('pageTitle','Samepage')
@section('bodyClass','')
@section('mainClass','page-wrapper page-sticky-wrapper wallet-pages pt-4 calendar-pages calendar-mobile')
@section('containerClass','container pb-100 pt-4')
@section('title','')
@section('backlink',route('appusergetstarted.menu'))
@section('content')
<div class="week-time-wrapper">
    <div class="row justify-content-between">
        <div class="col-3 text-dark"><a href="{{route('app.user.home',['dt'=>date('Y-m-d',$prevdate->timestamp)])}}"><i class="fa-solid fa-circle-arrow-left"></i></a></div>
        <div class="col-6 text-center"><h3 class="text-center fw-bold text-dark">{{date('F',$activedate->timestamp)}}</h3></div>
        <div class="col-3 text-end text-dark" ><a href="{{route('app.user.home',['dt'=>date('Y-m-d',$nextdate->timestamp)])}}"><i class="fa-solid fa-circle-arrow-right"></i></a></div>
    </div>
    <ul>
        <li @if($weekdays[0]->active) class="active" @endif>
            <a href="{{route('app.user.home',['dt'=>date('Y-m-d',$weekdays[0]->timestamp)])}}" class="text-decoration-none d-flex flex-column text-center">
            <span class="day">M</span>
            <span class="date">{{str_pad($weekdays[0]->day,2,'0',STR_PAD_LEFT)}}</span>
            </a>
        </li>
        <li @if($weekdays[1]->active) class="active" @endif>
        <a href="{{route('app.user.home',['dt'=>date('Y-m-d',$weekdays[1]->timestamp)])}}" class="text-decoration-none d-flex flex-column text-center">
            <span class="day">T</span>
            <span class="date">{{str_pad($weekdays[1]->day,2,'0',STR_PAD_LEFT)}}</span>
            </a>

        </li>
        <li @if($weekdays[2]->active) class="active" @endif>
        <a href="{{route('app.user.home',['dt'=>date('Y-m-d',$weekdays[2]->timestamp)])}}" class="text-decoration-none d-flex flex-column text-center">
            <span class="day">W</span>
            <span class="date">{{str_pad($weekdays[2]->day,2,'0',STR_PAD_LEFT)}}</span>
            </a>
        </li>
        <li @if($weekdays[3]->active) class="active" @endif>
        <a href="{{route('app.user.home',['dt'=>date('Y-m-d',$weekdays[3]->timestamp)])}}" class="text-decoration-none d-flex flex-column text-center">
            <span class="day">T</span>
            <span class="date">{{str_pad($weekdays[3]->day,2,'0',STR_PAD_LEFT)}}</span>
            </a>

        </li>
        <li @if($weekdays[4]->active) class="active" @endif>
        <a href="{{route('app.user.home',['dt'=>date('Y-m-d',$weekdays[4]->timestamp)])}}" class="text-decoration-none d-flex flex-column text-center">
            <span class="day">F</span>
            <span class="date">{{str_pad($weekdays[4]->day,2,'0',STR_PAD_LEFT)}}</span>
            </a>

        </li>
        <li @if($weekdays[5]->active) class="active" @endif>
        <a href="{{route('app.user.home',['dt'=>date('Y-m-d',$weekdays[5]->timestamp)])}}" class="text-decoration-none d-flex flex-column text-center">
            <span class="day">S</span>
            <span class="date">{{str_pad($weekdays[5]->day,2,'0',STR_PAD_LEFT)}}</span>
            </a>
        </li>
        <li @if($weekdays[6]->active) class="active" @endif>
        <a href="{{route('app.user.home',['dt'=>date('Y-m-d',$weekdays[6]->timestamp)])}}" class="text-decoration-none d-flex flex-column text-center">
            <span class="day">S</span>
            <span class="date">{{str_pad($weekdays[6]->day,2,'0',STR_PAD_LEFT)}}</span>
            </a>
        </li>
    </ul>
</div>
@if(count($members))
<div class="profile-main-wrapper mt-3">
    <ul class="profiles-list">
        @foreach($members as $member)
        <li class="profile-wrapper previous">
            <a href="{{route('app.user.home',['dt'=>date('Y-m-d',$activedate->timestamp),'uid'=>$member->id])}}"><div class="image-wrapper">
                @if($member->getMedia('avatar')->first())
                <img src="{{$member->getMedia('avatar')->first()->getUrl('thumb')}}" alt="{{$member->first_name.''.$member->last_name}}" />
                @else
                <img src="{{asset('app-assets/img/Ellipse 8.png')}}" alt="">
                @endif
            </div>
        </a>
        </li>
        @endforeach
        
    </ul>
</div>
@endif 
<div class="reminders-main-wrapper mt-4">
    <div class="today-remninders">
        <div class="title-bar d-flex justify-content-between align-items-center">
            <h5 class="text-dark font-weight-bold mb-0">Your day</h5>
            <button class="suggesion-button btn-primary btn dropdown-button mb-0">Summarise my day</button>
        </div>
        @if(count($taskevents))
        <div class="dropdown-details-wrapper bg-primary">
            <div class="description-wrapper p-3">
                <p class="text-dark mb-0">
                    You need to Loki to the <a href="#">vets at 2pm</a> and Ben has <a href="#">football practise at 4pm</a>. After that you're having a <a href="#">coffee with Pete at 5pm</a> in town.
                </p>
            </div>
        </div>
        @endif
        @if(count($taskevents)>1)
        <div class="reminder-toggle-buttons d-flex justify-content-end mt-3">
            <button class="text-link toggle-btn">Expand</button>
        </div>
        @endif

        <div class="reminders-list collapsed-data">
            @foreach($taskevents as $taskevent)
                <a @if($taskevent->type=='task')href="{{route('app.user.tasks')}}" @else  data-bs-toggle="modal" data-bs-target="#taskeventpopup" data-type="{{$taskevent->type}}" data-id="{{$taskevent->id}}" @endif class="text-decoration-none reminder-card collapsed-cards d-flex align-items-center" style="border-left-color: rgb(238, 197, 72); z-index: {{(100-$loop->index+1)}}; transform: scale({{(1-($loop->index*0.02))}}); height: 74px;@if(!$loop->first) margin-top: -74px; @endif">
                    <div class="d-flex flex-column reminder-details">
                        <span class="color-bar" style="background-color: #EEC548;"></span>
                        <h6 class="reminder-title">{{$taskevent->title}}</h6>
                        <!-- <h6 class="mb-0 reminder-category font-weight-bold"></h6> -->
                    </div>
                    @if(!empty($taskevent->time1)||!empty($taskevent->time2))
                    <div class="reminder-timing ms-auto d-flex flex-column justify-content-center align-items-end">
                        @if(!empty($taskevent->time1))<span class="time">{{date('g:i a',strtotime($taskevent->date.' '.$taskevent->time1))}}</span>@endif
                        @if(!empty($taskevent->time2))<span class="time">{{date('g:i a',strtotime($taskevent->date.' '.$taskevent->time2))}}</span>@endif
                    </div>
                    @endif
                
                </a>
            @endforeach
        </div>
    </div>
    @if(count($upcomingtaskevents))
    <div class="upcoming-remninders mt-4">
        <div class="title-bar d-flex justify-content-between align-items-center">
            <h5 class="text-dark font-weight-bold mb-0">Upcoming</h5>
        </div>
        <div class="reminders-list">
            @foreach($upcomingtaskevents as $taskevent)
            <a  @if($taskevent->type=='task')href="{{route('app.user.tasks')}}" @else  data-bs-toggle="modal" data-bs-target="#taskeventpopup" data-type="{{$taskevent->type}}" data-id="{{$taskevent->id}}" @endif   class="text-decoration-none reminder-card collapsed-cards d-flex align-items-center" style="border-left-color: #DD3A3A;">
                <div class="d-flex flex-column reminder-details">
                    <h6 class="reminder-title">{{$taskevent->title}}</h6>
                    <!-- <h6 class="mb-0 reminder-category font-weight-bold"></h6> -->
                </div>
                <div class="reminder-timing ms-auto d-flex flex-column justify-content-center align-items-end">
                    <span class="time">{{\Carbon\Carbon::parse($taskevent->date.' '.$taskevent->time1)->diffForHumans(\Carbon\Carbon::now())}}</span>
                </div>
            </a>
            @endforeach
            
        </div>
    </div>
    @endif
</div>
<div class="modal" tabindex="-1" id="taskeventpopup">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content p-0">
      
      <div class="modal-body p-0">
      
      </div>
      
    </div>
  </div>
</div>

@endsection
@push('scripts')
<script>
    $(document).ready(function() {

        const taskeventpopup = document.getElementById('taskeventpopup')
        taskeventpopup.addEventListener('shown.bs.modal', event => {
            $('#taskeventpopup .modal-body').empty();
        })
        taskeventpopup.addEventListener('shown.bs.modal', event => {
            $('#taskeventpopup .modal-body').empty();
            item=event.relatedTarget;
            id=$(item).data('id');
            typ=$(item).data('type');
            //console.log(typ)
            url='';
            if(typ=='task'){
                url='/app/user/gettask/'+id;
            }
            if(typ=='event'){
                url='/app/user/getevent/'+id;
            }
            console.log(url)
            if(url!=''){
                $.get(url,function(data){
                    $('#taskeventpopup .modal-body').html(data);
                })
            }
        })
        $(document).on('click','.fam-member',function(e){
            e.preventDefault();
            memberid=$(this).data('member');
            eventid=$(this).data('event');
            url='/app/user/event/'+eventid+'/addremovemember/'+memberid;
            th=$(this);
            $.get(url,function(data){
                if(data.attached){
                    if(th.parent().hasClass('not-added')){
                        th.parent().removeClass('not-added').addClass('added');
                    }else{
                        th.parent().addClass('added');
                    }
                }else{
                    if(th.parent().hasClass('added')){
                        th.parent().removeClass('added').addClass('not-added');
                    }else{
                        th.parent().addClass('not-added');
                    }
                }
            },'json');
        });
        $(document).on('click','#event-short-view button',function(){
            $('#event-short').hide();
            $('#taskeventpopup div.modal-content').addClass('modal-lg');
            $('#event-details').show();
            
        });
        $(document).on('click','#event-detail-cancel',function(){
            $('#event-details').hide();
            $('#taskeventpopup div.modal-content').removeClass('modal-lg');
            $('#event-short').show();
        });
    })
</script>
@endpush