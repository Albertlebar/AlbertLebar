@extends('backend.layouts.master')
@section('title', ' All Categories')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fa-duotone fa-ball-pile fa-lg"> </i>
                </div>
                <div>All Order</div>
                <div class="d-inline-block ml-2">
                    @can('user-create')
                        <a href="{{ URL :: to('/admin/orders/create') }}" class="btn btn-success"><i
                                class="glyphicon glyphicon-plus"></i>
                            Create Order
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
                               class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Order Date</th>
                                <th>Order Number</th>
                                <th>Clinet Name</th>
                                <!-- <th>Order Type</th> -->
                                <th>Order Status</th>
                                <th>Order Total</th>
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
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
// console.log(queryString);
        $(function () {

            table = $('#manage_all').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": '{!! route('admin.allOrders') !!}',
                    "type": "GET",
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN,
                    },
                    data: function(d) {
                        d.param = urlParams.get('param');
                    },
                    "dataType": 'json'
                },
                columns: [
                    {data: 'DT_RowIndex',searchable: false, orderable: false},
                    {data: 'created_at', name: 'orders.created_at'},
                    {data: 'order_number', name: 'orders.order_number'},
                    {data: 'shipping_address_first_name', name: 'orders.shipping_address_first_name'},
                    // {data: 'order_type', name: 'order_type'},
                    {data: 'order_status', name: 'orders.order_status'},
                    {data: 'order_total', name: 'orders.order_total'},
                    {data: 'action', name: 'action'}
                ],
                "autoWidth": false,
            $('.dataTables_filter input[type="search"]').attr('placeholder', 'Type here to search...').css({
                'width': '220px',
                'height': '30px'
            });

        });
    </script>
    <script type="text/javascript">
        function create() {
            ajax_submit_create('categories');
        }

        $(document).ready(function () {
            // View Form
            $("#manage_all").on("click", ".view", function () {
                var id = $(this).attr('id');
                ajax_submit_view('categories', id)
            });

            // Edit Form
            $("#manage_all").on("click", ".edit", function () {
                var id = $(this).attr('id');
                ajax_submit_edit('orders', id)
            });


            // Delete
            $("#manage_all").on("click", ".delete", function () {
                var id = $(this).attr('id');
                ajax_submit_delete('categories', id)
            });

        });

    </script>
@stop
