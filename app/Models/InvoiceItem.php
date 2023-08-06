<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    public function itemDetails()
    {
        return $this->belongsTo(Item::class, 'item_id','id');
    }
}
