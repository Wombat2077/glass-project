<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    function getComments(Request $request){
        return Comment::all();
    }
    function addComment(Request $request){
        $request->validate([
            'text' =>  'required',
            "user_id" => 'required',
            "product_id" => 'required'
        ]);
        $comment = Comment::create($request->all());
        return $comment;
    }
    function editComment(Request $request, int $id){
        $request->validate([
            'text' =>  'required',
        ]);
        $comment = Comment::find($id);
        if(!$comment){
            return response()->json(['error' => "unable to edit non-existent comment"], status: 404 );
        }
        if(Auth::user()->id != $comment->user()->id | !Auth::user()->is_admin){
            return response()->json(['error' => "You must be an author of comment or administrator"], status: 403 );
        }
        $comment->text = $request['text'];
        $comment->save();
        return $comment;
    }
    function deleteComment(int $id){
        $comment = Comment::find($id);
        if(!$comment){
            return response()->json(['error' => "unable to delete non-existent comment"], status: 404 );
        }
        if(Auth::user()->id != $comment->user()->id | !Auth::user()->is_admin){
            return response()->json(['error' => "You must be an author of comment or administrator"], status: 403 );
        }
        $comment->delete();
        return response()->json(['data' => ['message' => "Deleted succesfully"]]);
    }
}
