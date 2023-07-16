@extends('frontend.layouts.master')
@section('title', 'Terms & Conditions')
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
    <div class="page">
  <div id="terms-and-conditions">
    <h1>Terms & Conditions</h1>
    <ol>
      <li>
        <b>INTRODUCTION</b>
        <ol type="a">
          <li>
            These terms and conditions govern your use of www.lebar.uk, operated by LEBAR Ltd. By accessing or using our website, you agree to comply with these terms and conditions. If you do not agree with any part of these terms, you may not use our website.
          </li>
        </ol>
      </li>
      <li>
          <b>Use of the Website</b>
          <ol type="a">
              <li>You must be at least 18 years old to use this website. By using this website, you represent that you are at least 18 years old.</li>
              <li> You agree to use this website only for lawful purposes and in a manner that does not violate any applicable laws or regulations.</li>
              <li>You agree not to interfere with or disrupt the operation of the website or the servers or networks connected to the website.</li>
              <li>We may, at our sole discretion, suspend or terminate your access to the website without prior notice if we believe you have violated these terms and conditions or any applicable laws.</li>
          </ol>
      </li>
      <li>
          <b>Products and Pricing</b>
          <ol type="a">
              <li>We make every effort to ensure that the products listed on our website are accurately described, priced correctly, and available for purchase. However, we do not warrant that the product descriptions, pricing, or availability are accurate, complete, or error-free.</li>
              <li> We reserve the right to modify or discontinue any product without prior notice. Prices are subject to change without notice.</li>
              <li>All prices listed on our website are in pound(£) and are exclusive of applicable taxes, fees, and shipping costs, which will be added to the total price during the checkout process.</li>
          </ol>
      </li>
      <li>
          <b>Orders and Payments</b>
          <ol type="a">
              <li>When you place an order through our website, it constitutes an offer to purchase the products. We reserve the right to accept or decline your order at our discretion.</li>
              <li> We accept payment through the methods specified on our website. By providing your payment information, you represent and warrant that you are authorized to use the payment method and that the information you provide is accurate.</li>
              <li>We will process your payment upon acceptance of your order. If we are unable to fulfill your order, we will refund the payment to the original payment method used.</li>
          </ol>
      </li>
      <li>
          <b>Shipping and Delivery</b>
          <ol type="a">
              <li>We will make reasonable efforts to ensure that products are shipped and delivered within the estimated timeframe. However, we do not guarantee delivery dates and are not responsible for any delays or damages caused by third-party shipping carriers.</li>
              <li> Risk of loss and title for products purchased from our website pass to you upon delivery of the products to the shipping carrier.</li>
          </ol>
      </li>
      <li>
          <b>Returns and Refunds</b>
          <ol type="a">
              <li>We accept returns within [number] days of the delivery date, subject to our return policy, which is available on our website.</li>
              <li>Refunds will be issued to the original payment method used for the purchase, subject to the terms of our return policy.</li>
          </ol>
      </li>
      <li>
          <b>Intellectual Property</b>
          <ol type="a">
              <li>All content on our website, including text, images, graphics, logos, and trademarks, is the property of Albert Lebar and is protected by copyright and other intellectual property laws.</li>
              <li>You may not use, reproduce, modify, or distribute any content from our website without our prior written consent.</li>
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