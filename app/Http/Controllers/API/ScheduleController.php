<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['schedules' => Schedule::all()]);
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
       
         $validated = $request->validate([
    "patient_id" => "required|exists:patients,id",
    "assigned_user_id" => "nullable|exists:users,id",
    "appointment_date" => "nullable|date",
    "appointment_time" => "nullable|date_format:H:i:s",
    "type" => "nullable|in:visit,shift,follow-up",
    "notes" => "nullable|string|max:1000",
]);

            $schedule = Schedule::create($request->only([
                'patient_id', 'assigned_user_id', 'appointment_date', 'appointment_time', 'type', 'notes'
            ]));

            return response()->json(['message' => 'Schedule created successfully', 'schedule' => $schedule], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedule = Schedule::find($id);
        if (!$schedule) {
            return response()->json(['message' => 'Schedule not found'], 404);
        }
        return response()->json(['schedule' => $schedule], 200);
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
        $schedule = Schedule::find($id);
        if (!$schedule) {
            return response()->json(['message' => 'Schedule not found'], 404);
        }

     $validated = $request->validate([
    "patient_id" => "nullable|exists:patients,id",
    "assigned_user_id" => "nullable|exists:users,id",
    "appointment_date" => "nullable|date",
    "appointment_time" => "nullable|date_format:H:i:s",
    "type" => "nullable|in:visit,shift,follow-up",
    "notes" => "nullable|string|max:1000",
]);

        $schedule->update($validated);

        return response()->json(['message' => 'Schedule updated successfully', 'schedule' => $schedule], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        if (!$schedule) {
            return response()->json(['message' => 'Schedule not found'], 404);
        }

        $schedule->delete();
        return response()->json(['message' => 'Schedule deleted successfully'], 200);
    }
}
