<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_type_item extends Model
{
    use HasFactory;
    protected $fillable =[
        'products_type_id',
        'name_en',
        'name_uz',
        'name_ru',

    ];
    public function product_type(){
        return $this->belongsTo(Product_type::class);
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
