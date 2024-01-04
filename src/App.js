import React, { useEffect } from 'react';
import './css/responsive.css';
import './css/bootstrap.min.css';
import './css/style.css';
import './css/default.css';
import './css/owl.carousel.css';
import './App.css';
import AOS from 'aos';
import './css/aos.css'


import './js/carousel_define.js';
import Router_app from './Routing/Router_app';
import { BrowserRouter } from 'react-router-dom';
import { basename } from './Services/Apis';




function App() {
  useEffect(() => {
    AOS.init();
  }, [])
  return  <Router_app />;
 

{/* <BrowserRouter basename={basename}>
<Router_app />
  </BrowserRouter> */}

}

export default App;
