<form id='createSizeStock' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation"
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
                @if(count($itemStock) > 0  && !empty($itemStock))
                <?php
                    $sizeCount = 0;
                ?>
                @foreach($itemStock as $size)
                <div class="row mt-1 item_size-{{$size->id}}">
                    <div class="col-md-4">
                      <input type="text" name="size[{{ $size->id }}]" class="form-control" id="size_{{ $size->id }}" value="{{ $size->size }}">
                    </div>
                    <div class="col-md-4">
                      <input type="number" name="stock[{{ $size->id }}]" class="form-control" id="size_{{ $size->id }}" value="{{ $size->stock }}">
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
                    <div class="col-md-4">
                      <input type="text" name="new_size[0]" class="form-control" id="new_size-0" value=""  placeholder="Size">
                    </div>
                    <div class="col-md-4">
                      <input type="number" name="new_stock[0]" class="form-control" id="new_sotck-0" value="" placeholder="Quantity">
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
            <button type="button" class="btn btn-success button-submit size_stock"
                    data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
            </button>
        </div>
    </div>
</form>