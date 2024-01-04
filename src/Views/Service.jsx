import React from 'react';
import Header from './Header';
import { Outlet } from 'react-router-dom';
function Service() {
 
  return (
    <>
    <Header class_bg='black_bg' />
    <Outlet />
    </>
    );
}

export default Service;