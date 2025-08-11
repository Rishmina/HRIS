<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        return response()->json(Attendance::with('employee')->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'status' => 'required|in:present,absent',
        ]);
        $attendance = Attendance::create($data);
        return response()->json($attendance, 201);
    }

    public function update(Request $request, Attendance $attendance)
    {
        $data = $request->validate([
            'status' => 'required|in:present,absent',
        ]);
        $attendance->update($data);
        return response()->json($attendance);
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return response()->json(null, 204);
    }
}
