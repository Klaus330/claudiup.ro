@extends('layouts.admin')

@section("content")
	
	<div class="container">
		<div class="row">
		<div class="col m6 l6 s12">
			<h1>Tags Table</h1>
			<table class="responsive-table striped">
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
				      	<ul class="list-inline flex">
				      		<li class="list-inline-item mr-3">
				      			<a class="btn-floating " href="{{route('blog.tag',['id' => $tag->name])}}"><i class="material-icons">remove_red_eye</i></a>
				      		</li>
				      		<li class="list-inline-item mr-3">
				      			<a class="btn-floating  green  " href="{{route('tag.edit',['id' => $tag->id])}}"><i class="material-icons">edit</i></a>
				      		</li>
				      		<li class="list-inline-item">
				      			{!! Form::open(['method'=>'DELETE', 'route' => ["tag.destroy", $tag->id]]) !!}
		                        {{ method_field('DELETE') }}﻿
									<button class="btn-floating red darken-1  "><i class="material-icons">delete</i></button>
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
			<div class="col m6 l6">
				<h1>Add a new tag</h1>
				<form action="{{route('tag.store')}}" method="POST">
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
