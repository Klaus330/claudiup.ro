@if($comment->validated)
<!-- Comment Starts -->
<div class="comment">
	<img class="comment-avatar pull-left" alt="" src="../images/logo3.png">
	<div class="comment-body">
		<div class="meta-data">
			<span class="comment-author">
				{{$comment->name}}
			</span>
			<span class="comment-date pull-right second-font">{{$comment->created_at->format("M d, Y")}}</span>
		</div>
		<div class="comment-content">
		<p class="second-font">{!!Purifier::clean($comment->message)!!}</p></div>
		{{-- <div>
			<a class="comment-reply" href="#">Reply</a>
		</div>	 --}}
	</div>
</div>
<!-- Comment Ends -->
@endif