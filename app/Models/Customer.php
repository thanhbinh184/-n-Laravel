<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'tbl_customers'; 

    protected $primaryKey = 'customers_id'; 
    public $timestamps = true; 

    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_password',
        'customer_phone',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'customers_id', 'customers_id');
    }
}
