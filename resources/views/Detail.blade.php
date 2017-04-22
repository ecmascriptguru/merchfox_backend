@extends('layouts.app')

@section('content')

<div class = "container">

    <div id="detail">
        <h3 class="title">{{ $postID->title }}</h3>
                                
        <div class="image">
            <img class="post-image" src="{{ Voyager::image($postID->image) }}">
        </div>

        <div class="post-body">
            {!! html_entity_decode($postID->body) !!}
        </div>
    </div>
</div>

@endsection