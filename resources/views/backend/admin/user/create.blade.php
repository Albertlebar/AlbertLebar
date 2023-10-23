<form id='create' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation"
      novalidate>
    <div class="form-row">
        <div id="status"></div>
        <br/>
        <div class="clearfix"></div>
        <div class="form-group col-md-6 col-sm-12">
            <input class="flat-green" type="radio" name="user_type" id="trade" value="0" checked>
            <label class="form-check-label" for="trade">Trade</label>
            <input class="flat-green" type="radio" name="user_type" id="call" value="1">
            <label class="form-check-label" for="call">Retailer</label>
        </div>
        <div class="form-group col-md-6 col-sm-12">
            <label for=""> First Name </label>
            <input type="text" class="form-control" id="f_name" name="f_name" value="" placeholder="" required>
            <span id="error_f_name" class="has-error"></span>
        </div>
        <div class="form-group col-md-6 col-sm-12">
            <label for=""> Last Name </label>
            <input type="text" class="form-control" id="l_name" name="l_name" value="" placeholder="" required>
            <span id="error_l_name" class="has-error"></span>
        </div>
        <div class="form-group col-md-6 col-sm-12">
            <label for=""> Email </label>
            <input type="text" class="form-control" id="email" name="email" value="" placeholder="" required>
            <span id="error_email" class="has-error"></span>
        </div>
        <div class="form-group col-md-6 col-sm-12" id="company_div">
            <label for=""> Company </label>
            <input type="text" class="form-control" id="company" name="company" value="" placeholder="" required>
            <span id="error_company" class="has-error"></span>
        </div>
        <div class="form-group col-md-6 col-sm-12">
            <label for=""> Address field 1 </label>
            <input type="text" class="form-control" id="address_field_1" name="address_field_1" value="" placeholder="" required>
            <span id="error_address_field_1" class="has-error"></span>
        </div>
        <div class="form-group col-md-6 col-sm-12">
            <label for=""> Address field 2 </label>
            <input type="text" class="form-control" id="address_field_2" name="address_field_2" value="" placeholder="" required>
            <span id="error_address_field_2" class="has-error"></span>
        </div>
        <div class="form-group col-md-6 col-sm-12">
            <label for=""> City </label>
            <input type="text" class="form-control" id="city" name="city" value="" placeholder="" required>
            <span id="error_city" class="has-error"></span>
        </div>
        <div class="form-group col-md-6 col-sm-12">
            <label for=""> Country </label>
            <input type="text" class="form-control" id="country" name="country" value="" placeholder="" required>
            <span id="error_country" class="has-error"></span>
        </div>
        <div class="form-group col-md-6 col-sm-12">
            <label for=""> State/Province/County  </label>
            <input type="text" class="form-control" id="state_province_county" name="state_province_county" value="" placeholder="" required>
            <span id="error_state_province_county" class="has-error"></span>
        </div>
        <div class="form-group col-md-6 col-sm-12">
            <label for=""> Postcode </label>
            <input type="text" class="form-control" id="postcode" name="postcode" value="" placeholder="" required>
            <span id="error_postcode" class="has-error"></span>
        </div>
        <div class="form-group col-md-6 col-sm-12">
            <label for=""> Telephone </label>
            <input type="text" class="form-control" id="telephone" name="telephone" value="" placeholder="" required>
            <span id="error_telephone" class="has-error"></span>
        </div>
        <div class="form-group col-md-6 col-sm-12">
            <label for=""> Mobile </label>
            <input type="text" class="form-control" id="mobile" name="mobile" value="" placeholder="" required>
            <span id="error_mobile" class="has-error"></span>
        </div>
        <div class="form-group col-md-6 col-sm-12">
            <label>Password:</label>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control','required')) !!}
            <span id="error_password" class="has-error"></span>
        </div>
        <div class="form-group col-md-6 col-sm-12">
            <label>Confirm Password:</label>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control','required')) !!}
            <span id="error_confirm-password" class="has-error"></span>
        </div>
        <div class="form-group col-md-6 col-sm-12" id="vat_number_div">
            <label for=""> VAT Number </label>
            <input type="text" class="form-control" id="vat_number" name="vat_number" value="" placeholder="" required>
            <span id="error_vat_number" class="has-error"></span>
        </div>
        <div class="form-group col-md-6 col-sm-12" id="refrences_div">
            <label for=""> Refrences </label>
            <input type="text" class="form-control" id="refrences" name="refrences" value="" placeholder="" required>
            <span id="error_refrences" class="has-error"></span>
        </div>
        <div class="form-group col-md-4">
            <label for=""> Status </label><br/>
            <input type="radio" name="status" class="flat-green"
                   value="1" checked> Active
            <input type="radio" name="status" class="flat-green"
                   value="0"/> In Active
        </div>
        <div class="form-group col-md-4 mt-2">
            <label for=""> Is Approved ? </label><br/>
            <input type="radio" name="is_approved" class="flat-green"
                   value="1" checked> Yes
            <input type="radio" name="is_approved" class="flat-green"
                   value="0" > No
        </div>
        <!-- <div class="col-md-12">
            <label for="photo">Logo (File must be jpg, jpeg, png)</label>
            <div class="input-group">
                <input id="photo" type="file" name="photo" style="display:none">
                <div class="input-group-prepend">
                    <a class="btn btn-secondary text-white" onclick="$('input[id=photo]').click();">Browse</a>
                </div>
                <input type="text" name="SelectedFileName" class="form-control" id="SelectedFileName"
                       value="" readonly>
            </div>
            <script type="text/javascript">
                $('input[id=photo]').change(function () {
                    $('#SelectedFileName').val($(this).val());
                });
            </script>
            <span id="error_photo" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-12 col-md-12 mb-3 mt-3">
            <strong>Assign Role: </strong>
            <div class='row mb-3 mt-3'>
                @foreach($roles as $role)
                    @if($role->guard_name != 'admin')
                        <div class="col-md-2 col-sm-12">
                            <input type="checkbox" name="all_role" class="data-check flat-green"
                                   value="{{$role->id}}"/> {{ $role->name }}
                        </div>
                    @endif
                @endforeach
            </div>
        </div> -->
        <div class="col-md-12 mb-3">
            <button type="submit" class="btn btn-success button-submit"
                    data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
            </button>
        </div>
    </div>
</form>

<script>

    $("body").on("change", "input[name='user_type']", function (e) {
        let user_type = $(this).val();
        if(user_type == 1)
        {
          $('#company_div').addClass('d-none');
          $('#vat_number_div').addClass('d-none');
          $('#refrences_div').addClass('d-none'); 
        }else{
          $('#company_div').removeClass('d-none');
          $('#vat_number_div').removeClass('d-none');
          $('#refrences_div').removeClass('d-none');
        }
      });

    $(document).ready(function () {
        $('input[type="checkbox"].flat-green').iCheck({
            checkboxClass: 'icheckbox_flat-green',
        });

        $('#create').validate({// <- attach '.validate()' to your form
            // Rules for form validation
            // rules: {
            //     name: {
            //         required: true
            //     }
            // },
            // // Messages for form validation
            // messages: {
            //     name: {
            //         required: 'Enter Role Name'
            //     }
            // },
            submitHandler: function (form) {

                var list_id = [];
                $(".data-check:checked").each(function () {
                    list_id.push(this.value);
                });

                var myData = new FormData($("#create")[0]);
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                myData.append('_token', CSRF_TOKEN);
                myData.append('roles', list_id);

                $.ajax({
                        url: 'users',
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