<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SCMC LIBRARY</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


        <!-- Styles -->
        
    </head>
    <body>
        <div class="flex-center position-ref full-height" id="app">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif
        </div>

        <div class="content">
            <div class="row">
                <div class="col-md-8">
                    <div class="jumbotron">
                        <h1>Welcome to SCMC LIBRARY</h1>
                        <p class="lead">Thank you for visiting.</p>
                        <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Book</a></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    @foreach($posts as $post)
                        <div class="post">
                            <h3>{{ $post->title }}</h3>
                            <p>{{ substr($post->body, 0, 300) }}{{ strlen($post->body) > 300 ? "..." : "" }}</p>
                            <a href="{{ url('book/'.$post->slug) }}" class="btn btn-primary">Read More</a>
                        </div>

                    @endforeach
                </div>
                <div class="col-md-3 col-md-offset-1">
                    <h2>Sidebar</h2>
                </div>
            </div>
        </div>


        <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    </body>
</html>



