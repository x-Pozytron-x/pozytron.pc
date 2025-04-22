import React from 'react';
import { createRoot } from 'react-dom/client';

import { BrowserRouter, Routes, Route } from 'react-router-dom';

import Home from './client/pages/Home';
import ContactPage from './client/pages/ContactPage';

import AdminApp from './admin/AdminApp';


import 'font-awesome/css/font-awesome.min.css';
import './client/styles/global.scss';

const root = createRoot(document.getElementById('root'));
root.render(
  <BrowserRouter>
    <Routes>
    <Route path="/contacts/" element={<ContactPage />} />
      <Route path="/admin/*" element={<AdminApp />} />
      <Route path="/*" element={<Home />} />
    </Routes>
  </BrowserRouter>
);