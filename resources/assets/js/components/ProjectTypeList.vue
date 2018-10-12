<template>
	<div>
		<div class="form-group">
			<label for="type">Type:</label>
			<select name="type" class="form-control" v-model="selected" required>
				<template v-if="item != undefined">
					<option :value="project.type" v-for="project in projects" :selected="isSelected(project)">{{project.type}}</option>
				</template>
				<template v-else>
					<option :value="project.type" v-for="project in projects">{{project.type}}</option>
				</template>
			</select>
		</div>
		
		<div class="form-group" v-if=" selected == 'book' ">
			<label for="pdf">Book:</label>
			<input type="file" class="book" name="pdf"  v-if="selected == 'book'" required/>
		</div>

		<div class="form-group" v-if=" selected == 'image' ">
			<label for="image">Image:</label>
			<input type="file" class="image" name="image"  v-if="selected == 'image'" required/>
		</div>

		<div class="form-group" v-if=" selected == 'slide' ">
			<label for="slide">Images:</label>
			<input type="file" class="image" name="slide[]"  multiple="multiple" v-if="selected == 'slide'"  required/>
		</div>

		<div class="form-group" v-if=" selected == 'youtube' ">
			<label for="url">URL:</label>
			<template v-if="item != undefined"><input type="text" name="url" class="form-control url"  :value="item.url" required></template>
			<template  v-else="selected == 'youtube'"><input type="text" name="url" class="form-control url" required></template>
		</div>
	</div>
</template>

<script>
	export default{
		props:["item"],
		data() {
				return {
					projects:[
						{type: 'image'},
						{type: 'youtube'},
						{type: 'slide'},
						{type: 'book'}
					],
					selected: ""
				}
			},
			methods:{
				isSelected(project){
					if(project.type == this.item.type){
						console.log('hit');
						return true;
					}else{
						console.log('hit2');
						return false;
					}
				}
			}
	}
</script>