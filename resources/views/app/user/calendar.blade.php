@extends('layouts.app')
@section('pageTitle','Samepage')
@section('bodyClass','')
@section('mainClass','page-wrapper page-sticky-wrapper wallet-pages pt-4 calendar-pages calendar-mobile')
@section('containerClass','container pt-4')
@section('title','')
@section('backlink',route('app.user.home'))
@section('content')
<div class="week-time-wrapper">
<div class="row justify-content-between">
        <div class="col-3 text-dark"><a href="{{route('app.user.calendar',['dt'=>date('Y-m-d',$prevdate->timestamp)])}}"><i class="fa-solid fa-circle-arrow-left"></i></a></div>
        <div class="col-6 text-center"><h3 class="text-center fw-bold text-dark">{{date('F',$activedate->timestamp)}}</h3></div>
        <div class="col-3 text-end text-dark" ><a href="{{route('app.user.calendar',['dt'=>date('Y-m-d',$nextdate->timestamp)])}}"><i class="fa-solid fa-circle-arrow-right"></i></a></div>
    </div>
    <ul>
        <li @if($weekdays[0]->active) class="active" @endif>
            <a href="{{route('app.user.calendar',['dt'=>date('Y-m-d',$weekdays[0]->timestamp)])}}" class="text-decoration-none d-flex flex-column text-center">
            <span class="day">M</span>
            <span class="date">{{str_pad($weekdays[0]->day,2,'0',STR_PAD_LEFT)}}</span>
            </a>
        </li>
        <li @if($weekdays[1]->active) class="active" @endif>
        <a href="{{route('app.user.calendar',['dt'=>date('Y-m-d',$weekdays[1]->timestamp)])}}" class="text-decoration-none d-flex flex-column text-center">
            <span class="day">T</span>
            <span class="date">{{str_pad($weekdays[1]->day,2,'0',STR_PAD_LEFT)}}</span>
            </a>

        </li>
        <li @if($weekdays[2]->active) class="active" @endif>
        <a href="{{route('app.user.calendar',['dt'=>date('Y-m-d',$weekdays[2]->timestamp)])}}" class="text-decoration-none d-flex flex-column text-center">
            <span class="day">W</span>
            <span class="date">{{str_pad($weekdays[2]->day,2,'0',STR_PAD_LEFT)}}</span>
            </a>
        </li>
        <li @if($weekdays[3]->active) class="active" @endif>
        <a href="{{route('app.user.calendar',['dt'=>date('Y-m-d',$weekdays[3]->timestamp)])}}" class="text-decoration-none d-flex flex-column text-center">
            <span class="day">T</span>
            <span class="date">{{str_pad($weekdays[3]->day,2,'0',STR_PAD_LEFT)}}</span>
            </a>

        </li>
        <li @if($weekdays[4]->active) class="active" @endif>
        <a href="{{route('app.user.calendar',['dt'=>date('Y-m-d',$weekdays[4]->timestamp)])}}" class="text-decoration-none d-flex flex-column text-center">
            <span class="day">F</span>
            <span class="date">{{str_pad($weekdays[4]->day,2,'0',STR_PAD_LEFT)}}</span>
            </a>

        </li>
        <li @if($weekdays[5]->active) class="active" @endif>
        <a href="{{route('app.user.calendar',['dt'=>date('Y-m-d',$weekdays[5]->timestamp)])}}" class="text-decoration-none d-flex flex-column text-center">
            <span class="day">S</span>
            <span class="date">{{str_pad($weekdays[5]->day,2,'0',STR_PAD_LEFT)}}</span>
            </a>
        </li>
        <li @if($weekdays[6]->active) class="active" @endif>
        <a href="{{route('app.user.calendar',['dt'=>date('Y-m-d',$weekdays[6]->timestamp)])}}" class="text-decoration-none d-flex flex-column text-center">
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
                        <div class="image-wrapper">
                            @if($member->getMedia('avatar')->first())
                            <img src="{{$member->getMedia('avatar')->first()->getUrl('thumb')}}" alt="{{$member->first_name.''.$member->last_name}}" />
                            @else
                            <img src="{{asset('app-assets/img/Ellipse 8.png')}}" alt="">
                            @endif
                        </div>
                        
                    </li>
                    @endforeach
                    
                </ul>
            </div>
            @endif 
            <div class="calendar-timeline-wrapper mt-4 position-relative" id="calendar-timeline" data-currenthour="{{$currenthour}}">
                        <ul class="calendar-timeline" >
                            <!-- <span class="time-line-overlay" style="height: 8.7%;">
                                <span class="overlay-bar">
                                    8:43
                                </span>
                            </span> -->
                            @for($i=0; $i<24;$i++)
                            <li id="t-{{$i}}"class="timeline-block previous mb-3" >
                                <div class="time-block">{{date('gA',strtotime(date('Y-m-d').' '.str_pad($i,2,'0',STR_PAD_LEFT).':00'))}}</div>
                                <div class="reminder-details-block h-auto d-flex">
                                    @if(array_key_exists(date('H',strtotime(date('Y-m-d').' '.str_pad($i,2,'0',STR_PAD_LEFT).':00')),$taskevents))
                                        @foreach($taskevents[date('H',strtotime(date('Y-m-d').' '.str_pad($i,2,'0',STR_PAD_LEFT).':00'))] as $taskevent)
                                           
                                            <a   href=""  data-bs-toggle="modal" data-bs-target="#taskeventpopup" data-type="{{$taskevent->type}}" data-id="{{$taskevent->id}}" class="reminder-cards-wrapper flex-fill">
                                                <div class="reminder-card d-flex align-items-start">
                                                    <div class="image-wrapper me-2">
                                                        <img src="{{asset('app-assets/img/Ellipse 8.png')}}" alt="">
                                                    </div>
                                                    <div class="d-flex flex-column reminder-details">
                                                        <span class="color-bar" style="background-color: #EEC548;"></span>
                                                        <h6 class="reminder-title">{{$taskevent->title}}</h6>
                                                        <h6 class="mb-0 reminder-category ">{{$taskevent->location}}</h6>
                                                    </div>
                                                    @if(!empty($taskevent->time1)||!empty($taskevent->time2))
                                                        <div class="reminder-timing ms-auto d-flex flex-column justify-content-center align-items-end">
                                                            @if(!empty($taskevent->time1))<span class="time">{{date('g:i a',strtotime($taskevent->date.' '.$taskevent->time1))}}</span>@endif
                                                            @if(!empty($taskevent->time2))<span class="time">{{date('g:i a',strtotime($taskevent->date.' '.$taskevent->time2))}}</span>@endif
                                                        </div>
                                                    @endif
                                                </div>
                                            </a>
                                            @endforeach
                                    @endif
                                </div>
                            </li>
                            @endfor
                            
                        </ul>
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
        currenthour={{$currenthour}};
        li="#t-"+currenthour;
        scrolltop=$(li).offset().top

        console.log(scrolltop)
        $("#calendar-timeline").animate({
            scrollTop: scrolltop-350
        }, 2000);

    })
</script>
@endpush