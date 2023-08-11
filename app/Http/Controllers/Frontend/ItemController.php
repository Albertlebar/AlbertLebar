<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Item;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\ItemStock;

class ItemController extends Controller
{
   public function index(Request $request)
   {
   		$pagination = 9;
      
      if($request->item_type == 'sale')
      {
        $items = Item::where('is_sale',1)->where('is_active',1);
      }else{
        $category = Category::where('title',$request->item_type)->first();
        $items = Item::where('category_id',$category->id)->where('is_active',1);
      }


      if ($request->sort == 'low_high') {
          $items = $items->orderBy('total_retail')->paginate($pagination);
      } elseif (request()->sort == 'high_low') {
          $items = $items->orderBy('total_retail', 'desc')->paginate($pagination);
      } else {
          $items = $items->paginate($pagination);
      } 
      return View::make('frontend.item.list', compact('items'));
   }

   public function itemDetails(Request $request)
   {
      $item = Item::where('id',$request->item_id)->first();
      $itemSize = ItemStock::where('item_id',$request->item_id)->get()->pluck('size', 'id')->toArray();
      $view = View::make('frontend.item.quick_view', compact('item','itemSize'))->render();
      return response()->json(['html' => $view]);
   }

   public function addToCart(Request $request)
   {
      $item = Item::where('id', $request->item_id)->first();
    
      if(Auth::check())
      {
        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->item_id = $item->id;
        $cart->quantity = $request->item_qty;
        $cart->size = $request->item_size;
        $cart->price = $request->item_qty * $item->total_retail;
        $cart->save(); 
      }else{
        $cart = $request->session()->get('cart');
        $cart[$request->item_id] = [
        'item_id' => $item->id,
        'item_title' => $item->item_title,
        'quantity' => $request->item_qty,
        'size' => $request->item_size,
        'images' => $item->photo_0,
        'price' => $item->total_retail,
        ];
        $request->Session()->put('cart', $cart);
      }
      return true;
    }

    public function removeToCart(Request $request)
    {
      if(Auth::check())
      {
        $cart = Cart::where('user_id',Auth::user()->id)->where('item_id',$request->item_id)->first();
        $cart->delete();
      }else{
        $cart = $request->session()->get('cart');
        unset($cart[$request->item_id]);
        session()->put('cart', $cart);
      }
      
      return true;
    }

    public function sizeGuide()
    {
      return view('frontend.item.size_guide');
    }
}
