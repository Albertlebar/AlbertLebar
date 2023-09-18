<form id='image-tab' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation"
  novalidate>
  <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
    <input type="hidden" name="item_id" value="{{ $item->id }}">

    <div class="col-md-4">
        <div id="append_image">
            <div class="">
                <!-- <div class="col-md-2">
                    <input type="radio" name="is_main_image" class="form-control-sm" value="0">
                </div> -->
                <div style="text-align: center;">
                    <img id="preview-0" src="{{ asset($item->photo_0) }}" alt="" style="width: 105px; height: 100px;">
                    <a class="remove-image" id="id-remove-image" data-id="0" href="javascript:void(0)" style="display: inline;">&#215;</a>

                </div>
                <div class="mt-1" style="margin: auto;width: 35%;">
                    <input id="photo-0" type="file" accept="image/*" class="form-control" value="{{ $item->photo_0 }}" name="photo_0" onchange="showImage(0)">
                </div>
            </div>
            <div class="row mt-5">
                <!-- <div class="col-md-2">
                    <input type="radio" name="is_main_image" class="form-control-sm" value="0">
                </div> -->
                <div class="col-md-4 p-0 pl-2">
                    <div style="">
                        <img id="preview-1" src="{{ asset($item->photo_1) }}" alt="" style="width: 105px; height: 100px;">
                        <a class="remove-image1" id="id-remove-image" data-id="1" href="javascript:void(0)" style="display: inline;">&#215;</a>
                    </div>
                    <div class="mt-1" style="margin: auto;width: 102px;">
                        <input id="photo-1" type="file" accept="image/*" class="form-control" name="photo_1" onchange="showImage(1)">
                    </div>
                </div>
                <div class="col-md-4 p-0 pl-1">
                    <div style="text-align: center;">
                        <img id="preview-2" src="{{ asset($item->photo_2) }}" alt="" style="width: 105px; height: 100px;">
                        <a class="remove-image1" id="id-remove-image" data-id="2" href="javascript:void(0)" style="display: inline;">&#215;</a>
                    </div>
                    <div class="mt-1" style="margin: auto;width: 102px;">
                        <input id="photo-2" type="file" accept="image/*" class="form-control" name="photo_2" onchange="showImage(2)">
                    </div>
                </div>
                <div class="col-md-4 p-0">
                    <div style="text-align: right;">
                        <img id="preview-3" src="{{ asset($item->photo_3) }}" alt="" style="width: 105px; height: 100px;">
                        <a class="remove-image1" id="id-remove-image" data-id="3" href="javascript:void(0)" style="display: inline;">&#215;</a>
                    </div>
                    <div class="mt-1" style="margin: auto;width: 102px;">
                        <input id="photo-3" type="file" accept="image/*" class="form-control" name="photo_3" onchange="showImage(3)">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-2 col-md-12 mb-3">
        <button type="button" class="btn btn-success image-submit"
                data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
        </button>
    </div>
</form>