import React from 'react';
import { createRoot } from 'react-dom/client';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import ClientApp from './client/ClientApp';
import AdminApp from './admin/AdminApp';

import './client/styles/global.scss';

const root = createRoot(document.getElementById('root'));
root.render(
  <BrowserRouter>
    <Routes>
      <Route path="/admin/*" element={<AdminApp />} />
      <Route path="/*" element={<ClientApp />} />
    </Routes>
  </BrowserRouter>
);