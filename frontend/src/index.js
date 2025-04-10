import React from 'react';
import { createRoot } from 'react-dom/client'; // Новый импорт
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import ClientApp from './client/ClientApp';
import AdminApp from './admin/AdminApp';

const root = createRoot(document.getElementById('root')); // Создаем root
root.render(
  <BrowserRouter>
    <Routes>
      <Route path="/*" element={<ClientApp />} />
      <Route path="/admin/*" element={<AdminApp />} />
    </Routes>
  </BrowserRouter>
);