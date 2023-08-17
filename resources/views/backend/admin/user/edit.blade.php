@extends('backend.layouts.master')
@section('title', ' User Details')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="main-card card mb-3">
                <div class="card-body">
                    <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                    <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                      <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="link-tab-user-details" data-mdb-toggle="tab" href-div="tab-user-details" role="tab" aria-controls="ex1-tabs-1" aria-selected="true" >User Details</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" id="link-tab-invoice" data-mdb-toggle="tab" href-div="tab-invoice" role="tab" aria-controls="ex1-tabs-2" aria-selected="false">Invoice</a>
                      </li>
                    </ul>

                    <div class="tab-content" id="ex1-content">
                        <div class="tab-pane fade show active" id="tab-user-details" role="tabpanel" aria-labelledby="ex1-tab-1">
                            <form id='edit' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation"
                                novalidate>
                                {{method_field('PUT')}}
                                <div class="form-row">
                                    <div id="status"></div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <input class="flat-green" type="radio" name="user_type" id="trade" value="0" {{ ( $user->user_type == 0 ) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="trade">Trade</label>
                                        <input class="flat-green" type="radio" name="user_type" id="call" value="1" {{ ( $user->user_type == 1 ) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="call">Retailer</label>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for=""> First Name </label>
                                        <input type="text" class="form-control" id="f_name" name="f_name" value="{{ $user->f_name }}" placeholder="" required>
                                        <span id="error_f_name" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for=""> Last Name </label>
                                        <input type="text" class="form-control" id="l_name" name="l_name" value="{{ $user->l_name }}" placeholder="" required>
                                        <span id="error_l_name" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for=""> Email </label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="" required>
                                        <span id="error_email" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12" id="company_div">
                                        <label for=""> Company </label>
                                        <input type="text" class="form-control" id="company" name="company" value="{{ $user->company }}" placeholder="">
                                        <span id="error_company" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for=""> Address field 1 </label>
                                        <input type="text" class="form-control" id="address_field_1" name="address_field_1" value="{{ $user->address_field_1 }}" placeholder="" required>
                                        <span id="error_address_field_1" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for=""> Address field 2 </label>
                                        <input type="text" class="form-control" id="address_field_2" name="address_field_2" value="{{ $user->address_field_2 }}" placeholder="">
                                        <span id="error_address_field_2" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for=""> City </label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{ $user->city }}" placeholder="" required>
                                        <span id="error_city" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for=""> Country </label>
                                        <input type="text" class="form-control" id="country" name="country" value="{{ $user->country }}" placeholder="" required>
                                        <span id="error_country" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for=""> State/Province/County </label>
                                        <input type="text" class="form-control" id="state_province_county" name="state_province_county" value="{{ $user->state_province_county }}" placeholder="">
                                        <span id="error_state_province_county" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for=""> Postcode </label>
                                        <input type="text" class="form-control" id="postcode" name="postcode" value="{{ $user->postcode }}" placeholder="" required>
                                        <span id="error_postcode" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for=""> Telephone </label>
                                        <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $user->telephone }}" placeholder="">
                                        <span id="error_telephone" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for=""> Mobile </label>
                                        <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $user->mobile }}" placeholder="" required>
                                        <span id="error_mobile" class="has-error"></span>
                                    </div>
                                    <!-- <div class="form-group col-md-6 col-sm-12">
                                        <label>Password:</label>
                                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                                        <span id="error_password" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label>Confirm Password:</label>
                                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control','required')) !!}
                                        <span id="error_confirm-password" class="has-error"></span>
                                    </div> -->
                                    <div class="form-group col-md-6 col-sm-12" id="vat_number_div">
                                        <label for=""> VAT Number </label>
                                        <input type="text" class="form-control" id="vat_number" name="vat_number" value="{{ $user->vat_number }}" placeholder="">
                                        <span id="error_vat_number" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12" id="refrences_div">
                                        <label for=""> Refrences </label>
                                        <input type="text" class="form-control" id="refrences" name="refrences" value="{{ $user->refrences }}" placeholder="">
                                        <span id="error_refrences" class="has-error"></span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <!-- <div class="col-md-8">
                                        <label for="photo">Logo (File must be jpg, jpeg, png)</label>
                                        <div class="input-group">
                                            <input id="photo" type="file" name="photo" style="display:none">
                                            <div class="input-group-prepend">
                                                <a class="btn btn-secondary text-white" onclick="$('input[id=photo]').click();">Browse</a>
                                            </div>
                                            <input type="text" name="SelectedFileName" class="form-control" id="SelectedFileName"
                                                   value="{{$user->file_path}}" readonly>
                                        </div>
                                        <script type="text/javascript">
                                            $('input[id=photo]').change(function () {
                                                $('#SelectedFileName').val($(this).val());
                                            });
                                        </script>
                                        <span id="error_photo" class="has-error"></span>
                                    </div> -->
                                    <div class="form-group col-md-4">
                                        <label for=""> Status </label><br/>
                                        <input type="radio" name="status" class="flat-green"
                                               value="1" {{ ( $user->status == 1 ) ? 'checked' : '' }} /> Active
                                        <input type="radio" name="status" class="flat-green"
                                               value="0" {{ ( $user->status == 0 ) ? 'checked' : '' }}/> In Active
                                    </div>
                                    <div class="clearfix"></div>
                                    <!-- <div class="col-sm-12 col-md-12 mb-3 mt-3">
                                        <strong>Assign Role: </strong>
                                        <div class='row mb-3 mt-3'>
                                            @foreach($roles as $role)
                                                @if($role->guard_name != 'admin')
                                                    <div class="col-md-2 col-sm-12">
                                                        {{Form::checkbox('roles[]',  $role->id, $user->roles->contains($role->id), array('class'=>'data-check flat-green')) }}
                                                        {{Form::label($role->name, ucfirst($role->name), array('class'=>'')) }}
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div> -->
                                    <div class="form-group col-md-4 mt-2">
                                        <label for=""> Is Approved ? </label><br/>
                                        <input type="radio" name="is_approved" class="flat-green"
                                               value="1" {{ ( $user->is_approved == 1 ) ? 'checked' : '' }} /> Yes
                                        <input type="radio" name="is_approved" class="flat-green"
                                               value="0" {{ ( $user->is_approved == 0 ) ? 'checked' : '' }}/> No
                                    </div>
                                    <div class="col-md-12 mb-3 mt-3">
                                        <button type="submit" class="btn btn-success button-submit"
                                                data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="tab-invoice" role="tabpanel" aria-labelledby="ex1-tab-2">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script>

    $(document).ready(function () {
        $('input[type="checkbox"].flat-green').iCheck({
            checkboxClass: 'icheckbox_flat-green',
        });
        $('input[type="radio"].flat-green').iCheck({
            radioClass: 'iradio_flat-green'
        });

        $('body').on('click', '.nav-link', function(event) {
            id = $('#id').val();
            var htmlDivId = $(this).attr('href-div');
            var route = 'users';
            var refreashUrl = 'edit?tab='+htmlDivId;
            $.ajax({
                type: "GET",
                url: refreashUrl,
                datatype: 'html',
                success: function (data) {
                    if($('#'+htmlDivId).length > 0)
                    {
                        $('.tab-pane').removeClass("show active");
                        $('.nav-link').removeClass("active");
                        $('#link-'+ htmlDivId).addClass("active");
                        $('#'+htmlDivId).addClass("show active");
                        $('#'+htmlDivId).html(data.html);
                    }
                },
                error: function (result) {
                    $("#modal_data").html("Sorry Cannot Load Data");
                }
            });
        });

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
                        url: '{{ url("admin/users") }}'+'/'+'{{ $user->id }}',
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
        });                    // <- end '.validate()'

    });
</script>
@endpush