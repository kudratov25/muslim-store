<?php

namespace App\Models;

use App\Admin\Adminauth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;


class Admin extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'role_id',
        'name',
        'surname',
        'email',
        'photo',
        'password',
        'phone_number',
        'address',
        'pass_number',
        'pass_photo',
        'status'
    ];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
