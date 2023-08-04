<?php

namespace App\Models;

use App\Models\Category;
use App\Models\ItemImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory,SoftDeletes;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id','id');
    }

    public function itemImage()
    {
        return $this->hasMany(ItemImage::class, 'item_id','id');	
    }

    public function itemMainImage()
    {
        return $this->hasMany(ItemImage::class, 'item_id','id')->where('is_main_image',1);	
    }

    public function itemQty()
    {
    	return $this->hasMany(ItemStock::class,'item_id','id');
    }

    public function itemSize()
    {
        return $this->hasMany(ItemStock::class, 'item_id','id');
    }
}
