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
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'password' => 'required',
        ]);

        
        $image = $request->file('photo');
        $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $imageExtension = $image->getClientOriginalExtension();
        $imageFullName = $imageName . '_' . time() . '.' . $imageExtension;

        $image->storeAs('images/users', $imageFullName, 'public');

        $user = Auth::user();

        if ($user->role_id == '1') {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'photo' => $imageFullName,
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

        return redirect()->back()->with('message', 'User deleted successfully');
    }

    public function editUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ], [
            'name.required' => 'Veuillez entrer le nom',
            'email.required' => 'Veuillez entrer l\'adresse email',
            'email.email' => 'Veuillez entrer une adresse email valide.',
            'email.unique' => 'Already exist',
        ]);
    
        $user = Auth::user();
        $editedUser = User::find($id);
    
        if (!$editedUser) {
            return redirect()->back()->withErrors(['User not found']);
        }
    
        if ($editedUser->role_id == '2') {
            if ($user->role_id != '1') {
                return redirect()->back()->withErrors(["la permission denied"]);
            }
        } elseif ($editedUser->role_id == '3') {
            if ($user->role_id != '3') {
                return redirect()->back()->withErrors(["Permission denied"]);
            }
        }
    
        $editedUser->name = $request->input('name');
        $editedUser->email = $request->input('email');
        $editedUser->save();
    
        return redirect()->back()->with('message', 'Utilisateur modifié avec succès');
    }
    
}
