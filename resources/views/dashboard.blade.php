@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <ul class="list-inline text-justify" >
                        <li class="list-inline-item"><a href="{{route("posts.create")}}"> <i class="fa fa-plus-square"></i> create post</a></li>
                         <li class="list-inline-item"><a href="{{route('skill.index')}}"> <i class="fa fa-star"></i> skills table</a></li>
                         <li class="list-inline-item"><a href="{{route('comments.table')}}"> <i class="fa fa-user"></i> commets table</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-12 pt-4">
            <h1 class="pb-4"><a href="{{route('messages.table')}}">New Messages</a></h1>
            @include("admin.messages.partials.table")
        </div>

        <div class="col-md-12 pt-4">
            <h1 class="pb-4"><a href="{{route('comments.table')}}">New Comments</a></h1>
            @include("admin.comments.partials.table")
        </div>
    </div>
</div>
@endsection
