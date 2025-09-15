<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vital;
class VitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //* Display a listing of all vital signs.
    public function index()
    {
        return response()->json(['vitals found successfully' => Vital::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //* Store a newly created vital signs record in storage.
    public function store(Request $request)
    {
            $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'blood_pressure' => 'nullable|string',
            'heart_rate' => 'nullable|integer',
            'temperature' => 'nullable|numeric',
            'respiratory_rate' => 'nullable|integer',
            'oxygen_saturation' => 'nullable|integer',
            'recorded_at' => 'nullable|date',
        ]);

        $vital = Vital::create($request->only([
            'patient_id', 'blood_pressure', 'heart_rate', 'temperature', 'respiratory_rate', 'oxygen_saturation', 'recorded_at'
        ]));

        return response()->json(['message' => 'Vital signs recorded successfully', 'vital' => $vital], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //* Display the specified vital signs by ID.
    public function show($id)
    {
        $vital = Vital::find($id);
        if (!$vital) {
            return response()->json(['message' => 'Vital signs not found'], 404);
        }
        return response()->json(['vital found successfully' => $vital], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //* Update the specified vital signs in storage.
    public function update(Request $request, $id)
    {
        $vital = Vital::find($id);
        if (!$vital) {
            return response()->json(['message' => 'Vital signs not found'], 404);
        }

        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'blood_pressure' => 'nullable|string',
            'heart_rate' => 'nullable|integer',
            'temperature' => 'nullable|numeric',
            'respiratory_rate' => 'nullable|integer',
            'oxygen_saturation' => 'nullable|integer',
            'recorded_at' => 'nullable|date',
        ]);

        $vital->update($request->only([
            'patient_id', 'blood_pressure', 'heart_rate', 'temperature', 'respiratory_rate', 'oxygen_saturation', 'recorded_at'
        ]));

        return response()->json(['message' => 'Vital signs updated successfully', 'vital' => $vital], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //* Remove the specified vital signs from storage.
    public function destroy($id)
    {
        $vital = Vital::find($id);
        if (!$vital) {
            return response()->json(['message' => 'Vital signs not found'], 404);
        }

        $vital->delete();
        return response()->json(['message' => 'Vital signs deleted successfully'], 200);
    }
}
