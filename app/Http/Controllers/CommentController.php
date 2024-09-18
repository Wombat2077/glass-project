<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function getComments(Request $request, string $id){
        return Comment::all();
    }
    function editComment(Request $request, string $id){

    }
    function addComment(Request $request){
        $request->validate([
            'text' =>  'required',
            "user_id" => 'required',
            "product_id" => 'required'
        ]);

    }
}
