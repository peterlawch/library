@extends('layouts.manage')

@section('content')
  <!--<div class="flex-container">
    <div class="row">
  
    <div class="columns col-6 m-t-10 m-b-0 col-md-8">
    <div class="panel panel-default">
      <div class="panel-heading lead">
        <h1 class="title is-admin is-4">Add New Book</h1></div>
      
        {!! Html::style('css/parsley.css') !!}

        
        <div class="row">
          <div class="col-md-8 form-group">

              {!! Form::open(array('route' => 'books.store', 'data-parsley-validate' => '', 'files' => true)) !!}
              {{ Form::label('title', 'Title:')}}
              {{ Form::text('title', null, array('class' => 'form-control control-label', 'required' => '', 'maxlength' => '255')) }}

              {{ Form::label('slug', 'Slug:') }}
              {{ Form::text('slug', null, array('class' => 'form-control control-label', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}

              {{ Form::label('category_id', 'Category: ') }}
              <select class="form-control" name="category_id">
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach            
              </select>

              {{ Form::label('featured_image', 'Upload Featured Image:') }}
              {{ Form::file('featured_image') }}

              {{ Form::label('body', "Book Description:") }}
              {{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}

              {{ Form::submit('Create Book', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px')) }}
            {!! Form::close() !!}




            {{-- <a href="{{route('users.create')}}" class="btn btn-success btn-block"><i class="fa fa-user-plus m-r-10"></i> Create New User</a> --}}
          </div>
          </div>
        </div>      
    </div>

    <hr class="m-t-0">
    </div>




  </div> <!-- end of .flex-container -->

<div class="columns">
  <div class="column col-6 m-t-100">
    <div class="panel-content">
      <div class="panel-header">
        <h1 class="title">Create Book</h1>

        <div class="row">
          <div class="col-md-8 form-group">

              {!! Form::open(array('route' => 'books.store', 'data-parsley-validate' => '', 'files' => true)) !!}
              {{ Form::label('title', 'Title:')}}
              {{ Form::text('title', null, array('class' => 'form-control control-label', 'required' => '', 'maxlength' => '255')) }}

              {{ Form::label('slug', 'Slug:') }}
              {{ Form::text('slug', null, array('class' => 'form-control control-label', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}

              {{ Form::label('category_id', 'Category: ') }}
              <select class="form-control" name="category_id">
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach            
              </select>

              {{ Form::label('author_id', 'Author: ') }}
              <select class="form-control" name="author_id">
                  @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                  @endforeach            
              </select>

              {{ Form::label('featured_image', 'Upload Featured Image:') }}
              {{ Form::file('featured_image') }}

              {{ Form::label('body', "Book Description:") }}
              {{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}

              {{ Form::submit('Create Book', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px')) }}
            {!! Form::close() !!}




            {{-- <a href="{{route('users.create')}}" class="btn btn-success btn-block"><i class="fa fa-user-plus m-r-10"></i> Create New User</a> --}}
          </div>
        </div>
      </div>    
  </div>
</div>

@endsection

@section('scripts')
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        title: '',
        slug: '',
        api_token: '{{Auth::user()->api_token}}'
      },
      methods: {
        updateSlug: function(val) {
          this.slug = val;
        },
        slugCopied: function(type, msg, val) {
          notifications.toast(msg, {type: `is-${type}`});
        }
      }
    });
    
  </script>
 
 {!! Html::script('js/parsley.min.js') !!}
  
@endsection
