<header class="py-4 d-flex align-items-center justify-content-center">
        <div class="container d-flex justify-content-between align-items-center gx-1 row">
            
            <div class="user-image-wrapper d-flex align-items-center col-3">
                <div class="btn-wrapper prev-btn">
                    <a href="@yield('backlink','#')" class="btn btn-primary back-btn d-flex align-items-center gap-1 me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                            <path d="M7.50003 15.0003C11.6355 15.0003 15 11.6357 15 7.5001C15 3.36459 11.6355 0 7.50003 0C3.36452 0 0 3.36459 0 7.5001C0 11.6357 3.36452 15.0003 7.50003 15.0003ZM7.50003 1.02671C11.0694 1.02671 13.9733 3.93065 13.9734 7.5001C13.9734 11.0696 11.0695 13.9735 7.50003 13.9736C3.93065 13.9735 1.02678 11.0696 1.02678 7.50003C1.02678 3.93072 3.93065 1.02671 7.50003 1.02671Z" fill="#00272B"></path>
                            <path d="M6.49286 10.7125C6.69334 10.9129 7.0184 10.9128 7.21881 10.7125C7.41936 10.5119 7.41936 10.1869 7.21875 9.98637L5.2461 8.01379L10.9585 8.01324C11.242 8.01318 11.4718 7.7834 11.4718 7.49975C11.4717 7.21625 11.2419 6.98654 10.9584 6.98654L5.24582 6.98708L7.21895 5.01409C7.41943 4.81361 7.41943 4.48849 7.21895 4.28807C7.11868 4.18787 6.98733 4.1377 6.85591 4.1377C6.72456 4.1377 6.59321 4.18787 6.49293 4.28801L3.64354 7.13733C3.54724 7.23356 3.49316 7.36409 3.49316 7.5003C3.49323 7.63651 3.54731 7.76697 3.64361 7.86341L6.49286 10.7125Z" fill="#00272B"></path>
                        </svg>
                        
                    </a>
                </div>
                <div class="image-wrapper">
                <a href="{{route('app.user.editprofile')}}" >
                    <img src="{{auth()->user()->getMedia('avatar')->first()?auth()->user()->getMedia('avatar')->first()->getUrl('thumb'):asset('app-assets/img/profile-image.png')}}" alt="">
                </a>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-center col-6">
                <h1 class="text-dark h5 mb-0 fw-bold">@yield('title')</h1>
            </div>

            <div class="notifications-wrapper d-flex align-items-center justify-content-end col-3">
                <div class="bell-wrapper icon-wrapper">
                    <a href="{{route('app.user.notifications')}}">
                        <img src="{{asset('app-assets/img/notification.svg')}}" alt="Notification">
                    </a>
                    <span class="noti-active"></span>
                </div>
                <div class="message-wrapper icon-wrapper ms-3 ">
                    <a href="#">
                        <img src="{{asset('app-assets/img/message.svg')}}" alt="Message">
                    </a>
                </div>
            </div>

        </div>
    </header>