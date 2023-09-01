@extends('backend.layouts.master')
@section('title', ' Appointment')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fa-duotone fa-ball-pile fa-lg"> </i>
                </div>
                <div>All Appointment</div>
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
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Appointment Type</th>
                                <th>Appointment Date</th>
                                <th>Notes</th>
                                <th>Status</th>
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
        $(function () {

            table = $('#manage_all').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": '{!! route('admin.allAppointment') !!}',
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
                    {data: 'DT_RowIndex', searchable: false, orderable: false},
                    {data: 'first_name', name: 'appointments.first_name'},
                    {data: 'last_name', name: 'appointments.last_name'},
                    {data: 'email', name: 'appointments.email'},
                    {data: 'phone_number', name: 'appointments.phone_number'},
                    {data: 'appointment_type', name: 'appointments.appointment_type'},
                    {data: 'appointment_date', name: 'appointments.appointment_date'},
                    {data: 'notes', name: 'appointments.notes'},
                    {data: 'status', name: 'appointments.status'},
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
        $(document).ready(function () {
            // Edit Form
            $("#manage_all").on("click", ".edit", function () {
                var id = $(this).attr('id');
                ajax_submit_edit('appointments', id);
            });
        });

    </script>
@stop