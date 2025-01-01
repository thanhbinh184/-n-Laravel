<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'tbl_product';
    protected $fillable = [
        'category_id',
        'brand_id',
        'product_name',
        'product_desc',
        'product_content',
        'product_price',
        'product_status',
    ];
     // Quan hệ với Category
     public function category()
     {
        return $this->belongsTo(CategoryProduct::class, 'category_id');
     }
    }