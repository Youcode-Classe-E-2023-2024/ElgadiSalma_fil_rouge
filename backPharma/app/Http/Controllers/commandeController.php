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
            'commandes.*.medicament_id' => 'required|integer',
            'commandes.*.number' => 'required|integer',
            'commandes.*.dateExpiration' => 'required|date_format:Y-m-d|after_or_equal:' . now()->format('Y-m-d'),
            'commandes.*.dateDepart' => 'required|date_format:Y-m-d',
            'commandes.*.dateArrive' => 'required|date_format:Y-m-d|after_or_equal:dateDepart|after_or_equal:' . now()->format('Y-m-d'),
        ], [
            'commandes.*.medicament_id.required' => 'Le champ médicament est requis.',
            'commandes.*.medicament_id.integer' => 'Le champ médicament doit être un entier.',
            'commandes.*.number.required' => 'Le champ nombre est requis.',
            'commandes.*.number.integer' => 'Le champ nombre doit être un entier.',
            'commandes.*.dateExpiration.required' => 'Le champ date d\'expiration est requis.',
            'commandes.*.dateExpiration.date_format' => 'Le champ date d\'expiration doit être au format Y-m-d.',
            'commandes.*.dateExpiration.after_or_equal' => 'Le champ date d\'expiration doit être postérieur ou égal à aujourd\'hui.',
            'commandes.*.dateDepart.required' => 'Le champ date de départ est requis.',
            'commandes.*.dateDepart.date_format' => 'Le champ date de départ doit être au format Y-m-d.',
            'commandes.*.dateArrive.required' => 'Le champ date d\'arrivée est requis.',
            'commandes.*.dateArrive.date_format' => 'Le champ date d\'arrivée doit être au format Y-m-d.',
            'commandes.*.dateArrive.after_or_equal' => 'Le champ date d\'arrivée doit être postérieur ou égal à la date de départ et à aujourd\'hui.',
        ]);
        
    
        $user = Auth::user();
    
        foreach ($request->input('commandes') as $commandeData) {
            Commande::create([
                'pharmacie_id' => $user->pharmacie_id,
                'medicament_id' => $commandeData['medicament_id'],
                'number' => $commandeData['number'],
                'dateExpiration' => $commandeData['dateExpiration'],
                'dateDepart' => $commandeData['dateDepart'],
                'dateArrive' => $commandeData['dateArrive'],
                'requested_by' => $user->id,
                'accepted' => $user->role_id == '2' ? true : false,
            ]);
        }
    
        return redirect()->back()->with('success', "Commandes ajoutées avec succès");
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
