import { createContext, useState, useEffect, useContext } from 'react';
import { validateToken } from '../services/api';

const AuthContext = createContext();

export const AuthProvider = ({ children }) => {
  const [isAuthenticated, setIsAuthenticated] = useState(false);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const checkToken = async () => {
      const token = localStorage.getItem('authToken');
      console.log('Checking token:', token);
      if (token) {
        try {
          const data = await validateToken();
          console.log('Validate token response:', data);
          if (data.valid) {
            setIsAuthenticated(true);
            console.log('Token is valid, isAuthenticated set to true');
          } else {
            localStorage.removeItem('authToken');
            setIsAuthenticated(false);
            console.log('Token is invalid, isAuthenticated set to false');
          }
        } catch (err) {
          console.error('Error validating token:', err);
          localStorage.removeItem('authToken');
          setIsAuthenticated(false);
          console.log('Error validating token, isAuthenticated set to false');
        }
      } else {
        console.log('No token found');
      }
      setLoading(false);
    };
    checkToken();
  }, []);
  const login = (token) => {
    console.log('Saving token to localStorage:', token);
    localStorage.setItem('authToken', token);
    setIsAuthenticated(true);
    console.log('isAuthenticated set to true');
  };

  const logout = () => {
    localStorage.removeItem('authToken');
    setIsAuthenticated(false);
  };

  if (loading) {
    return <div>Loading...</div>;
  }

  return (
    <AuthContext.Provider value={{ isAuthenticated, login, logout }}>
      {children}
    </AuthContext.Provider>
  );
};

export const useAuth = () => useContext(AuthContext);