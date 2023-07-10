<?php

namespace App\Models;

use App\Models\User;
use App\Models\Suggest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $filable = [
        'product_name',
        'amount',
        'money',
        'status',
        'purchase_date',
        'delivery_date',
        'person_delivery_id'
    ];

    public function personDelivery()
    {
        return $this->belongsTo(User::class, 'person_delivery_id');
    }

    public function suggest()
    {
        return $this->hasMany(Suggest::class, 'product_id');
    }


    // public function tinhTienKhauHao()
    // {
    //     $ = 1;
    //     $productType->$this->loaiSanPham;
    //     $tienKhauHao =($this->so_luong * $productType->ty_le_khau_hao)*$soNam;
    // }
}
