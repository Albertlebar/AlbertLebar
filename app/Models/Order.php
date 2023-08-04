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

    public static function autoGenerateOrderNumber() {
        $po_detail = self::select('order_number')->orderBy('id', 'desc')->first();
        if (!empty($po_detail)) {
            $expNum = explode('-', $po_detail->order_number);

            for($i=1;$i<=100;$i++)
            {
              $poNum='O' . '-' . sprintf("%07d", $expNum[1] + $i);
              $poExists = self::select('order_number')->where('order_number',$poNum)->first();
              if(is_null($poExists))
              {
                return $poNum;
              }
            }
            return 'O' . '-' . sprintf("%07d", $expNum[1] + 1);
        }
        else {
            return 'O-0000001';
        }
    }
}
