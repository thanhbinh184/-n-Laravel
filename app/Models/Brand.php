<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'tbl_brand_product';
    protected $fillable = [
        'brand_id',
        'brand_name',
        'brand_desc',
        'brand_status',
    ];
}
