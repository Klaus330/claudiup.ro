	<table 
		id="data-table-simple" 
		class="responsive-table display dataTable" 
		cellspacing="0" 
		role="grid" 
		aria-describedby="data-table-simple_info">

	  <thead>
	    <tr role="row">
	    	<th class="sorting_asc" tabindex="0" aria-controls="data-table-simple" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" ID: activate to sort column descending" style="width: 273px;">
	    		#
	    	</th>
	    	<th class="sorting_asc" tabindex="0" aria-controls="data-table-simple" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 273px;">
	    		Name
	    	</th>
	    	<th class="sorting" tabindex="0" aria-controls="data-table-simple" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 429px;">
	    		Email
	    	</th>
	    	<th class="sorting" tabindex="0" aria-controls="data-table-simple" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 204px;">
	    		Message
	    	</th>
	    	<th class="sorting" tabindex="0" aria-controls="data-table-simple" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 163px;">
	    		
	    	</th>
	    </tr>
	  </thead>

	  <tfoot>
	    <tr>
	    	<th rowspan="1" colspan="1">#</th>
	    	<th rowspan="1" colspan="1">Name</th>
	    	<th rowspan="1" colspan="1">Email</th>
	    	<th rowspan="1" colspan="1">Message</th>
	    	<th rowspan="1" colspan="1"></th>
	    </tr>
	  </tfoot>

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