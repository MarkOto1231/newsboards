<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keyword" content="@yield('meta_keyword')">

    <meta name="author" content="School News Board">
    
    <!-- styles -->
    <link href="{{ asset ('assets/css/custom.css')}}" rel="stylesheet" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <link href="{{ asset ('assets/css/styles.css')}}" rel="stylesheet" >
    <link href="{{ asset ('assets/css/owl.carousel.min.css')}}" rel="stylesheet" >
    <link href="{{ asset ('assets/css/owl.theme.default.min.css')}}" rel="stylesheet" >
    
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

   

</head>
<body>
    <div id="app">

    @include ('layouts.inc.frontend-navbar')
        
        <main>
            @yield('content')
        </main>
        
    </div>

    @include ('layouts.inc.frontend-footer')

     <!-- Scripts -->
     <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="{{ asset ('assets/js/jquery-3.6.0.min.js')}}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script src="{{ asset ('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset ('assets/js/scripts.js')}}"></script>
    <script src="{{ asset ('assets/js/owl.carousel.min.js')}}"></script>

    <script>
    $('.category-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,

    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
    })
    </script>
    @yield('scripts')
</body>
</html>
