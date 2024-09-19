@extends('layouts.app')
@section('pageTitle','Samepage')
@section('bodyClass','')
@section('mainClass','page-wrapper wallet-pages pt-4 page-sticky-main')
@section('containerClass','container pb-100 pt-4')
@section('title','Notifications')
@section('backlink',route('app.user.home'))
@section('content')
<div class="page-sticky-wrapper">

    <div class="notification-status-bar d-flex">
        <a class="text-decoration-none unread-tab flex-fill" href="{{route('app.user.notifications',['type'=>'unread'])}}">
            <div class="status-bar-inner unread @if($type=='unread') bg-primary @endif">
                <span class="active-event"></span>
                <h6 class="text-dark font-weight-bold inner-heading">Unread</h6>
                <h6 class="text-extra-dark notification-number mb-0">5 items</h6>
            </div>
        </a>
        <a class="text-decoration-none read-tab flex-fill" href="{{route('app.user.notifications',['type'=>'read'])}}">
            <div class="status-bar-inner read @if($type=='read') bg-primary @endif">
                <span class="active-event"></span>
                <h6 class="text-dark font-weight-bold inner-heading">Read</h6>
                <h6 class="text-extra-dark notification-number mb-0">4 item</h6>
            </div>
        </a>
    </div>

    <!-- <div class="options-navigation-bar mt-4">
        <ul class="options-list">
                            @foreach(auth()->user()->wallets as $wallet)
                            <li class="options-item has-icon"><span class="options-text">
                                <a href="#" class="d-flex task-wallet-option text-decoration-none @if($cwallet==$wallet->id) active @endif"><span class="icon"></span> {{$wallet->name}}</span></a>
                            </li>
                            
                            @endforeach
                            
                        </ul>


    </div> -->

    <!-- <div class="reminder-toggle-buttons d-flex justify-content-end mt-3 collapsed-data">
        <button class="text-link toggle-btn">Collapse</button>
    </div> -->

