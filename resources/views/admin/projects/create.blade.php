@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Create a project</h1>
			</div>
			<div class="col-md-12">
				{!!Form::open(['route' => 'projects.store','files' => true,'id'=>'root'])!!}

						<div class="form-group">
							{{Form::label('title','Title:')}}
							{{Form::text('title', null, ['class' => 'form-control','required'=>''])}}
						</div>

						<div class="form-group">
							{{Form::label('client','Client:')}}
							{{Form::text('client', null, ['class' => 'form-control','required'=>''])}}
						</div>
						
						<project-type-list></project-type-list>
						
						<div class="form-group mb-2">
							{{Form::label('skills','Technologies:')}}
							<multiple-select name="skills[]" :items="{{json_encode($skills)}}" classes="select2"></multiple-select>
						</div>
						
						<div class="form-group mb-2">
							{{Form::label('thumbnail', 'Thumbnail')}}
							{{Form::file('thumbnail',['required' => ''])}}
						</div>

						<div class="form-group">
							{{Form::label('description','Description:')}}
							<wysiwyg name="description"></wysiwyg>
						</div>
						
						<div class="form-group mt-3">
							{{Form::submit('Publish', ['class' => 'btn'])}}
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
	   });
	</script>
@endsection