<form id='return' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation"
      novalidate>
    <div class="form-row">
        <div id="status"></div>
        <div class="table-responsive mt-3">
        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
        <table id="manage_all"
               class="align-middle mb-0 table table-borderless table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Item Code</th>
                <th>Image</th>
                <th>Product Title</th>
                <th>Quantity</th>
                <th>Size</th>
                <th>Item Total</th>
            </tr>
            </thead>
            <tbody>
                @foreach($invoiceDetails->orderItem as $id=>$item)
                <tr>
                <td><input type="checkbox" id="{{ $item->id }} " value="{{ $item->id }}" name="ids[]" /></td>
                <td>{{ $item->itemDetails->item_code }} </td>
                  <td class="pro-thumbnail"><img width="80px;" height="80px" src="{{asset($item->itemDetails->photo_0)}}"></td>
                  <td class="pro-title">
                    {{ $item->itemDetails->item_title }}  
                  </td>
                  <td>
                    <input type="hidden" name="quantity[{{ $item->id }}]" value="{{ $item->quantity }}">
                      {{ $item->quantity }}
                  </td>
                  <td>
                      {{ $item->size }}
                  </td>
                  <td>
                      &pound; {{ number_format((float)$item->price, 2, '.', '') }}
                  </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success button-submit"
                data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
        </button>
    </div>
</form>
<script>

    $(document).ready(function () {
        $('input[type="checkbox"].flat-green').iCheck({
            checkboxClass: 'icheckbox_flat-green',
        });
        $('input[type="radio"].flat-green').iCheck({
            radioClass: 'iradio_flat-green'
        });

        $(".button-submit").on("click", function (e) {
            var allVals = [];
             $("input[name='someCheckbox[]']:checked").each(function() {
                allVals.push($(this).attr('value'));
            });

            var myData = new FormData($("#return")[0]);
            myData.append('_token', "{{ csrf_token() }}");

             $.ajax({
                        url: 'invoice/return-product',
                        type: 'POST',
                        data: myData,
                        dataType: 'json',
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
        });
    });
</script>