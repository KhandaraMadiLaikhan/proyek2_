<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchases';

    protected $fillable = [
        'client_id',
        'product_id',
    ];

    public function product()  
    {  
        return $this->belongsTo(Product::class);  
    }  
}
