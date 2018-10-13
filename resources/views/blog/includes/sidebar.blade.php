<!-- Sidebar Starts -->
<div class="sidebar col s12 m4 l4 xl4">
	<div class="row">
		@if(Request::is('blog'))
			@if(Request::has('category') || Request::has('month') || Request::has('keyword'))
				<div class="col s6 m6 l6 xl6">
					<a href="/blog" class="btn back"><i class="fa fa-arrow-left"></i> Blog</a>
				</div>
				<div class="col s6 m6 l6 xl6">
					<a href="/" class="btn back"><i class="fa fa-home"></i> Home</a>
				</div>
			@else
				<div class="col s12 m12 l12 xl12">
					<a href="/" class="btn back"><i class="fa fa-home"></i>Home</a>
				</div>
			@endif
		@else
		<div class="col s6 m6 l6 xl6">
			<a href="/blog" class="btn back"><i class="fa fa-arrow-left"></i> Blog</a>
		</div>
		<div class="col s6 m6 l6 xl6">
			<a href="/" class="btn back"><i class="fa fa-home"></i> Home</a>
		</div>
		@endif
	</div>
	<!-- Search Widget Starts -->
	<div class="widget widget-search">
		<div>
			<form action="/blog?keyword=" method="GET">
				@csrf
				<input placeholder="Search in my blog ..." type="search" name="keyword">
			</form>
		</div>
	</div>
	<!-- Search Widget Ends -->
	<!-- Latest Posts Widget Ends -->
	<div class="widget recent-posts">
		<h3 class="widget-title">Most Popular Posts</h3>
		<ul class="unstyled clearfix">
		@foreach($trending as $post)
			<!-- Recent Post Widget Starts -->
			<li>
				<div class="posts-thumb pull-left"> 
					<a href="{{route('blog.show',['slug'=>$post->slug])}}">
						@if($post->thumbnail)
							<img alt="img" src="{{"/images/thumbnail/" . $post->thumbnail}}">
						@else
						  <img alt="img" src="{{"/images/logo3.png"}}">
						@endif
					</a>
				</div>
				<div class="post-info">
					<h4 class="entry-title">
						<a href="{{route('blog.show',['slug'=>$post->slug])}}">{{$post->title}}</a>
					</h4>
					<p class="post-meta second-font">
						<span class="post-date">{{$post->created_at->format('M d ,Y')}}</span>
					</p>			
				</div>
				<div class="clearfix"></div>
			</li>
			<!-- Recent Post Widget Ends -->
		@endforeach	
		</ul>
	</div>
	<!-- Latest Posts Widget Ends -->

	<!-- Categories Widget Starts -->
	<div class="widget">
		<h3 class="widget-title">Categories</h3>
		<ul class="arrow nav nav-tabs second-font uppercase">
			@foreach($categories as $category)
				<li><a href="/blog/?category={{$category}}">{{$category}}</a></li>
			@endforeach
		</ul>
	</div>
	<!-- Categories Widget Ends -->

	<!-- Archives Widget Starts -->
	<div class="widget">
		<h3 class="widget-title">Archives</h3>
		<ul class="arrow nav nav-tabs second-font uppercase">
			@foreach($archives as $stats)
			<li><a href="/blog/?month={{$stats['month']}}&year={{$stats['year']}}">{{$stats['month'] .' '. $stats['year']}}</a></li>
			@endforeach
		</ul>
	</div>
	<!-- Archives Widget Ends -->
	<!-- Tags Widget Starts -->
	<div class="widget widget-tags">
		<h3 class="widget-title">Popular Tags </h3>
		<ul class="unstyled clearfix">
			@foreach($tags as $tag)
				<li><a href="/blog/tags/{{$tag}}">{{strtolower($tag)}}</a></li>
			@endforeach
        </ul>
	</div>
	<!-- Tags Widget Ends -->
</div>
<!-- Sidebar Ends -->