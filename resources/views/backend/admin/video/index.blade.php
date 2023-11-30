@extends('backend.layouts.master')
@section('title', ' Invoice Details')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="main-card card mb-3">
                <div class="card-body">
                    <h3>Upload Video</h3>
                    <form id='edit' action="" enctype="multipart/form-data" method="" accept-charset="utf-8" class="needs-validation"
                          novalidate>
                          @csrf
                        {{method_field('PUT')}}
                        <label>Choose Video</label>
                        <input type="file"  name="video">
                    </form>
                    <div class="mt-2 col-md-12 mb-3">
                        <button type="button" class="btn btn-success video-submit"
                                data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script type="text/javascript">
    $('body').on('click', '.video-submit', function(event) {
            var list_id = [];
                    
                    var myData = new FormData($("#edit")[0]);
                    var CSRF_TOKEN = $('input[name="_token"]').val();
                    myData.append('_token', CSRF_TOKEN);
                    myData.append('roles', list_id);

        $.ajax({
                url: 'videos/'+'1',
                type: 'POST',
                data: myData,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                success: function (data) {

                    if (data.type === 'success') {
                        swal("Done!", "It was succesfully done!", "success");
                        $("#link-tab-images").trigger("click");
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
</script>
@endpush