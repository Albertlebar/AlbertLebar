<form id='edit' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation"
      novalidate>
      {{method_field('PATCH')}}
    <div class="form-row">
        <div id="status"></div>
        <br/>
        <div class="clearfix"></div>
        <div class="col-md-6">
            <div class="form-group col-md-12 col-sm-12">
                <label for=""> Category </label>
                {!! Form::select('category_id', $categories ?? [],  $item->category_id ?? '', ['class' => 'form-control','data-control'=>"select2", 'id'=>'role']) !!}
                <span id="error_email" class="has-error"></span>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for=""> Item Title </label>
                <input type="text" class="form-control" id="item_title" name="item_title" value="{{ $item->item_title }}" placeholder="" required>
                <span id="error_item_title" class="has-error"></span>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for=""> Item Code </label>
                <input type="text" class="form-control" id="name" name="item_code" value="{{ $item->item_code }}" placeholder="" required>
                <span id="error_item_code" class="has-error"></span>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for=""> Item Description </label>
                <textarea type="text" class="form-control" id="item_code" name="item_description" value="" placeholder="" required>{{ $item->item_description }}</textarea>
                <span id="error_item_code" class="has-error"></span>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for=""> Supplier Name </label>
                <input type="text" class="form-control" id="supplier_name" name="supplier_name" value="{{ $item->supplier_name }}" placeholder="" required>
                <span id="error_supplier_name" class="has-error"></span>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for=""> Supplier Code </label>
                <input type="text" class="form-control" id="supplier_code" name="supplier_code" value="{{ $item->supplier_code }}" placeholder="" required>
                <span id="error_supplier_code" class="has-error"></span>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for=""> Metal Type </label>
                {!! Form::select('metal_type', config('params.metal_type') ?? [],  $item->metal_type ?? '', ['class' => 'form-control','data-control'=>"select2", 'id'=>'role']) !!}
                <span id="error_metal_type" class="has-error"></span>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for=""> Metal Colour </label>
                {!! Form::select('metal_colour', config('params.metal_colour') ?? [],  $item->metal_colour ?? '', ['class' => 'form-control','data-control'=>"select2", 'id'=>'role']) !!}
                <span id="error_metal_colour" class="has-error"></span>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for="">Total Gold Weight </label>
                <input type="number" class="form-control" id="total_gold_weight" name="total_gold_weight" value="{{ $item->total_gold_weight }}" placeholder="" required>
                <span id="error_total_gold_weight" class="has-error"></span>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for="">Total CT Weight</label>
                <input type="number" class="form-control" id="total_ct_weight" name="total_ct_weight" value="{{ $item->total_ct_weight }}" placeholder="" required>
                <span id="error_total_ct_weight" class="has-error"></span>
            </div>
        </div>
        <div class="col-md-6 verticle-line">
            <div class="form-group col-md-12 col-sm-12">
                <label for=""> Gold Price </label>
                <input type="number" class="form-control" id="gold_price" name="gold_price" value="{{ $item->gold_price }}" placeholder="" required>
                <span id="error_gold_price" class="has-error"></span>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for=""> Stone Price </label>
                <input type="number" class="form-control" id="stone_price" name="stone_price" value="{{ $item->stone_price }}" placeholder="" required>
                <span id="error_stone_price" class="has-error"></span>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for=""> labour Cost </label>
                <input type="number" class="form-control" id="labour_cost" name="labour_cost" value="{{ $item->labour_cost }}" placeholder="" required>
                <span id="error_labour_cost" class="has-error"></span>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for=""> Duty and Extra </label>
                <input type="number" class="form-control" id="duty_and_extra" name="duty_and_extra" value="{{ $item->duty_and_extra }}" placeholder="" required>
                <span id="error_duty_and_extra" class="has-error"></span>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for=""> Total Cost </label>
                <input type="number" class="form-control" id="total_cost" name="total_cost" value="{{ $item->total_cost }}" placeholder="" required>
                <span id="error_total_cost" class="has-error"></span>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for=""> Profit Trade % </label>
                <input type="number" class="form-control" id="profit_trade" name="profit_trade" value="{{ $item->profit_trade }}" placeholder="" required>
                <span id="error_profit_trade" class="has-error"></span>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for=""> Profit Retail % </label>
                <input type="number" class="form-control" id="profit_retail" name="profit_retail" value="{{ $item->profit_retail }}" placeholder="" required>
                <span id="error_profit_retail" class="has-error"></span>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for=""> Total Trade &pound;</label>
                <input type="number" class="form-control" id="total_trade" name="total_trade" value="{{ $item->total_trade }}" placeholder="" required>
                <span id="error_profit_trade" class="has-error"></span>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for=""> Total Retail &pound;</label>
                <input type="number" class="form-control" id="total_retail" name="total_retail" value="{{ $item->total_retail }}" placeholder="" required>
                <span id="error_profit_retail" class="has-error"></span>
            </div>
        </div>
        
        <div class="col-md-12 mb-3">
            <button type="submit" class="btn btn-success button-submit"
                    data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
            </button>
        </div>
    </div>
</form>

<script>

    $(document).ready(function () {
        $('input[type="checkbox"].flat-green').iCheck({
            checkboxClass: 'icheckbox_flat-green',
        });

        $('#edit').validate({// <- attach '.validate()' to your form
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
                
                var myData = new FormData($("#edit")[0]);
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                myData.append('_token', CSRF_TOKEN);
                myData.append('roles', list_id);

                $.ajax({
                        url: 'catelogues/' + '{{ $item->id }}',
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
            }
            // <- end 'submitHandler' callback
        });                    // <- end '.validate()'

        $(document).on("focusout", "#gold_price, #stone_price, #labour_cost, #duty_and_extra, #profit_trade, #profit_retail", function(e) {
            e.preventDefault();
            var goldPrice = parseFloat($("#gold_price").val());
            var stonePrice = parseFloat($("#stone_price").val());
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