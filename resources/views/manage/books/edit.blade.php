@extends('layouts.manage')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <div class="flex-container">
    
        <div class="column">
        {!! Form::model($post, ['route' => ['books.update', $post->id], 'method' => 'PUT', 'files' => true ]) !!}
        <div class="col-md-8">
            {{ Form::label('title', 'Title:') }}            
            {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}

            {{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
            {{ Form::text('slug', null, ['class' => 'form-control']) }}

            {{ Form::label('category_id', 'Category: ', ['class' => 'form-spacing-top']) }}
            {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

            {{ Form::label('author_id', 'Author: ', ['class' => 'form-spacing-top']) }}
            {{ Form::select('author_id', $authors, null, ['class' => 'form-control']) }}

            {{ Form::label('publisher_id', 'Publisher: ', ['class' => 'form-spacing-top']) }}
            {{ Form::select('publisher_id', $publishers, null, ['class' => 'form-control']) }}

            {{ Form::label('featured_image', 'Update Featured Image:', ['class' => 'form-spacing-top']) }}
            {{ Form::file('featured_image') }}

            {{ Form::label('body', 'Description:', ['class' => 'form-spacing-top']) }}
            {{ Form::textarea('body', null, ['class' => 'form-control']) }} 

            
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Create At:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('books.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
                        
                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                    
                        
                    </div>
                </div>
            
            </div>
            
        </div>
        {!! Form::close() !!}
        </div> <!--end of the form -->




    </div> <!-- end of .flex-container -->

@stop