import React from 'react';
import { BrowserRouter, Routes, Route, HashRouter, Switch, Layout,Outlet } from 'react-router-dom';
import About from '../Views/about/About';
import WhychooseUs from '../Views/about/WhychooseUs';
import Ourdeliveryprocess from '../Views/about/Ourdeliveryprocess';
import SomeOfOurWork from '../Views/about/SomeOfOurWork';
import CaseStudy from '../Views/about/CaseStudy';
import Career from '../Views/about/Career';
import Consultancy from '../Views/Consultancy';
import Portfolio from '../Views/Portfolio';
import Insight from '../Views/Insight';
import Footer from '../Views/Footer';
import Home_page from '../Views/Home_page';
import Error from '../Views/Error';
import ServiceDetails from '../Views/ServiceDetails';
import Contact from '../Views/Contact';
import CaseStudy_Details from '../Views/about/CaseStudy_Details';
import Insight_details from '../Views/Insight_details';
import { basename } from '../Services/Apis';
import About_wrapper from '../Views/about/About_wrapper';
import Header from '../Views/Header';
import Faq from '../Views/Faq';
import Privacy_policy from '../Views/Privacy_policy';
import Term_of_use from '../Views/Term_of_use';
import Quality_policy from '../Views/Quality_policy';
import Disclaimer from '../Views/Disclaimer';

function Router_app() {

  return (
    <>
      {/* <HashRouter>



        <Routes>
          <Route path='/' element={<Home_page  type='home'/>} />
          <Route path='/about' element={<About  type='about-us'/>} />
          <Route path='/about/why-choose-us' element={<WhychooseUs type='why-choose-us'/>} />
          <Route path='/about/our-delivery-process' element={<Ourdeliveryprocess type='our-delivery-process'/>} />
          <Route path='/about/some-of-our-work' element={<SomeOfOurWork type='some-of-our-work'/>} />
          <Route path='/about/case-study' element={<CaseStudy type='case-study'/>} />
          <Route path='/about/case-study/caseStudy-details' element={<CaseStudy_Details type='CaseStudy_Details' />} />
          <Route path='/about/career' element={<Career type='career' />} />
          <Route path='/service' element={<ServiceDetails type='discovery-and-design-service' />} />
          <Route path='/service/discovery-and-design' element={<ServiceDetails type='discovery-and-design-service' />} />
          <Route path='/service/cloud-computing' element={<ServiceDetails type='cloud-transformation-services' />} />
          <Route path='/service/code-recovery-and-support' element={<ServiceDetails type='code-recovery-and-support' />} />
          <Route path='/service/digital-engineering' element={<ServiceDetails type='digital-engineering' />} />
          <Route path='/service/search-engine-optimization' element={<ServiceDetails type='search-engine-optimization' />} />
          <Route path='service/social-media-optimization' element={<ServiceDetails type='social-media-optimization' />} />
          <Route path='/service/app-store-optimization' element={<ServiceDetails type='app-store-optimization' />} />
          <Route path='/service/pay-per-click' element={<ServiceDetails type='pay-per-click' />} />
          <Route path='/service/inventory-management' element={<ServiceDetails type='inventory-management' />} />
          <Route path='/service/order-management' element={<ServiceDetails type='order-management' />} />
          <Route path='/service/amazon-store-design-and-optimization' element={<ServiceDetails type='amazon-store-design-and-optimization' />} />
          <Route path='/service/eBay-store-design-and-optimization' element={<ServiceDetails type='eBay-store-design-and-optimization' />} />

          <Route path='/consultancy' element={<Consultancy type='consultancy'/>} />
          <Route path='/portfolio' element={<Portfolio type='portfolio'/>} />
          <Route path='/insight' element={<Insight type='insights'/>} />
          <Route path='/contact' element={<Contact type='contact'/>} />
          <Route path='/insight/:slug' element={<Insight_details />} />
          <Route path='/faq' element={<Faq type='faq'/>} />
          <Route path='/privacy-policy' element={<Privacy_policy />} />
          <Route path='/disclaimer' element={<Disclaimer/>} />
          <Route path='/quality-policy' element={<Quality_policy />} />
          <Route path='/terms-of-use' element={<Term_of_use />} />
          <Route path='*' element={<Error />} />

        </Routes>




        

<Footer />
      </HashRouter> */}

      <BrowserRouter basename={basename}>
     
      <Routes>
         <Route path='/'>
         <Route index element={<Home_page  type='home'/>}/>
         <Route path='about/*' >
         <Route index element={<About  type='about-us'/>} />
         <Route path='why-choose-us' element={<WhychooseUs type='why-choose-us'/>} />
         <Route path='our-delivery-process' element={<Ourdeliveryprocess type='our-delivery-process'/>} />
         <Route path='some-of-our-work' element={<SomeOfOurWork type='some-of-our-work'/>} />
         <Route path='case-study' element={<CaseStudy type='case-study'/>} />
         <Route path='caseStudy-details' element={<CaseStudy_Details type='CaseStudy_Details' />} />
         <Route path='career' element={<Career type='career' />} />
         <Route path='*' element={<Error />} />
         </Route>
           <Route path='service/*'>
           <Route path='discovery-and-design-service' element={<ServiceDetails type='discovery-and-design-service' />} />
          <Route path='cloud-computing' element={<ServiceDetails type='cloud-transformation-services' />} />
          <Route path='code-recovery-and-support' element={<ServiceDetails type='code-recovery-and-support' />} />
          <Route path='digital-engineering' element={<ServiceDetails type='digital-engineering' />} />
          <Route path='search-engine-optimization' element={<ServiceDetails type='search-engine-optimization' />} />
          <Route path='social-media-optimization' element={<ServiceDetails type='social-media-optimization' />} />
          <Route path='app-store-optimization' element={<ServiceDetails type='app-store-optimization' />} />
          <Route path='pay-per-click' element={<ServiceDetails type='pay-per-click' />} />
          <Route path='inventory-management' element={<ServiceDetails type='inventory-management' />} />
          <Route path='order-management' element={<ServiceDetails type='order-management' />} />
          <Route path='amazon-store-design-and-optimization' element={<ServiceDetails type='amazon-store-design-and-optimization' />} />
          <Route path='ebay-store-design-and-optimization' element={<ServiceDetails type='ebay-store-design-and-optimization' />} />
          <Route path='*' element={<Error />} />
           </Route>
          

          <Route path='/consultancy' element={<Consultancy type='consultancy'/>} />
          <Route path='/portfolio' element={<Portfolio type='portfolio'/>} />

          <Route path='insight/*'>
          <Route index element={<Insight type='insights'/>} />
          <Route path=':slug' element={<Insight_details />} />
          <Route path='*' element={<Error />} />
            </Route>
         
          <Route path='/contact' element={<Contact type='contact'/>} />
         
          <Route path='/faq' element={<Faq type='faq'/>} />
          <Route path='/privacy-policy' element={<Privacy_policy />} />
          <Route path='/disclaimer' element={<Disclaimer/>} />
          <Route path='/quality-policy' element={<Quality_policy />} />
          <Route path='/terms-of-use' element={<Term_of_use />} />
          <Route path='*' element={<Error />} />
          <Route path='/error' element={<Error />} />
          </Route>
        </Routes>
       
        <Footer />
      </BrowserRouter>

    </>
  );
}

export default Router_app;


