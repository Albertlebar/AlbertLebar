<form id='edit' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation"
      novalidate>
    {{method_field('PATCH')}}
    <div class="">
        <div id="status"></div>
        <div class="col-md-6 col-sm-12">
            <div class="d-flex">
                <div class="col-md-3">
                    <p><strong> First Name : </strong></p>
                </div>
                <div class="col-md-9">
                    {{ $appointment->first_name }}
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md-3">
                    <p><strong> Last Name : </strong></p>
                </div>
                <div class="col-md-9">
                    {{ $appointment->last_name }}
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md-3">
                    <p><strong> Email : </strong></p>
                </div>
                <div class="col-md-9">
                    {{ $appointment->email }}
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md-3">
                    <p><strong> Phone : </strong></p>
                </div>
                <div class="col-md-9">
                    {{ $appointment->phone_number }}
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md-3">
                    <p><strong> Type : </strong></p>
                </div>
                <div class="col-md-9">
                    {{ $appointment->appointment_type == 0 ? 'Face to Face' : 'Call' }}
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md-3">
                    <p><strong> Date : </strong></p>
                </div>
                <div class="col-md-9">
                    {{ $appointment->appointment_date }}
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md-3">
                    <p><strong> Notes : </strong></p>
                </div>
                <div class="col-md-9">
                    {{ $appointment->notes }}
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md-3">
                    <p><strong> Status : </strong></p>
                </div>
                <div class="col-md-9">
                    @if($appointment->status == 0)
                       <label class="badge badge-warning">Pending</label>
                    @elseif($appointment->status == 1)
                        <label class="badge badge-info">Approved</label>
                    @elseif($appointment->status == 2)
                        <label class="badge badge-danger">Not Approved</label>
                    @elseif($appointment->status == 3)
                        <label class="badge badge-success">Success</label>
                    @endif
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md-3">
                    <p><strong> </strong></p>
                </div>
                <div class="col-md-9">
                    @if($appointment->status == 0)
                    <input type="radio" name="status" class="flat-green"
                           value="1" {{ ( $appointment->status == 1 ) ? 'checked' : '' }} /> Approved
                    <input type="radio" name="status" class="flat-green"
                           value="2" {{ ( $appointment->status == 2 ) ? 'checked' : '' }}> Not Approved
                   @elseif($appointment->status == 1)
                    <input type="radio" name="status" class="flat-green"
                           value="3" {{ ( $appointment->status == 3 ) ? 'checked' : '' }} /> Success
                    <input type="radio" name="status" class="flat-green"
                           value="4" {{ ( $appointment->status == 4 ) ? 'checked' : '' }}> Cancel
                   @endif
                </div>
            </div>
        </div>        
        <div class="col-md-12 mb-3 mt-3">
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
        $('input[type="radio"].flat-green').iCheck({
            radioClass: 'iradio_flat-green'
        });

        $('#edit').validate({// <- attach '.validate()' to your form
            // Rules for form validation
            submitHandler: function (form) {

                var list_id = [];

                var myData = new FormData($("#edit")[0]);
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                myData.append('_token', CSRF_TOKEN);
                myData.append('roles', list_id);

                $.ajax({
                        url: 'appointments/' + '{{ $appointment->id }}',
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