import React from 'react';
import { useNavigate } from 'react-router-dom';
import { useAuth } from '../context/AuthContext';

const Dashboard = () => {
  const { logout } = useAuth();
  const navigate = useNavigate();
  
  console.log('Rendering Dashboard');

  const handleLogout = () => {
    logout();
    navigate('/admin/login', { state: { loggedOut: true } }); // Передаем сообщение
  };

  return (
    <>
      <h2>Admin Dashboard</h2>
      <p>Welcome to the admin panel!</p>
      <button onClick={handleLogout}>Logout</button>
    </>
  );
};

export default Dashboard;