<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/images/logo3.webp" type="image/x-icon"/>
    <title>{{ config('app.name', 'Claudiu Popa') }} - Dashboard</title>

    
    <!-- CORE CSS-->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="/css/materialize.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link href="/css/style1.css" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="/css/custom.css" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="/css/perfect-scrollbar.css" type="text/css" rel="stylesheet">
    <link href="/css/jquery-jvectormap.css" type="text/css" rel="stylesheet">
    <link href="/css/flag-icon.min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/0.12.1/trix.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />  
      <script src="/js/manifest.js"></script>
    <script src="/js/vendor.js"></script>
    <script src="/js/app.js" defer></script>
  
     <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
     <script type="text/javascript">
        window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check()
        ]) !!};
    </script>
    @yield('head')
  </head>
  <body class="layout-semi-dark loaded" style="">
    
    @include('includes.preloader')

    @include('admin.partials.header')

   
        <!-- START MAIN -->
      <div id="main">
        
          <!-- START WRAPPER -->
          <div class="wrapper">

            <div id="app">

            @include("admin.partials.left-sidebar")

            
            <!-- START CONTENT -->
            <section id="content">
              <!--start container-->
              <div class="container">
                
                @yield('content')

              </div>
              <!--end container-->
            </section>
            <!-- END CONTENT -->

           @include("admin.partials.floating-button")
            
            </div>
            <!-- END WRAPPER -->
          </div>
      </div>
        <!-- END MAIN -->
        <!-- //////////////////////////////////////////////////////////////////////////// -->

        @include('admin.partials.footer')
  
        <!-- ================================================
      Scripts
      ================================================ -->

        <!--materialize js-->
        <script type="text/javascript" src="/js/materialize.min.js"></script>
        <!--prism-->
        <script type="text/javascript" src="/js/prism.js"></script>
        <!--scrollbar-->
        <script type="text/javascript" src="/js/perfect-scrollbar.min.js"></script>
        <!-- chartjs -->
        <script type="text/javascript" src="/js/chart.min.js"></script>
        <!--plugins.js - Some Specific JS codes for Plugin Settings-->
        <script type="text/javascript" src="/js/plugins.js"></script>
        <!--custom-script.js - Add your own theme custom JS-->
        <script type="text/javascript" src="/js/custom-script.js"></script>
        {{-- <script type="text/javascript" src="/js/dashboard-ecommerce.js"></script> --}}
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>

        @yield('scripts')

  <div class="hiddendiv common"></div><div class="drag-target" data-sidenav="slide-out" style="left: 0px; touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div>
  <div class="drag-target" data-sidenav="chat-out" style="right: 0px; touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div>

</body>
</html>