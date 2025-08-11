import React, { useEffect, useState } from 'react';
import Dashboard from '../components/Dashboard';
import LeaveForm from '../components/LeaveForm';
import Payslip from '../components/Payslip';
import { fetchEmployee } from '../services/api';
import { Employee, Payroll } from '../types';

const DashboardPage: React.FC = () => {
  const [employee, setEmployee] = useState<Employee | null>(null);
  const [payroll, setPayroll] = useState<Payroll | null>(null);

  useEffect(() => {
    const load = async () => {
      const e = await fetchEmployee();
      setEmployee(e);
      if (e.payrolls && e.payrolls.length > 0) {
        setPayroll(e.payrolls[0]);
      }
    };
    load();
  }, []);

  if (!employee) return <div>Loading...</div>;

  return (
    <div>
      <Dashboard employee={employee} />
      <LeaveForm />
      {payroll && <Payslip payroll={payroll} />}
    </div>
  );
};

export default DashboardPage;
