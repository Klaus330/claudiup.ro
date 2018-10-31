
<ul class="comments-reply">
	<li>
		<!-- Comment Starts -->
		<div class="comment">
			<img class="comment-avatar pull-left" alt="avatar" src="/images/logo3.png">
			<div class="comment-body">
				<div class="meta-data">
					<span class="comment-author">{{$comment->getUsername()}}</span>
					<span class="comment-date pull-right second-font">{{$comment->created_at->diffForHumans()}}</span>
				</div>
				<div class="comment-content">
				<p class="second-font">{!!$comment->message!!}</p></div>
			</div>
		</div>
		<!-- Comment Ends -->
	</li>
</ul>