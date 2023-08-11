<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ItemStock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Stripe;
use Session;
use App\Models\User;
use App\Models\Invoice;
use App\Models\InvoiceItem;

class CheckoutController extends Controller
{
    //

    public function cart(Request $request)
    {
    	return view('frontend.checkout.cart');
    }

    public function checkout(Request $request)
    {
        if(\Session::has('cart'))
        {
            $items = \Session::get('cart');
            foreach ($items as $item) {
                $cartItem = new Cart();
                $cartItem->user_id = Auth::user()->id;
                $cartItem->item_id = $item['item_id'];
                $cartItem->quantity = $item['quantity'];
                $cartItem->size = $item['size'];
                $cartItem->price = $item['quantity'] * $item['price'];
                $cartItem->save();  
            }
            \Session::forget('cart');
        }
    	$user = User::find(Auth::user()->id);
    	return view('frontend.checkout.shipping',compact('user'));
    }

    public function saveShipping(Request $request)
    {
    	$validate = Validator::make($request->all(),[
		    'shipping_address_first_name' => 'required|max:255',
		    'shipping_address_last_name' => 'required',
		    'shipping_address_1' => 'required',
		    'shipping_address_2' => 'required',
		    'shipping_country' => 'required',
		    'shipping_city' => 'required',
		    'shipping_postcode' => 'required',
		]);

    	if($validate->fails()){
		  return back()->withErrors($validate->errors())->withInput();
		}
    	$userId = Auth::user()->id;
		$cartItem = Cart::where('user_id',$userId)->get();
		$totalPrice = 0;
        $VAT = 0;
		foreach ($cartItem as $item) {
			$totalPrice = $totalPrice + $item->price;
		}
        $VAT = $totalPrice * 0.2;
		$order = new Order();
		$order->user_id = Auth::user()->id;
        $order->order_number = Order::autoGenerateOrderNumber();
		$order->order_type = 0;
		$order->order_status = 0;
        $order->sub_total = $totalPrice;
        $order->vat = $VAT;
		$order->order_total = $totalPrice + $VAT;
		$order->shipping_address_first_name = $request->shipping_address_first_name;
		$order->shipping_address_last_name = $request->shipping_address_last_name;
		$order->shipping_address_1 = $request->shipping_address_1;
		$order->shipping_address_2 = $request->shipping_address_2;
		$order->shipping_city = $request->shipping_city;
		$order->shipping_postcode = $request->shipping_postcode;
		$order->shipping_country = $request->shipping_country;
		$order->shipping_contact = $request->shipping_contact;
		$order->save();
		foreach ($cartItem as $item) {
			$orderItem = new OrderItem();
			$orderItem->order_id = $order->id;
			$orderItem->item_id = $item->item_id;
			$orderItem->quantity = $item->quantity;
			$orderItem->size = $item->size;
			$orderItem->price = $item->price;
			$orderItem->save();
			$item->delete();
		}
    	return redirect()->route('frontend.checkout.payment',['order_id'=>$order->id])->with(['totalPrice' => $totalPrice,'order' => $order]);
    }

    public function payment(Request $request)
    {
        $order = Order::where('id',$request->order_id)->first();
    	$totalPrice = Session::get('totalPrice');
    	return view('frontend.checkout.payment')->with(compact('totalPrice','order'));
    }

    public function stripePost(Request $request)
	{

		$totalPrice = Session::get('totalPrice');
		$orderId = $request->order_id;
        $orderItem = OrderItem::where('order_id',$orderId)->get();
		$orderDetails = Order::where('id',$orderId)->first();
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    $customer = Stripe\Customer::create(array(

            "address" => [

                    "line1" => Auth::user()->address_field_1,

                    "postal_code" => Auth::user()->postcode,

                    "city" => Auth::user()->city,

                    "state" => Auth::user()->state_province_county,

                    "country" => Auth::user()->country,

                ],

            "email" => Auth::user()->email,

            "name" => Auth::user()->name,

            "source" => $request->stripeToken

         ));

    $stripe = Stripe\Charge::create ([

            "amount" => number_format((float)$orderDetails->order_total, 2, '.', '') * 100,

            "currency" => "gbp",

            "customer" => $customer->id,

            "description" => "Test payment.",

            "shipping" => [

              "name" => $orderDetails->shipping_address_first_name . ' ' . $orderDetails->shipping_address_last_name,

              "address" => [
 
                "line1" => $orderDetails->shipping_address_1 . ', ' . $orderDetails->shipping_address_2,

                "postal_code" => $orderDetails->shipping_postcode,

                "city" => $orderDetails->shipping_city,

                "state" => " ",

                "country" => $orderDetails->shipping_country,

              ],

            ]

    ]); 

    $invoice = new Invoice();
    $invoice->user_id = $orderDetails->user_id;
    $invoice->invoice_number = Invoice::autoGenerateInvoiceNumber();
    $invoice->order_type = 0;
    $invoice->status = 0;
    // $invoice->payment_status = 0;
    $invoice->sub_total = $orderDetails->sub_total;
    $invoice->vat = $orderDetails->vat;
    $invoice->order_total = $orderDetails->order_total;
    $invoice->shipping_address_first_name = $orderDetails->shipping_address_first_name;
    $invoice->shipping_address_last_name = $orderDetails->shipping_address_last_name;
    $invoice->shipping_address_1 = $orderDetails->shipping_address_1;
    $invoice->shipping_address_2 = $orderDetails->shipping_address_2;
    $invoice->shipping_city =  $orderDetails->shipping_city;
    $invoice->shipping_postcode = $orderDetails->shipping_postcode;
    $invoice->shipping_country = $orderDetails->shipping_country;
    $invoice->shipping_contact = $orderDetails->shipping_contact;
    $invoice->save();

    foreach ($orderItem as $o_item) {
      $orderItem = new InvoiceItem();
      $orderItem->invoice_id = $invoice->id;
      $orderItem->item_id = $o_item->item_id;
      $orderItem->quantity = $o_item->quantity;
      $orderItem->size = $o_item->size ?? NULL;
      $orderItem->price = $o_item->price;
      $orderItem->save();
      // $item->delete();
    }
    // if($stripe->status == 'succeeded')
    // {
    //     $orderDetails->payment_status = 3;
    //     $orderDetails->save();
    //     foreach ($orderItem as $itemDetails) {
    //         $itemStock = ItemStock::where('item_id',$itemDetails->item_id)->first();
    //         $itemStockCount = json_decode($itemStock->stock,true);
    //         $itemStockCount[$itemDetails->size] = $itemStockCount[$itemDetails->size] - $itemDetails->quantity;
    //         $itemStock->stock = json_encode($itemStockCount);
    //         $itemStock->save();
    //     }
    // }

    Session::flash('payment-success', 'Payment successful!');

    return redirect('/');

	}
}
