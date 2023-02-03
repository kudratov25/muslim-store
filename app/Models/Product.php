<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function admins()
    {
        return $this->belongsTo(Admin::class);
    }
    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function product_type_items()
    {
        return $this->belongsTo(Product_type_item::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
