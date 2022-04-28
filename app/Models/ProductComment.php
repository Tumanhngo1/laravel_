<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    use HasFactory;
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
}
