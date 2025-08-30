<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DoctorVisit;

class DoctorVisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['doctor_visits' => DoctorVisit::all()]);
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
            'doctor_id' => 'required|exists:doctors,id',
            'visit_date' => 'required|date',
            'reason_for_visit' => 'nullable|string|max:1000',
            'diagnosis' => 'nullable|string|max:1000',
            'treatment_plan' => 'nullable|string|max:1000',
        ]);

        $doctorVisit = DoctorVisit::create($request->only([
            'patient_id', 'doctor_id', 'visit_date', 'reason_for_visit', 'diagnosis', 'treatment_plan'
        ]));

        return response()->json(['message' => 'Doctor visit created successfully', 'doctor_visit' => $doctorVisit], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctorVisit = DoctorVisit::find($id);
        if (!$doctorVisit) {
            return response()->json(['message' => 'Doctor visit not found'], 404);
        }
        return response()->json(['doctor_visit' => $doctorVisit], 200);
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
        $doctorVisit = DoctorVisit::find($id);
        if (!$doctorVisit) {
            return response()->json(['message' => 'Doctor visit not found'], 404);
        }

        $request->validate([
            'patient_id' => 'sometimes|required|exists:patients,id',
            'doctor_id' => 'sometimes|required|exists:doctors,id',
            'visit_date' => 'sometimes|required|date',
            'reason_for_visit' => 'nullable|string|max:1000',
            'diagnosis' => 'nullable|string|max:1000',
            'treatment_plan' => 'nullable|string|max:1000',
        ]);

        $doctorVisit->update($request->only([
            'patient_id', 'doctor_id', 'visit_date', 'reason_for_visit', 'diagnosis', 'treatment_plan'
        ]));

        return response()->json(['message' => 'Doctor visit updated successfully', 'doctor_visit' => $doctorVisit], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctorVisit = DoctorVisit::find($id);
        if (!$doctorVisit) {
            return response()->json(['message' => 'Doctor visit not found'], 404);
        }

        $doctorVisit->delete();
        return response()->json(['message' => 'Doctor visit deleted successfully'], 200);
    }
}
