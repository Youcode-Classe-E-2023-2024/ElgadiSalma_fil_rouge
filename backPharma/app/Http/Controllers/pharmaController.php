<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Capitale;
use App\Models\Medicine;
use App\Models\Pharmacie;
use Illuminate\Http\Request;
use App\Models\MedicineNumber;
use Illuminate\Support\Facades\Auth;

class PharmaController extends Controller
{
    public function addPharma(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'logo' => 'required',
            'capitale' => 'required',
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
            $editedUser->pharmacie_id = $pharmacie->id;
            $editedUser->save();    

            if($editedUser)
            {
                $capitale = Capitale::create([
                    'number' => $request->capitale,
                    'pharmacie_id' => $pharmacie->id,
                ]);

                if($capitale)
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
            }

            return redirect()->back()->with('success', "Pharmacie ajoutée avec succès");
        } else {
            return redirect()->back()->with('error', "Échec de l'ajout de la pharmacie");
        }
    }
}
