@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Name: {{$message->name}}</h1>
		</div>
		<div class="col-md-12">
			<h4>Email: {{$message->email}}</h4>
		</div>
		<div class="col-md-12">
			<p>Message:</p>
			<p>{{$message->body}}</p>	
		</div>
		<div class="col-md-12">
			<a href="{{route('message.replyForm', $message->id)}}" class="btn green">Reply</a>
		</div>
	</div>
</div>
@endsection