@extends('backend.layouts.master')
@section('title', ' Product Details')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="main-card card mb-3">
                <div class="card-body">
                    <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                      <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="link-tab-product-details" data-mdb-toggle="tab" href-div="tab-product-details" role="tab" aria-controls="ex1-tabs-1" aria-selected="true" >Product Details</a>
                      </li>
                    </ul>
                    <!-- Tabs content -->
                    <div class="tab-content" id="ex1-content">
                      <div class="tab-pane fade show active" id="tab-product-details" role="tabpanel" aria-labelledby="ex1-tab-1">
                        <form id='create' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation"
                        novalidate>
                            <div class="form-row">
                                <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                                <div id="status"></div>
                                <br/>
                                <div class="clearfix"></div>
                                <div class="col-md-4">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for=""> Category </label>
                                        {!! Form::select('category_id', $categories ?? [],  $userRoleId ?? '', ['class' => 'form-control','data-control'=>"select2", 'id'=>'role']) !!}
                                        <span id="error_email" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for=""> Item Title </label>
                                        <input type="text" class="form-control" id="item_title" name="item_title" value="" placeholder="" required>
                                        <span id="error_item_title" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for=""> Item Code </label>
                                        <input type="text" class="form-control" id="name" name="item_code" value="" placeholder="" required>
                                        <span id="error_item_code" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for=""> Item Description </label>
                                        <textarea type="text" class="form-control" id="item_code" name="item_description" value="" placeholder="" required></textarea>
                                        <span id="error_item_code" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for=""> Supplier Name </label>
                                        <input type="text" class="form-control" id="supplier_name" name="supplier_name" value="" placeholder="" required>
                                        <span id="error_supplier_name" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for=""> Supplier Code </label>
                                        <input type="text" class="form-control" id="supplier_code" name="supplier_code" value="" placeholder="" required>
                                        <span id="error_supplier_code" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for=""> Measurement </label>
                                        <input type="text" class="form-control" id="measurement" name="measurement" value="" placeholder="" required>
                                        <span id="error_measurement" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for=""> Metal Type </label>
                                        {!! Form::select('metal_type', config('params.metal_type') ?? [],  $userRoleId ?? '', ['class' => 'form-control','data-control'=>"select2", 'id'=>'role']) !!}
                                        <span id="error_metal_type" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for=""> Metal Colour </label>
                                        {!! Form::select('metal_colour', config('params.metal_colour') ?? [],  $userRoleId ?? '', ['class' => 'form-control','data-control'=>"select2", 'id'=>'role']) !!}
                                        <span id="error_metal_colour" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for="">Total Gold Weight </label>
                                        <input type="number" class="form-control" id="total_gold_weight" name="total_gold_weight" value="" placeholder="" required>
                                        <span id="error_total_gold_weight" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for="">Total CT Weight</label>
                                        <input type="number" class="form-control" id="total_ct_weight" name="total_ct_weight" value="" placeholder="" required>
                                        <span id="error_total_ct_weight" class="has-error"></span>
                                    </div>
                                </div>
                                <div class="col-md-4 verticle-line">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for=""> Gold Price </label>
                                        <input type="number" class="form-control" id="gold_price" name="gold_price" value="" placeholder="" required>
                                        <span id="error_gold_price" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for=""> Stone Price </label>
                                        <input type="number" class="form-control" id="stone_price" name="stone_price" value="" placeholder="" required>
                                        <span id="error_stone_price" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for=""> labour Cost </label>
                                        <input type="number" class="form-control" id="labour_cost" name="labour_cost" value="" placeholder="" required>
                                        <span id="error_labour_cost" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for=""> Duty and Extra </label>
                                        <input type="number" class="form-control" id="duty_and_extra" name="duty_and_extra" value="" placeholder="" required>
                                        <span id="error_duty_and_extra" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for=""> Total Cost </label>
                                        <input type="number" class="form-control" id="total_cost" name="total_cost" value="" placeholder="" required>
                                        <span id="error_total_cost" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for=""> Profit Trade % </label>
                                        <input type="number" class="form-control" id="profit_trade" name="profit_trade" value="" placeholder="" required>
                                        <span id="error_profit_trade" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for=""> Profit Retail % </label>
                                        <input type="number" class="form-control" id="profit_retail" name="profit_retail" value="" placeholder="" required>
                                        <span id="error_profit_retail" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for=""> Total Trade &pound;</label>
                                        <input type="number" class="form-control" id="total_trade" name="total_trade" value="" placeholder="" required>
                                        <span id="error_profit_trade" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for=""> Total Retail &pound;</label>
                                        <input type="number" class="form-control" id="total_retail" name="total_retail" value="" placeholder="" required>
                                        <span id="error_profit_retail" class="has-error"></span>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for=""> Status </label><br/>
                                        <input type="radio" name="is_active" class="flat-green"
                                               value="1"/> Active
                                        <input type="radio" name="is_active" class="flat-green"
                                               value="0"/> In Active
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for=""> Best Seller </label><br/>
                                        <input type="radio" name="best_seller" class="flat-green"
                                               value="1"/> Yes
                                        <input type="radio" name="best_seller" class="flat-green"
                                               value="0"/> No
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for=""> Is Sale ? </label><br/>
                                        <input type="radio" name="is_sale" class="flat-green"
                                               value="1"/> Yes
                                        <input type="radio" name="is_sale" class="flat-green"
                                               value="0"/> No
                                    </div>
                                </div>
                                <div class="col-md-4 verticle-line">
                                    <div id="append_image">
                                        <div class="">
                                            <!-- <div class="col-md-2">
                                                <input type="radio" name="is_main_image" class="form-control-sm" value="0">
                                            </div> -->
                                            <div style="text-align: center;">
                                                <img id="preview-0" src="" alt="" style="width: 105px; height: 100px;">
                                            </div>
                                            <div class="mt-1" style="margin: auto;width: 35%;">
                                                <input id="photo-0" type="file" accept="image/*" class="form-control" name="photo_0" onchange="showImage(0)">
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <!-- <div class="col-md-2">
                                                <input type="radio" name="is_main_image" class="form-control-sm" value="0">
                                            </div> -->
                                            <div class="col-md-4 p-0 pl-2">
                                                <div style="">
                                                    <img id="preview-1" src="" alt="" style="width: 105px; height: 100px;">
                                                </div>
                                                <div class="mt-1" style="margin: auto;width: 102px;">
                                                    <input id="photo-1" type="file" accept="image/*" class="form-control" name="photo_1" onchange="showImage(1)">
                                                </div>
                                            </div>
                                            <div class="col-md-4 p-0 pl-1">
                                                <div style="text-align: center;">
                                                    <img id="preview-2" src="" alt="" style="width: 105px; height: 100px;">
                                                </div>
                                                <div class="mt-1" style="margin: auto;width: 102px;">
                                                    <input id="photo-2" type="file" accept="image/*" class="form-control" name="photo_2" onchange="showImage(2)">
                                                </div>
                                            </div>
                                            <div class="col-md-4 p-0">
                                                <div style="text-align: right;">
                                                    <img id="preview-3" src="" alt="" style="width: 105px; height: 100px;">
                                                </div>
                                                <div class="mt-1" style="margin: auto;width: 102px;">
                                                    <input id="photo-3" type="file" accept="image/*" class="form-control" name="photo_3" onchange="showImage(3)">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="mt-3">
                                        <button type="button" id="add_more" class="btn btn-info"
                                            data-loading-text="Loading..."></span>Add More
                                        </button>
                                    </div> -->
                                </div>
                                <div class="col-md-12 mb-3">
                                    <button type="submit" class="btn btn-success button-submit"
                                            data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
                                    </button>
                                </div>
                            </div>
                        </form>             
                      </div>
                    </div>
                    <!-- Tabs content -->
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
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

        $("body").on("click", "#add_more", function (e) {
            $("#append_image").append(
                '<div class="col-md-12 input-group"><div class="col-md-2"><input type="radio" name="is_main_image" class="form-control-sm" value="'+ number_of_image +'"></div><div class="col-md-6"><input id="photo-'+ number_of_image +'" type="file" accept="image/*" class="form-control" name="photo['+ number_of_image +']" onchange="showImage('+ number_of_image +')"></div><div class="col-md-4"><img id="preview-'+ number_of_image +'" src="" alt="" style="width: 100px; height: 100px;"></div></div>'
            );
            number_of_image++;
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

        $(document).on("focusout", "#gold_price, #stone_price, #labour_cost, #duty_and_extra, #profit_trade, #profit_retail", function(e) {
            e.preventDefault();
            var goldPrice = parseFloat($("#gold_price").val()) * parseFloat($("#total_gold_weight").val());
            var stonePrice = parseFloat($("#stone_price").val()) * parseFloat($("#total_ct_weight").val());
            var labourCost = parseFloat($("#labour_cost").val());
            var dutyAndExtra = parseFloat($("#duty_and_extra").val());

            
            var totalCost = (goldPrice != '' ? goldPrice : parseFloat(0))  + (stonePrice != '' ? stonePrice : parseFloat(0)) + (labourCost != '' ? labourCost : parseFloat(0))  + (dutyAndExtra != '' ? dutyAndExtra : parseFloat(0));

            // var totalCost = (parseFloat(goldPrice) != '' ? parseFloat(goldPrice) : parseFloat(0))  + (parseFloat(stonePrice) != '' ? parseFloat(stonePrice) : parseFloat(0)) + (parseFloat(labourPrice) != '' ? parseFloat(labourPrice) : parseFloat(0)) + (parseFloat(dutyAndExtra) != '' ? parseFloat(dutyAndExtra) : parseFloat(0));
            // alert(totalCost);


            $("#total_cost").val(totalCost.toFixed(4));
            var profitTrade = $("#profit_trade").val();
            var profitRetail = $("#profit_retail").val();

            var totalTrade = (totalCost * profitTrade ) / 100;
            var totalRetail = (totalCost * profitRetail ) / 100; 
            
            $("#total_trade").val((totalCost + totalTrade).toFixed(4));
            $("#total_retail").val((totalCost + totalRetail).toFixed(4));
             // alert(totalTrade);
        });

    });
</script>
@endpush