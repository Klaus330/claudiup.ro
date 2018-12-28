@extends('layouts.admin')

@section('content')

		<div class="row">
			<div class="col m6 l6 s12 h-full">
			<h1>Categories Table</h1>
			<table class="responsive-table striped ">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Name</th>
			      <th></th>
			    </tr>
			  </thead>
			  <tbody>
				  @foreach ($categories as $category)
				  	 <tr>
				      <th scope="row">{{$category->id}}</th>
				      <td>{{$category->name}}</td>
					   
						<td>
							<ul class="list-inline flex">
					      		<li class="list-inline-item mr-3">
					      			<a class="btn-floating gradient-45deg-cyan-blue gradient-shadow " href="{{route('messages.show',['id' => $category->id])}}"><i class="material-icons">remove_red_eye</i>
	      							</a>
					      		</li>
					      		<li class="list-inline-item mr-3">
					      			<a  class="btn-floating green gradient-shadow" href="{{route('category.edit',['id'=>$category->id])}}"><i class="material-icons">edit</i></a>
					      		</li>
					      		<li class="list-inline-item">
					      			{!! Form::open(['method'=>'DELETE', 'route' => ["category.destroy", $category->id]]) !!}
			                        {{ method_field('DELETE') }}﻿
										<button class="btn-floating red darken-1"><i class="material-icons">close</i></button>
									{!!Form::close() !!}
					      		</li>
							</ul>
						</td>
				    </tr>
				  @endforeach
			  </tbody>
			</table>
			{{$categories->links()}}
			</div>
			<div class="col m6 l6">
				<h1>Add a new category</h1>
				<form action="{{route('category.store')}}" method="POST">
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

@endsection