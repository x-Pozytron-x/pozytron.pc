import React from 'react';
import { Routes, Route } from 'react-router-dom';
import LoginPage from './pages/LoginPage';
 import Dashboard from './pages/Dashboard';

const AdminApp = () => (
  <Routes>
    <Route path="/" element={<LoginPage />} /> 
    <Route path="dashboard" element={<Dashboard />} />
  </Routes>
);

export default AdminApp;