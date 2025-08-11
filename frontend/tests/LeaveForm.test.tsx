import { render, screen } from '@testing-library/react';
import LeaveForm from '../src/components/LeaveForm';
import '@testing-library/jest-dom';

test('renders request button', () => {
  render(<LeaveForm />);
  expect(screen.getByText('Request Leave')).toBeInTheDocument();
});
