@extends('backend.layouts.master')
@section('title', 'Dashboard')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Analytics Dashboard
                    <!-- <div class="page-title-subheading">This is an example dashboard created using build-in elements and
                        components.
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-midnight-bloom">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">New Orders</div>
                        <!-- <div class="widget-subheading">Last year expenses</div> -->
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><a href="{{ URL :: to('/admin/orders') }}?param=new_order" class="text-white"><span>{{ $orderInformation->new_order }}</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-midnight-bloom">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Orders</div>
                        <!-- <div class="widget-subheading">Last year expenses</div> -->
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><a class="text-white" href="{{ URL :: to('/admin/orders') }}"><span>{{ $orderInformation->total_order }}</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            
        </div>
        <div class="col-md-6 col-xl-4">
           <div class="card mb-3 widget-content bg-arielle-smile">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">New Sell</div>
                        <!-- <div class="widget-subheading">Total Clients Profit</div> -->
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>&pound; {{ number_format((float)$orderInformation->new_sell, 2, '.', '') }}</span></div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-arielle-smile">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Totol Sell</div>
                        <!-- <div class="widget-subheading">Total Clients Profit</div> -->
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>&pound; {{ number_format((float)$orderInformation->total_order_price, 2, '.', '') }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">New Appointment</div>
                        <!-- <div class="widget-subheading">People Interested</div> -->
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><a class="text-white" href="{{ URL :: to('/admin/appointments') }}?param=new_appointment"><span>{{ $appointment->new_appointment }}</span></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Appointment</div>
                        <!-- <div class="widget-subheading">People Interested</div> -->
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><a class="text-white" href="{{ URL :: to('/admin/appointments') }}"><span>{{ $appointment->total_appointment }}</span></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
