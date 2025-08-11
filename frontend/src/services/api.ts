export async function login(data: { email: string; password: string }) {
  const res = await fetch('/api/login', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(data),
  });
  const json = await res.json();
  localStorage.setItem('token', json.token);
}

export async function fetchEmployee() {
  const res = await fetch('/api/employees/1', {
    headers: authHeader(),
  });
  return res.json();
}

export async function createLeave(data: { type: string; start_date: string; end_date: string }) {
  await fetch('/api/leaves', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json', ...authHeader() },
    body: JSON.stringify(data),
  });
}

function authHeader() {
  const token = localStorage.getItem('token');
  return token ? { Authorization: `Bearer ${token}` } : {};
}
