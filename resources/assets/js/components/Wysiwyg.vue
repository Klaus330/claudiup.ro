<template>
	<div>
		<input id="trix" :name="name" :value="value" type="hidden">

		<trix-editor input="trix"></trix-editor>
	</div>
</template>


<script>
	import Trix from 'trix';

	export default{
		props:['name','value']
	}
</script>