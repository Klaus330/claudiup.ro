@if($comment->validated)
<!-- Comment Starts -->
	<comment :item="{{json_encode($comment->load('post'))}}"></comment>
	@if ($comment->replies()->count() != 0)
		@foreach ($comment->replies() as $comment)
			@if ($comment->validated)
				@include("blog.includes.commentReply")
			@endif		
		@endforeach
	@endif
<!-- Comment Ends -->
@endif