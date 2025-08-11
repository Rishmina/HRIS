<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'basic_salary',
        'allowances',
        'deductions',
        'bonus',
        'pay_date',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function total()
    {
        return $this->basic_salary + $this->allowances + $this->bonus - $this->deductions;
    }
}
