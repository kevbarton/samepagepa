@extends('layouts.app')
@section('pageTitle','Samepage')
@section('bodyClass','')
@section('mainClass','page-wrapper wallet-pages pt-4')
@section('containerClass','container pb-100 pt-4')
@section('title','Settings')
@section('backlink',route('app.user.home'))
@section('content')
<div class="settings-wrapper wallet-settings">
                
                <div class="settings-block wallet-setting-blocks">
                    <h6 class="text-dark font-weight-bold setting-title">Set Up</h6>
                    <div class="settings-list">
                        <a href="{{route('appusergetstarted.menu')}}" class="text-decoration-none">
                            <div class="d-flex align-items-center setting-box">
                                <h6 class="setting-text text-dark mb-0">Get Started</h6>
                                <!-- <span  class="setting-btn ms-auto ps-3">View</span> -->
                            </div>
                        </a>
                        <a href="{{route('appusergetstarted.calendar')}}" class="text-decoration-none">
                        <div class="d-flex align-items-center setting-box">
                            <h6 class="setting-text text-dark mb-0">Calendar Sync</h6>
                            <!-- <span  class="setting-btn ms-auto ps-3">View</span> -->
                        </div>
                        </a>
                    </div>
                </div>

               <div class="settings-block wallet-setting-blocks">
                    <h6 class="text-dark font-weight-bold setting-title">Wallets</h6>
                    <div class="settings-list">
                        <a href="{{route('app.getuserwallets')}}" class="text-decoration-none">
                            <div class="d-flex align-items-center setting-box">
                                <h6 class="setting-text text-dark mb-0">View Wallets</h6>
                                <!-- <span  class="setting-btn ms-auto ps-3">View</span> -->
                            </div>
                        </a>
                        <a href="{{route('app.getuserwallets')}}" class="text-decoration-none">
                        <div class="d-flex align-items-center setting-box">
                            <h6 class="setting-text text-dark mb-0">Add New Wallet</h6>
                            <!-- <span  class="setting-btn ms-auto ps-3">View</span> -->
                        </div>
                        </a>
                    </div>
                </div>

                <div class="settings-block wallet-setting-blocks">
                    <h6 class="text-dark font-weight-bold setting-title">Profile</h6>
                    <div class="settings-list">
                        <a href="{{route('app.user.editprofile')}}" class="text-decoration-none">
                        <div class="d-flex align-items-center setting-box">
                            <h6 class="setting-text text-dark mb-0">Update Profile</h6>
                            <!-- <span  class="setting-btn ms-auto ps-3">View</span> -->
                        </div>
                        </a>
                        <a href="#" class="text-decoration-none">
                        <div class="d-flex align-items-center setting-box">
                            <h6 class="setting-text text-dark mb-0">Change Password</h6>
                            <!-- <span class="setting-btn ms-auto ps-3">View</span> -->
                        </div>
                        </a>
                        <a href="{{route('appusergetstarted.familymembers')}}" class="text-decoration-none">
                        <div class="d-flex align-items-center setting-box">
                            <h6 class="setting-text text-dark mb-0">Edit Family</h6>
                            <!-- <span  class="setting-btn ms-auto ps-3">View</span> -->
                        </div>
                        </a>
                        <a href="{{route('app.user.notifications')}}" class="text-decoration-none">
                        <div class="d-flex align-items-center setting-box">
                            <h6 class="setting-text text-dark mb-0">Notifications</h6>
                            <!-- <span  class="setting-btn ms-auto ps-3">View</span> -->
                        </div>
                        </a>
                    </div>
                </div>

                <div class="settings-block wallet-setting-blocks">
                    <h6 class="text-dark font-weight-bold setting-title">Events and tasks</h6>
                    <div class="settings-list">
                        <a href="{{route('app.events.add')}}" class="text-decoration-none">
                        <div class="d-flex align-items-center setting-box">
                            <h6 class="setting-text text-dark mb-0">Add New Event</h6>
                            <!-- <span  class="setting-btn ms-auto ps-3">View</span> -->
                        </div>
                        </a>
                        <a href="{{route('app.tasks.add')}}" class="text-decoration-none">
                        <div class="d-flex align-items-center setting-box">
                            <h6 class="setting-text text-dark mb-0">Add New Task</h6>
                            <!-- <span  class="setting-btn ms-auto ps-3">View</span> -->
                        </div>
                        </a>
                        <a href="{{route('app.user.calendar')}}" class="text-decoration-none">
                        <div class="d-flex align-items-center setting-box">
                            <h6 class="setting-text text-dark mb-0">View Events</h6>
                            <!-- <span  class="setting-btn ms-auto ps-3">View</span> -->
                        </div>
                        </a>
                        <a href="{{route('app.user.tasks')}}" class="text-decoration-none">
                        <div class="d-flex align-items-center setting-box">
                            <h6 class="setting-text text-dark mb-0">View Tasks</h6>
                            <!-- <span  class="setting-btn ms-auto ps-3">View</span> -->
                        </div>
                        </a>
                    </div>
                </div>

                <div class="settings-block wallet-setting-blocks">
                    <h6 class="text-dark font-weight-bold setting-title"><a href="{{route('applogout')}}">Logout</a></h6>
                </div>

            </div>
@endsection