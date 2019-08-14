@extends('layouts.master')

@section('content')
	<div id="app" class="h-full">
		<book location="{{$project->pdf->location}}" project_id="{{$project->id}}"></book>
	</div>
@endsection

@section('head')
	<link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
	<script src="/js/libs/jquery.min.js"></script>
    <script src="/js/libs/html2canvas.min.js"></script>
    <script src="/js/libs/three.min.js"></script>
    <script src="/js/pdf.worker.js "></script>
      <script type="text/javascript">
      window.PDFJS_LOCALE = {
        pdfJsWorker: '/js/pdf.worker.js',
        links: [{
        	rel: 'stylesheet',
        	href: '/css/font-awesome.min.css'
      	}],
      };
    </script>
  	<script src="/js/libs/pdf.min.js"></script>
    <script src="/js/libs/3dflipbook.min.js"></script>
    
    

   <script src="/js/manifest.js"></script>
    <script src="/js/vendor.js"></script>
    <script src="/js/app.js" defer></script>
@endsection