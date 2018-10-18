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
				      			<a class="btn btn-success btn-sm" href="{{route('skill.edit',['id' => $skill->id])}}"><i class="fa fa-edit"></i></a>
				      		</li>
				      		<li class="list-inline-item">
				      			{!! Form::open(['method'=>'DELETE', 'route' => ["skill.destroy", $skill->id]]) !!}
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
				<form action="{{route('skill.store')}}" method="POST">
					@csrf
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" class="form-control">
					</div>

					<div class="form-group">
						<label for="experience_level">Experience level</label>
						<select name="experience_level" class="form-control">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</div>

					<div class="form-group">
						<button class="btn btn-md btn-info">Add</button>
					</div>
				</form>
				@include("includes.error")
			</div>
		</div>
	</div>

@endsection
