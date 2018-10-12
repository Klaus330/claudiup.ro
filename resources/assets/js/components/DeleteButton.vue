<template>
	<form :action="url" method="DELETE" @submit.prevent="onSubmit">
		<button class="btn btn-danger btn-sm"><i class="fa fa-close"></i></button>
	</form>
</template>

<script>
	export default {
		props:['url'],
		data(){
			return{
				form: new Form()
			};
		},
		methods:{
			onSubmit(){
				this.form.delete(this.url)
				.then(
					this.$emit("deleted")
				);
			}
		}

	}
</script>