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
    </div>
    <!-- Wrapper Ends -->


@endsection

@section('head')
    @if($projects->search('pdf_file_id') > 0)
        <script src="/js/libs/html2canvas.min.js"></script>
        <script src="/js/libs/three.min.js"></script>
        <script src="/js/libs/pdf.min.js"></script>

        <script src="/js/dist/3dflipbook.min.js"></script>
    @endif
@endsection