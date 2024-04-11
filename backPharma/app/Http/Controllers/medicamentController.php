<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class medicamentController extends Controller
{
    public function addMedicine(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'expiration' => 'required|date',
            'image' =>'required',
        ]);

        $user = Auth::user();

        if ($user->role_id == '1') 
        {
            $medicine = Medicine::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'image' => $request->input('image'),
                'category_id' => $request->input('category'),
                'expiration' => $request->input('expiration'),
                // 'created_by' => $user->id,
            ]);

            
            return response()->json(['message' => 'medicine added successfully', 'medicine' => $medicine], 201);
        }
        else{
            return response()->json([
                "message" => "U don't have the permission to add someone"
            ], 401);
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
            'expiration' => 'required|date',
            'image' =>'required',
        ]);

        if (!$medicine) {
            return response()->json(['message' => 'Medicine not found'], 404);
        }

        // if ($validator->fails()) {
        //     return back()->withErrors($validator)->withInput();
        // }

        $medicine-> name = $request->input('name');
        $medicine-> description = $request->input('description');
        $medicine-> price = $request->input('price');
        $medicine-> image = $request->input('image');
        $medicine-> category_id = $request->input('category');
        $medicine-> expiration = $request->input('expiration');

        $medicine->save();

        
        return response()->json(['message' => 'medicine updated successfully', 'medicine' => $medicine], 201);
    }

    public function deleteMedicine($id)
    {
        $medicine = Medicine::find($id);
        $medicine->delete();

        if (!$medicine) {
            return response()->json(['message' => 'medicine not found'], 404);
        }
        return response()->json(['message' => 'medicine deleted successfully'], 200);
    }

}
