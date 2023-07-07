<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggest extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'suggest_type',
        'suggest_date',
        'person_suggest_id',
        'state'
    ];


    public function Product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function PersonSuggest()
    {
        return $this->belongsTo(User::class,'person_suggest_id');
    }
}
