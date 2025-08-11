<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\Attendance;
use App\Models\Payroll;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        Employee::factory()->count(5)->create()->each(function ($employee) {
            Leave::factory()->count(2)->create([
                'employee_id' => $employee->id,
                'status' => 'approved',
            ]);
            Attendance::factory()->count(5)->create([
                'employee_id' => $employee->id,
            ]);
            Payroll::factory()->create([
                'employee_id' => $employee->id,
                'basic_salary' => 50000,
                'pay_date' => now(),
            ]);
        });
    }
}
