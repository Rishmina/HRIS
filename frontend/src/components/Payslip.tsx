import React from 'react';
import { Payroll } from '../types';

interface Props {
  payroll: Payroll;
}

const Payslip: React.FC<Props> = ({ payroll }) => {
  const download = () => {
    window.open(`/api/payrolls/${payroll.id}/payslip`, '_blank');
  };

  return (
    <div>
      <h3>Payslip for {payroll.employee.name}</h3>
      <p>Basic Salary: {payroll.basic_salary}</p>
      <p>Allowances: {payroll.allowances}</p>
      <p>Deductions: {payroll.deductions}</p>
      <p>Bonus: {payroll.bonus}</p>
      <button onClick={download}>Download PDF</button>
    </div>
  );
};

export default Payslip;
