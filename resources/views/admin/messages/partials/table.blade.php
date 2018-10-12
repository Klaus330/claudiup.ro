<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Message</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
	  @foreach ($messages as $message)
	  	 <tr>
	      <th scope="row">{{$message->id}}</th>
	      <td>{{$message->name}}</td>
	      <td>{{$message->email}}</td>
	      <td>{{substr($message->body, 30)}}</td>
	      <td>
	      	<ul class="list-inline">
	      		<li class="list-inline-item">
	      			<a class="btn btn-info btn-sm" href="{{route('messages.show',['id' => $message->id])}}"><i class="fa fa-eye"></i></a>
	      		</li>
	      		<li class="list-inline-item">
	      			{!! Form::open(['method'=>'DELETE', 'route' => ["messages.delete", $message->id]]) !!}
                    {{ method_field('DELETE') }}﻿
						<button class="btn btn-danger btn-sm"><i class="fa fa-close"></i></button>
					{!!Form::close() !!}
	      		</li>
			</ul>
	      </td>
	    </tr>
	  @endforeach
  </tbody>
</table>

<div class="row flex justify-center items-center">
	<div>
		{{$messages->links()}}
	</div>
</div>