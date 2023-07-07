<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $filable =[
        'product_name',
        'amount',
        'purchase_date',
        'delivery_date',
        'person_delivery_id'
    ];

    public function ProductType()
    {
        return $this->belongsTo(ProductType::class,'product_type_id');
    }

    public function PersonDelivery()
    {
        return $this->belongsTo(User::class,'person_delivery_id');
    }
    
    // public function tinhTienKhauHao()
    // {
    //     $ = 1;
    //     $productType->$this->loaiSanPham;
    //     $tienKhauHao =($this->so_luong * $productType->ty_le_khau_hao)*$soNam;
    // }
}
