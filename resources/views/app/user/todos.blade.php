@extends('layouts.app')
@section('pageTitle','Samepage')
@section('bodyClass','')
@section('mainClass','page-wrapper wallet-pages pt-4')
@section('containerClass','container pb-100 pt-4')
@section('title','Tasks')
@section('backlink',route('app.user.home'))
@section('content')
<div class="page-sticky-wrapper">

    <div class="notification-status-bar d-flex">
        <a class="text-decoration-none todo-tab flex-fill" href="">
            <div class="status-bar-inner to-do @if($type=='todo') bg-primary @endif">
                <span class="active-event"></span>
                <h6 class="text-dark font-weight-bold inner-heading">To do</h6>
                <h6 class="text-extra-dark notification-number mb-0">{{$todos->count()}} items</h6>
            </div>
        </a>
        <a class="text-decoration-none completed-tab flex-fill" href="">
            <div class="status-bar-inner complete">
                <span class="active-event"></span>
                <h6 class="text-dark font-weight-bold inner-heading">Complete</h6>
                <h6 class="text-extra-dark notification-number mb-0">{{$completedtodos->count()}} item</h6>
            </div>
        </a>
    </div>

    <!-- <div class="options-navigation-bar mt-4">
        <ul class="options-list">
                            @foreach(auth()->user()->wallets as $wallet)
                            <li class="options-item has-icon"><span class="options-text">
                                <a href="{{route('app.user.tasks',['wallet'=>$wallet->id,'type'=>$type])}}" class="d-flex task-wallet-option text-decoration-none @if($cwallet==$wallet->id) active @endif"><span class="icon"></span> {{$wallet->name}}</span></a>
                            </li>
                            
                            @endforeach
                            
                        </ul>


    </div> -->

    <div class="reminder-toggle-buttons d-flex justify-content-end mt-3 collapsed-data">
        <button class="text-link toggle-btn">Collapse</button>
    </div>

</div>
<div class="page-body mt-2" id="todo-tab" @if($type!='todo') style="display:none" @endif>

    <div class="collapsed-data task-cards-wrapper active">

        @foreach ($todos as $todo )
        <div class="collapsed-cards task-card d-flex" style="height: 92.5167px;">
            <div class="task-content-wrapper">
                <div class="images-block">
                    <div class="image-wrapper">
                        <img src="{{asset('app-assets/img/profile-image.png')}}" alt="">
                    </div>
                    <a href="{{route('app.user.completetask',['task'=>$todo->id,'wallet'=>$cwallet,'type'=>$type])}}" class="checkbox-wrapper">
                    <img src="{{asset('app-assets/img/checked.svg')}}" alt="">
                    </a>
                </div>
                <div class="task-content">
                    <h6 class="text-dark font-weight-bold">{{$todo->title}}</h6>
                    <p class="m-0 p-0"><small>{{date('d-m-Y',strtotime($todo->date))}}</small></p>
                    
                </div>
            </div>
            <div class="task-tag ms-auto ps-4">
                @if(!empty($todo->time1))
                    <p class=" mb-0">{{date('g:i a', strtotime($todo->date.' '.$todo->time1))}}</p>
                @endif
                @if(!empty($todo->time2))
                    <p class=" mb-0">{{date('g:i a', strtotime($todo->date.' '.$todo->time2))}}</p>
                @endif
                <div class="notification-category mt-2 d-flex justify-content-between">
                        <a href="{{route('app.tasks.edit',['task'=>$todo->id])}}" class="text-decoration-none">
                        <span class="options-item has-icon active">
                            <span class="options-text ">Edit Task</span>
                        </span>
                        </a>
                    </div>
            </div>
        </div>
        @endforeach
        

        
    </div>

</div>
<div class="page-body mt-2" id="completed-tab"  @if($type=='todo') style="display:none" @endif>
    <div class="collapsed-data task-cards-wrapper completed active">
        @foreach ($completedtodos as $completedtodo )
            <div class="collapsed-cards task-card d-flex align-items-center" style="z-index: -1; transform: scale(1); height: 48px;">
                <div class="task-content-wrapper">
                    <div class="images-block">
                        
                        <a href="{{route('app.user.unmarktask',['task'=>$completedtodo->id,'wallet'=>$cwallet,'type'=>$type])}}" class="checkbox-wrapper">
                            <img src="{{asset('app-assets/img/tick-primary.svg')}}" alt="">
                        </a>
                    </div>
                    <div class="task-content">
                        <h6 class="text-dark font-weight-bold mb-0">{{$completedtodo->title}}</h6>
                        <p class="m-0 p-0"><small>{{date('d-m-Y',strtotime($completedtodo->date))}}</small></p>
                    </div>
                </div>
                <div class="task-tag ms-auto ps-4">
                    @if(!empty($completedtodo->time1))
                        <p class=" mb-0">{{date('g:i a', strtotime($completedtodo->date.' '.$completedtodo->time1))}}</p>
                    @endif
                    @if(!empty($completedtodo->time2))
                        <p class=" mb-0">{{date('g:i a', strtotime($completedtodo->date.' '.$completedtodo->time2))}}</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $('.to-do').click(function(e){
                e.preventDefault();
                $('#completed-tab').hide();
                $('.complete').removeClass('bg-primary');
                $(this).addClass('bg-primary');
                $('#todo-tab').show();
            })
            
            $('.complete').click(function(e){
                e.preventDefault();
                $('#todo-tab').hide();
                $('.to-do').removeClass('bg-primary');
                $(this).addClass('bg-primary');
                $('#completed-tab').show();
            })
            $('#todo-tab a.checkbox-wrapper').click(function(e){
                e.preventDefault();
                $(this).css('background-color','#00272b').css('border-color','#00272b');
                $(this).find('img').show();
                console.log($(this).attr('href'));
                th=$(this);
                setTimeout(function(){
                    window.location=th.attr('href');
                },1000);
            })
        })
    </script>
@endpush