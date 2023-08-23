<form id='edit-cencel' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation"
      novalidate>
    <div class="form-row">
        <div id="status"></div>
        <div class="form-group col-md-5 col-sm-12">
            <label for=""> Cancel Reason </label>
            <input type="hidden" name="order_id" value="{{$order->id}}">
            <textarea type="text" class="form-control" id="cancel" name="cancel_reason" value="" placeholder="" required>{{ $order->cancel_reason }}</textarea>
            <span id="error_cancel_reason" class="has-error"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success button-submit"
                data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
        </button>
    </div>
</form>
<script>

    $(document).ready(function () {
        $('.button-submit').on('click',function(){
            var myData = new FormData($("#edit-cencel")[0]);
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                myData.append('_token', CSRF_TOKEN);
                // myData.append('roles', list_id);
                $.ajax({
                        url: '/cancel',
                        type: 'POST',
                        data: myData,
                        dataType: 'json',
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function (data) {

                            if (data.type === 'success') {
                                // swal("Done!", "It was succesfully done!", "success");
                                // reload_table();
                                notify_view(data.type, data.message);
                                location.reload();
                                
                                $('#loader').hide();
                                $("#submit").prop('disabled', false); // disable button
                                $("html, body").animate({scrollTop: 0}, "slow");
                                $('#myModal').modal('hide'); // hide bootstrap modal
                                $('.tab-pane').removeClass("show active");
                                $('.nav-link').removeClass("active");
                                $('#v-pills-profile-tab').addClass("active");
                                $('#v-pills-profile').addClass("show active");

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