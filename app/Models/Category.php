<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'tbl_category_product';
    protected $fillable = [
        'category_id',
        'category_name',
        'category_desc',
        'category_status',
    ];

   // Quan hệ với Product
   public function products()
   {
        return $this->hasMany(Product::class, 'category_id');
   }
}
