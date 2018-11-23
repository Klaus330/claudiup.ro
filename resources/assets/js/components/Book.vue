<template>
	<div>
		<div class="h-full w-full p-4" :id="'solid-container' + project_id" style="height: 400px;" ></div>
	</div>
</template>

<script>
	export default{
		props:['location','project_id'],
		mounted(){
			this.mount();
		},
		methods:{
			mount(){	
				$('#solid-container' + this.project_id).FlipBook({pdf: '/files/uploads/' + this.location});	
			}
		},

	}
</script>