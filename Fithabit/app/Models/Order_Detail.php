<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