</div>
<div class="page-body mt-2" id="unread-tab" @if($type=='read') style="display:none" @endif>
    <div class="notification-cards-wrapper">
        <div class="notification-cards-block d-flex align-items-center">
            <div class="notification-block-body">
                <div class="notification-head-bar d-flex justify-content-between align-items-center">
                    <h2 class="card-title text-dark">Task</h2>
                    <span class="time-span text-extra-dark">12h</span>
                </div>
                <!--<div class="notification-category mt-2 d-flex">
                    <span class="options-item has-icon active">
                        <span class="options-text"><span class="icon" style="background-color: #8861DC;"><img src="assets/img/fi-rr-inbox.svg" alt=""></span> Life Admin</span>
                    </span>
                </div>-->
                <div class="notification-title-text mt-2">
                    <h6 class="text-dark font-weight-bold">Quis lectus nulla at volutpat. Cursus risus at ultrices mi tempus.</h6>
                </div>
                <div class="button-wrapper mt-2">
                    <a href="#" class="btn btn-dark btn-small transparent view-btn">View</a>
                </div>
            </div>
            <div class="notification-block-status ms-auto ps-4">
                <span class="active-notification"></span>
            </div>
        </div>
        <div class="notification-cards-block d-flex align-items-center">
            <div class="notification-block-body">
                <div class="notification-head-bar d-flex justify-content-between align-items-center">
                    <h2 class="card-title text-dark">Task</h2>
                    <span class="time-span text-extra-dark">12h</span>
                </div>
                <!--<div class="notification-category mt-2 d-flex">
                    <span class="options-item has-icon active">
                        <span class="options-text"><span class="icon" style="background-color: #8861DC;"><img src="assets/img/fi-rr-inbox.svg" alt=""></span> Life Admin</span>
                    </span>
                </div>-->
                <div class="notification-title-text mt-2">
                    <h6 class="text-dark font-weight-bold">Quis lectus nulla at volutpat. Cursus risus at ultrices mi tempus.</h6>
                </div>
                <div class="button-wrapper mt-2">
                    <a href="#" class="btn btn-dark btn-small transparent view-btn">View</a>
                </div>
            </div>
            <div class="notification-block-status ms-auto ps-4">
                <span class="active-notification"></span>
            </div>
        </div>
        <div class="notification-cards-block d-flex align-items-center">
            <div class="notification-block-body">
                <div class="notification-head-bar d-flex justify-content-between align-items-center">
                    <h2 class="card-title text-dark">Task</h2>
                    <span class="time-span text-extra-dark">12h</span>
                </div>
                <!--<div class="notification-category mt-2 d-flex">
                    <span class="options-item has-icon active">
                        <span class="options-text"><span class="icon" style="background-color: #8861DC;"><img src="assets/img/fi-rr-inbox.svg" alt=""></span> Life Admin</span>
                    </span>
                </div>-->
                <div class="notification-title-text mt-2">
                    <h6 class="text-dark font-weight-bold">Quis lectus nulla at volutpat. Cursus risus at ultrices mi tempus.</h6>
                </div>
                <div class="button-wrapper mt-2">
                    <a href="#" class="btn btn-dark btn-small transparent view-btn">View</a>
                </div>
            </div>
            <div class="notification-block-status ms-auto ps-4">
                <span class="active-notification"></span>
            </div>
        </div>
        <div class="notification-cards-block d-flex align-items-center">
            <div class="notification-block-body">
                <div class="notification-head-bar d-flex justify-content-between align-items-center">
                    <h2 class="card-title text-dark">Task</h2>
                    <span class="time-span text-extra-dark">12h</span>
                </div>
                <!--<div class="notification-category mt-2 d-flex">
                    <span class="options-item has-icon active">
                        <span class="options-text"><span class="icon" style="background-color: #8861DC;"><img src="assets/img/fi-rr-inbox.svg" alt=""></span> Life Admin</span>
                    </span>
                </div>-->
                <div class="notification-title-text mt-2">
                    <h6 class="text-dark font-weight-bold">Quis lectus nulla at volutpat. Cursus risus at ultrices mi tempus.</h6>
                </div>
                <div class="button-wrapper mt-2">
                    <a href="#" class="btn btn-dark btn-small transparent view-btn">View</a>
                </div>
            </div>
            <div class="notification-block-status ms-auto ps-4">
                <span class="active-notification"></span>
            </div>
        </div>
        <div class="notification-cards-block d-flex align-items-center">
            <div class="notification-block-body">
                <div class="notification-head-bar d-flex justify-content-between align-items-center">
                    <h2 class="card-title text-dark">Task</h2>
                    <span class="time-span text-extra-dark">12h</span>
                </div>
                <!--<div class="notification-category mt-2 d-flex">
                    <span class="options-item has-icon active">
                        <span class="options-text"><span class="icon" style="background-color: #8861DC;"><img src="assets/img/fi-rr-inbox.svg" alt=""></span> Life Admin</span>
                    </span>
                </div>-->
                <div class="notification-title-text mt-2">
                    <h6 class="text-dark font-weight-bold">Quis lectus nulla at volutpat. Cursus risus at ultrices mi tempus.</h6>
                </div>
                <div class="button-wrapper mt-2">
                    <a href="#" class="btn btn-dark btn-small transparent view-btn">View</a>
                </div>
            </div>
            <div class="notification-block-status ms-auto ps-4">
                <span class="active-notification"></span>
            </div>
        </div>
        <div class="notification-cards-block d-flex align-items-center">
            <div class="notification-block-body">
                <div class="notification-head-bar d-flex justify-content-between align-items-center">
                    <h2 class="card-title text-dark">Task</h2>
                    <span class="time-span text-extra-dark">12h</span>
                </div>
                <!--<div class="notification-category mt-2 d-flex">
                    <span class="options-item has-icon active">
                        <span class="options-text"><span class="icon" style="background-color: #8861DC;"><img src="assets/img/fi-rr-inbox.svg" alt=""></span> Life Admin</span>
                    </span>
                </div>-->
                <div class="notification-title-text mt-2">
                    <h6 class="text-dark font-weight-bold">Quis lectus nulla at volutpat. Cursus risus at ultrices mi tempus.</h6>
                </div>
                <div class="button-wrapper mt-2">
                    <a href="#" class="btn btn-dark btn-small transparent view-btn">View</a>
                </div>
            </div>
            <div class="notification-block-status ms-auto ps-4">
                <span class="active-notification"></span>
            </div>
        </div>
        <div class="notification-cards-block d-flex align-items-center">
            <div class="notification-block-body">
                <div class="notification-head-bar d-flex justify-content-between align-items-center">
                    <h2 class="card-title text-dark">Task</h2>
                    <span class="time-span text-extra-dark">12h</span>
                </div>
                <!--<div class="notification-category mt-2 d-flex">
                    <span class="options-item has-icon active">
                        <span class="options-text"><span class="icon" style="background-color: #8861DC;"><img src="assets/img/fi-rr-inbox.svg" alt=""></span> Life Admin</span>
                    </span>
                </div>-->
                <div class="notification-title-text mt-2">
                    <h6 class="text-dark font-weight-bold">Quis lectus nulla at volutpat. Cursus risus at ultrices mi tempus.</h6>
                </div>
                <div class="button-wrapper mt-2">
                    <a href="#" class="btn btn-dark btn-small transparent view-btn">View</a>
                </div>
            </div>
            <div class="notification-block-status ms-auto ps-4">
                <span class="active-notification"></span>
            </div>
        </div>
    </div>
