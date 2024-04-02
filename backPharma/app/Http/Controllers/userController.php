<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function addUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'photo' => 'required',
            'password' => 'required',
        ]);
        $user = Auth::user();

        if ($user->role_id == '1') {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'photo' => $request->photo,
                'password' => bcrypt($request->password),
                'role_id' => '2',
            ]);
        } elseif ($user->role_id == '2') {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'photo' => $request->photo,
                'password' => bcrypt($request->password),
                'role_id' => '3',
            ]);
        }
        
        return response()->json([
            "message" => "User added successfully"
        ], 201);
    }



}
