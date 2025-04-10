export const login = async (username, password) => {
  const response = await fetch('http://localhost:8000/index.php/api/login', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({ username, password }),
  });

  if (!response.ok) {
    throw new Error('Ошибка входа');
  }

  return response.json();
};