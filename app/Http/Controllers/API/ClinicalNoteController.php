<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClinicalNote;

class ClinicalNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['clinical_notes' => ClinicalNote::all()]);
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
            'author_id' => 'nullable|exists:users,id',
            'note_date' => 'nullable|date',
            'note_text' => 'required|string|max:1000',
        ]);

        $clinicalNote = ClinicalNote::create($request->only([
            'patient_id', 'author_id', 'note_date', 'note_text'
        ]));

        return response()->json(['message' => 'Clinical note created successfully', 'clinical_note' => $clinicalNote], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clinicalNote = ClinicalNote::find($id);
        if (!$clinicalNote) {
            return response()->json(['message' => 'Clinical note not found'], 404);
        }
        return response()->json(['clinical_note' => $clinicalNote], 200);
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
        $clinicalNote = ClinicalNote::find($id);
        if (!$clinicalNote) {
            return response()->json(['message' => 'Clinical note not found'], 404);
        }

        $request->validate([
            'patient_id' => 'sometimes|required|exists:patients,id',
            'author_id' => 'sometimes|nullable|exists:users,id',
            'note_date' => 'sometimes|nullable|date',
            'note_text' => 'sometimes|required|string|max:1000',
        ]);

        $clinicalNote->update($request->only([
            'patient_id', 'author_id', 'note_date', 'note_text'
        ]));

        return response()->json(['message' => 'Clinical note updated successfully', 'clinical_note' => $clinicalNote], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clinicalNote = ClinicalNote::find($id);
        if (!$clinicalNote) {
            return response()->json(['message' => 'Clinical note not found'], 404);
        }

        $clinicalNote->delete();
        return response()->json(['message' => 'Clinical note deleted successfully'], 200);
    }
}
