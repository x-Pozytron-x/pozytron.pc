import React from 'react';
import { useRef, useEffect } from "react";
import AdminHeader from '../components/AdminHeader';
import AdminMenu from '../components/AdminMenu';
import { save_data, get_data } from '../services/api';

import '../styles/Settings.scss';

const Settings = () => {


  const siteName = useRef();
  const theme = useRef();
  const language = useRef();
  const adminEmail = useRef();

  useEffect(() => {
    const fetchConfig = async () => {
      const res = await get_data({ table: 'config', columns: ['name', 'value'] });

      if (res.success && Array.isArray(res.data)) {
        const configMap = {};
        res.data.forEach(item => {
          configMap[item.name] = item.value;
        });

        if (siteName.current) siteName.current.value = configMap.site_name || '';
        if (theme.current) theme.current.value = configMap.theme || '';
        if (language.current) language.current.value = configMap.language || '';
        if (adminEmail.current) adminEmail.current.value = configMap.admin_email || '';
      }
    };

    fetchConfig();
  }, []);
  


  const handleSave = async (e) => {
    e.preventDefault();
    const configData = [
      { name: 'site_name', value: siteName.current.value },
      { name: 'theme', value: theme.current.value },
      { name: 'language', value: language.current.value },
      { name: 'admin_email', value: adminEmail.current.value },
    ];
  
    save_data({
      table: 'config',
      data: configData,
      where: null, // не нужен, если просто INSERT или INSERT ON DUPLICATE
    });
  
    // if (response.success) {
    //   alert('Config saved successfully!');
    // } else {
    //   alert('Error saving config: ' + response.error);
    // }
  };

  return (
    <div className='App admin'>
      <AdminHeader />
      <AdminMenu />
      <main className='main settings'>
        <form className='settingsForm'  onSubmit={handleSave}>
          <label className='settingsForm__label'>
            <span className='settingsForm__labelName'>SiteName:</span>
            <input className='settingsForm__input' ref={siteName} type="text" />
          </label>
          <label className='settingsForm__label'>
            <span className='settingsForm__labelName'>Theme:</span>
            <input className='settingsForm__input' ref={theme} type="text" />
          </label>
          <label className='settingsForm__label'>
            <span className='settingsForm__labelName'>Default Lang.:</span>
            <input className='settingsForm__input' ref={language} type="text" />
          </label>
          <label className='settingsForm__label'>
            <span className='settingsForm__labelName'>Admin Email:</span>
            <input className='settingsForm__input' ref={adminEmail} type="text" />
          </label>

          <button className='btn settingsForm__btn'>Save</button>
        </form>
      </main>
    </div>
  );
};

export default Settings;