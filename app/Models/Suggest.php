<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggest extends Model
{
    use HasFactory;

    protected $fillable = [
        'products_name',
        'amount',
        'money',
        'suggest_type',
        'suggest_date',
        'satus'
    ];


    public function Product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

}
