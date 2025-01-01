<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'tbl_orders';
    protected $fillable = [
        'orders_id',
        'customers_id', 
        'shipping_id',
        'orders_status', 
        'total_price', 
        'order_date', 
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id'); // Đảm bảo đúng tên phương thức
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'orders_id'); 
    }
    public function shipping()
    {
        return $this->hasOne(Shipping::class, 'orders_id', 'orders_id');
    }
}
