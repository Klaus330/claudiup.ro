@extends('layouts.app')

@section('content')
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
				  @foreach ($categories as $category)
				  	 <tr>
				      <th scope="row">{{$category->id}}</th>
				      <td>{{$category->name}}</td>
					   
						<td>
							<ul class="list-inline">
					      		<li class="list-inline-item">
					      			<a  class="btn btn-sm btn-info" href="{{route('blog.home')}}/?category={{$category->name}}"><i class="fa fa-eye"></i></a>
					      		</li>
					      		<li class="list-inline-item">
					      			<a  class="btn btn-sm btn-success" href="{{route('category.edit',['id'=>$category->id])}}"><i class="fa fa-edit"></i></a>
					      		</li>
					      		<li class="list-inline-item">
					      			{!! Form::open(['method'=>'DELETE', 'route' => ["category.delete", $category->id]]) !!}
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
			{{$categories->links()}}
			</div>
			<div class="col-md-6">
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
	</div>
@endsection