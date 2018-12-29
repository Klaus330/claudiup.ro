<template>
	<div>
		<div>
			<label for="type">Type:</label>
			<select name="type" class="browser-default" v-model="type" @change="onChange(type)" required>
				<template v-if="item">
					<option :value="project.type" v-for="project in projects" :selected="isSelected(project)">{{project.type}}</option>
				</template>
				<template v-else>
					<option :value="project.type" v-for="project in projects">{{project.type}}</option>
				</template>
			</select>
		</div>
		
		<div class="form-group" v-if="isType('book')">
			<label for="pdf">Book:</label>
			<input type="file" class="book" name="pdf"  v-if="isType('book')" required/>
		</div>

		<div class="form-group" v-if="isType('image')">
			<label for="image">Image:</label>
			<input type="file" class="image" name="image"  v-if="isType('image')" required/>
		</div>

		<div class="form-group" v-if="isType('slide')">
			<label for="slide">Images:</label>
			<input type="file" class="image" name="slide[]"  multiple="multiple" v-if="isType('slide')"  required/>
		</div>

		<div class="form-group" v-if="isType('youtube')">
			<label for="url">URL <small>(accepts only youtube links)</small>:</label>
			<template v-if="item"><input type="text" name="url" class="form-control url"  :value="item.url" required></template>
			<template  v-else="isType('youtube')"><input type="text" name="url" class="form-control url" required></template>
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
					type:"",
					hasConfigured:false,
					selected: ""
				}
			},

			created(){
				this.type = this.item ? this.item.type : '';
			},

			methods:{
				isSelected(project){
					if(!this.hasConfigured)
					{	
						if(project.type != this.item.type)
							return false;
						
						this.selected = project.type;	
						this.hasConfigured = true;
						return true;
					}
				},

				isType(type){
					return this.selected == type;
				},

				onChange(type){
					this.selected = type;
				}
			}
	}
</script>