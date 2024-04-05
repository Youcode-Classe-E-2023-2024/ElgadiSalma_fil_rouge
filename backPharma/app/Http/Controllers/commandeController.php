<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class commandeController extends Controller
{
    public function addCommande(Request $request)
    {
        $request->validate([
            'medicament_id' => 'required|integer',
            'number' => 'required|integer',
            'dateDepart' => 'required|date',
            'dateArrive' => 'required|date_format:d-m-y|after_or_equal:dateDepart|after_or_equal:' . now()->format('d-m-y'),
        ]);

        $user = Auth::user();

        Commande::create([
            'pharmacie_id' => $user->pharmacie_id,
            'medicament_id' => $request->input('medicament_id'),
            'number' => $request->input('number'),
            'dateDepart' => $request->input('dateDepart'),
            'dateArrive' => $request->input('dateArrive'),
            'requested_by' =>$user->id,
        ]);

        return response()->json([
            "message" => "Command added successfully"
        ], 201);
    }
}
