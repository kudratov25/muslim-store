<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_id',
        'sub_category_id',
        'color_id',
        'rate_id',
        'image',
        'name',
        'name_uz',
        'name_ru',
        'short_text',
        'short_text_uz',
        'short_text_ru',
        'text',
        'text_uz',
        'text_ru',
        'quantity',
        'price',
        'size'
    ];
}
