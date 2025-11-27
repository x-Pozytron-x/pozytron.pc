import { Routes, Route, Navigate } from 'react-router-dom';
import { AuthProvider } from './context/AuthContext';
import LoginPage from './pages/LoginPage';
import Dashboard from './pages/Dashboard';
import Projects from './pages/Projects';
import Settings from './pages/Settings';

import PrivateRoute from './components/PrivateRoute';

import './styles/Admin.scss';

const AdminApp = () => (
  <AuthProvider>
    <>
      <Routes>
        <Route path="login" element={<LoginPage />} />
        <Route  path="dashboard" element={<PrivateRoute><Dashboard /></PrivateRoute>} />
        <Route  path="settings" element={<PrivateRoute><Settings /></PrivateRoute>} />
        <Route  path="projects" element={<PrivateRoute><Projects /></PrivateRoute>} />
       <Route path="/" element={<PrivateRoute><Navigate to="/admin/dashboard" /></PrivateRoute>} />
        {/* Все остальные маршруты перенаправляем на /admin/login, если не авторизован */}
        <Route  path="*" element={<PrivateRoute><Navigate to="/admin/dashboard" /></PrivateRoute>} />
      </Routes>
    </>
  </AuthProvider>
);

export default AdminApp;