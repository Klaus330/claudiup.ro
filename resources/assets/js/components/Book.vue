<template>
	<div class="h-full">
		<div class="h-full w-full p-4" :id="'solid-container' + project_id"></div>
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
				var options = {
					  pdf: '/files/uploads/' + this.location,
					  template:{ 
				      html: '/templates/default-book-view.html',
				      styles: [
				        '/css/black-book-view.css'
				      ],
					   links: [{
				        	rel: 'stylesheet',
				       	 	href: '/css/font-awesome.min.css'
				      	}],
				      	 script: '/js/default-book-view.js',
					},
				};
				$('#solid-container' + this.project_id).FlipBook(options);	
			}
		},

	}
</script>