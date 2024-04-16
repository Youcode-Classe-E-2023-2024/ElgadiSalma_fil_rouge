<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function addCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::create([
            'name' => $request->input('name'),
        ]);
        
        return redirect()->back()->with('success', "Catégorie ajoutée avec succès");
    }

    public function editCategory(Request $request, $id)
    {
        $category = Category::find($id);

        $request->validate([
            'name' => 'required',
        ]);

        if (!$category) {
            return redirect()->back()->with('error', "Catégorie non trouvée");
        }

        $category-> name = $request->input('name');
        
        $category->save();

        return redirect()->back()->with('success', "Catégorie mise à jour avec succès");
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();

        if (!$category) {
            return redirect()->back()->with('error', "Catégorie non trouvée");
        }
        return redirect()->back()->with('success', "Catégorie supprimée avec succès");
    }
}
