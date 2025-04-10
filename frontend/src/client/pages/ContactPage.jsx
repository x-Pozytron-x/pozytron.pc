import React from 'react';
import ContactForm from '../components/ContactForm';

export default function ContactPage() {
  return (
    <div className="p-8">
      <h1 className="text-2xl font-bold mb-4">Связаться со мной</h1>
      <ContactForm />
    </div>
  );
}
