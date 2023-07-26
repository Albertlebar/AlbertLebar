@extends('backend.layouts.master')
@section('title', ' Order Item')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5><strong> Order Item </strong></h5>
                    <div class="d-flex">
                        <div class="col-md-6 col-sm-12">
                            <div class="d-flex">
                                <div class="col-md-3">
                                    <p><strong> Order By : </strong></p>
                                </div>
                                <div class="col-md-9">
                                    {{ $order->orderUser->name }}
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="col-md-3">
                                    <p><strong> Email : </strong></p>
                                </div>
                                <div class="col-md-9">
                                    {{ $order->orderUser->email }}
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="col-md-3">
                                    <p><strong> Order Type : </strong></p>
                                </div>
                                <div class="col-md-9">
                                    {{ config('params.order_type')[$order->order_type] }}
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="col-md-3">
                                    <p><strong> Order Status : </strong></p>
                                </div>
                                <div class="col-md-9">
                                    {{ config('params.order_status')[$order->order_status] }}
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="col-md-3">
                                    <p><strong> Payment Status : </strong></p>
                                </div>
                                <div class="col-md-9">
                                    {{ config('params.payment_status')[$order->payment_status] }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="d-flex">
                                <div class="col-md-3">
                                    <p><strong> Shipping Name : </strong></p>
                                </div>
                                <div class="col-md-9">
                                    {{ $order->shipping_address_first_name }}  {{ $order->shipping_address_last_name }}
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="col-md-3">
                                    <p><strong> Address : </strong></p>
                                </div>
                                <div class="col-md-9">
                                    {{ $order->shipping_address_1 }}, {{ $order->shipping_address_2 }}
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="col-md-3">
                                    <p><strong> City: </strong></p>
                                </div>
                                <div class="col-md-9">
                                    {{ $order->shipping_city }}
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="col-md-3">
                                    <p><strong> Postcode : </strong></p>
                                </div>
                                <div class="col-md-9">
                                    {{ $order->shipping_postcode }}
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="col-md-3">
                                    <p><strong> Country : </strong></p>
                                </div>
                                <div class="col-md-9">
                                    {{ $order->shipping_country }}
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="col-md-3">
                                    <p><strong> Contact : </strong></p>
                                </div>
                                <div class="col-md-9">
                                    {{ $order->shipping_contact }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive mt-3">
                        <table id="manage_all"
                               class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Product Title</th>
                                <th>Quantity</th>
                                <th>Size</th>
                                <th>Item Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $allTotal = 0;
                            ?>
                                @foreach($order->orderItem as $id=>$item)
                                <?php
                                    $rowCount = 1;
                                ?>
                                    <tr>
                                    <td>{{ $rowCount }}</td>
                                      <td class="pro-thumbnail"><img width="80px;" height="80px" src="{{asset($item->itemDetails->photo_0)}}"></td>
                                      <td class="pro-title">
                                        {{ $item->itemDetails->item_title }}  
                                      </td>
                                      <td>
                                          {{ $item->quantity }}
                                      </td>
                                      <td>
                                          {{ $item->size }}
                                      </td>
                                      <td>
                                          &pound; {{ number_format((float)$item->price, 2, '.', '') }}
                                      </td>
                                    </tr>
                                <?php
                                    $rowCount++;
                                ?>
                                @endforeach
                                <tr style="background: #f195ab;">
                                    <td colspan="5" class="text-right"><strong>Total</strong></td>
                                    <td><strong>&pound;{{ number_format((float)$order->order_total, 2, '.', '') }}</strong></td>
                                </tr>
                            </tbody>
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
                ajax_submit_edit('categories', id)
            });


            // Delete
            $("#manage_all").on("click", ".delete", function () {
                var id = $(this).attr('id');
                ajax_submit_delete('categories', id)
            });

        });

    </script>
@stop