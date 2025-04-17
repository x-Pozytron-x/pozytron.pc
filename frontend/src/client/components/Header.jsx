// Header.jsx

import React from 'react';
import {Link } from 'react-router-dom';

import '../styles/Header.scss';

const Header = function () {
  return (
    <header className='header'>
      <div className='header__logo'>
        <img src="logo2.svg" alt="Logotype" />
      </div>
      <nav className='header__menu'>
        <Link className='header__menu-item' to="/">Home</Link> 
        <Link className='header__menu-item' to="/about">About</Link> 
        <Link className='header__menu-item' to="/skills">Skills</Link> 
        <Link className='header__menu-item' to="/projects">Projects</Link> 
        <Link className='header__menu-item' to="/contacts">Contacts</Link> 
      </nav>
      <Link className='header__login' to="/admin/">Admin</Link> 
    </header>
  );
};
export default Header;