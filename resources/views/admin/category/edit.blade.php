@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@include("includes.error")
				{!! Form::model($category, ['method' => 'PATCH','route'=> ['category.update', $category->id]]) !!}
            		{{ method_field('PATCH') }}﻿
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" class="form-control" value="{{$category->name}}" required>
					</div>
				
					<div class="form-group" style="margin-top: 30px;">
						<button class="btn gradient-45deg-cyan-blue gradient-shadow">Edit  <i class="fa fa-check"></i></button>
						<a href="{{route('category.index')}}" class="btn gradient-45deg-red-pink gradient-shadow">Cancel <i class="fa fa-times"></i></a>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection

