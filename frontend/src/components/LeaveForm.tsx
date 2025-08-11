import React, { useState } from 'react';
import { createLeave } from '../services/api';

const LeaveForm: React.FC = () => {
  const [type, setType] = useState('vacation');
  const [start, setStart] = useState('');
  const [end, setEnd] = useState('');

  const submit = async (e: React.FormEvent) => {
    e.preventDefault();
    await createLeave({ type, start_date: start, end_date: end });
  };

  return (
    <form onSubmit={submit}>
      <select value={type} onChange={e => setType(e.target.value)}>
        <option value="vacation">Vacation</option>
        <option value="sick">Sick</option>
      </select>
      <input type="date" value={start} onChange={e => setStart(e.target.value)} required />
      <input type="date" value={end} onChange={e => setEnd(e.target.value)} required />
      <button type="submit">Request Leave</button>
    </form>
  );
};

export default LeaveForm;
