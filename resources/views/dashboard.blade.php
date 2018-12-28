@extends('layouts.admin')

@section('content')

    <div class="row mb-4">
        <div class="col-md-12 pt-4">
            <h5 class="pb-4"><a href="{{route('messages.table')}}">Latest Messages</a></h5>
            @include("admin.messages.partials.table")
        </div>

        <div class="col-md-12 pt-4">
            <h5 class="pb-4"><a href="{{route('comments.table')}}">Latest Comments</a></h5>
            @include("admin.comments.partials.table")
        </div>
    </div>

@endsection
