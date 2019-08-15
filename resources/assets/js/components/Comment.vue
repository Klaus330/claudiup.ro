<template>
	<div class="comment">
		<img class="comment-avatar pull-left" alt="avatar" src="/images/logo3.png">
		<div class="comment-body">
			<div class="meta-data">
				<span class="comment-author" v-text="item.name"></span>
				<span class="comment-date pull-right second-font"> {{ item.created_at | ago}}</span>
			</div>	
			<div class="comment-content">
			<p class="second-font" v-text="item.message"></p></div>
			<div>
				<a class="comment-reply" href="#" @click="showForm">Reply</a>
			</div>	
			<div v-if="isReplying" class="mb-5 pb-5">
				<comment-form :postId="item.post_id" :comment="item"></comment-form>
			</div>
		</div>
	</div>
</template>


<script>
	import moment from 'moment';
	export default{
		props:['item'],
		data(){
			return{
				reply:false
			};
		},
		computed:{
			isReplying(){
				return this.reply;
			}
		},
		methods:{
			showForm(){
				this.reply = this.reply == false ? true : false;
			}
		},
		filters:{
			ago(date){
				 return moment(date).fromNow();
			}
		}
	}
</script>