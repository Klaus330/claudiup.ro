@extends('layouts.app')

@section("content")
	
	<div class="container">
		<div class="row">
		<div class="col-md-6">
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Name</th>
			      <th scope="col">Experience</th>
			      <th></th>
			    </tr>
			  </thead>
			  <tbody>
				  @foreach ($skills as $skill)
				  	 <tr>
				      <th scope="row">{{$skill->id}}</th>
				      <td>{{$skill->name}}</td>
				      <td>{{$skill->experience_level}}/5</td>
				      <td>
				      	<ul class="list-inline">
				      		<li class="list-inline-item">
				      			{!! Form::open(['method'=>'DELETE', 'route' => ["skills.delete", $skill->id]]) !!}
		                        {{ method_field('DELETE') }}﻿
									<button class="btn btn-danger btn-sm"><i class="fa fa-close"></i></button>
								{!!Form::close() !!}
				      		</li>
						</ul>
				      </td>
				    </tr>
				  @endforeach
			  </tbody>
			</table>
			{{$skills->links()}}
		</div>
			<div class="col-md-6">
				<h1>Add a new skill</h1>
				{!! Form::open(['method'=>'PATCH', 'route' => ["skills.update", $skill->id]]) !!}
		            {{ method_field('PATCH') }}﻿
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" class="form-control" value="{{$skill->name}}">
					</div>

					<div class="form-group">
						<label for="experience_level">Experience level</label>
						<select name="experience_level" class="form-control">
							<option value="1" {{ ($skill->experience_level == 1) ? 'selected' : ''}}>1</option>
							<option value="2" {{ ($skill->experience_level == 2) ? 'selected' : ''}}>2</option>
							<option value="3" {{ ($skill->experience_level == 3) ? 'selected' : ''}}>3</option>
							<option value="4" {{ ($skill->experience_level == 4) ? 'selected' : ''}}>4</option>
							<option value="5" {{ ($skill->experience_level == 5) ? 'selected' : ''}}>5</option>
						</select>
					</div>

					<div class="form-group">
						<button class="btn btn-md btn-info">Add</button>
					</div>
				{!!Form::close() !!}
				@include("includes.error")
			</div>
		</div>
	</div>

@endsection
