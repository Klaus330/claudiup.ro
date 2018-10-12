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
			      <th></th>
			    </tr>
			  </thead>
			  <tbody>
				  @foreach ($tags as $tag)
				  	 <tr>
				      <th scope="row">{{$tag->id}}</th>
				      <td>{{$tag->name}}</td>
				      <td>
				      	<ul class="list-inline">
				      		<li class="list-inline-item">
				      			<a class="btn btn-info btn-sm" href="{{route('blog.tag',['id' => $tag->name])}}"><i class="fa fa-eye"></i></a>
				      		</li>
				      		<li class="list-inline-item">
				      			<a class="btn btn-success btn-sm" href="{{route('tags.edit',['id' => $tag->id])}}"><i class="fa fa-edit"></i></a>
				      		</li>
				      		<li class="list-inline-item">
				      			{!! Form::open(['method'=>'DELETE', 'route' => ["tags.delete", $tag->id]]) !!}
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
			{{$tags->links()}}
		</div>
			<div class="col-md-6">
				<h1>Add a new tag</h1>
				<form action="{{route('tags.store')}}" method="POST">
					@csrf
					<div class="form-group">
						<label for="name"></label>
						<input type="text" name="name" class="form-control">
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
