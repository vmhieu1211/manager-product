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
        'asset_type',
        'person_suggest_id',
        'suggest_date',
        'status',
        'deparment_suggest'
    ];


    public function product()
    {
        return $this->belongsTo(Product::class,'products_name');
    }

    public function personSuggest()
    {
        return $this->belongsTo(User::class,'person_suggest_id');
    }
}
