<template>
	<div class="comments-form mb-5">
	<form role="form" method="POST" :action="'/comments/post/' + post.slug">
	   <input type="hidden" name="_token" :value="csrf">

		<div class="input-field second-font" v-if="comment">
            <input id="name" name="parent_id" type="hidden" class="validate" :value="comment.id" required>
        </div>
		<!-- Name Field Starts -->
        <div class="input-field second-font">
            <i class="fa fa-user prefix"></i>
            <input id="name" name="name" type="text" class="validate" required>
            <label class="font-weight-400" for="name">Your Name</label>
        </div>
        <!-- Name Field Ends -->
        <!-- Email Field Starts -->
        <div class="input-field second-font">
            <i class="fa fa-envelope prefix"></i>
            <input id="email" type="email" name="email" class="validate" required>
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
            <button class="btn font-weight-500" type="submit" name="send">
				Add comment <i class="fa fa-comment"></i>
			</button>
        </div>
        <!-- Submit Form Button Ends -->
	</form>	
</div>
</template>

<script>
	export default{
		props:['post','comment'],
        data(){
            return{
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            };
        }
	}
</script>