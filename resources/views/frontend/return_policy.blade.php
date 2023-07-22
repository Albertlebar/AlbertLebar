@extends('frontend.layouts.master')
@section('title', 'Return Policy')
@section('content')
<style type="text/css">
    .page {
  padding: 50px 80px;
  margin: auto;
  background: white;
  box-shadow: 2px 2px 2px 2px rgba(0,0,0,0.6);
  max-width: 800px;
  min-width: 500px;
}

#terms-and-conditions {
  font-size: 14px; // default

  h1 {
    font-size: 34px;
  }
  
  ol {
    counter-reset: item;
  }

  li {
    display: block;
    margin: 20px 0;
    position: relative;
  }
  
  li:before {
    position: absolute;
    top: 0;
    margin-left: -50px;
    color: magenta;
    content: counters(item, ".") "    ";
    counter-increment: item;
  }
  
}
</style>
    <div class="shop-main-wrapper section-padding page">
  <div id="terms-and-conditions">
    <h1>Return Policy for Jewelry Retail Company (United Kingdom)</h1>
    <ol>
      <li>
        <b>Returns and Exchanges</b>
        <ol type="a">
          <li>
            We want you to be completely satisfied with your purchase. If for any reason you are not satisfied, we offer a return or exchange within 14 days of the delivery date.
          </li>
          <li>
            To be eligible for a return or exchange, the item must be in its original condition, unworn, and accompanied by the original proof of purchase, such as the receipt or order confirmation.
          </li>
        </ol>
      </li>
      <li>
          <b>Return Process</b>
          <ol type="a">
              <li>To initiate a return or exchange, please contact our customer service team. Provide your order details and reason for the return or exchange.</li>
              <li> Our customer service team will provide you with instructions on how to return the item, including any necessary shipping labels or documents.</li>
              <li>You are responsible for the return shipping costs unless the return is due to a defective or incorrect item.</li>
              <li>We recommend using a trackable shipping service and obtaining proof of postage for your return. We are not responsible for any lost or damaged packages during the return shipment.</li>
          </ol>
      </li>
      <li>
          <b>Refunds</b>
          <ol type="a">
              <li>Once your return is received and inspected, we will notify you of the approval or rejection of your refund.</li>
              <li>If approved, your refund will be processed and issued to the original payment method used for the purchase. Please allow 14 business days for the refund to be reflected in your account.</li>
              <li>Shipping costs, if applicable, are non-refundable.</li>
          </ol>
      </li>
      <li>
          <b>Exchanges</b>
          <ol type="a">
              <li>If you would like to exchange your jewelry item for a different size, style, or color, please contact our customer service team to check the availability of the desired item.</li>
              <li>Exchanges are subject to product availability. If the requested item is unavailable, we will process a refund for the returned item as outlined in the refund section above.</li>
          </ol>
      </li>
      <li>
          <b>Non-Returnable Items</b>
          <ol type="a">
              <li> For reasons of hygiene and safety, certain jewelry items are non-returnable. These may include earrings, pierced jewelry, and personalized or engraved items, unless they are faulty or not as described.</li>
          </ol>
      </li>
      <li>
          <b>Faulty or Damaged Items</b>
          <ol type="a">
              <li>If you receive a faulty or damaged item, please contact our customer service team within [number] days of the delivery date, providing details of the issue and any supporting evidence such as photographs.</li>
              <li>We may request the return of the faulty or damaged item for assessment. If the item is deemed to be faulty or damaged due to a manufacturing defect, we will offer a refund, exchange, or repair.</li>
              <li>
                If the item is damaged due to misuse, neglect, or normal wear and tear, we may not be able to offer a refund or exchange.
              </li>
          </ol>
      </li>
      <li>
          <b>Customer Support</b>
          <ol type="a">
              <li> If you have any questions or need assistance regarding returns or exchanges, please contact our customer service team at 100 Hatton Garden,EC1N 8NX,London, United Kingdom. We are here to help.</li>
          </ol>
      </li>
      <li>
          <b>Limitation of Liability</b>
          <ol type="a">
              <li>To the maximum extent permitted by law, Albert Lebar and its directors, employees, agents, and affiliates shall not be liable for any direct, indirect, incidental, consequential, or punitive damages arising out of or in connection with your use of our website or the products purchased through our website.</li>
          </ol>
      </li>
      <li>
          <b>Indemnification</b>
          <ol type="a">
              <li>You agree to indemnify and hold harmless Albert Lebar and its directors, employees, agents, and affiliates from and against any claims, losses, damages, liabilities, and expenses arising out of or in connection with your use of our website or any violation of these terms and conditions.</li>
          </ol>
      </li>
      <li>
          <b>Governing Law and Jurisdiction</b>
          <ol type="a">
              <li>These terms and conditions shall be governed by and construed in accordance with the laws of United Kingdom. Any disputes arising out of or in connection with these terms and conditions shall be subject to the exclusive jurisdiction of the courts of UK.</li>
          </ol>
      </li>
    <ol>
  </div><!--  end #terms-and-conditions  -->
</div><!--  end .page  -->
@endsection
@push('script')
<script type="text/javascript">
// banner hight
$(document).ready(function() {

    // $(document).on("change", "#item_size", function(e) {
    //     e.preventDefault();
    //     var item_type = $(this).val();
    //     alert(item_type);
    // });
    var banerHeight = $('.video-container').height();
    $('.shop-main-wrapper').css('marginTop', banerHeight - 60);
     $(window).resize(function(){
    var banerHeight = $('.video-container').height();
    $('.shop-main-wrapper').css('marginTop', banerHeight - 60);
    // console.log(banerHeight);

    });  
});
</script>

@endpush
