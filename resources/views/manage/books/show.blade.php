@extends('layouts.manage')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <div class="flex-container">
    <div class="column">
      <div class="col-md-8">
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
            <strong>Success:</strong> {{ Session::get('success') }}
            </div>

        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <strong>Errors:</strong>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        <img src="{{ asset('images/' . $post->image) }}" height="400" width="200"/>
        
        <h1 class="title">This is the Book created</h1>
        <h1>{{ $post->title }}</h1>
        <p class="lead">{{ $post->body }}</p>
        
        
      </div>
      <div class="col-md-4">
        <div class="well">

            <dl class="dl-horizontal">
                <label>Url:</label>
                <p><a href="{{ route('book.single', $post->slug) }}">{{ route('book.single', $post->slug) }}</a></p>
            </dl>

            <dl class="dl-horizontal">
                <label>Catgory:</label>
                <p>{{ $post->category->name }}</p>
            </dl>

            <dl class="dl-horizontal">
                <label>Author:</label>
                <p>{{ $post->author->name }}</p>
            </dl>

            <dl class="dl-horizontal">
                <label>Created At:</label>
                <p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
            </dl>

            <dl class="dl-horizontal">
                <label>Last Updated:</label>
                <p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
            </dl>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    {!! Html::linkRoute('books.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
                    
                </div>
                <div class="col-sm-6">
                    {!! Form::open(['route' => ['books.destroy', $post->id], 'method' => 'DELETE']) !!}
                    
                    {!! Form::submit('Delect', ['class' => 'btn btn-danger btn-block']) !!}

                    {!! Form::close() !!}
                    
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    {{ Html::linkRoute('books.index', '<< See All Books', [], ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
                </div>
            </div>
            <div class=" text-center">
                {!! QrCode::size(200)->generate(Request::url()); !!}
                <p>Scan me to return to the original page.</p>
            </div>
            
        
        </div>
        
      </div>
    </div>




  </div> <!-- end of .flex-container -->

@endsection
