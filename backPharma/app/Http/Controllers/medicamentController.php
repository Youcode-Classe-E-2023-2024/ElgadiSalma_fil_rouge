<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Medicine;
use App\Models\Pharmacie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MedicamentController extends Controller
{
    public function addMedicine(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'category' => 'required|integer',
            'expiration' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $image = $request->file('image');
        $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $imageExtension = $image->getClientOriginalExtension();
        $imageFullName = $imageName . '_' . time() . '.' . $imageExtension;

        $image->storeAs('images/medicines', $imageFullName, 'public');

        $user = Auth::user();

        if ($user->role_id == '1') {
            $medicine = Medicine::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'image' => $imageFullName,
                'category_id' => $request->input('category'),
                'expiration' => $request->input('expiration'),
            ]);

            if ($medicine) {
                $pharmacies = Pharmacie::all();
                foreach ($pharmacies as $pharmaId) {
                    Stock::create([
                        'pharmacie_id' => $pharmaId->id,
                        'medicament_id' => $medicine->id,
                        'initialNumber' => 0,
                        'number' => 0,
                        'finished' => true,
                        'price' => '0',
                    ]);
                }
            }

            return redirect()->back()->with('success', "Médicament ajouté avec succès");
        } else {
            return redirect()->back()->with('error', "Vous n'avez pas la permission d'ajouter un médicament");
        }
    }

    public function editMedicine(Request $request, $id)
    {
        $medicine = Medicine::find($id);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'expiration' => 'required',
            'image' => 'required|image', 
        ], [
            'name.required' => 'Veuillez entrer le nom',
            'description.required' => 'Veuillez entrer la description',
            'price.required' => 'Veuillez entrer le prix',
            'category.required' => 'Veuillez sélectionner une catégorie',
            'expiration.required' => 'Veuillez sélectionner une date d\'expiration',
            'image.required' => 'Veuillez télécharger une image',
            'image.image' => 'Le fichier téléchargé doit être une image',
        ]);

        if (!$medicine) {
            return redirect()->back()->with('error', "Médicament non trouvé");
        }
    
        
        $image = $request->file('image');
        $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $imageExtension = $image->getClientOriginalExtension();
        $imageFullName = $imageName . '_' . time() . '.' . $imageExtension;

        $image->storeAs('images/medicines', $imageFullName, 'public');


        $medicine->name = $request->input('name');
        $medicine->description = $request->input('description');
        $medicine->price = $request->input('price');
        $medicine->image = $imageFullName;
        $medicine->category_id = $request->input('category');
        $medicine->expiration = $request->input('expiration');
    
        $medicine->save();
    
        return redirect()->back()->with('success', "Médicament mis à jour avec succès");
    }
    

    public function deleteMedicine($id)
    {
        $medicine = Medicine::find($id);
        $medicine->delete();

        if (!$medicine) {
            return redirect()->back()->with('error', "Médicament non trouvé");
        }
        return redirect()->back()->with('success', "Médicament supprimé avec succès");
    }
}
