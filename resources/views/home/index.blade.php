@extends('layouts.master')

@section('content')

   @include('includes.preloader')

    <!-- Wrapper Starts -->
    <div class="wrapper" id="app">
        <div id="bl-main" class="bl-main" >
             
            @include("home.includes.first-section")
            
            {{-- Pages  --}}
            @include("pages.about")
            @include("pages.portofolio")
            @include("pages.contact")
            @include("pages.projects")
            
        </div>
        <secret></secret>
    </div>
    <!-- Wrapper Ends -->


@endsection

@section('head')
    <script src="/js/manifest.js"></script>
    <script src="/js/vendor.js"></script>
    <script src="/js/app.js" defer></script>

         <script src="/js/libs/jquery.min.js"></script>
@endsection