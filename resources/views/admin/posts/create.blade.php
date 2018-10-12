@extends('layouts.app')

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
							{{Form::label('slug','Slug:')}}
							{{Form::text('slug', null, ['class' => 'form-control','required'=>''])}}
						</div>

						<div class="form-group">
							{{Form::label('category_id','Category:')}}
							{{Form::select('category_id',$categories,null,['class'=>'form-control'])}}
						</div>

						<div class="form-group">
							{{Form::label('tags','Tag:')}}
							<multiple-select name="tags[]" :items="{{json_encode($tags)}}" classes="form-control select2"></multiple-select>
						</div>
						
						<div class="form-group">
							{{Form::label('thumbnail', 'Thumbnail')}}
							{{Form::file('thumbnail',['required' => ''])}}
						</div>

						<div class="form-group">
							{{Form::label('body','Body:')}}
							<wysiwyg name="body"></wysiwyg>
						</div>
						
						<div class="form-group">
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
	    $(".select2").select2();
	</script>
@endsection