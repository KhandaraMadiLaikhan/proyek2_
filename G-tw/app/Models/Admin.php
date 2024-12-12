<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'email',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
