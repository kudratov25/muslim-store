<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_type_item extends Model
{
    use HasFactory;
    protected $fillable =[
        'products_type_id',
        'name'
    ];
    public function product_type(){
        return $this->belongsTo(Product_type::class);
    }
}
