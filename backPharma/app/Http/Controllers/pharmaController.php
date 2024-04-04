<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Medicine;
use App\Models\MedicineNumber;
use App\Models\Pharmacie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pharmaController extends Controller
{
    public function addPharma(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'logo' => 'required',
            'city_id' => 'required|integer',
            'adresse' => 'required|string|max:155',
        ]);
        
        $user = Auth::user();

        $pharmacie = Pharmacie::create([
            'name' => $request->name,
            'logo' => $request->logo,
            'city_id' => $request->city_id,
            'adresse' => $request->adresse,
            'created_by' => $user->id,
        ]);

        if ($pharmacie) {
            $editedUser = User::find($user->id);

            $editedUser->completed = true;
            $editedUser->save();    

            if($editedUser)
            {
                $medicines = Medicine::all();
                foreach ($medicines as $medicine) {
                    MedicineNumber::create([
                        'pharmacie_id' => $pharmacie->id,
                        'medicament_id' => $medicine->id,
                        'number' => 0,
                    ]);
                }
                
            }

            return response()->json([
                "message" => "Pharmacy added successfully"
            ], 201);
        } else {
            return response()->json([
                "message" => "Failed to add pharmacy"
            ], 500);
        }
    }



}
