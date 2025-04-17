import React from 'react';

import AdminHeader from '../components/AdminHeader';
import AdminMenu from '../components/AdminMenu';

import '../styles/Settings.scss';

const Settings = () => {

  return (
    <div className='App'>
      <AdminHeader />
      <AdminMenu />
      <main className='main settings'>
        <form className='settingsForm'>
          <label className='settingsForm__label'>
            <span className='settingsForm__labelName'>SiteName:</span>
            <input className='settingsForm__input' type="text" />
          </label>
          <label className='settingsForm__label'>
            <span className='settingsForm__labelName'>Theme:</span>
            <input className='settingsForm__input' type="text" />
          </label>
          <label className='settingsForm__label'>
            <span className='settingsForm__labelName'>Default Lang.:</span>
            <input className='settingsForm__input' type="text" />
          </label>
          <label className='settingsForm__label'>
            <span className='settingsForm__labelName'>Admin Email:</span>
            <input className='settingsForm__input' type="text" />
          </label>

          <button className='btn settingsForm__btn'>Save</button>
        </form>
      </main>
    </div>
  );
};

export default Settings;