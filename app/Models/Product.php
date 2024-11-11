<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'category_id'
    ];

    protected function scopeProductsGreaterThan($query,$value){
        if ($value != '' or $value != null or !empty($value)) {
            $query->where('price', '>', "$value");
        }
    }
}
