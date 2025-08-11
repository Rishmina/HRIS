<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Employee;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        return response()->json(Leave::with('employee')->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'type' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'nullable',
        ]);
        $data['status'] = 'pending';
        $leave = Leave::create($data);
        return response()->json($leave, 201);
    }

    public function update(Request $request, Leave $leave)
    {
        $data = $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);
        $leave->update($data);
        return response()->json($leave);
    }

    public function destroy(Leave $leave)
    {
        $leave->delete();
        return response()->json(null, 204);
    }

    public function balance(Employee $employee)
    {
        $total = 20; // default annual leave
        $used = $employee->leaves()->where('status', 'approved')->sum(
            \DB::raw('DATEDIFF(end_date, start_date) + 1')
        );
        return response()->json(['balance' => $total - $used]);
    }
}
