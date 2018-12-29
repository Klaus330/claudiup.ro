<template>
		<div>
			<select :class="style" :name="name" multiple required>
				<template v-if="selected != undefined">  
					<option   :value="index" v-for="( item, index ) in items" v-text="item" :selected="selectedItem(item)" ></option>
				</template>
			    <template v-else="selected == undefined"> 
			  	   <option   v-for="( item, index ) in items" :value="index" v-text="item"></option>
			    </template>
			</select>
		</div>
</template>


<script>
	export default{
		props:['name','items','selected','classes'],

		computed:{
			style(){
				let defaults =['browser-default'];

				defaults.push(this.classes);
				
				return defaults;
			}
		},

		methods:{
			selectedItem(item){
				for(let i=0; i<this.selected.length; i++){
					if(this.selected[i].name == item){
						return true;
					}
					return false;
				}
			}
		}
	}
</script>
