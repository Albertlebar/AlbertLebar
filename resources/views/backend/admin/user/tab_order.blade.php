<div class="row">
    <input type="hidden" value="{{ $user->id}}" id="user-id">
    <div class="col-md-12 col-sm-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="manage_all_order"
                           class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Order Date</th>
                            <th>Order Number</th>
                            <th>Client Name</th>
                            <th>Status</th>
                            <th>Total</th>
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
        $(document).ready(function(){
             $('table.display').DataTable();
            $(function () {
            table = $('#manage_all_order').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                retrieve: true,
                ajax: {
                    "url": '{!! route('admin.allOrders') !!}',
                    "type": "GET",
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN,
                    },
                    data: function(d) {
                        d.user_id = $('#user-id').val();
                    },
                    "dataType": 'json'
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'order_number', name: 'order_number'},
                    {data: 'shipping_address_first_name', name: 'shipping_address_first_name'},
                    // {data: 'order_type', name: 'order_type'},
                    {data: 'order_status', name: 'order_status'},
                    {data: 'order_total', name: 'order_total'},
                    {data: 'action', name: 'action'}
                ],
                "autoWidth": false,
            });
            $('.dataTables_filter input[type="search"]').attr('placeholder', 'Type here to search...').css({
                'width': '220px',
                'height': '30px'
            });

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
                ajax_submit_edit('invoice', id)
            });


            // Delete
            $("#manage_all").on("click", ".delete", function () {
                var id = $(this).attr('id');
                ajax_submit_delete('categories', id)
            });

            $("#manage_all").on("click", ".return", function () {
                var id = $(this).attr('id');
                $("#modal_data").empty();
                $('.modal-title').text('Return Product');

                $.ajax({
                    url: '{{ url("admin/invoice") }}'+'/'+ id +'/return',
                    type: 'get',
                    success: function (data) {
                        $("#modal_data").html(data.html);
                        $('#myModal').modal('show'); // show bootstrap modal
                    },
                    error: function (result) {
                        $("#modal_data").html("Sorry Cannot Load Data");
                    }
                });
            });

        });

    </script>