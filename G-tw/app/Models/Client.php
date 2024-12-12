<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'username',
        'password',
        'age',
        'gender',
    ];

    protected $hidden = [
        'password',
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function purchases()  
    {  
        return $this->hasMany(Purchase::class);  
    } 
}
