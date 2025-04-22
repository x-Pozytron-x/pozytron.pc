// Header.jsx

import React from 'react';
import {Link } from 'react-router-dom';

import './style.scss';

const Header = function () {
  return (
    <header className='header'>
      <div className='header__logo'>
        Stetsenko Vitalii
      </div>
      <nav className='header__menu'>
        {/* <Link className='header__menu-item' to="/">Home</Link>  */}
        <Link className='header__menu-item' to="/about"><i className="fa fa-user" /></Link> 
        <Link className='header__menu-item' to="/skills"><i className="fa fa-diamond" /></Link> 
        <Link className='header__menu-item' to="/projects"><i className="fa fa-suitcase" /></Link> 
        <Link className='header__menu-item' to="/contacts"><i className="fa fa-envelope-o" /></Link> 
      </nav>
      <Link className='header__menu-item header__login' to="/admin/"><i className="fa fa-lock" /></Link> 
    </header>
  );
};
export default Header;