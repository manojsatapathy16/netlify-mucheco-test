import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
import App from './App';
import CursorCircle from './components/CursorCircle';

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
    <CursorCircle />
    <App />
  </React.StrictMode>
);

