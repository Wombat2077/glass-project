<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function login(Request $request){
        $user = User::where('name', '=', $request['name'])
                    ->orWhere('email', '=', $request['email'])
                    ->where('password', '=', Hash::make($request['password']))
                    ->first();
        if(!$user){
            return response()->json(['error' => 'invalid password or username'], $status=422);
        }
        Auth::login($user, remember: $request['remember']);
        return response()->json(Auth::user()->makeVisible('is_admin'),);
    }
    function register(Request $request){
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);
        Auth::login($user, remember: $request['remember']);
        return response()->json(Auth::user());
    }
    function self(){
        return response()->json(Auth::user());
    }
}
