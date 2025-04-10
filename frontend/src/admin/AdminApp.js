import React from 'react';
import { Routes, Route } from 'react-router-dom';
import LoginPage from './pages/LoginPage';
// import Dashboard from './pages/Dashboard';

const AdminApp = () => (
  <Routes>
    <Route path="/" element={<LoginPage />} />           {/* /admin */}
    {/* <Route path="dashboard" element={<Dashboard />} />   /admin/dashboard */}
  </Routes>
);

export default AdminApp;