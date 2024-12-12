<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'min_age',
        'max_age',
        'price',
        'description',
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
}

