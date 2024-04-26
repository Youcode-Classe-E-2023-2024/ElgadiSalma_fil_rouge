<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Role;
use App\Models\Stock;
use App\Models\Capitale;
use App\Models\Category;
use App\Models\Commande;
use App\Models\Medicine;
use App\Models\Pharmacie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class viewsController extends Controller
{

    public function homePage()
    {
        $pharmacies = Pharmacie::with('city')->get();
        $categories = Category::all();
        return view(
            'Guest.homePage',
            [
                'categories' => $categories,
                'pharmacies' => $pharmacies
            ]
        );
    }

    public function medicineListe()
    {
        $categories = Category::all();
        $medicines = Medicine::orderBy('created_at', 'desc')->get();
        return view('Guest.medicineList', ['medicines' => $medicines, 'categories' => $categories]);
    }

    public function medicineUser()
    {

        $medicines = Medicine::orderBy('created_at', 'desc')->get();
        $me = Auth::user();
        $role = Role::find($me->role_id);

        return view('Moderateur.medicineUser', [
            'me' => $me,
            'role' => $role,
            'medicines' => $medicines
        ]);
    }

    public function adminDashboard()
    {
        $pharmaStatistics = Pharmacie::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as pharma_count')
        )
            ->groupBy('date')
            ->get();

        $medicineStatistics = medicine::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as medicine_count')
        )
            ->groupBy('date')
            ->get();

        $categories = Category::orderBy('created_at', 'desc')->paginate(2, ['*'], 'categories');
        $Users = User::orderBy('created_at', 'desc')->where('role_id','2')->paginate(2, ['*'], 'users');
        $Pharmacies = Pharmacie::orderBy('created_at', 'desc')->paginate(2, ['*'], 'pharmacies');
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
            'Medicines' => $Medicines,
            'pharmaStatistics' => $pharmaStatistics,
            'medicineStatistics' => $medicineStatistics
        ]);
    }


    public function moderateurDashboard()
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
            'totalUsers' => User::where('pharmacie_id', $me->pharmacie_id)->count(),
            'totalCommande' => Commande::where('accepted', false)->where('pharmacie_id', $me->pharmacie_id)->count(),
        ];

        $capitale = Capitale::where('pharmacie_id', $me->pharmacie_id)->get();

        $stockStatistics = Stock::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as stock_count')
        )
            ->groupBy('date')
            ->where('pharmacie_id', $me->pharmacie_id)
            ->get();

        $employees = User::where('pharmacie_id', $me->pharmacie_id)->orderBy('created_at', 'asc')->paginate(4, ['*'], 'users');
        $commandes = Commande::with('medicine')->where('pharmacie_id', $me->pharmacie_id)->where('accepted', false)->orderBy('created_at', 'asc')->paginate(4, ['*'], 'commandes');

        // dd($commandes);
        return view('Moderateur.moderateurDash', [
            'me' => $me,
            'role' => $role,
            'data' => $data,
            'categories' => $categories,
            'Users' => $Users,
            'Pharmacies' => $Pharmacies,
            'Medicines' => $Medicines,
            'stockStatistics' => $stockStatistics,
            'employees' => $employees,
            'capitale' => $capitale,
            'commandes' => $commandes
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

        return view('Moderateur.addUserM', ['me' => $me, 'role' => $role]);
    }

    public function addCategoryView()
    {
        $me = Auth::user();
        $role = Role::find($me->role_id);
        return view('Admin.addCategory', ['me' => $me, 'role' => $role]);
    }

    public function venteView()
    {
        $medicines = Medicine::with('category')->orderBy('created_at', 'desc')->get();
        $me = Auth::user();
        $role = Role::find($me->role_id);

        // calcule la somme des valeurs de la colonne "number" pour les columns ayant le même "medicament_id" dans la table "Stock".
        $stocks = Stock::select('medicament_id', DB::raw('SUM(number) as total_number'))
            ->where('finished', false)
            ->where('pharmacie_id', $me->pharmacie_id)
            ->groupBy('medicament_id')
            ->get();

        $stockTotals = [];
        if ($stocks) {
            foreach ($stocks as $stock) {
                $stockTotals[$stock->medicament_id] = $stock->total_number ?? 0;
            }
        }

        // dd($stockTotals);


        return view('Moderateur.medicineUser', [
            'me' => $me,
            'role' => $role,
            'medicines' => $medicines,
            'stockTotals' => $stockTotals,
        ]);
    }

    public function pharmaAddView()
    {
        $cities = City::all();

        return view('Moderateur.addPharma', ['cities' => $cities]);
    }

    public function addCommandeView()
    {
        $medicines = Medicine::with('category')->orderBy('created_at', 'desc')->get();
        $me = Auth::user();
        $role = Role::find($me->role_id);


        // $categories = Category::all();

        return view('Moderateur.addCommande', [
            'me' => $me,
            'role' => $role,
            'medicines' => $medicines
        ]);
    }

    public function showMedicine($id)
    {
        $medicine = Medicine::findOrFail($id);
        $relatedMedicines = Medicine::with('category')->where('category_id', $medicine->category_id)->get();
        return view('Guest.detailsMedicine', [
            'medicine' => $medicine,
            'relatedMedicines' => $relatedMedicines
        ]);
    }

    public function addUserViewAdmin()
    {
        $me = Auth::user();
        $role = Role::find($me->role_id);

        return view('Admin.addUser', ['me' => $me, 'role' => $role]);
    }

    public function medicineListAdmin()
    {
        $me = Auth::user();
        $role = Role::find($me->role_id);
        $medicines = Medicine::all();
        $categories = Category::all();

        return view('Admin.listAdmin', ['me' => $me, 'role' => $role, 'medicines'=>$medicines , 'categories'=>$categories]);
    }

    public function editMedicineView($id)
    {
        $me = Auth::user();
        $role = Role::find($me->role_id);
        $medicine = Medicine::findOrFail($id);
        $categories = Category::all();

        return view('Admin.editMedicine', ['me' => $me, 'role' => $role, 'medicine'=>$medicine, 'categories'=> $categories]);
    }
}
