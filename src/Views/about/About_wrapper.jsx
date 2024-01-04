import React from 'react';
import Header from '../Header';
import { Outlet } from 'react-router-dom';
function About_wrapper() {
 
  return (
    <>
    <Header class_bg='black_bg' />
    <Outlet />
    </>
    );
}

export default About_wrapper;