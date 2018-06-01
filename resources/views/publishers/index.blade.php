@extends('layouts.manage')

@section('content')

    <div class="row">
        <div class="col-md-8 m-t-20">
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
            <h1>Publisher</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($publishers as $publisher)
                    <tr>
                        <th>{{ $publisher->id }}</th>
                        <th>{{ $publisher->name }}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- end of .col-md-8 -->
        <div class="col-md-3 m-t-20">
            <div class="well">
                {!! Form::open(['route' => 'publishers.store', 'method' => 'POST']) !!}
                    <h2>New Publisher</h2>
                    {{ Form:: label('name', 'Name: ') }}
                    {{ Form::text('name', null, ['class' => 'form-control']) }}

                    {{ Form::submit('Create New Publisher', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
                {!! Form::close() !!}
            </div>
        </div>


    </div>

@endsection
