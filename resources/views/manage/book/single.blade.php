@extends('layouts.manage')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2 m-t-25">
        <img src="{{ asset('images/' . $post->image) }}" alt="" height="800" width="400">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>
            <hr>
            <p>Category: {{ $post->category->name }}</p>
        </div>
    </div>

@endsection
