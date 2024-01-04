// import { React } from 'react';
import React, { useState, useEffect } from 'react';
import { NavLink, Outlet, useNavigate } from 'react-router-dom';
import BreadCrumbs from '../components/BreadCrumbs';
import { Image } from '../Constants/ImagePaths';
import Firstcome from '../components/Firstcome';



function Header(props) {

    const [sessionData, setSessionData] = useState('')
    const [spinner, setSpinner] = useState(true);
    const [success, setIsSuccess] = useState('');

    const navigate = useNavigate();
    // console.log(success,'header seasson data')
    // check network connection start
    const [status, setStatus] = useState(() => {
        if (navigator.onLine) {
            return true;
        } else {
            return false;
        }
    });
    useEffect(() => {
        window.ononline = (e) => {
            setStatus(true);
        };
        window.onoffline = (e) => {
            alert("Network connection lost.Please once check your connection.");
            setStatus(false);
            navigate("/");
        };
    }, [status]);
    // check network connection end

    useEffect(() => {
        setTimeout(() => setSpinner(false), 1000)
        getPopUp();
    }, []);

    // success message condition start
    useEffect(() => {

        setTimeout(() => {
            setIsSuccess(0)
        }, 10000);
    }, [success])
    // success message condition end

    const getPopUp = async () => {
        const sessondata = await JSON.parse(sessionStorage.getItem('notshowagain'));
        setSessionData(sessondata)
    }


    //   outside click hide nav

    window.addEventListener('mouseup', function (event) {
        var nav_btn = document.getElementById('mob_nav_btn');
        var nav = document.getElementById('header_nav1');
        var arrow = document.querySelectorAll('.has-children-arrow');
        var has_child1 = document.querySelector('#has-children1');
        var has_child2 = document.querySelector('#has-children2');
        if (event.target != nav && event.target.parentNode != nav && event.target != nav_btn &&
             event.target.parentNode != nav_btn && event.target != has_child1 && event.target.parentNode != has_child1 &&
              event.target != has_child2 && event.target.parentNode != has_child2 && event.target != arrow[0] &&
               event.target.parentNode != arrow[0] && event.target != arrow[1] && event.target.parentNode != arrow[1]) {
            document.querySelector('#header_nav1').classList.remove("active");
        }
    });
    const togglenavHandler = () => {
        document.querySelector('#header_nav1').classList.toggle("active");
    }

    return (
        <>
            {/* <!--====== Start Preloader ======--> */}
            {spinner && <div className="preloader">
                <div className="loader">
                    <div className="pre-shadow"></div>
                    <div className="pre-box"></div>
                </div>
            </div>}
            {/* <!--====== End Preloader ======--> */}
            {sessionData === null ? <Firstcome message={setIsSuccess} /> : ''}
            {/* <!--====== Search From ======--> */}
            <div className="modal fade" id="search-modal">
                <div className="modal-dialog modal-dialog-centered" role="document">
                    <div className="modal-content">
                        <form>
                            <div className="form_group">
                                <input type="text" className="form_control" placeholder="Search here..." />
                                <button className="search_btn"><i className="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {/* <!--====== Search From ======--> */}
            {/* <!--====== Start Header Section ======--> */}
            <header className="theme-header">

                {/* <!-- header Navigation --> */}
                <div className={`header-navigation index-header-navigation ${props.class_bg}`}>
                    <div className="container">
                        <div className="primary-menu">
                            <div className="site-branding">
                                <NavLink to='/' className="brand-logo">
                                    <img src={Image.logo1} alt="Site Logo" />
                                    {/* <img src={require("../image/logo-1.png")} alt="Site Logo" /> */}
                                </NavLink>
                            </div>
                            <div id='header_nav1' className="nav-menu">
                                {/* <!-- Navbar Close --> */}
                                <div className="navbar-close"><i className="far fa-times"></i></div>
                                {/* <!-- Nav Search --> */}
                                <div className="nav-search">
                                    <form>
                                        <div className="form_group">
                                            <input type="email" className="form_control" placeholder="Search Here" name="email"
                                                required="" />
                                            <button className="search-btn"><i className="fas fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                                {/* <!-- Main Menu --> */}
                                <nav className="main-menu">
                                    <ul>
                                        <li className="menu-item has-children" id='has-children1'><NavLink to='/about'>About uss</NavLink><span className='has-children-arrow'><i className="fas fa-chevron-down"></i></span>
                                            <ul className="sub-menu sub-menu_about">
                                                <li><NavLink to='/about/why-choose-us'><img src={require("../image/menu_icons/choose-us.png")} alt="" /> Why Choose Us</NavLink></li>
                                                <li><NavLink to='/about/our-delivery-process'><img src={require("../image/menu_icons/about.png")} alt="" /> Our Delivery Process</NavLink></li>
                                                <li><NavLink to='/about/some-of-our-work'><img src={require("../image/menu_icons/our-team.png")} alt="" /> Some of Our Work</NavLink></li>
                                                <li><NavLink to='/about/case-study'><img src={require("../image/menu_icons/Case-Study.png")} alt="" /> Case Study</NavLink></li>
                                                <li><NavLink to='/about/career'><img src={require("../image/menu_icons/career.png")} alt="" /> Career</NavLink></li>
                                            </ul>
                                        </li>
                                        <li className="menu-item has-children" id='has-children2'><NavLink to='/service/discovery-and-design-service'>Services</NavLink><span className='has-children-arrow'><i className="fas fa-chevron-down"></i></span>
                                            <ul className="sub-menu">
                                                <li className="extra_sub_menu_wrapper">
                                                    <h6>Development and Support</h6>
                                                    <ul className="extra_sub_menu">
                                                        <li><NavLink to='/service/discovery-and-design-service'>Discovery & Design Service</NavLink></li>
                                                        <li><NavLink to='/service/cloud-computing'>Cloud Transformation Services</NavLink></li>
                                                        <li><NavLink to='/service/code-recovery-and-support'>code recovery & support</NavLink></li>
                                                        <li><NavLink to='/service/digital-engineering'>Digital Engineering</NavLink></li>
                                                    </ul>
                                                </li>
                                                <li className="extra_sub_menu_wrapper">
                                                    <h6>digital marketing</h6>
                                                    <ul className="extra_sub_menu">
                                                        <li><NavLink to='/service/search-engine-optimization'>search engine optimization</NavLink></li>
                                                        <li><NavLink to='/service/social-media-optimization'>social media optimization</NavLink></li>
                                                        <li><NavLink to='/service/app-store-optimization'>app store optimization</NavLink></li>
                                                        <li><NavLink to='/service/pay-per-click'>pay per click</NavLink></li>
                                                    </ul>
                                                </li>
                                                <li className="extra_sub_menu_wrapper">
                                                    <h6>multichannel management</h6>
                                                    <ul className="extra_sub_menu">
                                                        <li><NavLink to='/service/inventory-management'>inventory management</NavLink></li>
                                                        <li><NavLink to='/service/order-management'>order management</NavLink></li>
                                                        <li><NavLink to='/service/amazon-store-design-and-optimization'>amazon store design & optimization</NavLink></li>
                                                        <li><NavLink to='/service/ebay-store-design-and-optimization'>eBay store design & optimization</NavLink></li>
                                                    </ul>
                                                </li>
                                                <li className="extra_sub_menu_wrapper">
                                                    <img src={require("../image/sub_menu_service_img.png")} alt="" />
                                                    <p className="sub_menu_service_img_txt">Go live faster. We work with you to deliver a solution with time-controlled launch plans.</p>

                                                </li>

                                            </ul>
                                        </li>

                                        <li className="menu-item">
                                            <NavLink to='/consultancy'>Consultancy</NavLink>
                                        </li>
                                        <li className="menu-item has-children"><a
                                            href="#">Platforms</a>
                                            <ul className="sub-menu sub-menu_about">
                                                <li><a href="DineMaster.html"><img src={require("../image/menu_icons/Restaurant-Management.png")} alt="" /> DineMaster</a></li>
                                                <li><a href="VacationQ.html"><img src={require("../image/menu_icons/guest-house-management-system.png")} alt="" /> VacationQ</a></li>
                                                <li><a href="CabStream.html"><img src={require("../image/menu_icons/Car-renta.png")} alt="" /> CabStream</a></li>
                                                <li><a href="Smart-Q.html"><img src={require("../image/menu_icons/School-Management.png")} alt="" /> Smart-Q</a></li>
                                                <li><a href="EdEzy.html"><img src={require("../image/menu_icons/College-management.png")} alt="" />EdEzy</a></li>
                                            </ul>

                                        </li>
                                        <li className="menu-item">
                                            <NavLink to='/portfolio'>Portfolio</NavLink>
                                        </li>
                                        <li className="menu-item">
                                            <NavLink to='/insight'>Insights</NavLink>
                                        </li>


                                    </ul>
                                    <NavLink to='/contact' className="contact_buttn">Let's talk</NavLink>


                                </nav>

                            </div>
                            <div className="nav_toggle_button" id="mob_nav_btn" onClick={togglenavHandler}>
                                <img src={require("../image/menu_icons/menu.png")} alt="toggle_menu" />
                            </div>

                        </div>
                    </div>
                </div>
                {success ? (<p className='success_message firstcomeMessage'>Form Submitted Successfully,Our team will be in touch with you shortly.</p>) : ''}
            </header>
            {/* <!--====== End Header Section ======--> */}
            {/* hero section start */}

            {(props.class_bg == 'black_bg') ? <BreadCrumbs /> : null}

            {/* hero section end */}

        </>
    );
}

export default Header;