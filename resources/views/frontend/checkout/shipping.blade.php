@extends('frontend.layouts.master')
@section('title', 'Cart')
@section('content')
<!-- page main wrapper start -->
<div class="shop-main-wrapper section-padding">
    <div class="container">
        <div class="myaccount-content">
            <h5>Shipping Address</h5>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="mt-5">
                <form id='create' action="{{ URL :: to('/checkout/shipping') }}" enctype="multipart/form-data"
                    method="post" accept-charset="utf-8" class="needs-validation" novalidate>
                    @csrf
            </div>
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-floating mb-3">
                        <!-- <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">       -->
                        <input type="text" name="shipping_address_first_name" class="form-control"
                            id="shipping_address_first_name" placeholder="name@example.com"
                            value="{{ old('shipping_address_first_name') }}">
                        <label for="floatingInput required">First Name</label>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-floating mb-3">
                        <input type="text" name="shipping_address_last_name" class="form-control"
                            id="shipping_address_last_name" placeholder="name@example.com"
                            value="{{ old('shipping_address_last_name') }}">
                        <label for="floatingInput required">Last Name</label>
                    </div>
                </div>
                <div class="col-lg-12 col-12">
                    <div class="form-floating mb-3">
                        <input type="text" name="shipping_address_1" class="form-control" id="shipping_address_1"
                            placeholder="name@example.com" value="{{ old('shipping_address_1') }}">
                        <label for="floatingInput required">Address Line 1</label>
                    </div>
                </div>
                <div class="col-lg-12 col-12">
                    <div class="form-floating mb-3">
                        <input type="text" name="shipping_address_2" class="form-control" id="shipping_address_2"
                            placeholder="name@example.com" value="{{ old('shipping_address_2') }}">
                        <label for="floatingInput required">Address Line 2</label>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="form-floating mb-3">
                        <input type="text" name="shipping_country" class="form-control" id="shipping_country"
                            placeholder="name@example.com" value="{{ old('shipping_country') }}">
                        <label for="floatingInput required">Country</label>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="shipping_city" class="form-control" id="shipping_city"
                            placeholder="name@example.com" value="{{ old('shipping_city') }}">
                        <label for="floatingInput required">City</label>
                    </div>
                </div>
                <div class="col-lg-4   col-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="shipping_postcode" class="form-control" id="shipping_postcode"
                            placeholder="name@example.com" value="{{ old('shipping_postcode') }}">
                        <label for="floatingInput required">Postcode</label>
                    </div>
                </div>
                <div class="proceed-to-checkout text-end">
                    <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold" type="submit">Continue to
                        Shipping</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- page main wrapper end -->
@endsection
@push('script')
<script type="text/javascript">
$(document).ready(function() {

});



// banner hight
$(document).ready(function() {

    var banerHeight = $('.video-container').height();
    $('.shop-main-wrapper').css('marginTop', banerHeight - 60);
    $(window).resize(function() {
        var banerHeight = $('.video-container').height();
        $('.shop-main-wrapper').css('marginTop', banerHeight - 60);
        // console.log(banerHeight);

    });
});
</script>

@endpush