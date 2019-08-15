<template>
    <div class="comments-form">
    	<form role="form" method="POST" :action="'/comments/post/' + slug" @submit.prevent="submit" v-if="! signedIn">
    	   

    		<div class="input-field second-font" v-if="belongsToComment">
                <input id="name" name="parent_id" type="hidden" class="validate" required v-model="form.commentId">
            </div>
    		<!-- Name Field Starts -->
            <div class="input-field second-font">
                <i class="fa fa-user prefix"></i>
                <input id="name" name="name" type="text" class="validate" required v-model="form.name">
                <label class="font-weight-400" for="name">Your Name</label>
            </div>
            <!-- Name Field Ends -->
            <!-- Email Field Starts -->
            <div class="input-field second-font">
                <i class="fa fa-envelope prefix"></i>
                <input id="email" type="email" name="email" class="validate" required v-model="form.email"> 
                <label for="email">Your Email</label>
            </div>
            <!-- Email Field Ends -->
            <!-- Comment Textarea Starts -->
            <div class="input-field second-font">
                <i class="fa fa-comments prefix"></i>
                <textarea id="comment" name="message" class="materialize-textarea" required v-model="form.message"></textarea>
                <label for="message">Your comment</label>
            </div>
            <!-- Comment Textarea Ends -->
    		<!-- Submit Form Button Starts -->
            <div class="col s12 m12 l6 xl6 submit-form">
                <button class="btn font-weight-500" type="submit" name="send" >
    				Add comment <i class="fa fa-comment"></i>
    			</button>
            </div>
            <!-- Submit Form Button Ends -->
    	</form>	

        <!-- Admin Form -->
        <form role="form" method="POST" :action="'/comments/post/' + slug" @submit.prevent="submit" v-else>
           

            <div class="input-field second-font" v-if="belongsToComment">
                <input id="name" name="parent_id" type="hidden" class="validate" required v-model="form.parent_id">
            </div>
            <!-- Name Field Starts -->
            <div class="input-field second-font">                
                <input id="name" name="name" type="hidden" class="validate" required  v-model="form.name">
            </div>
            <!-- Name Field Ends -->
            <!-- Email Field Starts -->
            <div class="input-field second-font">
                <input id="email" type="hidden" name="email" class="validate" required v-model="form.email"> 
            </div>
            <!-- Email Field Ends -->
            <!-- Comment Textarea Starts -->
            <div class="input-field second-font">
                <i class="fa fa-comments prefix"></i>
                <textarea id="comment" name="message" class="materialize-textarea" required v-model="form.message"></textarea>
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
        <!-- Admin Form -->
    </div>
</template>

<script>
	export default{
		props:['postId','comment'],

        data(){
            return{
                slug:'',
                form:{
                    name: window.App.signedIn ? "Claudiu" : '',
                    email:window.App.signedIn ? "claudiup340@gmail.com" : '',
                    message:'',
                    parent_id: this.comment === undefined ? null : this.comment.id
                },
                
            };
        },

        computed:{            
            belongsToComment(){
                return this.comment === undefined ? false : true;
            },

            signedIn(){
                return window.App.signedIn;
            }
        },

        created(){

            axios.get(`/api/post/slug/${this.postId}`)
                .then(({data}) => {
                    this.slug = data;
            });
        },

        methods:{
            submit(){
                axios.post(`/comments/post/${this.slug}`,this.form)
                    .catch(({response}) => {
                        swal({
                            title: response.data,
                            icon: "warning",
                            dangerMode: true,
                        });
                    })
                    .then(({data})=> {
                        swal(data,'', "success");
                    });

                this.resetFrom();
            },

            resetFrom(){
                this.form = {
                    name: window.App.signedIn ? "Claudiu" : '',
                    email:window.App.signedIn ? "claudiup340@gmail.com" : '',
                    message:'',
                    commentId: this.comment == undefined ? null : this.comment.id
                }
            }
        }
	}
</script>