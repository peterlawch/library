@extends('layouts.manage')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2 m-t-25">
        <img src="{{ asset('images/' . $post->image) }}" alt="" height="800" width="400">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>
            <hr>
            <p>Category: {{ $post->category->name }}</p>
            <p>Author: {{ $post->author->name }}</p>
            <p>Publisher: {{ $post->publisher->name }}</p>
        </div>
        <div class="col-md-4 col-md-offset-2">
        <div class="well">

            <div class="visible-print-block-inline text-center hidden">
                {!! QrCode::format('png')->size(200)->generate(Request::url(), '../public/images/' . $post->slug . '.png'); !!}
                <!--{!! QrCode::format('png')->merge('../public/images/Methodist_Church.png', .3, true)->generate(Request::url()); !!}-->
                <p>{!! $post->title !!}</p>
            </div>
            
            
        
        </div>
        
    </div>

@endsection
