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
              <h3 class="login-heading mb-4">Welcome back!</h3>

              <!-- Sign In Form -->
              <form method="POST" action="{{ route('user.auth.register') }}" class="validate-form">
                @csrf
                @if ($errors->has('email'))
                    <span class="is-invalid">{{ $errors->first('email') }}</span>
                @endif
                <div class="form-floating mb-3">
                  <input type="text" name="f_name" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{ old('f_name') }}">
                  <label for="floatingInput required">First Name</label>
                </div>

                <div class="form-floating mb-3">
                  <input type="text" name="l_name" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{ old('l_name') }}">
                  <label for="floatingInput required">Last Name</label>
                </div>

                <div class="form-floating mb-3">
                  <input type="text" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}">
                  <label for="floatingInput required">email</label>
                </div>

                <div class="form-floating mb-3">
                  <input type="text" name="address_field_1" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{ old('address_field_1') }}">
                  <label for="floatingInput required">Address field 1</label>
                </div>

                <div class="form-floating mb-3">
                  <input type="text" name="address_field_2" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{ old('address_field_1') }}">
                  <label for="floatingInput required">Address field 2</label>
                </div>

                <div class="form-floating mb-3">
                  <input type="text" name="city" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{ old('city') }}">
                  <label for="floatingInput required">City</label>
                </div>

                <div class="form-floating mb-3">
                  <input type="text" name="country" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{ old('country') }}">
                  <label for="floatingInput required">Country</label>
                </div>

                <div class="form-floating mb-3">
                  <input type="text" name="state_province_county" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{ old('state_province_county') }}">
                  <label for="floatingInput required">State/Province/County</label>
                </div>

                <div class="form-floating mb-3">
                  <input type="text" name="postcode" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{ old('postcode') }}">
                  <label for="floatingInput required">Postcode</label>
                </div>

                <div class="form-floating mb-3">
                  <input type="text" name="telephone" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{ old('telephone') }}">
                  <label for="floatingInput required">Telephone</label>
                </div>

                <div class="form-floating mb-3">
                  <input type="text" name="mobile" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{ old('mobile') }}">
                  <label for="floatingInput required">Mobile</label>
                </div>
                
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                  <label for="floatingPassword">Password</label>
                </div>

                <div class="form-floating mb-3">
                  <input type="confirm_password" class="form-control" name="confirm_password" id="floatingPassword" placeholder="Confirm Password">
                  <label for="floatingPassword">Confirm Password</label>
                </div>

                <div class="form-floating mb-3">
                  <input type="vat_number" class="form-control" name="vat_number" id="floatingPassword" placeholder="VAT Number">
                  <label for="floatingPassword">VAT Number</label>
                </div>

                <div class="form-floating mb-3">
                  <textarea type="refrences" class="form-control" name="refrences" id="floatingPassword" placeholder="Refrences"></textarea>
                  <label for="floatingPassword">Refrences</label>
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
                    <a class="small" href="{{ route('user.auth.login') }}">Log In</a> / <a class="small" href="#">Forgot password?</a>
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