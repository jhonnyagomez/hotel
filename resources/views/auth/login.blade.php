@extends('layouts.applogin')

@section('tittle','Login')

@section('content')

<div class="login-box text-center">
  <!-- /.login-logo -->
  <div class="card card-outline text-center">
    <div class="card-header text-center" style="background-color: #FBF9F1;">
      <a href="{{ url('/home') }}" class="h1">
        <img src="{{asset('backend/dist/img/prueba2.png')}}" style="width: 60%; height: auto;">
      </a>
    </div>
    <div class="card-body" style="background-color: #FBF9F1;">
      <p class="login-box-msg" style="font-weight: bold;">Sign in to start your session</p>

      <form method="POST" action="{{route('login')}}">
        @csrf
        <div class="input-group mb-3">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="usuario@example.com">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="********">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <br>

        <div class="text-center">
          <div class="row text-center">
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-light btn-block" style="background-color: #92C7CF; color:white">Sign In</button>
            </div>

            <div class="col-4">
              <a href="{{route('register')}}" class="btn btn-light btn-block" style="background-color: #92C7CF; color:white">Register</a>
            </div>
            <!-- /.col -->
          </div>
        </div>

        
      </form>
      <br>
        <div class="row; text-center">
            <div class="col-12">
            <p class="mb-1">
                @if (Route::has('password.request'))
                <a href="{{route('password.request')}}" style="color: black;">I forgot my password</a>
                @endif
            </p>
            </div>
        </div>
      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

@endsection
