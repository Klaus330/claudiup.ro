<!-- Article Starts -->
<article>
	<a href="{{route("blog.show",['slug'=>$post->slug])}}"><h4>{{$post->title}}</h4></a>
	@if($post->thumbnail)
		<!-- Figure Starts -->
		<figure class="blog-figure">
			<a href="{{route("blog.show",['slug'=>$post->slug])}}">
				<img class="responsive-img" src="/images/thumbnail/{{$post->thumbnail}}" alt="">
			</a>
		</figure>
		<!-- Figure Ends -->
	@endif
	<!-- Excerpt Starts -->
	<div class="blog-excerpt">
		<p class="second-font">{{substr(strip_tags($post->body),0,150)}}...</p>
		<a href="{{route("blog.show",['slug'=>$post->slug])}}" class="col s12 m4 l4 xl4 waves-effect waves-light btn readmore font-weight-500">
			Read more 
		</a>
		<!-- Meta Starts -->
		<div class="meta second-font">
			<span><i class="fa fa-user"></i> <a href="{{route("blog.show",['slug'=>$post->slug])}}">admin</a></span>
			<span class="date"><i class="fa fa-calendar"></i>&nbsp;{{$post->created_at->format("d M Y")}}</span>
			<span><i class="fa fa-commenting"></i> <a href="{{route("blog.show",['slug'=>$post->slug])}}">{{$post->comments_count}}</a></span>
			
			@if(count($post->tags))
			<span><i class="fa fa-tags"></i>
				@foreach($post->tags as $tag)
					<a href="/blog/tags/{{$tag->name}}">{{strtolower($tag->name)}}</a>
				@endforeach
			</span>
			@endif
			<span><i class="fa fa-file"></i>
					<a href="/blog/category={{$post->category->name}}">{{strtolower($post->category->name)}}</a>
			</span>
		</div>
		<!-- Meta Ends -->
	</div>
	<!-- Excerpt Ends -->
</article>
<!-- Article Ends -->		

