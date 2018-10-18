@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Edit {{$project->type}} project</h1>
			</div>
			<div class="col-md-12">
				{!!Form::open(['route' => ['projects.update',$project->id],'files' => true,'method'=>'PATCH','id'=>'root'])!!}
						@method("PATCH")
						<div class="form-group">
							{{Form::label('title','Title:')}}
							{{Form::text('title', $project->title, ['class' => 'form-control','required'=>''])}}
						</div>

						<div class="form-group">
							{{Form::label('client','Client:')}}
							{{Form::text('client', $project->client, ['class' => 'form-control','required'=>''])}}
						</div>

					<project-type-list  :item="{{json_encode($project)}}" ></project-type-list>

						<div class="form-group">
							{{Form::label('skills','Technologies:')}}
							<multiple-select name="skills[]" :items="{{json_encode($skills)}}" :selected="{{json_encode($project->skills)}}" classes="form-control select2"></multiple-select>
						</div>
						
						<div class="form-group">
							{{Form::label('thumbnail', 'Thumbnail')}}
							{{Form::file('thumbnail')}}
						</div>

						<div class="form-group">
							{{Form::label('description','Description:')}}
							<wysiwyg name="description" value="{{$project->description}}"></wysiwyg>
						</div>
						
						<div class="form-group">
							{{Form::submit('Save', ['class' => 'btn btn-success'])}}
							<a href="/projects" class="float-right btn btn-danger">Cancel</a>
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