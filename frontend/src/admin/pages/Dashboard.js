import React from 'react';

import '../styles/Dashboard.scss';

import AdminHeader from '../components/AdminHeader';
import AdminMenu from '../components/AdminMenu';


const Dashboard = () => {

  return (
    <div className='App'> 
      <AdminHeader />
      <AdminMenu />
      <main className='main dashboard'>
        doshbord
      </main>
    </div>
  );
};

export default Dashboard;