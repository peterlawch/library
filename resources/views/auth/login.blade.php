@extends('layouts.app')

@section('content')

<div class="columns">
  <div class="column col-6 m-t-100">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="title">Create</h1>

        <form action="{{route('login')}}" method="POST" role="form">
          {{csrf_field()}}
          <div class="form-group">
            <label for="email" class="control-label">Email Address</label>
            <p class="control">
              <input class="form-control {{$errors->has('email') ? 'is-danger' : ''}}" type="text" name="email" id="email" placeholder="name@example.com" value="{{old('email')}}">
            </p>
            @if ($errors->has('email'))
              <p class="help is-danger">{{$errors->first('email')}}</p>
            @endif
          </div>
          <div class="form-group">
            <label for="password" class="control-label">Password</label>
            <p class="control">
              <input class="form-control {{$errors->has('password') ? 'is-danger' : ''}}" type="password" name="password" id="password">
            </p>
            @if ($errors->has('password'))
              <p class="help is-danger">{{$errors->first('password')}}</p>
            @endif

          </div>

          <b-checkbox name="remember" class="m-t-20">Remember Me</b-checkbox>

          <button class="btn btn-success btn-block">Log In</button>
        </form>
      </div> <!-- end of .card-content -->
    </div> <!-- end of .card -->
    <h5 class="has-text-centered m-t-20"><a href="{{route('password.request')}}" class="is-muted">Forgot Your Password?</a></h5>
  </div>
</div>


<!--
<div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              
              <h4 class="modal-title" id="myModalLabel">Login</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-6">
                      <div class="well">
                          <form id="loginForm" method="POST" action="{{route('login')}}" novalidate="novalidate">
                          {{csrf_field()}}
                              <div class="form-group">
                                  <label for="username" class="control-label">Username</label>
                                  <input type="text" class="form-control" id="username" name="username" value="" required="" title="Please enter you username" placeholder="example@gmail.com">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                                  <span class="help-block"></span>
                              </div>
                              <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                              <div class="checkbox">
                                  <label>
                                      <input type="checkbox" name="remember" id="remember"> Remember login
                                  </label>
                                  <p class="help-block">(if this is a private computer)</p>
                              </div>
                              <button type="submit" class="btn btn-success btn-block">Login</button>
                              <a href="/forgot/" class="btn btn-default btn-block">Help to login</a>
                          </form>
                      </div>
                  </div>
                  
              </div>
          </div>
      </div>
  </div>-->

@endsection

@section('scripts')
  <script>
    var app = new Vue({
      el: '#app'
    });
  </script>
@endsection
