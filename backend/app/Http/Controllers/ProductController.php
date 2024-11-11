<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    function getProducts(){
        return Products::all();
    }
    function getProduct(int $id) {
        return Products::where("id", "=", $id)->with("comments")->get() ?? response()->json([], status: 404 );
    }
    private function storePhoto(Request $request){
        if(!$request->file('photo')){
            return null;
        }
        $file = $request->file('photo');
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('/public/products'), $filename);
        return $filename;
    }
    function addProduct(Request $request){
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|gt:0'
        ]);

        $product = Products::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'price' => $request['price']
        ]);
        $product->photo = $this->storePhoto($request);
        $product->save();
        return $product;

    }
    function editProduct(Request $request, int $id){
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|gt:0'
        ]);
        $product = Products::find($id);
        $product->name = $request['name'];
        $product->price = $request['price'];
        $product->decroption = $request['description'];
        $file = $this->storePhoto($request);
        if($this->storePhoto($request)){
            $product->photo($file);
        }
        return $product;
    }
    function deleteProduct(Request $request, int $id){
        $product = Products::find($id);
        $product->delete();
        return response()->json(['data' => ['message' => "Deleted succesfully"]]);
    }
}
