@extends('layouts.app')

@section("content")
	
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="margin-bottom: 30px;">
				<h1 class="float-left">Posts Table</h1>
				<a href="{{route("posts.create")}}" class="btn btn-lg btn-success float-right">Create post</a>
			</div>
		</div>
		<div class="row" id="app">
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Title</th>
			      <th scope="col">Category</th>
			      <th scope="col">Slug</th>
			      <th></th>
			    </tr>
			  </thead>
			  <tbody>
				  @foreach ($posts as $post)
				  	 <tr>
				      <th scope="row">{{$post->id}}</th>
				      <td>{{$post->title}}</td>
				      <td>{{$post->category->name}}</td>
				      <td>/{{$post->slug}}</td>
				      <td>
				      	<ul class="list-inline">
				      		<li class="list-inline-item">
				      			<a class="btn btn-info btn-sm" href="{{route('blog.show',['id' => $post->slug])}}"><i class="fa fa-eye"></i></a>
				      		</li>
				      		<li class="list-inline-item">
				      			<a class="btn btn-success btn-sm" href="{{route('posts.edit',['id' => $post->slug])}}"><i class="fa fa-edit"></i></a>
				      		</li>
				      		<li class="list-inline-item">
				      			{!! Form::open(['method'=>'DELETE', 'route' => ["posts.delete", $post->slug]]) !!}
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
		</div>
	</div>

@endsection
