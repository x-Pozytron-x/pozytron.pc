import { Routes, Route, Navigate } from 'react-router-dom';
import { AuthProvider } from './context/AuthContext';
import LoginPage from './pages/LoginPage';
import Dashboard from './pages/Dashboard';
import PrivateRoute from './components/PrivateRoute';

const AdminApp = () => (
  <AuthProvider>
    <div className="App">
      <Routes>
        <Route path="login" element={<LoginPage />} />
        <Route  path="dashboard" element={<PrivateRoute><Dashboard /></PrivateRoute>}
        />
       <Route path="/" element={<PrivateRoute><Navigate to="/admin/dashboard" /></PrivateRoute>} />
        {/* Все остальные маршруты перенаправляем на /admin/login, если не авторизован */}
        <Route  path="*" element={<PrivateRoute><Navigate to="/admin/dashboard" /></PrivateRoute>} />
      </Routes>
    </div>
  </AuthProvider>
);

export default AdminApp;