@extends('layouts.manage')

@section('content')
  <div class="flex-container">
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
  
    <div class="columns m-t-20">
      <div class="col-md-10">
        <h1>This is the books.list page</h1>
      </div>
      <div class="col-md-2">
        <a href="{{ route('books.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Book</a>
      </div>
      <hr>
      <div class="col-md-12">
        <hr>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <thead>
            <th>#</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created At</th>
            <th></th>
          </thead>
          <tbody>
            @foreach ($posts as $post)
              <tr>
                <th>{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ substr($post->body, 0, 50) }}{{ strlen($post->body) > 50 ? "..." : "" }}</td>
                <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
                <td><a href="{{ route('books.show', $post->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('books.edit', $post->id)}}" class="btn btn-default btn-sm">Edit</a></td>
              </tr>

            @endforeach
          </tbody>
        </table>
        <div class="text-center">
          {!! $posts->links(); !!}
        </div>
      </div>
    </div>
    <hr>



  </div> <!-- end of .flex-container -->

@endsection

