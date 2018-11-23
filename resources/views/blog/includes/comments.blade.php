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

@if(auth()->check())
	<!-- Comments Form Starts -->
<div class="comments-form">
	<form role="form" method="POST" action="{{route('comments.store',['slug'=>$post->slug])}}">
		@csrf
		<!-- Name Field Starts -->
        <div class="input-field second-font" hidden>
            <i class="fa fa-user prefix"></i>
            <input id="name" name="name" type="text" class="validate" value="{{auth()->user()->name}}" >
            <label class="font-weight-400" for="name">Your Name</label>
        </div>
        <!-- Name Field Ends -->
        <!-- Email Field Starts -->
        <div class="input-field second-font" hidden>
            <i class="fa fa-envelope prefix"></i>
            <input id="email" type="email" name="email" class="validate"  value="{{auth()->user()->email}}" >
            <label for="email">Your Email</label>
        </div>
        <!-- Email Field Ends -->
        <!-- Comment Textarea Starts -->
        <div class="input-field second-font">
            <i class="fa fa-comments prefix"></i>
            <textarea id="comment" name="message" class="materialize-textarea" required></textarea>
            <label for="message">Your comment</label>
        </div>
        <!-- Comment Textarea Ends -->
		<!-- Submit Form Button Starts -->
        <div class="col s12 m12 l6 xl6 submit-form">
            <button class="btn font-weight-500" type="submit">
				Add comment <i class="fa fa-comment"></i>
			</button>
        </div>
        <!-- Submit Form Button Ends -->
	</form>
</div>
<!-- Comments Form Ends -->
@else
    <comment-form :post="{{json_encode($post)}}">
    </comment-form>
    @include("includes.error")
</div>
<!-- Comments Form Ends -->
@endif