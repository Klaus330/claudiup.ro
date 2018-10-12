@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@include("includes.error")
				{!! Form::model($post, ['method' => 'PATCH','route'=> ['posts.update', $post->slug],'files' => true]) !!}
            		{{ method_field('PATCH') }}﻿
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" name="title" class="form-control" value="{{$post->title}}" required>
					</div>
					
					<div class="form-group">
						<label for="slug">Slug</label>
						<input type="text" name="slug" class="form-control" value="{{$post->slug}}" required>
					</div>
					
					<div class="form-group">
						<label for="category">Category</label>
						<select name="category_id" class="form-control" id="" required>
							@foreach($categories as $category)
								<option value="{{$category->id}}">{{$category->name}}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						{{Form::label('tags','Tag:')}}
						{{-- {{Form::select('tags[]',$tags,$post->tags,['class'=>'form-control select2','multiple'=>'multiple','required'=>''])}} --}}
						<multiple-select name="tags[]" :items="{{json_encode($tags)}}" :selected="{{json_encode($post->tags)}}" classes="form-control select2"></multiple-select>
					</div>

					<div class="form-group">
						{{Form::label('thumbnail', 'Thumbnail')}}
						{{Form::file('thumbnail')}}
					</div>

					<div class="form-group">
						<label for="body">Body</label>
						<wysiwyg name="body" value="{{$post->body}}"></wysiwyg>
					</div>
					
					<div class="form-group" style="margin-top: 30px;">
						<button class="btn btn-success btn-lg">Edit  <i class="fa fa-check"></i></button>
						<a href="{{route('posts.table')}}" class="btn btn-danger btn-lg float-right">Cancel <i class="fa fa-times"></i></a>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
	    $(".select2").select2();
	</script>
@endsection