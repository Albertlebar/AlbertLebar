@extends('frontend.layouts.master')
@section('title', 'About Us')
@section('content')
<div class="shop-main-wrapper section-padding">
  <div class="container">
    <div class="section-bg-color">
      <div style="border: 1px solid #f195ab;" class="row">
        <div style="border-right: 1px solid #f195ab; padding: 0px;" class="col-3">
          <div  class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Profile</a>
            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Your Orders</a>
          </div>
        </div>
        <div class="col-9">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
              <form id='edit' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation"
              novalidate>
                <div class="row">
                  <input type="hidden" name="user_id" value="{{ $user->id }}">
                  <div class="col-6">
                    <div class="form-group col-md-12">
                      <label for="" style="color: #f195ab;"> First Name </label>
                      <input type="text" class="form-control" id="f_name" name="f_name" value="{{ $user->f_name }}" placeholder="" required>
                      <span id="error_f_name" class="has-error"></span>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="" style="color: #f195ab;" > Last Name </label>
                      <input type="text" class="form-control" id="l_name" name="l_name" value="{{ $user->l_name }}" placeholder="" required>
                      <span id="error_l_name" class="has-error"></span>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="" style="color: #f195ab;"> Email </label>
                      <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="" disabled>
                      <span id="error_email" class="has-error"></span>
                    </div>
                    @if($user->user_type == 0)
                    <div class="form-group col-md-12" id="company_div">
                      <label for="" style="color: #f195ab;"> Company </label>
                      <input type="text" class="form-control" id="company" name="company" value="{{ $user->company }}" placeholder="" required>
                      <span id="error_company" class="has-error"></span>
                    </div>
                    @endif
                    <div class="form-group col-md-12">
                      <label for="" style="color: #f195ab"> Address field 1 </label>
                      <input type="text" class="form-control" id="address_field_1" name="address_field_1" value="{{ $user->address_field_1 }}" placeholder="" required>
                      <span id="error_address_field_1" class="has-error"></span>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="" style="color: #f195ab"> Address field 2 </label>
                      <input type="text" class="form-control" id="address_field_2" name="address_field_2" value="{{ $user->address_field_2 }}" placeholder="" required>
                      <span id="error_address_field_2" class="has-error"></span>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="" style="color: #f195ab"> City </label>
                      <input type="text" class="form-control" id="city" name="city" value="{{ $user->city }}" placeholder="" required>
                      <span id="error_city" class="has-error"></span>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="" style="color: #f195ab;"> Country </label>
                      <input type="text" class="form-control" id="country" name="country" value="{{ $user->country }}" placeholder="" required>
                      <span id="error_country" class="has-error"></span>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group col-md-12">
                      <label for="" style="color: #f195ab"> State/Province/County </label>
                      <input type="text" class="form-control" id="state_province_county" name="state_province_county" value="{{ $user->state_province_county }}" placeholder="" required>
                      <span id="error_state_province_county" class="has-error"></span>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="" style="color: #f195ab"> Postcode </label>
                      <input type="text" class="form-control" id="postcode" name="postcode" value="{{ $user->postcode }}" placeholder="" required>
                      <span id="error_postcode" class="has-error"></span>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="" style="color: #f195ab"> Telephone </label>
                        <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $user->telephone }}" placeholder="">
                        <span id="error_telephone" class="has-error"></span>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="" style="color: #f195ab"> Mobile </label>
                        <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $user->mobile }}" placeholder="" required>
                        <span id="error_mobile" class="has-error"></span>
                    </div>
                    <div class="form-group col-md-12">
                        <label style="color: #f195ab">Password:</label>
                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control',)) !!}
                        <span id="error_password" class="has-error"></span>
                    </div>
                    <div class="form-group col-md-12">
                        <label style="color: #f195ab">Confirm Password:</label>
                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                        <span id="error_confirm-password" class="has-error"></span>
                    </div>
                    @if($user->user_type == 0)
                    <div class="form-group col-md-12" id="vat_number_div">
                        <label for="" style="color: #f195ab"> VAT Number </label>
                        <input type="text" class="form-control" id="vat_number" name="vat_number" value="{{ $user->vat_number }}" placeholder="" required>
                        <span id="error_vat_number" class="has-error"></span>
                    </div>
                    @endif
                    @if($user->user_type == 0)
                    <div class="form-group col-md-12" id="refrences_div">
                        <label for="" style="color: #f195ab"> Refrences </label>
                        <input type="text" class="form-control" id="refrences" name="refrences" value="{{ $user->refrences }}" placeholder="" required>
                        <span id="error_refrences" class="has-error"></span>
                    </div>
                    @endif
                  </div>
                </div>
                <div class="text-center mb-2">
                  <button type="submit" style="background: #f195ab !important; color: black !important;" class="btn btn-cart">Submit</button>
                </div>
              </form>
            </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('script')
<script type="text/javascript">
  $('#edit').validate({// <- attach '.validate()' to your form
            // Rules for form validation
            rules: {
                name: {
                    required: true
                }
            },
            // Messages for form validation
            messages: {
                name: {
                    required: 'Enter Role Name'
                }
            },
            submitHandler: function (form) {

                var list_id = [];
                $(".data-check:checked").each(function () {
                    list_id.push(this.value);
                });

                var myData = new FormData($("#edit")[0]);
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                myData.append('_token', CSRF_TOKEN);
                myData.append('roles', list_id);
                $.ajax({
                        url: '/save-user-details',
                        type: 'POST',
                        data: myData,
                        dataType: 'json',
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function (data) {

                            if (data.type === 'success') {
                                swal("Done!", "It was succesfully done!", "success");
                                reload_table();
                                notify_view(data.type, data.message);
                                $('#loader').hide();
                                $("#submit").prop('disabled', false); // disable button
                                $("html, body").animate({scrollTop: 0}, "slow");
                                $('#myModal').modal('hide'); // hide bootstrap modal

                            } else if (data.type === 'error') {
                                if (data.errors) {
                                    $.each(data.errors, function (key, val) {
                                        $('#error_' + key).html(val);
                                    });
                                }
                                $("#status").html(data.message);
                                $('#loader').hide();
                                $("#submit").prop('disabled', false); // disable button
                                swal("Error sending!", "Please try again", "error");

                            }

                        }
                    });

                // swal({
                //     title: "Confirm to assign " + list_id.length + " roles",
                //     text: "Assign Role",
                //     type: "warning",
                //     showCancelButton: true,
                //     closeOnConfirm: false,
                //     showLoaderOnConfirm: true,
                //     confirmButtonClass: "btn-danger",
                //     confirmButtonText: "Yes, Assign!"
                // }, function () {
                // });

            }
            // <- end 'submitHandler' callback
        });
</script>
@endpush