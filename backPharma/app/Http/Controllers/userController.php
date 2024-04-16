<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
                'completed' => false,
            ]);
        } elseif ($user->role_id == '2' && $user->completed == true) {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'photo' => $request->photo,
                'password' => bcrypt($request->password),
                'role_id' => '3',
                'pharmacie_id' => $user->pharmacie_id,
            ]);
        } else {
            return redirect()->back()->withErrors(["You don't have the permission to add someone"]);
        }

        return redirect()->back()->with('success', "Utilisateur supprimé avec succès");
    }

    public function deleteUser($id)
    {
        $user = Auth::user();

        $deletedUser = User::find($id);

        if (!$deletedUser) {
            return redirect()->back()->withErrors(['User not found']);
        }

        if ($deletedUser->role_id == '2') {
            if ($user->role_id == '1') {
                $deletedUser->delete();
            } else {
                return redirect()->back()->withErrors(["You don't have the permission to delete $deletedUser->name"]);
            }
        } elseif ($deletedUser->role_id == '3') {
            if ($user->role_id == '3') {
                return redirect()->back()->withErrors(["You don't have the permission to delete $deletedUser->name"]);
            } else {
                $deletedUser->delete();
            }
        } else {
            return redirect()->back()->withErrors(["You don't have the permission to delete $deletedUser->name"]);
        }

        return redirect()->route('success')->with('message', 'User deleted successfully');
    }

    public function editUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'photo' => 'required',
            'password' => 'required',
        ]);

        $user = Auth::user();

        $editedUser = User::find($id);

        if (!$editedUser) {
            return redirect()->back()->withErrors(['User not found']);
        }

        if ($editedUser->role_id == '2') {
            if ($user->role_id == '1') {
                $editedUser->name = $request->input('name');
                $editedUser->email = $request->input('email');
                $editedUser->photo = $request->input('photo');
                $editedUser->password = bcrypt($request->password);

                $editedUser->save();
            } else {
                return redirect()->back()->withErrors(["You don't have the permission to edit $editedUser->name"]);
            }
        } elseif ($editedUser->role_id == '3') {
            if ($user->role_id == '3') {
                return redirect()->back()->withErrors(["You don't have the permission to edit $editedUser->name"]);
            } else {
                $editedUser->name = $request->input('name');
                $editedUser->email = $request->input('email');
                $editedUser->photo = $request->input('photo');
                $editedUser->password = bcrypt($request->password);

                $editedUser->save();
            }
        } else {
            return redirect()->back()->withErrors(["You don't have the permission to edit $editedUser->name"]);
        }

        return redirect()->route('success')->with('message', 'User edited successfully');
    }
}
