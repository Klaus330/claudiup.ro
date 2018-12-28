<table 
	class="striped responsive-table" >

  <thead>
    <tr role="row">
    	<th>
    		#
    	</th>
    	<th >
    		Name
    	</th>
    	<th >
    		Message
    	</th>
    	<th>
    		Validate
    	</th>

    	<th></th>
    </tr>
  </thead>


  <tbody>

	@forelse ($comments as $comment)
	  <tr role="row">
	      <th scope="row">{{$comment->id}}</th>
	      <td>{{$comment->name}}</td>
	      <td>{{substr($comment->message, 0,100)}}</td>
	      <td>
			@if($comment->validated)
				<i class="material-icons">check</i>
			@else
				{{-- Temporary --}}
				{!! Form::open(['method'=>'PATCH', 'route' => ["comments.validate", $comment->id]]) !!}
					@csrf
					 {{ method_field('PATCH') }}﻿
			  		<button id="btn-val" class="btn green" type="submit"> Validate </button>	
				{!!Form::close()!!}
			@endif
	      </td>
	      <td>
	      	<ul class="list-inline flex">
	      		<li class="list-inline-item mr-4">
	      			<a class="btn-floating gradient-45deg-cyan-blue gradient-shadow" href="{{route('messages.show',['id' => $comment->post_slug])}}"><i class="material-icons">remove_red_eye</i>
	      			</a>
	      		</li>
	      		<li class="list-inline-item">
	      			{!! Form::open(['method'=>'DELETE', 'route' => ["messages.delete", $comment->id]]) !!}
	                {{ method_field('DELETE') }}﻿
						<button class="btn-floating red darken-1"><i class="material-icons">close</i></button>
					{!!Form::close() !!}
	      		</li>
			</ul>
	      </td>
	    </tr>
	 @empty
	 	<tr>
	 		<p> There are no messages in the db.</p>
	 	</tr>
	 @endforelse
</tbody>
</table>

{{$comments->links()}}