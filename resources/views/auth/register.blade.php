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
              <h3 class="login-heading mb-4">Welcome</h3>

              <!-- Sign In Form -->
              <form method="POST" action="{{ route('register') }}" class="validate-form">
                @csrf
                <div class="form-floating mb-3 d-flex">
                  <div>
                    <input class="form-check-input" type="radio" name="user_type" id="trade" value="0" checked>
                    <label class="form-check-label" for="trade">Trade</label>  
                  </div>
                  <div style="margin-left: 1rem; ">
                    <input class="form-check-input" type="radio" name="user_type" id="call" value="1">
                    <label class="form-check-label" for="call">Retailer</label>
                  </div>
                  <span id="error_appointment" class="has-error"></span>
                </div>

                <div class="form-floating mb-3">
                  <input type="text" name="f_name" class="form-control" id="f_name" placeholder="name@example.com" value="{{ old('f_name') }}">
                  <label for="floatingInput required">First Name</label>
                  @if ($errors->has('f_name'))
                    <span class="is-invalid">The first name field is required.</span>
                @endif
                </div>
                
                <div class="form-floating mb-3">
                  <input type="text" name="l_name" class="form-control" id="l_name" placeholder="name@example.com" value="{{ old('l_name') }}">
                  <label for="floatingInput required">Last Name</label>
                  @if ($errors->has('l_name'))
                    <span class="is-invalid">The last name field is required.</span>
                @endif
                </div>

                <div class="form-floating mb-3">
                  <input type="text" name="email" class="form-control" id="email" placeholder="name@example.com" value="{{ old('email') }}">
                  <label for="floatingInput required">Email</label>
                  @if ($errors->has('email'))
                    <span class="is-invalid">The email field is required.</span>
                @endif
                </div>

                <div class="form-floating mb-3">
                  <input type="text" name="company" class="form-control" id="company" placeholder="name@example.com" value="{{ old('company') }}">
                  <label for="floatingInput required">Company</label>
                  @if ($errors->has('company'))
                    <span class="is-invalid">The company field is required.</span>
                @endif
                </div>

                <div class="form-floating mb-3">
                  <input type="text" name="address_field_1" class="form-control" id="address_field_1" placeholder="name@example.com" value="{{ old('address_field_1') }}">
                  <label for="floatingInput required">Address field 1</label>
                  @if ($errors->has('address_field_1'))
                    <span class="is-invalid">The Address field 1 is required.</span>
                @endif
                </div>

                <div class="form-floating mb-3">
                  <input type="text" name="address_field_2" class="form-control" id="address_field_2" placeholder="name@example.com" value="{{ old('address_field_2') }}">
                  <label for="floatingInput required">Address field 2</label>
                  @if ($errors->has('address_field_2'))
                    <span class="is-invalid">The Address field 2 is required.</span>
                @endif
                </div>

                <div class="form-floating mb-3">
                  <input type="text" name="city" class="form-control" id="city" placeholder="name@example.com" value="{{ old('city') }}">
                  <label for="floatingInput required">City</label>
                  @if ($errors->has('city'))
                    <span class="is-invalid">The city field is required.</span>
                @endif
                </div>

                <div class="form-floating mb-3">
                  <input type="text" name="country" class="form-control" id="country" placeholder="name@example.com" value="{{ old('country') }}">
                  <label for="floatingInput required">Country</label>
                  @if ($errors->has('country'))
                    <span class="is-invalid">The country field is required.</span>
                @endif
                </div>

                <div class="form-floating mb-3">
                  <input type="text" name="state_province_county" class="form-control" id="state_province_county" placeholder="name@example.com" value="{{ old('state_province_county') }}">
                  <label for="floatingInput required">State/Province/County</label>
                  @if ($errors->has('state_province_county'))
                    <span class="is-invalid">The state/province/county field is required.</span>
                @endif
                </div>

                <div class="form-floating mb-3">
                  <input type="text" name="postcode" class="form-control" id="postcode" placeholder="name@example.com" value="{{ old('postcode') }}">
                  <label for="floatingInput required">Postcode</label>
                  @if ($errors->has('postcode'))
                    <span class="is-invalid">The postcode field is required.</span>
                @endif
                </div>

                <div class="form-floating mb-3">
                  <input type="text" name="telephone" class="form-control" id="telephone" placeholder="name@example.com" value="{{ old('telephone') }}">
                  <label for="floatingInput required">Telephone</label>
                  @if ($errors->has('telephone'))
                    <span class="is-invalid">The telephone field is required.</span>
                @endif
                </div>

                <div class="form-floating mb-3">
                  <input type="text" name="mobile" class="form-control" id="mobile" placeholder="name@example.com" value="{{ old('mobile') }}">
                  <label for="floatingInput required">Mobile</label>
                  @if ($errors->has('mobile'))
                    <span class="is-invalid">The mobile field is required.</span>
                @endif
                </div>
                
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                  <label for="floatingPassword">Password</label>
                  @if ($errors->has('password'))
                    <span class="is-invalid">The password field is required.</span>
                @endif
                </div>

                <div class="form-floating mb-3">
                  <input type="confirm_password" class="form-control" name="password_confirmation" id="confirm_password" placeholder="Confirm Password">
                  <label for="floatingPassword">Confirm Password</label>
                  @if ($errors->has('confirm_password'))
                    <span class="is-invalid">The Confirm Password field is required.</span>
                @endif
                </div>

                <div class="form-floating mb-3">
                  <input type="vat_number" class="form-control" name="vat_number" id="vat_number" placeholder="VAT Number">
                  <label for="floatingPassword">VAT Number</label>
                  @if ($errors->has('vat_number'))
                    <span class="is-invalid">The VAT Number field is required.</span>
                @endif
                </div>

                <div class="form-floating mb-3">
                  <textarea type="text" class="form-control" name="refrences" id="refrences" placeholder="Refrences"></textarea>
                  <label for="floatingPassword">Refrences</label>
                  @if ($errors->has('refrences'))
                    <span class="is-invalid">The refrences field is required.</span>
                @endif
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
                    <a class="small" href="{{ route('login') }}">Log In</a>
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
@push('script')
<script type="text/javascript">
  $("body").on("change", "input[name='user_type']", function (e) {
    let user_type = $(this).val();
    if(user_type == 1)
    {
      $('#company').addClass('d-none');
      $('#vat_number').addClass('d-none');
      $('#refrences').addClass('d-none'); 
    }else{
      $('#company').removeClass('d-none');
      $('#vat_number').removeClass('d-none');
      $('#refrences').removeClass('d-none');
    }
  });
</script>
@endpush