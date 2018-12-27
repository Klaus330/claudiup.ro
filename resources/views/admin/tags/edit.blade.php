@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col m12 l12 mt-3">
				@include("includes.error")
				{!! Form::model($tag, ['method' => 'PATCH','route'=> ['tag.update', $tag->id]]) !!}
            		{{ method_field('PATCH') }}﻿
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" class="form-control" value="{{$tag->name}}" required>
					</div>
				
					<div class="form-group" style="margin-top: 30px;">
						<button class="btn green">Edit</button>
						<a href="{{route('tag.table')}}" class="btn red darken-1">Cancel</a>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection

