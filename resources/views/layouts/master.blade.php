<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" href="/images/logo3.webp" type="image/x-icon"/>
    <title>Claudiu Popa - Personal Website </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="I'm a Freelance Full Stack Developer based in Falticeni, Romania.I have a serious passion for Back-end development, UI effects and creating intuitive apps. In this website you can find all of my skills and project that I worked on the past couple of years. "/>
    <!-- Template CSS Files -->
   <meta name="google-site-verification" content="ErewXva0R5zt66KYscpXt7px1icr0qT5sDY74rycozo" />
    <link rel="stylesheet" type="text/css" href="/css/jquery.animatedheadline.css" />
    <link rel="stylesheet" type="text/css" href="/css/materialize.min.css" />
    
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/css/skins/blue.css" />
     <link rel="stylesheet" type="text/css" href="/css/app.css" />

    <!-- Template JS Files -->
    <script src="/js/modernizr.custom.js"></script>
    <script type="text/javascript">
        window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check()
        ]) !!};
    </script>
    @yield('head')
</head>

<body class="dark blog">
    
    
        @yield('content')
    


  <!-- Template JS Files -->
    <script src="/js/jquery.animatedheadline.js"></script>
    <script src="/js/jquery.hoverdir.js"></script>
    <script src="/js/materialize.min.js"></script>
    <script src="/js/custom.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/boxlayout.js"></script>
    
 

     @yield('scripts')

</body>

</html>