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
	  @foreach ($comments as $comment)
	  	 <tr>
	      <th scope="row">{{$comment->id}}</th>
	      <td>{{$comment->name}}</td>
	      <td>{{$comment->message}}</td>
	      <td><a href="/blog/{{$comment->post->slug}}">{{$comment->post->title}}</a></td>
	      <td>
			@if($comment->validated)
				<i class="fa fa-check"></i>
			@else
				{{-- Temporary --}}
				{!! Form::open(['method'=>'PATCH', 'route' => ["comments.validate", $comment->id]]) !!}
					@csrf
					 {{ method_field('PATCH') }}﻿
			  		<button id="btn-val" class="btn-sm btn btn-warning text-white" type="submit"> Validate </button>	
				{!!Form::close()!!}
			@endif
	      </td>
	      <td>
	      	<ul class="list-inline">
	      		<li class="list-inline-item">
	      			<a class="btn btn-info btn-sm" href="{{route('blog.show',['id' => $comment->post->slug])}}"><i class="fa fa-eye"></i></a>
	      		</li>
	      		<li class="list-inline-item">
					{{-- Temporary --}}
					{!! Form::open(['method'=>'DELETE', 'route' => ["comments.delete", $comment->id]]) !!}
						@csrf
						 {{ method_field('DELETE') }}﻿
						<button class="btn btn-danger btn-sm"><i class="fa fa-close"></i></button>
					{!!Form::close()!!}
	      		</li>
			</ul>
	      </td>
	    </tr>
	  @endforeach
  </tbody>
</table>

<div class="row flex justify-center items-center">
	<div>
		{{$comments->links()}}
	</div>
</div>