<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Capitale;
use App\Models\Commande;
use App\Models\Medicine;
use Illuminate\Http\Request;

class stockController extends Controller
{
    public function addToStock()
    {
        $pendingCommands = Commande::where('dateArrive', '<=', now())->where('accepted', true)->where('addedToStock', false)->get();

        foreach ($pendingCommands as $commande) {
            $commande->addedToStock = true;
            $commande->save();

            $medicine = Medicine::find($commande->medicament_id);
            $prixTotal = $medicine->price * $commande->number;

            $stock = Stock::create([
                'medicament_id' => $commande->medicament_id,
                'pharmacie_id' => $commande->pharmacie_id,
                'initialNumber' => $commande->number,
                'number' => $commande->number,
                'price' => $prixTotal,
            ]);

            if ($stock) {
                $editedCapital = Capitale::where('pharmacie_id', $commande->pharmacie_id)->first();

                if ($editedCapital) {
                    $editedCapital->number = $editedCapital->number - $prixTotal;
                    $editedCapital->save();
                }
            }
        }

        return redirect()->back()->with('success', "Médicament non trouvé");
    }

}
