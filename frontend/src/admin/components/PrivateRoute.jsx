import { Navigate } from 'react-router-dom';
import { useAuth } from '../context/AuthContext';

const PrivateRoute = ({ children }) => {
  const { isAuthenticated } = useAuth();
  console.log('PrivateRoute: isAuthenticated =', isAuthenticated);

  return isAuthenticated ? children : <Navigate to="/admin/login" />;
};

export default PrivateRoute;