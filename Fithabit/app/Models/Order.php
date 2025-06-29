<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function orderDetails()
    {
        return $this->hasMany(Order_Detail::class, 'id_order');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
