<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Capitale;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VenteController extends Controller
{
    public function buyMedicine(Request $request, $id)
    {
        $medicine = Medicine::find($id);
    
        $number = $request->input('number');
    
        $user = Auth::user();
    
        if ($user->role_id == '1') {
            return redirect()->back()->with('error', "Vous n'avez pas la permission d'effectuer cette action");
        } else {
            $editedStock = Stock::where('pharmacie_id', $user->pharmacie_id)
                                ->where('medicament_id', $id)
                                ->first();
    
            if ($editedStock && $editedStock->number >= $number) {
                $editedStock->number -= $number;
                $editedStock->save();

                if($editedStock->number == 0)
                {
                    $editedStock->finished = true;
                    $editedStock->save();
                }
                
                $prixTotal = $number * $medicine->price;

                $editedCapital = Capitale::where('pharmacie_id', $user->pharmacie_id)->first();

                if ($editedCapital) 
                {
                    $editedCapital->number = $editedCapital->number - $prixTotal;
                    $editedCapital->save();
                }
    
                return redirect()->back()->with('success', "Médicament acheté avec succès. Prix total : $prixTotal");
            } 
            elseif($editedStock->number == 0)
            {
                $editedStock->finished = true;
                $editedStock->save();
            }
            else {
                return redirect()->back()->with('error', "Stock insuffisant");
            }
        }
    }
    
}
