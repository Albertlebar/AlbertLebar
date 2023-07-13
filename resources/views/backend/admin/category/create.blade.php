<form id='create' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation"
      novalidate>
    <div class="form-row">
        <div id="status"></div>
        <br/>
        <div class="clearfix"></div>
        <div class="form-group col-md-6 col-sm-12">
            <label for=""> Title </label>
            <input type="text" class="form-control" id="name" name="title" value="" placeholder="" required>
            <span id="error_title" class="has-error"></span>
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

        $('#create').validate({// <- attach '.validate()' to your form
            // Rules for form validation
            rules: {
                title: {
                    required: true
                }
            },
            // Messages for form validation
            messages: {
                name: {
                    required: 'Enter Title Name'
                }
            },
            submitHandler: function (form) {

                var list_id = [];
                
                var myData = new FormData($("#create")[0]);
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                myData.append('_token', CSRF_TOKEN);
                myData.append('roles', list_id);

                $.ajax({
                        url: 'categories',
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

    });
</script>