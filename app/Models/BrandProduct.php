<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_id',
        'brand_name',
        'brand_desc',
        'brand_status'
    ];
}
