<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public function orderItem()
    {
        return $this->hasMany(InvoiceItem::class, 'invoice_id','id');	
    }

    public function orderUser()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public static function autoGenerateInvoiceNumber() {
        $po_detail = self::select('invoice_number')->orderBy('id', 'desc')->first();
        if (!empty($po_detail)) {
            $expNum = explode('-', $po_detail->invoice_number);

            for($i=1;$i<=100;$i++)
            {
              $poNum='I' . '-' . sprintf("%07d", $expNum[1] + $i);
              $poExists = self::select('invoice_number')->where('invoice_number',$poNum)->first();
              if(is_null($poExists))
              {
                return $poNum;
              }
            }
            return 'I' . '-' . sprintf("%07d", $expNum[1] + 1);
        }
        else {
            return 'I-0000001';
        }
    }
}
