export interface Employee {
  id: number;
  name: string;
  department: string;
  role: string;
  leaveBalance: number;
  payrolls?: Payroll[];
}

export interface Payroll {
  id: number;
  employee: Employee;
  basic_salary: number;
  allowances: number;
  deductions: number;
  bonus: number;
}
