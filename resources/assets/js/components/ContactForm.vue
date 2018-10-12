<template>
    <form class="contactform" method="POST" @submit.prevent="onSubmit" @keydown="form.errors.clear()" action="/contact">
            <!-- Name Field Starts -->
            <div class="input-field second-font">
                <i class="fa fa-user prefix"></i>
                <input id="name" name="name" type="text" class="validate" v-model="form.name" required>
                <span class="help is-danger" v-if="form.errors.any()" v-text="form.errors.get('name')"></span>
                <label class="font-weight-400" for="name">Your Name</label>
            </div>
            <!-- Name Field Ends -->
            <!-- Email Field Starts -->
            <div class="input-field second-font">
                <i class="fa fa-envelope prefix"></i>
                <input id="email" type="email" name="email" class="validate" v-model="form.email" required>
                <span class="help is-danger" v-if="form.errors.any()" v-text="form.errors.get('email')"></span>
                <label for="email">Your Email</label>
            </div>
            <!-- Email Field Ends -->
            <!-- Start Message Textarea Starts -->
            <div class="input-field second-font">
                <i class="fa fa-comments prefix"></i>
                <textarea id="message" name="body" class="materialize-textarea" v-model="form.body" required></textarea>
                <span class="help is-danger" v-if="form.errors.any()" v-text="form.errors.get('body')"></span>
                <label for="body">Your message</label>
            </div>
            <!-- Message Textarea Ends -->
            <!-- Submit Form Button Starts -->
            <div class="col s12 m12 l4 xl4 submit-form">
                <button class="btn font-weight-500" type="submit" name="send" :disabled="form.errors.any()">
                    Send Message <i class="fa fa-send"></i>
                </button>
            </div>
            <!-- Submit Form Button Ends -->
            <div class="col s12 m12 l8 xl8 form-message">
                <span class="output_message center-align font-weight-500 uppercase"></span>
            </div>
        </form>
    </div>
    <!-- Contact Form Ends -->
</template>

<script>
    export default{
        data(){
            return{
                form: new Form({
                    name:'',
                    email:'',
                    body:''
                }),
            }
        },
        methods:{
            onSubmit(){
                this.form.post('/contact')
                    .then((status) => {
                        swal("Thanks! We will be in touch soon.",'', "success")
                    });
            }
        }
    }
</script>
