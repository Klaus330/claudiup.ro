@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col m12 l12 flex justify-between items-center mb-2">
				<h1 class="">Projects Table</h1>
				<a href="{{route("projects.create")}}" class="btn green">Add project</a>
			</div>
		</div>
		<div class="row">
			<table class="responsive-table striped s12">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Title</th>
			      <th scope="col">Description</th>
			      <th scope="col">Type</th>
			      <th scope="col">Client</th>
			      <th></th>
			    </tr>
			  </thead>
			  <tbody>
				  @foreach ($projects as $project)
				  	 <tr>
				      <th scope="row">{{$project->id}}</th>
				      <td>{{$project->title}}</td>
				      <td>{{substr($project->description,50)}}</td>
				      <td>{{$project->type}}</td>
				      <td>{{$project->client}}</td>
				      <td>
				      	<ul class="list-inline">
				      		<li class="list-inline-item">
				      			<a class="btn btn-success btn-sm" href="{{route('projects.edit',['id' => $project->id])}}"><i class="fa fa-edit"></i></a>
				      		</li>
				      		<li class="list-inline-item">
				      			{!! Form::open(['method'=>'DELETE', 'route' => ["projects.destroy", $project->id]]) !!}
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
			{{$projects->links()}}
		</div>
	</div>
@endsection