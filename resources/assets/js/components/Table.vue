<template>
	<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Message</th>
      <th scope="col">Post</th>
      <th scope="col">Validate</th>
      <th></th>
    </tr>
  </thead>
  <tbody> 
	  	 <tr v-for="item in items">
	      <th scope="row">{{$comment->id}}</th>
	      <td>{{$comment->name}}</td>
	      <td>{{$comment->message}}</td>
	      <td><a href="/blog/{{$comment->post->slug}}">{{$comment->post->title}}</a></td>
	      <td>
			@if($comment->validated)
				<i class="fa fa-check"></i>
			@else
			<validate-button url="/comments/{{$comment->id}}"></validate-button>
			@endif
	      </td>
	      <td>
	      	<ul class="list-inline">
	      		<li class="list-inline-item">
	      			<a class="btn btn-info btn-sm" href="{{route('blog.show',['id' => $comment->post->slug])}}"><i class="fa fa-eye"></i></a>
	      		</li>
	      		<li class="list-inline-item">
					<delete-button url="/comments/{{$comment->id}}"></delete-button>
	      		</li>
			</ul>
	      </td>
	    </tr>
	  @endforeach
  </tbody>
</table>

</template>

<script>
	export default{
		props:['items']
	}
</script>