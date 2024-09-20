<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Comment;
use Request;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'photo'
    ];
    public function comments(){
        return $this->hasMany(related: Comment::class, foreignKey: 'product_id');
    }
    protected $with = [
        'comments'
    ];
}
