import React from 'react';
import { Employee } from '../types';

interface Props {
  employee: Employee;
}

const Dashboard: React.FC<Props> = ({ employee }) => {
  return (
    <div>
      <h2>{employee.name}</h2>
      <p>Department: {employee.department}</p>
      <p>Role: {employee.role}</p>
      <p>Leave Balance: {employee.leaveBalance}</p>
    </div>
  );
};

export default Dashboard;
