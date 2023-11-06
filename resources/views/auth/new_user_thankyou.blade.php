@extends('auth.layouts.app')
@section('content')

<div class="container-fluid ps-md-0">
  <div class="row g-0">
    <div class="d-none d-md-flex col-md-6 col-lg-6 bg-image">
        <div class="video-container w-100">
        <video autoplay loop muted class="w-100 h-100" style="object-fit:cover">
     <source src="{{ asset('assets/video/login1.mp4') }}" type="video/mp4">
            </video>
        </div>
    </div>
    <div class="col-md-6 col-lg-6">
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
              <h3 class="login-heading mb-4"></h3>

              <!-- Sign In Form -->
              <h3 class="text-center" style="color: #f195ab;">Welcome to Lebar.uk</h3>

              <div class="mt-5">
                <h5 style="color: #f195ab;">Thank you for joining Lebar.uk</h5>
                <h5 style="color: #f195ab;">Please allow up to 24 hours for Lebar.uk team</h5>
                <h5 style="color: #f195ab;">to review and approve your trade account.</h5>
              </div>

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
      $('#company_field').addClass('d-none');
      $('#vat_number_field').addClass('d-none');
      $('#refrences_field').addClass('d-none'); 
    }else{
      $('#company_field').removeClass('d-none');
      $('#vat_number_field').removeClass('d-none');
      $('#refrences_field').removeClass('d-none');
    }
  });
</script>
@endpush