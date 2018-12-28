@extends('layouts.admin')

@section("content")
	
	<div class="container">
		<div class="row">
			<div class="col m12 xs6 mb-4">
				<h1 class="float-left">Comments Table</h1>
			</div>
		</div>
		<div class="row">
			@include("admin.comments.partials.table")
			{{$comments->links()}}
		</div>
	</div>

@endsection
