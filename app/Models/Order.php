<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class, 'order_id','id');	
    }

    public function orderUser()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
