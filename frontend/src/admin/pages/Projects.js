import React from 'react';
import { useRef, useEffect } from "react";
import AdminHeader from '../components/AdminHeader';
import AdminMenu from '../components/AdminMenu';
import { save_data, get_data } from '../services/api';

import '../styles/Projects.scss';

const Projects = () => {
  const title = useRef();
  const description = useRef();
  const stack_html = useRef();
  const stack_css = useRef();
  const demoLink = useRef();
  const preview = useRef();

  // useEffect(() => {
  //   const fetchConfig = async () => {
  //     const res = await get_data({ table: 'config', columns: ['name', 'value'] });

  //     if (res.success && Array.isArray(res.data)) {
  //       const configMap = {};
  //       res.data.forEach(item => {
  //         configMap[item.name] = item.value;
  //       });

  //       if (siteName.current) siteName.current.value = configMap.site_name || '';
  //       if (theme.current) theme.current.value = configMap.theme || '';
  //       if (language.current) language.current.value = configMap.language || '';
  //       if (adminEmail.current) adminEmail.current.value = configMap.admin_email || '';
  //     }
  //   };
  //   fetchConfig();
  // }, []); 


  const handleSave = async (e) => {
    e.preventDefault();
    const addProject = [
      { name: 'title', value: title.current.value },
      { name: 'description', value: description.current.value },
      { name: 'stack', value: "" },
      { name: 'preview', value: preview.current.value },
      { name: 'live_url', value: preview.current.value },
      { name: 'is_published', value: 1 },
      { name: 'created_at', value: Date.now() },
      { name: 'updated_at', value: Date.now() },
    ];
  
    save_data({
      table: 'projects',
      data: addProject,
      where: null, // не нужен, если просто INSERT или INSERT ON DUPLICATE
    });
  };

  return (
    <div className='App admin'>
      <AdminHeader />
      <AdminMenu />
      <main className='main projects'>
        <form className='projectaAdd'  onSubmit={handleSave}>
          <label className='projectaAdd__label'>
            <span className='projectaAdd__labelName'>Title:</span>
            <input className='projectaAdd__input' ref={title} type="text" />
          </label>
          <label className='projectaAdd__label'>
            <span className='projectaAdd__labelName'>Description:</span>
            <input className='projectaAdd__input' ref={description} type="text" />
          </label>
          <label className='projectaAdd__label'>
            <span className='projectaAdd__labelName'>Stack:</span>
            <input className='projectaAdd__input' ref={stack_html} type="checkbox" /> HTML <br />
            <input className='projectaAdd__input' ref={stack_css} type="checkbox" /> CSS <br />
          </label>
          <label className='projectaAdd__label'>
            <span className='projectaAdd__labelName'>Demo Link:</span>
            <input className='projectaAdd__input' ref={demoLink} type="text" />
          </label>
          <label className='projectaAdd__label'>
            <span className='projectaAdd__labelName'>Preview:</span>
            <input className='projectaAdd__input' ref={preview} type="text" />
          </label>

          <button className='btn projectaAdd__btn'>Add</button>
        </form>
      </main>
    </div>
  );
};

export default Projects;