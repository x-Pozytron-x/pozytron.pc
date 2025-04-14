import { Routes, Route } from 'react-router-dom';
import { AuthProvider } from './context/AuthContext';
import LoginPage from './pages/LoginPage';
import Dashboard from './pages/Dashboard';
import PrivateRoute from './components/PrivateRoute';

const AdminApp = () => (
  <AuthProvider>
    <div className="App">
      <Routes>
        <Route path="login" element={<LoginPage />} />
        <Route path="/" element={<PrivateRoute><Dashboard /></PrivateRoute>} />
      </Routes>
    </div>
  </AuthProvider>
);

export default AdminApp;