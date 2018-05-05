@extends('layouts.app')

@section('content')

  <div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="title">Join The Community</h1>

          <form action="{{route('register')}}" method="POST" role="form">
            {{csrf_field()}}
            <div class="form-group">
              <label for="name" class="control-label">Name</label>
              <p class="control">
                <input class="form-control {{$errors->has('name') ? 'is-danger' : ''}}" type="text" name="name" id="name" value="{{old('name')}}" required>
              </p>
              @if ($errors->has('name'))
                <p class="help is-danger">{{$errors->first('name')}}</p>
              @endif
            </div>
            <div class="form-group">
              <label for="email" class="control-label">Email Address</label>
              <p class="control">
                <input class="form-control {{$errors->has('email') ? 'is-danger' : ''}}" type="text" name="email" id="email" value="{{old('email')}}" required>
              </p>
              @if ($errors->has('email'))
                <p class="help is-danger">{{$errors->first('email')}}</p>
              @endif
            </div>
            <div class="columns">
              <div class="column">
                <div class="form-group">
                  <label for="password" class="control-label">Password</label>
                  <p class="control">
                    <input class="form-control {{$errors->has('password') ? 'is-danger' : ''}}" type="password" name="password" id="password" required>
                  </p>
                  @if ($errors->has('password'))
                    <p class="help is-danger">{{$errors->first('password')}}</p>
                  @endif
                </div>
              </div>

              <div class="column">
                <div class="form-group">
                  <label for="password_confirmation" class="control-label">Confirm Password</label>
                  <p class="control">
                    <input class="form-control {{$errors->has('password_confirmation') ? 'is-danger' : ''}}" type="password" name="password_confirmation" id="password_confirmation" required>
                  </p>
                  @if ($errors->has('password_confirmation'))
                    <p class="help is-danger">{{$errors->first('password_confirmation')}}</p>
                  @endif
                </div>
              </div>
            </div>

            <button class="btn btn-success btn-block">Register</button>
          </form>
        </div> <!-- end of .card-content -->
      </div> <!-- end of .card -->
      <h5 class="has-text-centered m-t-20"><a href="{{route('login')}}" class="is-muted">Already have an Account?</a></h5>
    </div>
  </div>

@endsection