</div>
<div class="page-body mt-2" id="read-tab"  @if($type!='read') style="display:none" @endif>
    <div class="notification-cards-wrapper notification-readed">
        <div class="notification-cards-block d-flex align-items-center">
            <div class="notification-block-body">
                <div class="notification-head-bar d-flex justify-content-between align-items-center">
                    <h2 class="card-title text-dark">Task</h2>
                    <span class="time-span text-extra-dark">12h</span>
                </div>
                <!--<div class="notification-category mt-2 d-flex">
                    <span class="options-item has-icon active">
                        <span class="options-text"><span class="icon" style="background-color: #8861DC;"><img src="assets/img/fi-rr-inbox.svg" alt=""></span> Life Admin</span>
                    </span>
                </div>-->
                <div class="notification-title-text mt-2">
                    <h6 class="text-dark font-weight-bold">Quis lectus nulla at volutpat. Cursus risus at ultrices mi tempus.</h6>
                </div>
                <div class="button-wrapper mt-2">
                    <a href="#" class="btn btn-dark btn-small transparent view-btn">View</a>
                </div>
            </div>
            <div class="notification-block-status ms-auto ps-4">
                <span class="active-notification"></span>
            </div>
        </div>
        <div class="notification-cards-block d-flex align-items-center">
            <div class="notification-block-body">
                <div class="notification-head-bar d-flex justify-content-between align-items-center">
                    <h2 class="card-title text-dark">Task</h2>
                    <span class="time-span text-extra-dark">12h</span>
                </div>
                <!--<div class="notification-category mt-2 d-flex">
                    <span class="options-item has-icon active">
                        <span class="options-text"><span class="icon" style="background-color: #8861DC;"><img src="assets/img/fi-rr-inbox.svg" alt=""></span> Life Admin</span>
                    </span>
                </div>-->
                <div class="notification-title-text mt-2">
                    <h6 class="text-dark font-weight-bold">Quis lectus nulla at volutpat. Cursus risus at ultrices mi tempus.</h6>
                </div>
                <div class="button-wrapper mt-2">
                    <a href="#" class="btn btn-dark btn-small transparent view-btn">View</a>
                </div>
            </div>
            <div class="notification-block-status ms-auto ps-4">
                <span class="active-notification"></span>
            </div>
        </div>
        <div class="notification-cards-block d-flex align-items-center">
            <div class="notification-block-body">
                <div class="notification-head-bar d-flex justify-content-between align-items-center">
                    <h2 class="card-title text-dark">Task</h2>
                    <span class="time-span text-extra-dark">12h</span>
                </div>
                <!--<div class="notification-category mt-2 d-flex">
                    <span class="options-item has-icon active">
                        <span class="options-text"><span class="icon" style="background-color: #8861DC;"><img src="assets/img/fi-rr-inbox.svg" alt=""></span> Life Admin</span>
                    </span>
                </div>-->
                <div class="notification-title-text mt-2">
                    <h6 class="text-dark font-weight-bold">Quis lectus nulla at volutpat. Cursus risus at ultrices mi tempus.</h6>
                </div>
                <div class="button-wrapper mt-2">
                    <a href="#" class="btn btn-dark btn-small transparent view-btn">View</a>
                </div>
            </div>
            <div class="notification-block-status ms-auto ps-4">
                <span class="active-notification"></span>
            </div>
        </div>
        <div class="notification-cards-block d-flex align-items-center">
            <div class="notification-block-body">
                <div class="notification-head-bar d-flex justify-content-between align-items-center">
                    <h2 class="card-title text-dark">Task</h2>
                    <span class="time-span text-extra-dark">12h</span>
                </div>
                <!--<div class="notification-category mt-2 d-flex">
                    <span class="options-item has-icon active">
                        <span class="options-text"><span class="icon" style="background-color: #8861DC;"><img src="assets/img/fi-rr-inbox.svg" alt=""></span> Life Admin</span>
                    </span>
                </div>-->
                <div class="notification-title-text mt-2">
                    <h6 class="text-dark font-weight-bold">Quis lectus nulla at volutpat. Cursus risus at ultrices mi tempus.</h6>
                </div>
                <div class="button-wrapper mt-2">
                    <a href="#" class="btn btn-dark btn-small transparent view-btn">View</a>
                </div>
            </div>
            <div class="notification-block-status ms-auto ps-4">
                <span class="active-notification"></span>
            </div>
        </div>
        <div class="notification-cards-block d-flex align-items-center">
            <div class="notification-block-body">
                <div class="notification-head-bar d-flex justify-content-between align-items-center">
                    <h2 class="card-title text-dark">Task</h2>
                    <span class="time-span text-extra-dark">12h</span>
                </div>
                <!--<div class="notification-category mt-2 d-flex">
                    <span class="options-item has-icon active">
                        <span class="options-text"><span class="icon" style="background-color: #8861DC;"><img src="assets/img/fi-rr-inbox.svg" alt=""></span> Life Admin</span>
                    </span>
                </div>-->
                <div class="notification-title-text mt-2">
                    <h6 class="text-dark font-weight-bold">Quis lectus nulla at volutpat. Cursus risus at ultrices mi tempus.</h6>
                </div>
                <div class="button-wrapper mt-2">
                    <a href="#" class="btn btn-dark btn-small transparent view-btn">View</a>
                </div>
            </div>
            <div class="notification-block-status ms-auto ps-4">
                <span class="active-notification"></span>
            </div>
        </div>
        <div class="notification-cards-block d-flex align-items-center">
            <div class="notification-block-body">
                <div class="notification-head-bar d-flex justify-content-between align-items-center">
                    <h2 class="card-title text-dark">Task</h2>
                    <span class="time-span text-extra-dark">12h</span>
                </div>
                <!--<div class="notification-category mt-2 d-flex">
                    <span class="options-item has-icon active">
                        <span class="options-text"><span class="icon" style="background-color: #8861DC;"><img src="assets/img/fi-rr-inbox.svg" alt=""></span> Life Admin</span>
                    </span>
                </div>-->
                <div class="notification-title-text mt-2">
                    <h6 class="text-dark font-weight-bold">Quis lectus nulla at volutpat. Cursus risus at ultrices mi tempus.</h6>
                </div>
                <div class="button-wrapper mt-2">
                    <a href="#" class="btn btn-dark btn-small transparent view-btn">View</a>
                </div>
            </div>
            <div class="notification-block-status ms-auto ps-4">
                <span class="active-notification"></span>
            </div>
        </div>
        <div class="notification-cards-block d-flex align-items-center">
            <div class="notification-block-body">
                <div class="notification-head-bar d-flex justify-content-between align-items-center">
                    <h2 class="card-title text-dark">Task</h2>
                    <span class="time-span text-extra-dark">12h</span>
                </div>
                <!--<div class="notification-category mt-2 d-flex">
                    <span class="options-item has-icon active">
                        <span class="options-text"><span class="icon" style="background-color: #8861DC;"><img src="assets/img/fi-rr-inbox.svg" alt=""></span> Life Admin</span>
                    </span>
                </div>-->
                <div class="notification-title-text mt-2">
                    <h6 class="text-dark font-weight-bold">Quis lectus nulla at volutpat. Cursus risus at ultrices mi tempus.</h6>
                </div>
                <div class="button-wrapper mt-2">
                    <a href="#" class="btn btn-dark btn-small transparent view-btn">View</a>
                </div>
            </div>
            <div class="notification-block-status ms-auto ps-4">
                <span class="active-notification"></span>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <!-- <script>
        $(document).ready(function(){
            $('.unread').click(function(e){
                e.preventDefault();
                $('#read-tab').hide();
                $('.read').removeClass('bg-primary');
                $(this).addClass('bg-primary');
                $('#unread-tab').show();
            })
            
            $('.complete').click(function(e){
                e.preventDefault();
                $('#unread-tab').hide();
                $('.unread').removeClass('bg-primary');
                $(this).addClass('bg-primary');
                $('#read-tab').show();
            })
        })
    </script> -->
@endpush