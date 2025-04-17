import React from 'react';
import { useNavigate } from 'react-router-dom';
import { useAuth } from '../context/AuthContext';


const AdminHeader = () => {
  const { logout } = useAuth();
  const navigate = useNavigate();

  console.log('Rendering Dashboard');

  const handleLogout = () => {
    logout();
    navigate('/admin/login', { state: { loggedOut: true } });
  };
  return (
    <header className="header">
      <h2 className='header__title'>Admin Dashboard</h2>
      <button className='header__btn' onClick={handleLogout}>&#9211;</button>
    </header>
  );
};

export default AdminHeader;