<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Commande;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class commandeController extends Controller
{
    public function addCommande(Request $request)
    {
        $request->validate([
            'medicament_id' => 'required|integer',
            'number' => 'required|integer',
            'dateExpiration' => 'required|date_format:Y-m-d|after_or_equal:' . now()->format('Y-m-d'),
            'dateDepart' => 'required|date_format:Y-m-d',
            'dateArrive' => 'required|date_format:Y-m-d|after_or_equal:dateDepart|after_or_equal:' . now()->format('Y-m-d'),
        ]);

        $user = Auth::user();

        if ($user->role_id == '3') 
        {
            $commande = Commande::create([
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

        elseif($user->role_id == '2'){
            $commande = Commande::create([
                'pharmacie_id' => $user->pharmacie_id,
                'medicament_id' => $request->input('medicament_id'),
                'number' => $request->input('number'),
                'dateExpiration' => $request->input('dateExpiration'),
                'dateDepart' => $request->input('dateDepart'),
                'dateArrive' => $request->input('dateArrive'),
                'requested_by' =>$user->id,
                'accepted' => true,
            ]);

            return response()->json([
                "message" => "Command added successfully"
            ], 201);
        
        }

        else{
            return response()->json([
                "message" => "U don't have the permission to add command"
            ], 401);
        }
    }

    public function deleteCommande($id)
    {
        $user = Auth::user();

        $commande = Commande::find($id);

        $DateArrive = \Carbon\Carbon::parse($commande->dateArrive);
        $now = \Carbon\Carbon::now();
        $diffInHours = $DateArrive->diffInHours($now);

        if($user->role_id == '3' && !$commande->accepted)
        {
            $commande->delete();

            return response()->json([
                "message" => "Command deleted successfully"
            ], 201);
        }

        // decline
        if($user->role_id == '2' && !$commande->accepted)
        {
            $commande->delete();

            return response()->json([
                "message" => "Command deleted successfully"
            ], 201);
        }

        if($user->role_id == '2' && $commande->accepted && $diffInHours > 24)
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
                "message" => "Command approuved successfully"
            ], 201);
    
        }

        else
        {
            return response()->json([
                "message" => "U don't have the permission to approuve commandes"
            ], 401);
        }
    }

    // public function insertToStock()
    // {
    //     $pendingCommands = Commande::where('dateArrive', '<=', now())->where('accepted', true)->get();

    //     foreach ($pendingCommands as $commande) {
    //         $medicine = Medicine::find($commande->medicament_id);
    //         $prixTotal = $medicine->price * $commande->number;

    //         Stock::create([
    //             'medicament_id' => $commande->medicament_id,
    //             'pharmacie_id' => $commande->pharmacie_id,
    //             'number' => $commande->number,
    //             'price' => $prixTotal,
    //         ]);

    //         // Vous pouvez marquer la commande comme traitée ici si nécessaire
    //     }
    // }

}
