<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderContent extends Model
{
    use HasFactory;
    protected $fillable = [
        "order_id",
        "product_id",
        "count"
    ];
    public function product(){
        return $this->belongsTo(Products::class);
    }
    protected $with = [
        "product"
    ];
}
