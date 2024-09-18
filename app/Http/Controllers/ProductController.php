<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function addProduct(Request $request){
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|gt:0'
        ]);

        $product = Products::create($request->all());
        return $product;

    }
}
