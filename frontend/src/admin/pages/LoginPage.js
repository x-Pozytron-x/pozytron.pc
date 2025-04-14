import { useState, useEffect } from 'react';
import { useNavigate, useLocation } from 'react-router-dom';
import { useAuth } from '../context/AuthContext';
import { login } from '../services/api';

const LoginPage = () => {
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');
  const { login: loginToContext, isAuthenticated } = useAuth();
  const navigate = useNavigate();
  const location = useLocation();

  // Проверяем, есть ли сообщение о разлогине в параметрах
  const loggedOutMessage = location.state?.loggedOut ? 'You have been logged out.' : null;

  useEffect(() => {
    if (isAuthenticated) {
      console.log('isAuthenticated is true, navigating to /admin/');
      navigate('/admin/'); // Должно перенаправить на /admin/
    }
  }, [isAuthenticated, navigate]);

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      console.log('Sending login request:', { username, password });
      const data = await login(username, password);
      console.log('Login response:', data);
      if (data.success) {
        console.log('Calling loginToContext with token:', data.token);
        loginToContext(data.token);
      } else {
        setError(data.error || 'Login failed');
      }
    } catch (err) {
      setError(err.message || 'An error occurred. Please try again.');
      console.error('Login error:', err);
    }
  };

  return (
    <div>
      <h2>Login</h2>
      {loggedOutMessage && <p style={{ color: 'green' }}>{loggedOutMessage}</p>}
      {error && <p style={{ color: 'red' }}>{error}</p>}
      <form onSubmit={handleSubmit}>
        <div>
          <label>Username:</label>
          <input
            type="text"
            value={username}
            onChange={(e) => setUsername(e.target.value)}
            required
          />
        </div>
        <div>
          <label>Password:</label>
          <input
            type="password"
            value={password}
            onChange={(e) => setPassword(e.target.value)}
            required
          />
        </div>
        <button type="submit">Login</button>
      </form>
    </div>
  );
};

export default LoginPage;