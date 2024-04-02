<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class categoryController extends Controller
{
    public function addCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::create([
            'name' => $request->input('name'),
        ]);
        
        return response()->json(['message' => 'category added successfully', 'category' => $category], 201);
    }

    public function editCategory(Request $request, $id)
    {
        $category = Category::find($id);

        $request->validate([
            'name' => 'required',
        ]);

        if (!$category) {
            return response()->json(['message' => 'category not found'], 404);
        }

        $category-> name = $request->input('name');
        
        $category->save();

        return response()->json(['message' => 'category updated successfully', 'category' => $category], 201);
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();

        if (!$category) {
            return response()->json(['message' => 'category not found'], 404);
        }
        return response()->json(['message' => 'category deleted successfully'], 200);
    }
}
