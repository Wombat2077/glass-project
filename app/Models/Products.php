<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Request;

class Products extends Model
{
    use HasFactory;

    function getPhoto()
    {
        return Storage::get($this->photoName);
    }

    function uploadPhoto(Request $request)
    {
        return Storage::putFile($this->photoName, $this->photo);
    }
}
