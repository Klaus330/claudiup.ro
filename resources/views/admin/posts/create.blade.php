@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Create a post</h1>
			</div>
			<div class="col-md-12" >
				{!!Form::open(['route' => 'posts.store','files' => true])!!}

						<div class="form-group">
							{{Form::label('title','Title:')}}
							{{Form::text('title', null, ['class' => 'form-control','required'=>''])}}
						</div>
						
						<div class="form-group">
							{{Form::label('category_id','Category:')}}
							{{Form::select('category_id',$categories,null,['class'=>'select2 browser-default'])}}
						</div>

						<div class="form-group mb-2">
							{{Form::label('tags','Tag:')}}
							<multiple-select name="tags[]" :items="{{json_encode($tags)}}" classes="select2"></multiple-select>
						</div>
						
						<div class="form-group mb-2">
							{{Form::label('thumbnail', 'Thumbnail')}}
							{{Form::file('thumbnail',['required' => ''])}}
						</div>

						<div class="form-group">
							{{Form::label('body','Body:')}}
							<wysiwyg name="body"></wysiwyg>
						</div>
						
						<div class="form-group mt-4 mb-2">
							{{Form::submit('Publish', ['class' => 'btn btn-primary'])}}
						</div>
		 
				{!!Form::close()!!}
				@include("includes.error")
			</div>
		</div>
	</div>
@endsection


@section('scripts')
	<script type="text/javascript">
		$(function(){
			$(".select2").select2();		
		})
	</script>
@endsection