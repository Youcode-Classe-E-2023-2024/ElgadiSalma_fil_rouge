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
        $number = $request->input('number') ?? 1;
        $user = Auth::user();
    
        if ($user->role_id == '1') {
            return redirect()->back()->with('error', "Vous n'avez pas la permission d'effectuer cette action");
        }
    
        $editedCapital = Capitale::where('pharmacie_id', $user->pharmacie_id)->first();
        $prixTotal = $number * $medicine->price;
    
        if ($request->has('buyItem')) {
            $editedStock = Stock::where('pharmacie_id', $user->pharmacie_id)
                ->where('medicament_id', $id)
                ->where('finished', false)
                ->oldest('created_at')
                ->first();
    
            if ($editedStock && $editedStock->number >= $number) {
                $editedStock->number -= $number;
                $editedStock->save();
    
                if ($editedStock->number == 0) {
                    $editedStock->finished = true;
                    $editedStock->save();
                }
    
                $editedCapital->number += $prixTotal;
                $editedCapital->save();
    
                return redirect()->back()->with('success', "Médicament vendu avec succès. Prix total : $prixTotal");
            } else {
                return response()->json(['error' => 'Stock insuffisant']);
            }
        } else {
            $editedStock = Stock::where('pharmacie_id', $user->pharmacie_id)
                ->where('medicament_id', $id)
                ->latest('created_at')
                ->first();
    
            if ($editedStock->finished === true) {
                $editedStock->finished = false; 
            }
    
            $editedStock->number += $number;
            $editedStock->save();
    
            $editedCapital->number -= $prixTotal;
            $editedCapital->save();
    
            return redirect()->back()->with('success', "Stock mis à jour avec succès.");
        }
    }
    
}
