<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                    <table id="add_product"
                           class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Item Code</th>
                            <th>Total Stock</th>
                            <th>Metal Type</th>
                            <th>Metal Colour</th>
                            <th>Total Trade</th>
                            <th>Total Retail</th>                      
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 mb-3">
    <a href="javascript:void(0)" class="btn btn-success select-product"
        data-loading-text="Loading..."> Add
    </a>
</div>
<script type="text/javascript">
    $(function () {

            add_product = $('#add_product').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": '{!! route('admin.addProductData') !!}',
                    "type": "GET",
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN,
                    },
                    "dataType": 'json'
                },
                columns: [
                    // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data:'checkbox',name: 'checkbox'},
                    {data: 'category_id', name: 'category_id'},
                    {data: 'item_title', name: 'item_title'},
                    {data: 'item_code', name: 'item_code'},
                    {data: 'total_stock', name: 'total_stock'},
                    {data: 'metal_type', name: 'metal_type'},
                    {data: 'metal_colour', name: 'metal_colour'},
                    {data: 'total_trade', name: 'total_trade'},
                    {data: 'total_retail', name: 'total_retail'},
                ],
                "autoWidth": false,
            });
            $('.dataTables_filter input[type="search"]').attr('placeholder', 'Type here to search...').css({
                'width': '220px',
                'height': '30px'
            });

        });
</script>