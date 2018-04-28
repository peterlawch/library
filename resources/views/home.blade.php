@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    {{-- You are logged in! --}}
                  <pre>
                    {{-- {{ dd(json_encode(LaraFlash::allByPriority())) }} --}}
                  </pre>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="jumbotron">
                            <h1>Welcome to SCMC LIBRARY</h1>
                            <p class="lead">Thank you for visiting.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        
                        <div class="col-sm-6">
                            {!! Html::linkRoute('categories.index', 'Categories', array('class' => 'btn btn-primary btn-block')) !!}
                        </div>
                    </div>
                    <hr>
                </div>
            <div class="col-md-3 col-md-offset-1">
                <h2>Sidebar</h2>
            </div>  
            </div>
        </div>
    </div>
</div>
@endsection
