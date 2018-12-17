@extends('layouts.master')
@section("content")
 @include('includes.preloader')
    <!-- Wrapper Starts -->
    <div class="wrapper">
		<div class="container page-title center-align">
			<h2 class="center-align">
				<span>My </span>
				<span>blog</span>
			</h2>
			<span class="title-bg">posts</span>
		</div>
		<!-- Divider Starts -->
		<div class="divider center-align">
			<span class="outer-line"></span>
			<span class="fa fa-vcard" aria-hidden="true"></span>
			<span class="outer-line"></span>
		</div>
		<!-- Divider Ends -->
		<div class="container" id="app">
			<div class="row">
				<div class="content col s12 m8 l8 xl8">
					
					@foreach($posts as $post)
						@include('blog.includes.post')
					@endforeach
					
					@unless (count($posts))
					    <p>Unfortunately, no items were returned.</p>
					@endunless
					
					@if(Request::has('category'))
						{{$posts->appends(['category' => request()->input('category')])->links()}}
					@elseif(Request::has(['month','year']))
						{{$posts->appends(['month' => request()->input('month'), 'year' => request()->input('year')])->links()}}
					@elseif(Request::has('keyword'))
						{{$posts->appends(['keyword' => request()->input('keyword')])->links()}}	
					@endif
					{{$posts->links()}}
				</div>
			
			@include("blog.includes.sidebar")

			</div>
		</div>
    </div>
    <!-- Wrapper Ends -->
@endsection