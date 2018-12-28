	<table 
		class="striped responsive-table">

	  <thead>
	    <tr role="row">
	    	<th class="sorting_asc">
	    		#
	    	</th>
	    	<th class="sorting_asc" >
	    		Name
	    	</th>
	    	<th class="sorting">
	    		Email
	    	</th>
	    	<th class="sorting">
	    		Message
	    	</th>
	    	<th class="sorting">
	    		
	    	</th>
	    </tr>
	  </thead>


	  <tbody>

		@forelse ($messages as $message)
		  <tr role="row" class="odd">
		      <th scope="row">{{$message->id}}</th>
		      <td>{{$message->name}}</td>
		      <td>{{$message->email}}</td>
		      <td>{{substr($message->body, 0, 30)}}</td>
		      <td>
		      	<ul class="list-inline flex">
		      		<li class="list-inline-item mr-4">
		      			<a class="btn-floating gradient-45deg-cyan-blue gradient-shadow" href="{{route('messages.show',['id' => $message->id])}}"><i class="material-icons">remove_red_eye</i>
		      			</a>
		      		</li>
		      		<li class="list-inline-item">
		      			{!! Form::open(['method'=>'DELETE', 'route' => ["messages.delete", $message->id]]) !!}
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