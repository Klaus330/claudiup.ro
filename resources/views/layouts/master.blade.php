<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" href="/images/logo3.png" type="image/x-icon"/>
    <title>Claudiu Popa - Personal Website </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Template CSS Files -->
   
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/jquery.animatedheadline.css" />
    <link rel="stylesheet" type="text/css" href="/css/materialize.min.css" />
    
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/css/skins/blue.css" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/0.12.1/trix.css"> --}}
     <link rel="stylesheet" type="text/css" href="/css/app.css" />
    
    <!-- Template JS Files -->
    <script src="/js/jquery-2.2.4.min.js"></script>
    <script src="/js/modernizr.custom.js"></script>

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