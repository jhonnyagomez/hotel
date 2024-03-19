@extends('layouts.applogin')

@section('tittle','Login')

@section('content')

<div class="login-box" >
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center" style="background-color: #92C7CF;">
      <a href="{{ url('/home') }}" class="h1">
        <img src="{{asset('backend/dist/img/prueba2.png')}}" style="width: 144px; height: 81px;">
      </a>
    </div>
    <div class="card-body" style="background-color: #FBF9F1;">
      <p class="login-box-msg">Sign in to start your session</p>

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

        <div style="display:contents; align-items:center; justify-content:center" >
          <div class="row">
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-light btn-block" style="background-color: #AAD7D9;">Sign In</button>
            </div>

            <div class="col-4">
              <a href="{{route('register')}}" class="btn btn-dark btn-block" style="background-color: #AAD7D9;">Register</a>
            </div>
            <!-- /.col -->
          </div>
        </div>

        
      </form>
      <br>
        <div class="row">
            <div class="col-12">
            <p class="mb-1">
                @if (Route::has('password.request'))
                <a href="{{route('password.request')}}">I forgot my password</a>
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
