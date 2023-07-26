<form id='create' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation"
      novalidate>
      <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
        <div class="form-group row">
            <input type="hidden" name="item_id" value="{{ $item->id }}">
            <div class="col-md-12">
                <strong><label for="staticEmail" class="col-form-label">Item Name :</label></strong>&nbsp;{{ $item->item_title }}
            </div>
            <div class="col-md-12">
                <strong><label for="staticEmail" class="col-form-label">Item Code :</label></strong>&nbsp;{{ $item->item_code }}
            </div>
        </div>
    <div class="form-row">
        <div id="status"></div>
        <br/>
        <div class="clearfix"></div>
        <div class="col-md-6">
            @if(!empty($itemStock))
            @foreach($itemStock as $stock)
                <div class="form-group row">
                    <div class="col-md-4">
                      <strong><label for="staticEmail" class="col-form-label">{{ $stock->size }} :</label></strong>
                    </div>
                    <div class="col-md-8">
                      <input type="number" name="stock[{{$stock->id}}]" class="form-control" id="stock" value="{{$stock->stock}}">
                    </div>
                </div>
            @endforeach
            @endif
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

        $('#create').validate({// <- attach '.validate()' to your form
            // Rules for form validation
            submitHandler: function (form) {

                var list_id = [];
                
                var myData = new FormData($("#create")[0]);
                var CSRF_TOKEN = $('input[name="csrf_token"]').val();
                myData.append('_token', CSRF_TOKEN);
                myData.append('roles', list_id);

                $.ajax({
                        url: 'stocks',
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