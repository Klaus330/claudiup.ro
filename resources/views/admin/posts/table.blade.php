@extends('layouts.admin')

@section("content")
	
		<div class="row">
			<div class="col m12 flex justify-between items-center mb-2">
				<h1 class="">Posts Table</h1>
				<a href="{{route("posts.create")}}" class="btn green">Create post</a>
			</div>
		</div>
		<div class="row s12" id="app">
				<table 
					id="data-table-simple" 
					class="responsive-table striped centered" 
					cellspacing="0" 
					role="grid" 
					aria-describedby="data-table-simple_info">

				  <thead>
				    <tr role="row">
				    	<th class="sorting_asc">
				    		#
				    	</th>
				    	<th class="sorting_asc" >
				    		Title
				    	</th>
				    	<th class="sorting">
				    		Category
				    	</th>
				    	<th class="sorting">
				    		Slug
				    	</th>
				    	<th class="sorting">
				    		
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


@endsection




