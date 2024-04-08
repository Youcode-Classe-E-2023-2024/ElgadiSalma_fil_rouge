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
            'dateExpiration' => 'required|date|after_or_equal:' . now()->format('d-m-y'),
            'dateDepart' => 'required|date',
            'dateArrive' => 'required|date_format:d-m-y|after_or_equal:dateDepart|after_or_equal:' . now()->format('d-m-y'),
        ]);

        $user = Auth::user();

        Commande::create([
            'pharmacie_id' => $user->pharmacie_id,
            'medicament_id' => $request->input('medicament_id'),
            'number' => $request->input('number'),
            'dateExpiration' => $request->input('dateExpiration'),
            'dateDepart' => $request->input('dateDepart'),
            'dateArrive' => $request->input('dateArrive'),
            'requested_by' =>$user->id,
        ]);

        return response()->json([
            "message" => "Command added successfully"
        ], 201);
    }

    public function deleteCommande($id)
    {
        $user = Auth::user();

        $commande = Commande::find($id);

        if($user->id === '3' && !$commande->accepted)
        {
            $commande->delete();

            return response()->json([
                "message" => "Command deleted successfully"
            ], 201);
        }

        $DateArrive = \Carbon\Carbon::createFromFormat('d-m-y', $commande->dateArrive);
        $now = \Carbon\Carbon::now();
        $diffInHours = $DateArrive->diffInHours($now);

        if($user->id === '2' && $commande->accepted && $diffInHours > 24)
        {
            $commande->delete();

            return response()->json([
                "message" => "Command deleted successfully"
            ], 201);
        }

        else
        {
            return response()->json([
                "message" => "U can't delete this command"
            ], 401);
        }
    }

    public function approuveCommande($id)
    {
        $user = Auth::user();

        if($user->id == '2')
        {
            $commande = Commande::findOrFail($id);

            $commande->accepted = true;
            
            $commande->save();
    
            return response()->json([
                "message" => "Command deleted successfully"
            ], 201);
    
        }

        else
        {
            return response()->json([
                "message" => "U don't have the permission to approuve commandes"
            ], 401);
        }
    }

    public function declineCommande($id)
    {
        $commande = Commande::find($id);

        $user = Auth::user();

        if($user->id == '2' && !$commande->accepted)
        {
            $commande->delete();
    
            return response()->json([
                "message" => "Command deleted successfully"
            ], 201);
    
        }

        else
        {
            return response()->json([
                "message" => "Error"
            ], 401);
        }
    }
}
