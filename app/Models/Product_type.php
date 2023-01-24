<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_type extends Model
{
    use HasFactory;
    protected $fillable =[
        'name_en',
        'name_uz',
        'name_ru',
    ];
    public function product_type_items(){
        return $this->hasMany(Product_type_item::class);
    }
}
