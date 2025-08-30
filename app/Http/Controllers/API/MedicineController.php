<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['medicines' => Medicine::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'dosage_form' => 'required|string|max:255',
            'strength' => 'required|string|max:255',
            'manufacturer' => 'nullable|string|max:255',
        ]);

        $medicine = Medicine::create(
            [
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'dosage_form' => $request->dosage_form,
                'strength' => $request->strength,
                'manufacturer' => $request->manufacturer,
            ]
        );

        return response()->json(['medicine created successfully' => $medicine], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medicine = Medicine::find($id);
        if (!$medicine) {
            return response()->json(['message' => 'Medicine not found'], 404);
        }
        return response()->json(['medicine' => $medicine], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $medicine = Medicine::find($id);
        if (!$medicine) {
            return response()->json(['message' => 'Medicine not found'], 404);
        }

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string|max:1000',
            'price' => 'sometimes|required|numeric|min:0',
            'quantity' => 'sometimes|required|integer|min:0',
            'dosage_form' => 'sometimes|required|string|max:255',
            'strength' => 'sometimes|required|string|max:255',
            'manufacturer' => 'sometimes|nullable|string|max:255',
        ]);

        $medicine->update($request->all());

        return response()->json(['medicine updated successfully' => $medicine], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicine = Medicine::find($id);
        if (!$medicine) {
            return response()->json(['message' => 'Medicine not found'], 404);
        }

        $medicine->delete();

        return response()->json(['message' => 'Medicine deleted successfully'], 200);
    }
}
