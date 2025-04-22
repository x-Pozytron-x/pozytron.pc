const API_URL = process.env.REACT_APP_API_URL || 'http://localhost:8000';

const fetchWithToken = async (url, options = {}) => {
  const token = localStorage.getItem('authToken');
  const headers = {
    'Content-Type': 'application/json',
  };
  if (token) {
    headers.Authorization = 'Bearer ' + token; // Добавляем префикс Bearer
  }
  const response = await fetch(`${API_URL}${url}`, { ...options, headers });
  if (!response.ok) {
    throw new Error(`Request failed: ${response.status}`);
  }
  return response.json();
};

export const login = async (username, password) => {
  return fetchWithToken('/index.php/api/login', {
    method: 'POST',
    body: JSON.stringify({ username, password }),
  });
};

export const validateToken = async () => {
  return fetchWithToken('/index.php/api/validate-token');
};

export const fetchProjects = async () => {
  return fetchWithToken('/index.php/api/projects');
};

export const createProject = async (projectData) => {
  return fetchWithToken('/index.php/api/projects', {
    method: 'POST',
    body: JSON.stringify(projectData),
  });
};

export const updateProject = async (id, projectData) => {
  return fetchWithToken(`/index.php/api/projects/${id}`, {
    method: 'PUT',
    body: JSON.stringify(projectData),
  });
};

export const deleteProject = async (id) => {
  return fetchWithToken(`/index.php/api/projects/${id}`, {
    method: 'DELETE',
  });
};

export const fetchMessages = async () => {
  return fetchWithToken('/index.php/api/messages');
};

export const markMessageAsRead = async (id) => {
  return fetchWithToken(`/index.php/api/messages/${id}/read`, {
    method: 'PUT',
  });
};

export const save_data = async ({ table, data, where = null }) => {
  return fetchWithToken('/index.php/api/save_data', {
    method: 'POST',
    body: JSON.stringify({ table, data, where }),
  });
};

export const get_data = async ({ table, columns = ['*'], where = null }) => {
  return fetchWithToken('/index.php/api/get_data', {
    method: 'POST',
    body: JSON.stringify({ table, columns, where }),
  });
};
