import React from 'react';
import {NavLink } from 'react-router-dom';

// import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
// import { byPrefixAndName } from '@awesome.me/kit-KIT_CODE/icons'

import '../styles/AdminMenu.scss';

const AdminMenu = () => {
  return (
    <aside className='adminMenu'>
      {/* <div className='adminMenu__title'>Menu</div> */}
      <NavLink className={({ isActive }) => (isActive ? 'adminMenu__item adminMenu__item-active' : 'adminMenu__item')} to="/admin/dashboard"> 
        <i className="fa fa-pie-chart" /> Dashboard
      </NavLink> 
      <NavLink className='adminMenu__item' to="/messages">
        <i className="fa fa-envelope-o" /> Messages
      </NavLink> 
      <NavLink className='adminMenu__item' to="/skills">
        <i className="fa fa-diamond" /> Skills
      </NavLink> 
      <NavLink className={({ isActive }) => (isActive ? 'adminMenu__item adminMenu__item-active' : 'adminMenu__item')} to="/admin/projects">
        <i className="fa fa-suitcase" /> Projects
      </NavLink> 
      <NavLink className={({ isActive }) => (isActive ? 'adminMenu__item adminMenu__item-active' : 'adminMenu__item')} to="/admin/settings">
        <i className="fa fa-cogs" /> Settings
      </NavLink> 


    </aside>
  );
};

export default AdminMenu;