@extends('auth.layouts.app')
@section('content')

<div class="container-fluid ps-md-0">
  <div class="row g-0">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image">
        <div class="video-container">
            <video autoplay loop muted>
                <source src="{{ asset('assets/video/login1.mp4') }}" type="video/mp4">
            </video>
        </div>
    </div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <div class="col-md-12 text-center mb-2">
                <div class="logo">
                    <a href="{{ URL :: to('/') }}">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Albert" style="max-width: 30%;">
                    </a>
                </div>
              </div>
              <h3 class="login-heading mb-4">Welcome back!</h3>

              <!-- Sign In Form -->
              <form method="POST" action="{{ route('login') }}" class="validate-form">
                @csrf
                @if ($errors->has('email'))
                    <span class="is-invalid">{{ $errors->first('email') }}</span>
                @endif
                <div class="form-floating mb-3">
                  <input type="text" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}">
                  <label for="floatingInput">Email address</label>
                </div>
                
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                  <label for="floatingPassword">Password</label>
                </div>

                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                  <label class="form-check-label" for="rememberPasswordCheck">
                    Remember password
                  </label>
                </div>

                <div class="d-grid">
                  <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Sign in</button>
                  <div class="text-center">
                    <a class="small" href="{{ route('register') }}">Registration</a> | 
                    <a class="small" href="route('password.request')">Forgot password?</a>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    <style>
        .is-invalid {
            color: red;
        }
    </style>
@endsection
