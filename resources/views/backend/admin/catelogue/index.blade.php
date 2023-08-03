@extends('backend.layouts.master')
@section('title', ' All Products')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fa-duotone fa-ball-pile fa-lg"> </i>
                </div>
                <div>All Products</div>
                <div class="d-inline-block ml-2">
                    @can('user-create')
                        <a href="{{ URL :: to('/admin/catelogues/create') }}" class="btn btn-success"><i
                                class="glyphicon glyphicon-plus"></i>
                            New Item
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="manage_all"
                               class="align-middle mb-0 table table-borderless table-striped table-hover" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Item Code</th>
                                <!-- <th>Item Description</th> -->
                                <!-- <th>Supplier Name</th> -->
                                <th>Totol Stock</th>
                                <!-- <th>Supplier Code</th> -->
                                <!-- <th>Metal Type</th> -->
                                <!-- <th>Metal Colour</th> -->
                                <th>Total Gold Weight</th>
                                <th>Total Ct Weight</th>
                                <!-- <th>Gold Price</th> -->
                                <!-- <th>Stone Price</th> -->
                                <!-- <th>Labour Cost</th> -->
                                <!-- <th>Duty And Extra</th> -->
                                <!-- <th>Total Cost</th> -->
                                <!-- <th>Profit Trade %</th>
                                <th>Profit Retail %</th> -->
                                <th>Total Trade</th>
                                <th>Total Retail</th>
                                <th>Is Active</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        @media screen and (min-width: 768px) {
            #myModal .modal-dialog {
                width: 85%;
                border-radius: 5px;
            }
        }
    </style>
    <script>
        $(function () {

            table = $('#manage_all').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": '{!! route('admin.allCatelogue') !!}',
                    "type": "GET",
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN,
                    },
                    "dataType": 'json'
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'category_id', name: 'category_id'},
                    {data: 'item_title', name: 'item_title'},
                    {data: 'item_code', name: 'item_code'},
                    // {data: 'item_description', name: 'item_description'},
                    // {data: 'supplier_name', name: 'supplier_name'},
                    {data: 'total_stock', name: 'total_stock'},
                    // {data: 'supplier_code', name: 'supplier_code'},
                    // {data: 'metal_type', name: 'metal_type'},
                    // {data: 'metal_colour', name: 'metal_colour'},
                    {data: 'total_gold_weight', name: 'total_gold_weight'},
                    {data: 'total_ct_weight', name: 'total_ct_weight'},
                    // {data: 'gold_price', name: 'gold_price'},
                    // {data: 'stone_price', name: 'stone_price'},
                    // {data: 'labour_cost', name: 'labour_cost'},
                    // {data: 'duty_and_extra', name: 'duty_and_extra'},
                    // {data: 'total_cost', name: 'total_cost'},
                    // {data: 'profit_trade', name: 'profit_trade'},
                    // {data: 'profit_retail', name: 'profit_retail'},
                    {data: 'total_trade', name: 'total_trade'},
                    {data: 'total_retail', name: 'total_retail'},
                    {data: 'is_active', name: 'is_active'},
                    {data: 'action', name: 'action'}
                ],
                "autoWidth": true,
                "scrollX": true
            });
            $('.dataTables_filter input[type="search"]').attr('placeholder', 'Type here to search...').css({
                'width': '220px',
                'height': '30px'
            });

        });
    </script>
    <script type="text/javascript">
        function create() {
            ajax_submit_create('catelogues');
        }

        $(document).ready(function () {
            // View Form
            $("#manage_all").on("click", ".view", function () {
                var id = $(this).attr('id');
                ajax_submit_view('catelogues', id)
            });

            // Edit Form
            $("#manage_all").on("click", ".edit", function () {
                var id = $(this).attr('id');
                ajax_submit_edit('catelogues', id)
            });


            // Delete
            $("#manage_all").on("click", ".delete", function () {
                var id = $(this).attr('id');
                ajax_submit_delete('catelogues', id)
            });

        });

    </script>
@stop