<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('pageTitle','Same Page - Family PA Calendar Assistants')</title>

    <link rel="stylesheet" href="{{asset('app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/css/main.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('app-assets/css/custom.css?v='.time())}}">
    @stack('styles')
</head>
<body class="@yield('bodyClass','bg-secondary')">
    
    
    
            @yield('content')
        @include('shared.footer')
    <script src="{{asset('app-assets/js/jquery.js')}}"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
    <script src="{{asset('app-assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('app-assets/js/custom.js?v='.time())}}"></script>
    @stack('scripts')
</body>
</html>
