@extends('backend.layouts.master')
@section('title', ' Order Details')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="main-card card mb-3">
                <div class="card-body">
                    <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                      <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="link-tab-product-details" data-mdb-toggle="tab" href-div="tab-product-details" role="tab" aria-controls="ex1-tabs-1" aria-selected="true" >Ordder Details</a>
                      </li>
                    </ul>
                    <!-- Tabs content -->
                    <div class="tab-content" id="ex1-content">
                      <div class="tab-pane fade show active" id="tab-product-details" role="tabpanel" aria-labelledby="ex1-tab-1">
                        <div class="d-flex">
                            <div class="col-md-9 col-sm-12">
                                <div class="d-flex mt-1">
                                    <div class="col-md-3">
                                        <p><strong> Customer : </strong></p>
                                    </div>
                                    <div class="col-md-9">
                                       {!! Form::select('user_id', $users ?? [],  $userRoleId ?? '', ['class' => 'form-control select2','data-control'=>"select2", 'id'=>'customer']) !!}
                                    </div>
                                </div>
                                <div class="d-flex mt-1">
                                    <div class="col-md-3">
                                        <p><strong> Shipping First Name : </strong></p>
                                    </div>
                                    <div class="col-md-9">
                                       <input type="text" class="form-control" id="shipping_address_first_name" name="shipping_address_first_name" value="" placeholder="Shipping First Name" required>
                                            <span id="error_shipping_address_first_name" class="has-error"></span>
                                    </div>
                                </div>
                                <div class="d-flex mt-1">
                                    <div class="col-md-3">
                                        <p><strong> Shipping Last Name : </strong></p>
                                    </div>
                                    <div class="col-md-9">
                                       <input type="text" class="form-control" id="shipping_address_last_name" name="shipping_address_last_name" value="" placeholder="Shipping Last Name" required>
                                            <span id="error_shipping_address_last_name" class="has-error"></span>
                                    </div>
                                </div>
                                <div class="d-flex mt-1">
                                    <div class="col-md-3">
                                        <p><strong> Address 1 : </strong></p>
                                    </div>
                                    <div class="col-md-9">
                                       <input type="text" class="form-control" id="shipping_address_1" name="shipping_address_1" value="" placeholder="Address 1" required>
                                            <span id="error_shipping_address_1" class="has-error"></span>
                                    </div>
                                </div>
                                <div class="d-flex mt-1">
                                    <div class="col-md-3">
                                        <p><strong> Address 2 : </strong></p>
                                    </div>
                                    <div class="col-md-9">
                                       <input type="text" class="form-control" id="shipping_address_2" name="shipping_address_2" value="" placeholder="Address 2" required>
                                            <span id="error_shipping_address_2" class="has-error"></span>
                                    </div>
                                </div>
                                <div class="d-flex mt-1">
                                    <div class="col-md-3">
                                        <p><strong> City : </strong></p>
                                    </div>
                                    <div class="col-md-9">
                                       <input type="text" class="form-control" id="shipping_city" name="shipping_city" value="" placeholder="City" required>
                                            <span id="error_shipping_city" class="has-error"></span>
                                    </div>
                                </div>
                                <div class="d-flex mt-1">
                                    <div class="col-md-3">
                                        <p><strong> Postcode : </strong></p>
                                    </div>
                                    <div class="col-md-9">
                                       <input type="text" class="form-control" id="shipping_postcode" name="shipping_postcode" value="" placeholder="Postcode" required>
                                            <span id="error_shipping_postcode" class="has-error"></span>
                                    </div>
                                </div>
                                <div class="d-flex mt-1">
                                    <div class="col-md-3">
                                        <p><strong> Country : </strong></p>
                                    </div>
                                    <div class="col-md-9">
                                       <input type="text" class="form-control" id="shipping_country" name="shipping_country" value="" placeholder="Country" required>
                                            <span id="error_shipping_country" class="has-error"></span>
                                    </div>
                                </div>
                                <div class="d-flex mt-1">
                                    <div class="col-md-3">
                                        <p><strong> Contact : </strong></p>
                                    </div>
                                    <div class="col-md-9">
                                       <input type="number" class="form-control" id="shipping_contact" name="shipping_contact" value="" placeholder="Contact" required>
                                            <span id="error_shipping_contact" class="has-error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>             
                      </div>
                    </div>
                    <div>
                        <a href="javascript:void(0)" class="btn btn-info add_item" style="color: white;"><span class="fa fa-plus fa-fw"></span> Add Product</a>
                    </div>
                    <div class="table-responsive mt-3">
                        <table id="manage_all_item"
                               class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Product Title</th>
                                <th>Quantity</th>
                                <th>Size</th>
                                <th>Item Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                        </table>
                    </div>
                    <!-- Tabs content -->
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>

    function showImage(imgNumber) {
        const imageUploader = document.querySelector("#photo-"+imgNumber);
        const imagePreview = document.querySelector("#preview-"+imgNumber);
      let reader = new FileReader();
     reader.readAsDataURL(imageUploader.files[0]);
      reader.onload = function(e) {
        imagePreview.classList.add("show");
        imagePreview.src = e.target.result;
      };
    }

        let number_of_image = 1;
    $(document).ready(function () {

        $('.select2').select2({
          placeholder: 'Select an option'
        });

        $("body").on("change", "#customer", function(e){
            var customerId = $("#customer").val();
            // alert(customerId);
            $.ajax({
                type: 'GET',
                url: '/admin/user-details?user_id=' + customerId,
                success: function (data) {
                    $('#shipping_address_first_name').val(data.userData.f_name);
                    $('#shipping_address_last_name').val(data.userData.l_name);
                    $('#shipping_address_1').val(data.userData.address_field_1);
                    $('#shipping_address_2').val(data.userData.address_field_2);
                    $('#shipping_city').val(data.userData.city);
                    $('#shipping_postcode').val(data.userData.postcode);
                    $('#shipping_country').val(data.userData.country);
                    $('#shipping_contact').val(data.userData.mobile);
                },
                error: function (result) {
                    // $("#modal_data").html("Sorry Cannot Load Data");
                }
            });
        });

        $("body").on("click", ".add_item", function (e) {
            $("#modal_data").empty();
            $('.modal-title').text('Add Product'); // Set Title to Bootstrap modal title

            $.ajax({
                type: 'GET',
                url: '/admin/add-product',
                success: function (data) {
                    $("#modal_data").html(data.html);
                    $('#myModal').modal('show'); // show bootstrap modal
                },
                error: function (result) {
                    $("#modal_data").html("Sorry Cannot Load Data");
                }
            });
        });

        $("body").on("click",".select-product", function (e) {
            var allVals = [];
            $("input[name='someCheckbox[]']:checked").each(function() {
                allVals.push($(this).attr('value'));
            });
            var CSRF_TOKEN = $('input[name="csrf_token"]').val();
            $.ajax({
                type: 'POST',
                data: {ids:allVals,_token:CSRF_TOKEN},
                url: '/admin/get-item-details',
                success: function (data) {
                    $("#manage_all_item tbody").append(data.html);
                    $("#myModal").modal('hide');
                },
                error: function (result) {
                    $("#modal_data").html("Sorry Cannot Load Data");
                }
            });
            console.log(allVals);
        });

        $('#create').validate({// <- attach '.validate()' to your form
            // Rules for form validation
            rules: {
                category_id: {
                    required: true
                },
                item_title : {
                    required: true
                },
                item_code: {
                    required: true
                },
                item_description: {
                    required: true
                },
                supplier_name: {
                    required: true
                },
                supplier_code: {
                    required: true
                },
                gold_price: {
                    required: true
                },
                stone_price: {
                    required: true
                },
                labour_cost: {
                    required: true
                },
                duty_and_extra: {
                    required: true
                },
                total_cost: {
                    required: true
                },
                profit_trade: {
                    required: true
                },
                profit_retail: {
                    required: true
                },
                total_trade: {
                    required: true
                },
                total_retail: {
                    required: true
                },
            },
            // Messages for form validation
            
            submitHandler: function (form) {

                var list_id = [];
                
                var myData = new FormData($("#create")[0]);
                var CSRF_TOKEN = $('input[name="csrf_token"]').val();
                myData.append('_token', CSRF_TOKEN);
                myData.append('roles', list_id);

                $.ajax({
                        url: '{{ url("admin/catelogues") }}',
                        type: 'POST',
                        data: myData,
                        dataType: 'json',
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            if (data.type === 'success') {
                                swal("Done!", "It was succesfully done!", "success");
                                setTimeout(function () {
                                    window.location.href = data.returnURL;
                                }, 2000);
                                 // disable button
                                $("html, body").animate({scrollTop: 0}, "slow");

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
            }
            // <- end 'submitHandler' callback
        });                    // <- end '.validate()'

    });
</script>
@endpush