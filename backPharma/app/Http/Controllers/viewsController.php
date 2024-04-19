<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Category;
use App\Models\Medicine;
use App\Models\Pharmacie;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
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
        $categories = Category::paginate(2, ['*'], 'category');
        $Users = User::paginate(2, ['*'], 'users');
        $Pharmacies = Pharmacie::paginate(2, ['*'], 'pharmacies');
        $Medicines = Medicine::all();
        $me = Auth::user();
        $role = Role::find($me->role_id);
        $data = [
            'totalMedicines' => Medicine::count(),
            'totalCategories' => Category::count(),
            'totalPharmacies' => Pharmacie::count(),
            'totalUsers' => User::count(),
        ];


        return view('Admin.adminDashboard', [
            'me' => $me,
            'role' => $role,
            'data' => $data,
            'categories' => $categories,
            'Users' => $Users,
            'Pharmacies' => $Pharmacies,
            'Medicines' => $Medicines
        ]);
    }


    public function addMedicineView()
    {
        $me = Auth::user();
        $role = Role::find($me->role_id);
        $categories = Category::all();
        return view('Admin.addMedicine', ['me' => $me, 'role' => $role, 'categories' => $categories]);
    }

    public function addUserView()
    {
        $me = Auth::user();
        $role = Role::find($me->role_id);
        return view('Admin.addUser', ['me' => $me, 'role' => $role]);
    }

    public function addCategoryView()
    {
        $me = Auth::user();
        $role = Role::find($me->role_id);
        return view('Admin.addCategory', ['me' => $me, 'role' => $role]);
    }
}
