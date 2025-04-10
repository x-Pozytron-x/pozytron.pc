import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import LoginForm from '../components/LoginForm';
import { login } from '../services/api';

const LoginPage = () => {
  const [error, setError] = useState(null);

  const handleLogin = async (username, password) => {
    try {
      const response = await login(username, password);
      console.log('Успешный вход:', response);
      // Сохрани токен или редирект на главную страницу админки
    } catch (err) {
      setError('Ошибка входа');
    }
  };

  return (
    <div>
      <h1>Вход в админку</h1>
      <nav><Link to="/">back</Link></nav>
      <LoginForm onSubmit={handleLogin} error={error} />
    </div>
  );
};

export default LoginPage;