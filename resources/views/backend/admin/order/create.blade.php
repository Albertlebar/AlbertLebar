@extends('backend.layouts.master')
@section('title', ' Order Details')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="main-card card mb-3">
                <div class="card-body">
                    <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                      <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="link-tab-product-details" data-mdb-toggle="tab" href-div="tab-product-details" role="tab" aria-controls="ex1-tabs-1" aria-selected="true" >Order Details</a>
                      </li>
                    </ul>
                    <!-- Tabs content -->
                    <form id='create' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation"
                        novalidate>
                    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                    <div class="tab-content" id="ex1-content">
                      <div class="tab-pane fade show active" id="tab-product-details" role="tabpanel" aria-labelledby="ex1-tab-1">
                        <div class="d-flex">
                            <div class="col-md-6 col-sm-12">
                                <div class="d-flex mt-1">
                                    <div class="col-md-3">
                                        <p><strong> Customer : </strong></p>
                                    </div>
                                    <div class="col-md-9">
                                       {!! Form::select('user_id', $users ?? [],  $userRoleId ?? '', ['class' => 'form-control select2','data-control'=>"select2", 'id'=>'customer']) !!}
                                    </div>
                                </div>
                                <div class="d-flex mt-1">
                                    <input type="hidden" name="user_type" value="" id="user_type">
                                    <div class="col-md-3">
                                        <p><strong> Shipping First Name : </strong></p>
                                    </div>
                                    <div class="col-md-9">
                                       <p id="shipping_address_first_name"></p>
                                    </div>
                                </div>
                                <div class="d-flex mt-1">
                                    <div class="col-md-3">
                                        <p><strong> Shipping Last Name : </strong></p>
                                    </div>
                                    <div class="col-md-9">
                                       <p id="shipping_address_last_name"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12" style="border-left: 1px solid #f195ab;">
                                <div class="d-flex mt-1">
                                    <div class="col-md-3">
                                        <p><strong> Address 1 : </strong></p>
                                    </div>
                                    <div class="col-md-9">
                                        <p  id="shipping_address_1"></p>
                                    </div>
                                </div>
                                <div class="d-flex mt-1">
                                    <div class="col-md-3">
                                        <p><strong> Address 2 : </strong></p>
                                    </div>
                                    <div class="col-md-9">
                                        <p id="shipping_address_2"></p>
                                    </div>
                                </div>
                                <div class="d-flex mt-1">
                                    <div class="col-md-3">
                                        <p><strong> City : </strong></p>
                                    </div>
                                    <div class="col-md-9">
                                        <p  id="shipping_city"></p>
                                    </div>
                                </div>
                                <div class="d-flex mt-1">
                                    <div class="col-md-3">
                                        <p><strong> Postcode : </strong></p>
                                    </div>
                                    <div class="col-md-9">
                                        <p id="shipping_postcode"></p>
                                    </div>
                                </div>
                                <div class="d-flex mt-1">
                                    <div class="col-md-3">
                                        <p><strong> Country : </strong></p>
                                    </div>
                                    <div class="col-md-9">
                                        <p id="shipping_country"></p>
                                    </div>
                                </div>
                                <div class="d-flex mt-1">
                                    <div class="col-md-3">
                                        <p><strong> Contact : </strong></p>
                                    </div>
                                    <div class="col-md-9">
                                        <p id="shipping_contact"></p>
                                    </div>
                                </div>
                            </div>
                        </div>             
                      </div>
                    </div>
                    <!-- <div>
                        <a href="javascript:void(0)" class="btn btn-info add_item" style="color: white;"><span class="fa fa-plus fa-fw"></span> Add Product</a>
                    </div> -->
                    <hr style="border: 1px solid #f195ab;">
                    <div class="col-md-6">
                        <div class="d-flex mt-1">
                            <div class="col-md-3">
                                <p><strong> Select Product : </strong></p>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select-product" id="select-item"></select>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive mt-3">
                        <table id="manage_all_item"
                               class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Item Code</th>
                                <th>Image</th>
                                <th>Product Title</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Item Total</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="product-item">
                            
                            </tbody>
                            <tr style="background: #f195ab;">
                                <td colspan="6" class="text-right"><strong>Sub Total</strong></td>
                                <td>
                                    <input type="hidden" name="i_sub_total" value="" id="i_sub_total">
                                    <strong><p id="p_sub_total">&pound;0</p></strong>
                                </td>
                                <td></td>
                            </tr
