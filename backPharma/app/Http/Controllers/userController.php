<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function addUser(Request $request)
    {
        // $defaultRole = Role::where('name', 'user')->first();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => '2',
        ]);

        return response()->json([
            "message" => "User added successfully"
        ], 201);
    }
}
