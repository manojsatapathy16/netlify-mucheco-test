import React, { useState } from 'react';
import { Link, NavLink } from 'react-router-dom';
import Firstcome from '../components/Firstcome';

function Footer() {
    const date = new Date().getFullYear();
    const[isScroll,setIsScroll]=useState(false);
    window.addEventListener("scroll", (event) => {
        let scroll = window.scrollY;
        if(scroll>0){
            setIsScroll(true);
        }
        else{
            setIsScroll(false);
        }
    });
    
    
    function scrollToTop() {
        window.scrollTo({top: 0, behavior: 'smooth'});
        }
 
 
  return (
    <>
    
    {/* <!--====== Start Footer ======--> */}
    <footer className="footer-area footer-default black-bg footer-map">
        {/*     <!--====== Start Newsletter Section ======--> */}
    <section className="newsletter-area newsletter-style-one">
        <div className="container">
            <div className="newsletter-wrapper bg_cover wow fadeInDown" data-aos="fade-down" data-aos-duration="1000">
                <div className="newsletter-inn">
                    <div className="">
                        <div className="newsletter-content-box">
                         
                            <div className="content">
                                <h2>Schedule Your Free Consultation</h2>
                            </div>
                        </div>
                    </div>
                    <div className="">
                        <div className="newsletter-form">
                            <form>
                                <div className="form_group">
                                    <Link to='/Contact' className="main-btn btn-black">Get a quote <i
                                            className="fas fa-arrow-right"></i></Link>
                                    <Link to='tel:+442030049800' className="main-btn btn-black transparent_btn">Book a call <i
                                            className="fas fa-arrow-right"></i></Link>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {/* <!--====== End Newsletter Section ======--> */}
        <div className="container">
            <div className="footer-widget pt-140 pb-20">
                <div className="row">
                    <div className="col-lg-3 col-md-6 col-sm-12">
                        <div className="widget about-widge wow fadeInUp" data-aos="fade-up" data-aos-duration="300">
                            <div className="logo mb-35">
                            <NavLink to='/'>
                            <img src={require("../image/logo-1.png")}
                                        alt="Theme Logo" />
                            </NavLink>
                            </div>
                            <div className="about-content">
                                <p>Mucheco® a Cloud base application, simplifying the online retailing across multiple market places like eBay, Amazon, Rakuten, Sears, Jet.com and Newegg etc.</p>
                            </div>
                        </div>
                    </div>
                    <div className="col-lg-3 col-md-6 col-sm-12">
                        <div className="widget footer-nav-widget wow fadeInUp" data-aos="fade-up" data-aos-duration="500">
                            <h4 className="widget-title">About Us</h4>
                            <ul className="footer-nav list-style-dot">
                                <li><NavLink to="/why-choose-us"> Why Choose Us</NavLink></li>
                                        <li><NavLink to="/our-delivery-process"> Our Delivery Process</NavLink></li>
                                        <li><NavLink to="/some-of-our-work"> Some of Our Work</NavLink></li>
                                        <li><NavLink to="/case-study"> Case Study</NavLink></li>
                                        <li><NavLink to="/career"> Career</NavLink></li>
                                        <li><NavLink to="/faq"> FAQ</NavLink></li>
                            </ul>
                        </div>
                    </div>
                    <div className="col-lg-3 col-md-6 col-sm-12">
                        <div className="widget footer-nav-widget wow fadeInUp" data-aos="fade-up" data-aos-duration="700">
                            <h4 className="widget-title">Contact 1</h4>
                            <div className="footer-nav list-style-dot">
                                <div className="address">
                                    <span>UK Address:</span>
                                    <p>Mucheco Limited<br/>Iveco House, ProHal, Station Rd, Watford WD17 1ET, United Kingdom</p>
                                    <p>
                                        <span className="footer_phone"><i className="far fa-phone"></i></span>+44 20 3004 9800
                                    </p>
                                        <p><i className="far fa-envelope"></i><span><Link
                                            to="mailto:hotline@gmail.com">sales@mucheco.com</Link></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="col-lg-3 col-md-6 col-sm-12">
                        <div className="widget footer-nav-widget wow fadeInUp" data-aos="fade-up" data-aos-duration="900">
                            <h4 className="widget-title">Contact 2</h4>
                            <div className="footer-nav list-style-dot">
                                <div className="address address2">
                                    <span>US  Address:</span>
                                    <p>SuyogComputechInc <br/>345 Plainfield Ave, Ste. 102, Edison, NJ 08817,USA</p>
                                    <p>
                                        <span className="footer_phone"><i className="far fa-phone"></i></span>+1 732 931 7070
                                    </p>
                                        <p><i className="far fa-envelope"></i><span><Link
                                            to="mailto:hotline@gmail.com">sales@mucheco.com</Link></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div className="footer-copyright">
                <div className="row">
                    <div className="col-md-5">
                        <ul className="social-link">
                            <li><Link to="https://www.facebook.com/muchecodotcom" target='_blank'><i className="fab fa-facebook-f"></i></Link></li>
                            <li><Link to="https://www.instagram.com/mucheco_ltd/"><i className="fab fa-instagram"></i></Link></li>
                            <li><Link to="https://twitter.com/muchecodotcom" target='_blank'><i className="fab fa-twitter"></i></Link></li>
                            <li><Link to="https://www.linkedin.com/company/mucheco" target='_blank'><i className="fab fa-linkedin"></i></Link></li>
                            <li><Link to="https://www.youtube.com/c/muchecodotcom" target='_blank'><i className='fab fa-youtube'></i></Link></li>
                            
                        </ul>
                    </div>
                    <div className="col-md-7">
                        <ul className="imp-link float-md-right float-sm-none">
                            
                            <li><NavLink to="/privacy-policy">Privacy Policy</NavLink></li>
                            <li><NavLink to="/terms-of-use">Terms of Use</NavLink></li>
                            <li><NavLink to="/quality-policy">Quality Policy </NavLink></li>
                            <li><NavLink to="/disclaimer">Disclaimer </NavLink></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div className="footer-copyright footer-copyright-bottom">
               <p className='disclamer_footer'>DISCLAIMER: mucheco.com, nor its operators are affiliated with or funded by Amazon.com, Inc in any way.</p>
               <p className='copy_rgt'>Copyright © {date} mucheco</p>
            </div>
        </div>
        {isScroll?(<span className='scrollToTop' onClick={scrollToTop}>scroll to top</span>):(null)}
    
    </footer>
    {/* <!--====== End Footer ======--> */}

    </>
    );
}

export default Footer;