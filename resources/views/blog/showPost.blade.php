@extends('layouts.master')
@section('content')
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
					<!-- Article Starts -->
						<article>
							<a href="blog-post-dark.html"><h4>{{$post->title}}</h4></a>
							<!-- Figure Starts -->
							<figure class="blog-figure">
								<img class="responsive-img" src="../images/thumbnail/{{$post->thumbnail}}" alt="">
							</figure>
							<!-- Figure Ends -->
							<!-- Excerpt Starts -->
							<div class="blog-excerpt second-font">
								<div class="mb-4 mt-4 white-text">
									{!!$post->body!!}
								</div>
								<!-- Meta Starts -->
								<div class="meta second-font">
									<span><i class="fa fa-user"></i> <a href="/">Claudiu Popa</a></span>
									<span class="date"><i class="fa fa-calendar"></i>   {{$post->created_at->format('d M Y')}}</span>
									<span>
										<i class="fa fa-tags"></i>
										@foreach ($post->tags as $tag)
											<a href="/blog/tags/{{$tag->name}}">{{strtolower($tag->name)}}</a>
										@endforeach
									</span>
									<span><i class="fa fa-file"></i>
											<a href="/blog/category={{$post->category->name}}">{{strtolower($post->category->name)}}</a>
									</span>
								</div>
								<!-- Meta Ends -->
							</div>
							<!-- Excerpt Ends -->
							@include("blog.includes.comments")
							</div>
						</article>
						<!-- Article Ends -->
				</div>
				@include("blog.includes.sidebar")
			</div>
		</div>
    </div>
    <!-- Wrapper Ends -->
@endsection
