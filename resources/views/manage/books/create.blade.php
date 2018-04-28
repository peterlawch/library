@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10 m-b-0">
      <div class="column">
        <h1 class="title is-admin is-4">Add New Book</h1>
      </div>
      {!! Html::style('css/parsley.css') !!}
      
      {{--<div class="column">--}}
      <div class="row">
        <div class="column is-three-quarters-desktop is-three-quarters-tablet">

            {!! Form::open(array('route' => 'books.store', 'data-parsley-validate' => '', 'files' => true)) !!}
            {{ Form::label('title', 'Title:')}}
            {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

            {{ Form::label('slug', 'Slug:') }}
            {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}

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




          {{-- <a href="{{route('users.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Create New User</a> --}}
        </div>
      </div>
    </div>
    <hr class="m-t-0">




  </div> <!-- end of .flex-container -->

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
