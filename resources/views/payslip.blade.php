<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Payslip</title>
</head>
<body>
    <h1>Payslip for {{ $payroll->employee->name }}</h1>
    <p>Basic Salary: {{ $payroll->basic_salary }}</p>
    <p>Allowances: {{ $payroll->allowances }}</p>
    <p>Deductions: {{ $payroll->deductions }}</p>
    <p>Bonus: {{ $payroll->bonus }}</p>
    <p>Total: {{ $payroll->total() }}</p>
</body>
</html>
