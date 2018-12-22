<!-- Comments Starts -->
<div class="comments">
<h3 class="comments-heading uppercase">{{$comments_count}} Comments</h3>
<ul class="comments-list">
	@if($comments_count == 0)
		<li>
			<p>Be the first one who leaves a comment!</p>
		</li>
	@else
    	<li>
    		@foreach ($comments[''] as $comment)
    			@include("blog.includes.singleComment")
    		@endforeach
    	</li>
	@endif
</ul>

<h3 class="comments-heading uppercase add-comment">Add a comment</h3>


    <comment-form :post-id="{{json_encode($post->id)}}"></comment-form>

    @include("includes.error")
