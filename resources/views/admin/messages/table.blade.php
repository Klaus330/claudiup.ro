@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="margin-bottom: 30px;">
				<h1 class="float-left">Messages Table</h1>
			</div>
		</div>
		<div class="row">
			@include("admin.messages.partials.table")
			{{$messages->links()}}
		</div>
	</div>
@endsection