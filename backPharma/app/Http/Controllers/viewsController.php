<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Category;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class viewsController extends Controller
{
    public function medicineList()
    {
        $medicines = Medicine::orderBy('created_at', 'desc')->get();
        return view('Guest.medicineList', ['medicines' => $medicines]);
    }

    public function adminDashboard()
    {
        $me = Auth::user();
        $role = Role::find($me->role_id);
        return view('Admin.adminDashboard',['me'=> $me,'role' => $role]);    
    }

    public function addMedicineView()
    {
        $me = Auth::user();
        $role = Role::find($me->role_id);
        $categories = Category::all();
        return view('Admin.addMedicine',['me'=> $me,'role' => $role, 'categories'=> $categories]);    
    }
}
