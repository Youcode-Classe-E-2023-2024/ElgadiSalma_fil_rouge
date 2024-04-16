<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Commande;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
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

            return redirect()->back()->with('success', "Commande ajoutée avec succès");
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

            return redirect()->back()->with('success', "Commande ajoutée avec succès");
        }

        else{
            return redirect()->back()->with('error', "Vous n'avez pas la permission d'ajouter une commande");
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

            return redirect()->back()->with('success', "Commande supprimée avec succès");
        }

        if($user->role_id == '2' && !$commande->accepted)
        {
            $commande->delete();

            return redirect()->back()->with('success', "Commande supprimée avec succès");
        }

        if($user->role_id == '2' && $commande->accepted && $diffInHours > 24)
        {
            $commande->delete();

            return redirect()->back()->with('success', "Commande supprimée avec succès");
        }

        else
        {
            return redirect()->back()->with('error', "Vous ne pouvez pas supprimer cette commande");
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
    
            return redirect()->back()->with('success', "Commande approuvée avec succès");
        }

        else
        {
            return redirect()->back()->with('error', "Vous n'avez pas la permission d'approuver des commandes");
        }
    }
}
