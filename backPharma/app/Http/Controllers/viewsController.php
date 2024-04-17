<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class viewsController extends Controller
{
    public function medicineList()
    {
        $medicines = Medicine::orderBy('created_at', 'desc')->get();
        return view('Guest.medicineList', ['medicines' => $medicines]);
    }
}
