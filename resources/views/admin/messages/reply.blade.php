@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col m12">
			<h3>Name: {{$message->name}} </h3>
			<h4>Email: {{$message->email}}</h4>
		</div>
		<div class="col m12">
			<label>Reply</label>
			<form action="{{route('message.reply', $message)}}" method="POST">
				@csrf
				
				<div class="form-group">
					<wysiwyg name="body"></wysiwyg>
				</div>				

				<button class="btn">Send Email</button>
			</form>
		</div>
	</div>
</div>
@endsection