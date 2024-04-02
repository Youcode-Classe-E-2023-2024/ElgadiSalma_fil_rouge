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

    public function deleteUser($id)
    {
        $user = Auth::user();

        $deletedUser = User::find($id);

        if (!$deletedUser) {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }

        if ($deletedUser->role_id == '2') {
            if ($user->role_id == '1') {
                $deletedUser->delete();
            } else {
                return response()->json([
                    "message" => "You don't have the permission to delete $deletedUser->name "
                ], 401);
            }
        }

        elseif ($deletedUser->role_id == '3') {
            if ($user->role_id == '3') {
                return response()->json([
                    "message" => "You don't have the permission to delete $deletedUser->name "
                ], 401);
            } else {
                $deletedUser->delete();
            }
        }

        else
        {
            return response()->json([
                "message" => "You don't have the permission to delete $deletedUser->name "
            ], 401);
        }
    }

    public function editUser(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'photo' => 'required',
            'password' => 'required',
        ]);

        $user = Auth::user();

        $editedUser = User::find($id);

        if (!$editedUser) {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }

        if ($editedUser->role_id == '2') {
            if ($user->role_id == '1') {
                $editedUser-> name = $request->input('name');
                $editedUser-> email = $request->input('email');
                $editedUser-> photo = $request->input('photo');
                $editedUser-> password = bcrypt($request->password);
        
                $editedUser->save();            
            } else {
                return response()->json([
                    "message" => "You don't have the permission to edit $editedUser->name "
                ], 401);
            }
        }

        elseif ($editedUser->role_id == '3') {
            if ($user->role_id == '3') {
                return response()->json([
                    "message" => "You don't have the permission to edit $editedUser->name "
                ], 401);
            } else {
                $editedUser-> name = $request->input('name');
                $editedUser-> email = $request->input('email');
                $editedUser-> photo = $request->input('photo');
                $editedUser-> password = bcrypt($request->password);
        
                $editedUser->save();                   
            }
        }

        else
        {
            return response()->json([
                "message" => "You don't have the permission to edit $editedUser->name "
            ], 401);
        }
    }

}
