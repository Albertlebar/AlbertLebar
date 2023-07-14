<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Item;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;

class ItemController extends Controller
{
   public function index(Request $request)
   {
   		$pagination = 9;
   		$category = Category::where('title',$request->item_type)->first();
      	$items = Item::where('category_id',$category->id);
      	$items = $items->paginate($pagination);
      	return View::make('frontend.item.list', compact('items'));
   }

   public function itemDetails(Request $request)
   {
		$item = Item::where('id',$request->item_id)->first();
        $view = View::make('frontend.item.quick_view', compact('item'))->render();
        return response()->json(['html' => $view]);
   }
}
