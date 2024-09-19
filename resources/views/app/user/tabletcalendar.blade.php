@extends('layouts.apptablet')
@section('pageTitle','Samepage')
@section('bodyClass','')
@section('title','')
@section('content')
<header class="pb-4 pt-5 d-flex align-items-center justify-content-center bg-dark tablet-header">
    <div class="container-lg d-flex justify-content-between align-items-center gx-1 row">

        <div class="header-date-block d-flex flex-column p-0">
            <h1 class="header-time">{{date('H:i')}}</h1>
            <h2 class="header-date">
                <span class="day">{{date('l')}}</span>
                <span class="date">{{date('d')}}<sup>{{date('S')}}</sup></span>
                <span class="month">{{date('F')}}</span>
            </h2>
        </div>
        <div class="header-navigation-block p-0">

            <div class="top-bar d-flex justify-content-end">
                <div class="navigation-wrapper d-flex justify-content-center">

                    <a class="navigation-item active">
                        <div class="nav-icon-wrapper">
                            <img src="{{asset('app-assets/img/calendar-icon-primary.svg')}}" alt="">
                        </div>
                    </a>

                    <a class="navigation-item ">
                        <div class="nav-icon-wrapper">
                            <img src="{{asset('app-assets/img/add-icon-primary.svg')}}" alt="">
                        </div>
                    </a>

                    <a class="navigation-item">
                        <div class="nav-icon-wrapper">
                            <img src="{{asset('app-assets/img/list-iocn-primary.svg')}}" alt="">
                        </div>
                    </a>

                    <a class="navigation-item ">
                        <div class="nav-icon-wrapper">
                            <img src="{{asset('app-assets/img/menu-primary.svg')}}" alt="">
                        </div>
                    </a>

                </div>
            </div>

            <div class="bottom-bar mt-3 d-flex justify-content-between align-items-center">
                <!-- Day/Date Wrapper Starts -->
                <div class="week-time-wrapper">
                    <div class="row justify-content-between">
                        <div class="col-3 text-light"><a href="{{route('app.user.home',['dt'=>date('Y-m-d',$prevdate->timestamp)])}}"><i class="fa-solid fa-circle-arrow-left"></i></a></div>
                        <div class="col-6 text-center"><h3 class="text-center fw-bold text-white">{{date('F',$activedate->timestamp)}}</h3></div>
                        <div class="col-3 text-end text-light" ><a href="{{route('app.user.home',['dt'=>date('Y-m-d',$nextdate->timestamp)])}}"><i class="fa-solid fa-circle-arrow-right"></i></a></div>
                    </div>
                    <ul>
                        <li @if($weekdays[0]->active) class="active" @endif>
                            <a href="{{route('app.user.calendartablet',['dt'=>date('Y-m-d',$weekdays[0]->timestamp)])}}" class="text-decoration-none d-flex flex-column text-center">
                            <span class="day">M</span>
                            <span class="date">{{str_pad($weekdays[0]->day,2,'0',STR_PAD_LEFT)}}</span>
                            </a>
                        </li>
                        <li @if($weekdays[1]->active) class="active" @endif>
                        <a href="{{route('app.user.calendartablet',['dt'=>date('Y-m-d',$weekdays[1]->timestamp)])}}" class="text-decoration-none d-flex flex-column text-center">
                            <span class="day">T</span>
                            <span class="date">{{str_pad($weekdays[1]->day,2,'0',STR_PAD_LEFT)}}</span>
                            </a>

                        </li>
                        <li @if($weekdays[2]->active) class="active" @endif>
                        <a href="{{route('app.user.calendartablet',['dt'=>date('Y-m-d',$weekdays[2]->timestamp)])}}" class="text-decoration-none d-flex flex-column text-center">
                            <span class="day">W</span>
                            <span class="date">{{str_pad($weekdays[2]->day,2,'0',STR_PAD_LEFT)}}</span>
                            </a>
                        </li>
                        <li @if($weekdays[3]->active) class="active" @endif>
                        <a href="{{route('app.user.calendartablet',['dt'=>date('Y-m-d',$weekdays[3]->timestamp)])}}" class="text-decoration-none d-flex flex-column text-center">
                            <span class="day">T</span>
                            <span class="date">{{str_pad($weekdays[3]->day,2,'0',STR_PAD_LEFT)}}</span>
                            </a>

                        </li>
                        <li @if($weekdays[4]->active) class="active" @endif>
                        <a href="{{route('app.user.calendartablet',['dt'=>date('Y-m-d',$weekdays[4]->timestamp)])}}" class="text-decoration-none d-flex flex-column text-center">
                            <span class="day">F</span>
                            <span class="date">{{str_pad($weekdays[4]->day,2,'0',STR_PAD_LEFT)}}</span>
                            </a>

                        </li>
                        <li @if($weekdays[5]->active) class="active" @endif>
                        <a href="{{route('app.user.calendartablet',['dt'=>date('Y-m-d',$weekdays[5]->timestamp)])}}" class="text-decoration-none d-flex flex-column text-center">
                            <span class="day">S</span>
                            <span class="date">{{str_pad($weekdays[5]->day,2,'0',STR_PAD_LEFT)}}</span>
                            </a>
                        </li>
                        <li @if($weekdays[6]->active) class="active" @endif>
                        <a href="{{route('app.user.calendartablet',['dt'=>date('Y-m-d',$weekdays[6]->timestamp)])}}" class="text-decoration-none d-flex flex-column text-center">
                            <span class="day">S</span>
                            <span class="date">{{str_pad($weekdays[6]->day,2,'0',STR_PAD_LEFT)}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Day/Date Wrapper Ends -->

                <!-- Weather Block Starts -->
                <div class="weather-block d-flex justify-content-end">
                    <a class="temprature-value" href="#">
                        21
                        <span class="temp-scale">°C</span>
                    </a>
                    <div class="image-wrapper">
                        <img src="{{asset('app-assets/img/Partly-cloudy.svg')}}" alt="">
                    </div>
                </div>
                <!-- Weather Block Ends -->

            </div>

        </div>

    </div>
</header>
<main class="pt-4 pb-4 calendar-pages calendar-tablet">
    <div class="container-lg">

        <div class="tablet-content-wrapper d-flex">

            <div class="tablet-aside-bar">
                <div class="reminders-main-wrapper">
                    <div class="today-remninders">
                        <div class="title-bar d-flex flex-column">
                            <h5 class="text-dark font-weight-bold mb-2">What's happening today</h5>
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
                        <div class="reminders-list">
                        @foreach($taskevents as $taskevent)
                            <a href=""  data-bs-toggle="modal" data-bs-target="#taskeventpopup" data-type="{{$taskevent->type}}" data-id="{{$taskevent->id}}" class="text-decoration-none reminder-card d-flex align-items-center" style="border: 1px solid #EEC548;">
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
                            <a href=""  data-bs-toggle="modal" data-bs-target="#taskeventpopup" data-type="{{$taskevent->type}}" data-id="{{$taskevent->id}}"  class="text-decoration-none reminder-card collapsed-cards d-flex align-items-center" style="border-left-color: #DD3A3A;">
                                <div class="d-flex flex-column reminder-details">
                                    <h6 class="reminder-title">{{$taskevent->title}}</h6>
                                    <h6 class="mb-0 reminder-category font-weight-bold">{{$taskevent->wallet->name}}</h6>
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
            </div>

            <div class="tablet-content-block">
                <div class="tablet-content-inner">
                    <div class="content-top-bar d-flex justify-content-between align-items-center">
                        <!-- Profile List Bar Starts -->
                        <!-- <div class="profile-main-wrapper pe-4">
                            <ul class="profiles-list">
                                <li class="profile-wrapper previous">
                                    <div class="image-wrapper">
                                        <img src="{{asset('app-assets/img/Ellipse 6.png')}}" alt="">
                                    </div>
                                    <span class="cross-icon icon-wrap"></span>
                                </li>
                                <li class="profile-wrapper">
                                    <div class="image-wrapper">
                                        <img src="{{asset('app-assets/img/Ellipse 8.png')}}" alt="">
                                    </div>
                                    <span class="cross-icon icon-wrap"></span>
                                </li>
                                <li class="profile-wrapper">
                                    <div class="image-wrapper">
                                        <img src="{{asset('app-assets/img/Ellipse 9.png')}}" alt="">
                                    </div>
                                    <span class="cross-icon icon-wrap"></span>
                                </li>
                                <li class="profile-wrapper">
                                    <div class="image-wrapper">
                                        <img src="{{asset('app-assets/img/Ellipse 9.png')}}" alt="">
                                    </div>
                                    <span class="cross-icon icon-wrap"></span>
                                </li>
                                <li class="profile-wrapper">
                                    <div class="image-wrapper">
                                        <img src="{{asset('app-assets/img/Ellipse 9.png')}}" alt="">
                                    </div>
                                    <span class="cross-icon icon-wrap"></span>
                                </li>

                                <li class="profile-wrapper">
                                    <div class="image-wrapper">
                                        <img src="{{asset('app-assets/img/Ellipse 9.png')}}" alt="">
                                    </div>
                                    <span class="cross-icon icon-wrap"></span>
                                </li>
                                <li class="profile-wrapper">
                                    <div class="image-wrapper">
                                        <img src="{{asset('app-assets/img/Ellipse 9.png')}}" alt="">
                                    </div>
                                    <span class="cross-icon icon-wrap"></span>
                                </li>
                                <li class="profile-wrapper">
                                    <div class="image-wrapper">
                                        <img src="{{asset('app-assets/img/Ellipse 9.png')}}" alt="">
                                    </div>
                                    <span class="cross-icon icon-wrap"></span>
                                </li>
                                <li class="profile-wrapper">
                                    <div class="image-wrapper">
                                        <img src="{{asset('app-assets/img/Ellipse 9.png')}}" alt="">
                                    </div>
                                    <span class="cross-icon icon-wrap"></span>
                                </li>

                                <li class="profile-wrapper">
                                    <div class="image-wrapper">
                                        <img src="{{asset('app-assets/img/Ellipse 9.png')}}" alt="">
                                    </div>
                                    <span class="cross-icon icon-wrap"></span>
                                </li>
                            </ul>
                        </div> -->
                        <!-- Profile List Bar Ends -->
                        <div class="tabs-wrapper">
                            <ul class="tabs-block">
                            <li class="tabs-item active"><a class="text-decoration-none" href="{{route('app.user.calendartablet',['dt'=>date('Y-m-d',strtotime($now))])}}">Day</a></li>
                                <li class="tabs-item "><a class="text-decoration-none" href="{{route('app.user.calendartabletweek',['dt'=>date('Y-m-d',strtotime($now))])}}">Week</a></li>
                                <li class="tabs-item">Month</li>
                            </ul>
                        </div>
                    </div>

                    <div class="content-bottom-bar" id="calendar-timeline">
                        <!-- Calendar Timeline Wrapper Starts -->
                        <div class="calendar-timeline-wrapper mt-4" >
                        <ul class="calendar-timeline">
                            <!-- <span class="time-line-overlay" style="height: 8.7%;">
                                <span class="overlay-bar">
                                    8:43
                                </span>
                            </span> -->
                            @for($i=0; $i<24;$i++)
                            <li class="timeline-block previous mb-3" id="t-{{$i}}">
                                <div class="time-block">{{date('gA',strtotime(date('Y-m-d').' '.str_pad($i,2,'0',STR_PAD_LEFT).':00'))}}</div>
                                <div class="reminder-details-block h-auto d-flex">
                                    @if(array_key_exists(date('H',strtotime(date('Y-m-d').' '.str_pad($i,2,'0',STR_PAD_LEFT).':00')),$hourlytaskevents))
                                        @foreach($hourlytaskevents[date('H',strtotime(date('Y-m-d').' '.str_pad($i,2,'0',STR_PAD_LEFT).':00'))] as $taskevent)
                                           
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
                        <!-- Calendar Timeline Wrapper Ends -->
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="modal" tabindex="-1" id="taskeventpopup">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content p-0">
      
      <div class="modal-body p-0">
      
      </div>
      
    </div>
  </div>
</div>
</main>
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
            scrollTop: scrolltop-330
        }, 2000);

    })
</script>
@endpush