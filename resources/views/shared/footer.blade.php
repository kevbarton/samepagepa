<footer class="footer bg-dark rounded-top add-menu-wrapper overflow-hidden">
    <div class="bg-dark-1 footer-navigation-options-wrapper"  style="display: none;" id="bottom-sub-menu">

        <div class="navigation-wrapper d-flex justify-content-center footer-navigation-options py-3">
            <a class="navigation-item" href="{{route('app.getuserwallets')}}">
                <div class="nav-icon-wrapper">
                    <img src="{{asset('app-assets/img/wallet.svg')}}" alt="">
                </div>
                <div class="nav-text-wrapper">
                    <span class="nav-text">Wallet</span>
                </div>
            </a>
            <a class="navigation-item" href="{{route('app.tasks.add')}}">
                <div class="nav-icon-wrapper">
                    <img src="{{asset('app-assets/img/check.svg')}}" alt="">
                </div>
                <div class="nav-text-wrapper">
                    <span class="nav-text">Task</span>
                </div>
            </a>
            <a class="navigation-item" href="{{route('app.events.add')}}">
                <div class="nav-icon-wrapper">
                    <img src="{{asset('app-assets/img/calender.svg')}}" alt="">
                </div>
                <div class="nav-text-wrapper">
                    <span class="nav-text">Event</span>
                </div>
            </a>
            <a class="navigation-item"  href="{{route('appusergetstarted.addfamilymember')}}">
                <div class="nav-icon-wrapper">
                    <img src="{{asset('app-assets/img/people.svg')}}" alt="">
                </div>
                <div class="nav-text-wrapper" >
                    <span class="nav-text">Family</span>
                </div>
            </a>
        </div>

    </div>

    <div class="footer-navigation-main-wrapper">

        <div class="navigation-wrapper d-flex justify-content-center footer-navigation-main py-3">
            <a class="navigation-item @if(Route::currentRouteName()=='app.user.home') active @endif" href="{{route('app.user.home')}}">
                <div class="nav-icon-wrapper">
                    <img src="{{asset('app-assets/img/home-icon-primary.svg')}}" alt="">
                </div>
            </a>
            <a class="navigation-item @if(Route::currentRouteName()=='app.getuserwallets') active @endif" href="{{route('app.getuserwallets')}}">
                <div class="nav-icon-wrapper">
                    <img src="{{asset('app-assets/img/list-iocn-primary.svg')}}" alt="">
                </div>
            </a>
            <a class="navigation-item " id="add-icon">
                <div class="nav-icon-wrapper">
                    <img src="{{asset('app-assets/img/add-icon-primary.svg')}}" alt="">
                </div>
            </a>
            <a class="navigation-item @if(Route::currentRouteName()=='app.user.calendar') active @endif" href="{{route('app.user.calendar')}}">
                <div class="nav-icon-wrapper">
                    <img src="{{asset('app-assets/img/calendar-icon-primary.svg')}}" alt="">
                </div>
            </a>
            <a class="navigation-item @if(Route::currentRouteName()=='app.user.settings') active @endif" href="{{route('app.user.settings')}}">
                <div class="nav-icon-wrapper">
                    <img src="{{asset('app-assets/img/menu-primary.svg')}}" alt="">
                </div>
            </a>
        </div>

    </div>
</footer>
@push('scripts')
<script>
    $(document).ready(function(){
        $('#add-icon').click(function(e){
            e.preventDefault();
            $('#bottom-sub-menu').show();
        })
    })
</script>
@endpush