>                            <tr style="background: #f195ab;">
                                <td colspan="6" class="text-right"><strong>Add VAT (20 %)</strong><input type="hidden" name="i_vat_total" id="i_vat_total"></td>
                                <td><input type="checkbox" class="add_vat" name="add_vat"></td>
                                <td></td>
                            </tr>
                            <tr style="background: #f195ab;">
                                <td colspan="6" class="text-right"><strong>Total</strong></td>
                                <td>
                                    <input type="hidden" name="i_total" value="" id="i_total">
                                    <strong><p id="p_total">&pound;0</p></strong>
                                </td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-12 mt-3" style="text-align: end;">
                        <button type="submit" class="btn btn-success button-submit"
                                data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
                        </button>
                    </div>
                    </form>
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

    function subTotal(){
        var subTotal = 0;
        $('#product-item .total_item_price').each(function () {
            subTotal = parseFloat(subTotal) + parseFloat($(this).val());
        });
        $('#i_sub_total').val(subTotal.toFixed(2));
        $('#p_sub_total').html('&pound;'+subTotal.toFixed(2))
        var subTotalPrice = $('#i_sub_total').val();
        var total = 0;
        if($('.add_vat').is(':checked')) {
            var VAT = parseFloat(subTotalPrice) * parseFloat(0.2);
            total = parseFloat(VAT) + parseFloat(subTotalPrice);
            $('#i_vat_total').val(VAT.toFixed(2));
        }else{
            total = parseFloat(subTotalPrice);
            $('#i_vat_total').val(0.00);
        }
        $('#i_total').val(total.toFixed(2));
        $('#p_total').html('&pound;'+total.toFixed(2));
    }

        let number_of_image = 1;
    $(document).ready(function () {

        $('#create').validate({// <- attach '.validate()' to your form
            // Rules for form validation
            
            // Messages for form validation
            
            submitHandler: function (form) {

                var list_id = [];
                
                var myData = new FormData($("#create")[0]);
                var CSRF_TOKEN = $('input[name="csrf_token"]').val();
                myData.append('_token', CSRF_TOKEN);
                myData.append('roles', list_id);

                $.ajax({
                        url: '{{ url("admin/orders") }}',
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
        }); 

        $(".add_vat").change(function() {
            var subTotalPrice = $('#i_sub_total').val();
            var Total = 0;
            if(this.checked) {
                var VAT = parseFloat(subTotalPrice) * parseFloat(0.2);
                Total = parseFloat(VAT) + parseFloat(subTotalPrice);
                $('#i_vat_total').val(VAT.toFixed(2));
            }else{
                Total = parseFloat(subTotalPrice);
                $('#i_vat_total').val(0.00);
            }
            $('#i_total').val(Total.toFixed(2));
            $('#p_total').html('&pound;'+Total.toFixed(2))

        });
        $('.select2').select2({
          placeholder: 'Select an option'
        });

        $('#select-item').select2({
          ajax: {
            minimumInputLength: 2,
            url: '/admin/get-item',
            dataType: 'json',
            type: "GET",
            data: function (term) {
            return {
                term: term
                };
            },
            processResults: function (data) {
                var arr = []
                    $.each(data.data, function (index, value) {
                        arr.push({
                            id: value.id,
                            text: value.item_title
                        })
                    })
                return {
                    results: arr
                };
            }
            // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
          }
        });
        $("body").on("change", "#customer", function(e){
            var customerId = $("#customer").val();
            // alert(customerId);
            $.ajax({
                type: 'GET',
                url: '/admin/user-details?user_id=' + customerId,
                success: function (data) {
                    $('#shipping_address_first_name').html(data.userData.f_name);
                    $('#shipping_address_last_name').html(data.userData.l_name);
                    $('#shipping_address_1').html(data.userData.address_field_1);
                    $('#shipping_address_2').html(data.userData.address_field_2);
                    $('#shipping_city').html(data.userData.city);
                    $('#shipping_postcode').html(data.userData.postcode);
                    $('#shipping_country').html(data.userData.country);
                    $('#shipping_contact').html(data.userData.mobile);
                    $('#user_type').val(data.userData.user_type);
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

        $("body").on("click", ".delete-item", function (e) {
            var id = $(this).attr('data-id');
            $("#item_"+id).remove();
            subTotal();
        });

        $(document).on("focusout", ".qty", function(e) {
            e.preventDefault();
            var idAttr = $(this).attr('id');
            var idArr =  idAttr.split('_');
            var qty = $('#qty_'+idArr[1]).val();
            var price = $('#item_price_'+idArr[1]).val();

            var itemTotal = parseFloat(qty) * parseFloat(price);
            $('#item_total_' + idArr[1]).html("&pound;"+itemTotal);
            $('#total_item_price_'+idArr[1]).val(itemTotal);
            subTotal();
        });


        $("body").on("change","#select-item", function (e) {
            var allVals = [];
            var id = $("#select-item :selected").val();
            var user_type = $("#user_type").val();
            // var CSRF_TOKEN = $('input[name="csrf_token"]').val();
            $.ajax({
                type: 'GET',
                url: '/admin/get-item-details/'+id+'/'+user_type,
                success: function (data) {
                    $("#manage_all_item #product-item").append(data.html);
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