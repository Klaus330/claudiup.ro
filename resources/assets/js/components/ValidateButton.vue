<template>
	<form :action="url" method="PATCH" @submit.prevent="onSubmit">
  		<button id="btn-val" class="btn-sm btn btn-warning text-white" type="submit"> Validate </button>	
	</form>
</template>
<script>
	export default{
		props:['url'],
		data(){
			return{
				form: new Form()
			};
		},
		methods:{
			onSubmit(){
				console.log(this.url);
				this.form.patch(this.url)
				.then(
					this.$emit("validated")
				);
				
			}
		}
	}
</script>