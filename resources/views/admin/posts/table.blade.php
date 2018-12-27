@extends('layouts.admin')

@section("content")
	
	<div class="container">
		<div class="row">
			<div class="col-md-12 flex justify-between items-center mb-2">
				<h1 class="">Posts Table</h1>
				<a href="{{route("posts.create")}}" class="btn green">Create post</a>
			</div>
		</div>
		<div class="row" id="app">
				<table 
					id="data-table-simple" 
					class="responsive-table display dataTable" 
					cellspacing="0" 
					role="grid" 
					aria-describedby="data-table-simple_info">

				  <thead>
				    <tr role="row">
				    	<th class="sorting_asc" tabindex="0" aria-controls="data-table-simple" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" ID: activate to sort column descending" style="width: 273px;">
				    		#
				    	</th>
				    	<th class="sorting_asc" tabindex="0" aria-controls="data-table-simple" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 273px;">
				    		Title
				    	</th>
				    	<th class="sorting" tabindex="0" aria-controls="data-table-simple" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 429px;">
				    		Category
				    	</th>
				    	<th class="sorting" tabindex="0" aria-controls="data-table-simple" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 204px;">
				    		Slug
				    	</th>
				    	<th class="sorting" tabindex="0" aria-controls="data-table-simple" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 163px;">
				    		
				    	</th>
				    </tr>
				  </thead>


				  <tbody>

					@forelse ($posts as $post)
					  <tr role="row" class="odd">
					      <th scope="row">{{$post->id}}</th>
					      <td>{{$post->title}}</td>
					      <td>{{$post->category->name}}</td>
					      <td>/{{$post->slug}}</td>
					      <td>
					      	<ul class="list-inline flex">
					      		<li class="list-inline-item mr-4">
					      			<a class="btn-floating gradient-45deg-cyan-blue gradient-shadow" href="{{route('blog.show',['id' => $post->slug])}}"><i class="material-icons">remove_red_eye</i>
					      			</a>
					      		</li>
					      		<li class="list-inline-item mr-4">
					      			<a class="btn-floating green " href="{{route('posts.edit',['id' => $post->slug])}}"><i class="material-icons">edit</i></a>
					      		</li>
					      		<li class="list-inline-item">
					      			{!! Form::open(['method'=>'DELETE', 'route' => ["posts.delete", $post->slug]]) !!}
					                {{ method_field('DELETE') }}﻿
										<button class="btn-floating red darken-1 gradient-shadow"><i class="material-icons">close</i></button>
									{!!Form::close() !!}
					      		</li>
							</ul>
					      </td>
					    </tr>
					 @empty
					 	<tr>
					 		<p> There are no posts in the db.</p>
					 	</tr>
					 @endforelse
				</tbody>
			</table>
			<div>
				{{$posts->links()}}
			</div>
		</div>
	</div>

@endsection




