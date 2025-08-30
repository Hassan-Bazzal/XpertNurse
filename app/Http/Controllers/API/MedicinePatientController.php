<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicinePatient;

class MedicinePatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['medicines' => MedicinePatient::all()]);
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
            'patient_id' => 'required|exists:patients,id',
            'medicine_id' => 'required|exists:medicines,id',
            'dosage' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'instructions' => 'nullable|string|max:1000',
        ]);

        $medicinePatient = MedicinePatient::create(
            [
                'patient_id' => $request->patient_id,
                'medicine_id' => $request->medicine_id,
                'dosage' => $request->dosage,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'instructions' => $request->instructions,
            ]
        );

        return response()->json(['medicine_patient created successfully' => $medicinePatient], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medicinePatient = MedicinePatient::find($id);
        if (!$medicinePatient) {
            return response()->json(['message' => 'Medicine-Patient record not found'], 404);
        }
        return response()->json(['medicine_patient' => $medicinePatient], 200);
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
        $medicinePatient = MedicinePatient::find($id);
        if (!$medicinePatient) {
            return response()->json(['message' => 'Medicine-Patient record not found'], 404);
        }

        $request->validate([
            'patient_id' => 'sometimes|required|exists:patients,id',
            'medicine_id' => 'sometimes|required|exists:medicines,id',
            'dosage' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'instructions' => 'nullable|string|max:1000',
        ]);

        $medicinePatient->update($request->only([
            'patient_id', 'medicine_id', 'dosage', 'start_date', 'end_date', 'instructions'
        ]));

        return response()->json(['message' => 'Medicine-Patient record updated successfully', 'medicine_patient' => $medicinePatient], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicinePatient = MedicinePatient::find($id);
        if (!$medicinePatient) {
            return response()->json(['message' => 'Medicine-Patient record not found'], 404);
        }

        $medicinePatient->delete();
        return response()->json(['message' => 'Medicine-Patient record deleted successfully'], 200);
    }
}
