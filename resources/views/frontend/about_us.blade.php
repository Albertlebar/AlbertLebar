@extends('frontend.layouts.master')
@section('title', 'About Us')
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
  /*ol {
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
  }*/
  
}
</style>
<div class="page">
  <div id="terms-and-conditions">
    <h1 style="margin-bottom: 10px;">About Us</h1>
    <ul>
      <li style="list-style: disc;">
        Welcome to Albert Lebar Jewellery, your trusted source for exquisite Jewellery. We are a premier Jewellery wholesaler, specializing in providing high-quality Jewellery to private clients and retailers alike. With our extensive collection and dedication to exceptional craftsmanship, we strive to bring elegance and beauty to every piece we offer.
      </li>
      <li style="list-style: disc;">
       At Albert Lebar Ltd, we understand that Jewellery is more than just an accessory; it is a reflection of individuality and personal style. That's why we curate a diverse selection of stunning pieces, ranging from timeless classics to the latest trends. Whether you're looking for an exquisite diamond necklace, a statement cocktail ring, or a delicate bracelet, we have something to suit every taste and occasion.
      </li>
      <li style="list-style: disc;">
       As a Jewellery wholesaler, we have built strong partnerships with renowned Jewellery manufacturers and designers, allowing us to offer competitive prices without compromising on quality. Our commitment to excellence ensures that each piece in our collection is meticulously crafted using the finest materials and expert techniques. We take pride in delivering Jewellery that not only dazzles with its beauty but also stands the test of time.
      </li>
      <li style="list-style: disc;">
       For private clients, we provide a personalized shopping experience, allowing you to explore our collection from the comfort of your home. Our user-friendly website offers a seamless browsing experience, detailed product descriptions, and high-resolution images to help you make informed choices. Whether you're searching for a special gift or treating yourself to a well-deserved indulgence, we are dedicated to making your Jewellery shopping experience unforgettable.
      </li>
      <li style="list-style: disc;">
       In addition to serving private clients, we also cater to retailers looking to expand their Jewellery offerings. We offer wholesale pricing and flexible ordering options to meet your business needs. Our extensive inventory and quick turnaround times ensure that you can stock your store with the latest Jewellery trends, attracting discerning customers and enhancing your reputation as a trusted retailer.
      </li>
      <li style="list-style: disc;">
       At Albert Lebar, we value our relationships with our clients. We prioritize exceptional customer service, and our knowledgeable team is always available to assist you with any inquiries or special requests. We strive to exceed your expectations and build lasting partnerships based on trust, reliability, and integrity.
      </li>
      <li style="list-style: disc;">
       Thank you for choosing us. We are honored to be part of your Jewellery journey, and we look forward to helping you discover the perfect piece that will be cherished for a lifetime.
      </li>
    <ul>
  </div><!--  end #terms-and-conditions  -->
</div><!--  end .page  -->
@endsection