<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $table = 'tbl_shipping';
    protected $primaryKey = 'shipping_id';
    protected $fillable = [
        'shipping_name',
        'shipping_address',
        'shipping_phone', 
        'shipping_email',
        'orders_id',
        ];
    
        public function order()
    {
        return $this->belongsTo(Order::class, 'orders_id', 'orders_id');
    }
    
}
