@extends('layouts.admin')

@section("content")
	
	<div class="container">
		<div class="row">
			<div class="col-md-12 mb-4">
				<h1 class="float-left">Comments Table</h1>
			</div>
		</div>
		<div class="row">
			@include("admin.comments.partials.table")
		</div>
	</div>

@endsection
