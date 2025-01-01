<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'tbl_order_details';
    protected $fillable = [
        'order_detail_id',
        'orders_id', 
        'product_id',
        'product_name',
        'product_price'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Quan hệ với Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'orders_id');
    }
}
