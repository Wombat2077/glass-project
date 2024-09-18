<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Request;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
    ];
    public function getPhoto()
    {

    }

    public function uploadPhoto(Request $request)
    {

    }
    public function comments(){
        return $this->hasMany('comments');
    }
}
