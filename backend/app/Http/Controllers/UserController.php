<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    function getUsers(){
        return User::all();
    }
    function getUser($id){
        return User::find($id);
    }
    function editUser(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->name ?? $user->name;
        $user->email = $request->email ?? $user->email;
        $user->email_verified_at = $request->email_verified_at ?? $user->email_verified_at;
        $user->password = Hash::make($request->password) ?? $user->password;
        $user->save();
    }
    function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        return response()->json(['data' => ['message' => "Deleted succesfully"]]);
    }
    function addUser(Request $request){
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'is_admin' => $request['is_admin']
        ]);
        return $user;
    }
    static function makeAdmin(int $id){
        $user = User::find($id);
        $user->is_admin = true;
        $user->save();
        return true;
    }
}
