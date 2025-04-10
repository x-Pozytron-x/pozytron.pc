import React, { useState } from 'react';
import { sendMessage } from '../services/api';

export default function ContactForm() {
  const [form, setForm] = useState({ name: '', email: '', message: '' });
  const [status, setStatus] = useState(null);

  const handleChange = e => {
    setForm({ ...form, [e.target.name]: e.target.value });
  };

  const handleSubmit = async e => {
    e.preventDefault();
    setStatus('loading');
    try {
      await sendMessage(form);
      setStatus('success');
      setForm({ name: '', email: '', message: '' });
    } catch (err) {
      setStatus(`error: ${err.message}`);
    }
  };

  return (
    <form onSubmit={handleSubmit} className="space-y-4 max-w-md mx-auto">
      <input
        type="text"
        name="name"
        placeholder="Имя"
        value={form.name}
        onChange={handleChange}
        required
        className="w-full p-2 border rounded"
      />
      <input
        type="email"
        name="email"
        placeholder="Email"
        value={form.email}
        onChange={handleChange}
        required
        className="w-full p-2 border rounded"
      />
      <textarea
        name="message"
        placeholder="Сообщение"
        value={form.message}
        onChange={handleChange}
        required
        className="w-full p-2 border rounded h-32"
      />
      <button type="submit" className="bg-teal-600 text-white px-4 py-2 rounded">
        Отправить
      </button>

      {status === 'loading' && <p>Отправка...</p>}
      {status === 'success' && <p className="text-green-600">Сообщение отправлено!</p>}
      {status?.startsWith('error') && <p className="text-red-600">{status}</p>}
    </form>
  );
}
