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
            <div class="form-group" id="catelogue_size">
                @if(!empty($itemStock))
                <?php
                    $sizeCount = 0;
                ?>
                @foreach($itemStock as $size)
                <div class="row mt-1 item_size-{{$size->id}}">
                    <div class="col-md-8">
                      <input type="text" name="size[{{ $size->id }}]" class="form-control" id="size_{{ $size->id }}" value="{{ $size->size }}">
                    </div>
                    @if($sizeCount == 0)
                    <div class="col-md-1">
                        <a class="btn btn-primary add" style="color: white;">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </a>
                    </div>
                    <?php
                        $sizeCount++;
                    ?>
                    @else
                    <div class="col-md-1">
                        <a class="btn btn-danger remove" data-id="{{ $size->id }}" style="color: white;">
                            <i class="fa fa-minus" aria-hidden="true"></i>
                        </a>
                    </div>
                    @endif
                </div>
                @endforeach
                @else
                <div class="row">
                    <div class="col-md-8">
                      <input type="text" name="new_size[0]" class="form-control" id="size_0" value="">
                    </div>
                    <div class="col-md-1">
                        <a class="btn btn-primary add" style="color: white;">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                @endif
                <!-- <div class="col-md-1">
                    <a class="btn btn-danger remove" style="color: white;">
                        <i class="fa fa-minus" aria-hidden="true"></i>
                    </a>
                </div> -->
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
    let add_number = 1;
    $(document).ready(function () {

        $("body").on("click", ".add", function (e) {
            $("#catelogue_size").append(
                '<div class="row mt-1 item_size-'+ add_number +'">\
                    <div class="col-md-8">\
                      <input type="text" name="new_size['+ add_number +']" class="form-control" id="size_'+ add_number +'" value="">\
                    </div>\
                    <div class="col-md-1">\
                        <a class="btn btn-danger remove" data-id="'+ add_number +'" style="color: white;">\
                            <i class="fa fa-minus" aria-hidden="true"></i>\
                        </a>\
                    </div>\
                </div>'
            );
            add_number++;
        });

        $("body").on("click", ".remove", function (e) {
            let id = $(this).attr('data-id');
            $(".item_size-" + id).remove();
            add_number--;
        });

        $('#create').validate({// <- attach '.validate()' to your form
            // Rules for form validation
            submitHandler: function (form) {

                var list_id = [];
                
                var myData = new FormData($("#create")[0]);
                var CSRF_TOKEN = $('input[name="csrf_token"]').val();
                myData.append('_token', CSRF_TOKEN);
                myData.append('roles', list_id);

                $.ajax({
                        url: 'catelogue-size',
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