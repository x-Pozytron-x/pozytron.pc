import React from 'react';
import Header from '../components/Header/tpl';

import {Link } from 'react-router-dom';

const ClientApp = () => (
  <>
    <Header />

    <main>

      <section className='section banner'>
        <h1 className='banner__title'>P<div className="banner__logo"></div>zytron.dev</h1>
        <div className="banner__greetings">
          <div className="banner__text">Hello! I am Stetsenko Vitalii (Pozytron), a Full-Stack developer with experience in the web industry since 2015.</div>
          <Link to="#" className="btn">View my work</Link>
        </div>
      </section>
      
      <section className='section'>
        <div className="block">
          <div className="block__title">About me</div>

        </div>
        <div className="block">
          <div className="block__title">Skills</div>
          
        </div>
      </section>

    </main>
    



    <footer>Copyrght 2025</footer>
  </>
);

export default ClientApp;