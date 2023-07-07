<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    protected $filable = [
        'product_type_name',
        'ty_le_khau_hao'
    ];

    public function Product()
    {
        return $this->hasMany(Product::class,'product_type_id');
    }
}
