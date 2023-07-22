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
        @if(isset($item) && $item->category->title == 'Ring')
        <div class="col-md-6">
            <div class="form-group row">
                <div class="col-md-4">
                  <strong><label for="staticEmail" class="col-form-label">H :</label></strong>
                </div>
                <div class="col-md-8">
                  <input type="number" name="stock[H]" class="form-control" id="stock" value="{{ (isset($itemQty['H']) && $itemQty['H'] != 0) ? $itemQty['H'] : 0 }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                  <strong><label for="staticEmail" class="col-form-label">I :</label></strong>
                </div>
                <div class="col-md-8">
                  <input type="number" name="stock[I]" class="form-control" value="{{ (isset($itemQty['I']) && $itemQty['I'] != 0) ? $itemQty['I'] : 0 }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                  <strong><label for="staticEmail" class="col-form-label">J :</label></strong>
                </div>
                <div class="col-md-8">
                  <input type="number" name="stock[J]" class="form-control" value="{{ (isset($itemQty['J']) && $itemQty['J'] != 0) ? $itemQty['J'] : 0 }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                  <strong><label for="staticEmail" class="col-form-label">K :</label></strong>
                </div>
                <div class="col-md-8">
                  <input type="number" name="stock[K]" class="form-control" value="{{ (isset($itemQty['K']) && $itemQty['K'] != 0) ? $itemQty['K'] : 0 }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                  <strong><label for="staticEmail" class="col-form-label">L :</label></strong>
                </div>
                <div class="col-md-8">
                  <input type="number" name="stock[L]" class="form-control" value="{{ (isset($itemQty['L']) && $itemQty['L'] != 0) ? $itemQty['L'] : 0 }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                  <strong><label for="staticEmail" class="col-form-label">M :</label></strong>
                </div>
                <div class="col-md-8">
                  <input type="number" name="stock[M]" class="form-control" value="{{ (isset($itemQty['M']) && $itemQty['M'] != 0) ? $itemQty['M'] : 0 }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                  <strong><label for="staticEmail" class="col-form-label">N :</label></strong>
                </div>
                <div class="col-md-8">
                  <input type="number" name="stock[N]" class="form-control" value="{{ (isset($itemQty['N']) && $itemQty['N'] != 0) ? $itemQty['N'] : 0 }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                  <strong><label for="staticEmail" class="col-form-label">O :</label></strong>
                </div>
                <div class="col-md-8">
                  <input type="number" name="stock[O]" class="form-control" value="{{ (isset($itemQty['O']) && $itemQty['O'] != 0) ? $itemQty['O'] : 0 }}">
                </div>
            </div>
        </div>
        <div class="col-md-6 verticle-line">
            <div class="form-group row">
                <div class="col-md-4">
                  <strong><label for="staticEmail" class="col-form-label">P :</label></strong>
                </div>
                <div class="col-md-8">
                  <input type="number" name="stock[P]" class="form-control" value="{{ (isset($itemQty['P']) && $itemQty['P'] != 0) ? $itemQty['P'] : 0 }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                  <strong><label for="staticEmail" class="col-form-label">Q :</label></strong>
                </div>
                <div class="col-md-8">
                  <input type="number" name="stock[Q]" class="form-control" value="{{ (isset($itemQty['Q']) && $itemQty['Q'] != 0) ? $itemQty['Q'] : 0 }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                  <strong><label for="staticEmail" class="col-form-label">R :</label></strong>
                </div>
                <div class="col-md-8">
                  <input type="number" name="stock[R]" class="form-control" value="{{ (isset($itemQty['R']) && $itemQty['R'] != 0) ? $itemQty['R'] : 0 }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                  <strong><label for="staticEmail" class="col-form-label">S :</label></strong>
                </div>
                <div class="col-md-8">
                  <input type="number" name="stock[S]" class="form-control" value="{{ (isset($itemQty['S']) && $itemQty['S'] != 0) ? $itemQty['S'] : 0 }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                  <strong><label for="staticEmail" class="col-form-label">T :</label></strong>
                </div>
                <div class="col-md-8">
                  <input type="number" name="stock[T]" class="form-control" value="{{ (isset($itemQty['T']) && $itemQty['T'] != 0) ? $itemQty['T'] : 0 }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                  <strong><label for="staticEmail" class="col-form-label">U :</label></strong>
                </div>
                <div class="col-md-8">
                  <input type="number" name="stock[U]" class="form-control" value="{{ (isset($itemQty['U']) && $itemQty['U'] != 0) ? $itemQty['U'] : 0 }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                  <strong><label for="staticEmail" class="col-form-label">V :</label></strong>
                </div>
                <div class="col-md-8">
                  <input type="number" name="stock[V]" class="form-control" value="{{ (isset($itemQty['V']) && $itemQty['V'] != 0) ? $itemQty['V'] : 0 }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                  <strong><label for="staticEmail" class="col-form-label">W :</label></strong>
                </div>
                <div class="col-md-8">
                  <input type="number" name="stock[W]" class="form-control" value="{{ (isset($itemQty['W']) && $itemQty['W'] != 0) ? $itemQty['W'] : 0 }}">
                </div>
            </div>
        </div>
        @else
         <div class="col-md-8">
          <input type="number" name="stock[A]" class="form-control" id="stock" value="{{ (isset($itemQty['A']) && $itemQty['A'] != 0) ? $itemQty['A'] : 0 }}">
        </div>   
        @endif
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