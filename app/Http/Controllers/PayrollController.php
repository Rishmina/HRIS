<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Support\PDF;

class PayrollController extends Controller
{
    public function index()
    {
        return response()->json(Payroll::with('employee')->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'basic_salary' => 'required|numeric',
            'allowances' => 'nullable|numeric',
            'deductions' => 'nullable|numeric',
            'bonus' => 'nullable|numeric',
            'pay_date' => 'required|date',
        ]);
        $payroll = Payroll::create($data);
        return response()->json($payroll, 201);
    }

    public function show(Payroll $payroll)
    {
        return response()->json($payroll->load('employee'));
    }

    public function destroy(Payroll $payroll)
    {
        $payroll->delete();
        return response()->json(null, 204);
    }

    public function payslip(Payroll $payroll)
    {
        $pdf = PDF::loadView('payslip', ['payroll' => $payroll->load('employee')]);
        return $pdf->download('payslip.pdf');
    }
}
