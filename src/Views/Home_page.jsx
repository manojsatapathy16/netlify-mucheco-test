import React, { useEffect, useState } from 'react';
import OwlCarousel from 'react-owl-carousel';
import bannerimage from "../image/banner1.webp";
import AOS from 'aos';
import '../css/aos.css'
import Header from './Header';
import { Helmet } from "react-helmet";
import CursorCircle from '../components/CursorCircle';
import { useNavigate, Outlet, Link } from 'react-router-dom';
import { helmet } from '../Utils/Utils';
import { CallApi_Without_Token } from '../Services/Client';
import { API } from '../Services/Apis';
import Footer from './Footer';



function Home_page(props) {
    const [testimonialData, setTestimonialData] = useState([]);
    const [caseStudyData, setCaseStudyData] = useState([]);
    const [blogData, setBlogData] = useState([]);
    const [isPortfolioDataErr, setIsPortfolioDataErr] = useState(false);
    const [isBlogDataErr, setIsBlogDataErr] = useState(false);
    const [isCasestudyDataErr, setIsCasestudyDataErr] = useState(false);
    const [metaData, setMetaData] = useState('');
    const navigate = useNavigate();
    const api_type = props.type;

    useEffect(() => {
        helmet(api_type, setMetaData);
        fetchInfo();
        fetchCaseStudy();
        latestBlogInfo();
    }, [api_type])

    const fetchInfo = async () => {
        try{
        var formdata = new FormData();
        formdata.append("request_type", 'testimonial');
        const data = await CallApi_Without_Token('POST', API.ABOUT_US, formdata)
        if (data.status === 1) {
            setTestimonialData(data)
            setIsPortfolioDataErr(true)
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
        else{
            setIsPortfolioDataErr(false)
        }
    }
    catch (e) {
        setIsPortfolioDataErr(false)
    }
    }
    const fetchCaseStudy = async () => {
        try{
        var formdata = new FormData();
        formdata.append("request_type", 'get_case_study_list');
        const data = await CallApi_Without_Token('POST', API.CASE_STUDY, formdata)
        if (data.status === 1) {
            setCaseStudyData(data)
            setIsCasestudyDataErr(true)
        }
        else{
            setIsCasestudyDataErr(false)
        }
    }
        catch (e) {
            setIsCasestudyDataErr(false)
        }
    }
    const latestBlogInfo = async () => {
        try{
        var formdata = new FormData();
        formdata.append("request_type", 'get_blog_list');
        const data = await CallApi_Without_Token('POST', API.INSIGHT_PAGE, formdata)
       
        if (data.status === 1) {
            setBlogData(data)
            setIsBlogDataErr(true);
        } else {
            setIsBlogDataErr(false);
        }
    }
        catch(e){ 
            setIsBlogDataErr(false);
        }
    }

    
    const homeBlogHandler = (each) => {
        const slug=each.slug;
        navigate(`/${slug}`);
    }

    const readmoreHandler = (id) => {
        // const clickedId = e.target.id;
        // console.log(clickedId,'homepage----------')
      
        navigate('/caseStudy-details', { state: { id } });
    }

    // aos initilize start
    const brands = ['mercato_br1.png', 'system_active_br2.png', 'desenfunda_br3.png', 'gather_br4.png', 'epolis_br5.png', 'sisti_br6.png',
        'darvish_tech_br7.png', 'knoll_br8.png', 'gor_br8.png', 'dream-furnishings_br9.png']

    const post_blog = [{
        post_img: 'latest_news1.jpg', post_date: ' 08 Feb 2023', post_name: 'Donec a porttitor phari sod tellus Nunc quis erosn.',
        post_description: 'Praesent nec dapibus enim, ut pulvinar metus. Suspendisse arcu orci, pulvinar vitae...'
    },

    {
        post_img: 'latest_news2.jpg', post_date: ' 10 Aug 2023', post_name: 'Donec a porttitor phari sod tellus Nunc quis erosn.',
        post_description: 'Praesent nec dapibus enim, ut pulvinar metus. Suspendisse arcu orci, pulvinar vitae...'
    },

    {
        post_img: 'latest_news3.jpg', post_date: ' 16 Jun 2023', post_name: 'Donec a porttitor phari sod tellus Nunc quis erosn.',
        post_description: 'Praesent nec dapibus enim, ut pulvinar metus. Suspendisse arcu orci, pulvinar vitae...'
    }
    ]

    const options = {
        responsive: {
            0: {
                items: 1,
            },
            400: {
                items: 1,
            },
            600: {
                items: 2,
            },
            700: {
                items: 3,
            }
        },
    };
    const portfolio_slider = {
        responsive: {
            0: {
                items: 1,
            },
            400: {
                items: 1,
            },
            600: {
                items: 2,
            },
            700: {
                items: 2,
            }
        },
    };


    return (
        <>
            {/* <CursorCircle> */}



            <Header page='home-page' />
            {/* <!--====== Start Hero Section ======--> */}
            <Helmet>
                <title>{metaData?.data?.meta_title}</title>
                <meta name="description" content={metaData?.data?.meta_description} />
                <meta name="keywords" content={metaData?.data?.meta_keyword} />
            </Helmet>
            <section className="hero-area">
                <div className="hero-wrapper-one hero-slider-one slick-initialized slick-slider slick-dotted slick-vertical">
                    <div className="slick-list draggable" >
                        <div className="slick-track">
                            <div className="single-slider bg_cover slick-slide slick-current slick-active"
                                style={{ backgroundImage: `url(${bannerimage})` }} data-slick-index="2"
                                aria-hidden="false" tabIndex="0" role="tabpanel" id="slick-slide02"
                                aria-describedby="slick-slide-control02">
                                <div className="container">
                                    <div className="row">
                                        <div className="col-lg-12">
                                            <div className="hero-content text-left">

                                                <h1 data-aos="fade-down" data-aos-duration="500"
                                                    className="">Revolutionizing Your <br /> Online
                                                    <span style={{ color: '#DB1C00' }}>P</span>r<span style={{ color: '#3ac0eb' }}>e</span>se<span style={{ color: '#FA6800' }}>n</span>ce</h1>
                                                <p data-aos="fade-up" data-aos-duration="500">Empowering businesses to conquer the digital marketplace<br /> with Specialized <span className="banner_para_span">eCommerce Technology</span></p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </section>
            {/* <!--====== End Hero Section ======--> */}

            {/* <!--====== Start About Section ======--> */}
            <section className="fancy-about fancy-about-one pt-50 position-relative pb-45" id="about_section">
                <div className="container">
                    <div className="row">
                        <div className="col-lg-7">
                            <div className="about-img-box  wow fadeInLeft" data-aos="fade-right" data-aos-duration="1000">
                                <img src={require("../image/about-1.jpg")} alt="About image" />
                            </div>
                        </div>
                        <div className="col-lg-5">
                            <div className="text-wrapper  wow fadeInRight" data-aos="fade-left" data-aos-duration="1000">
                                <div className="section-title mb-20">
                                    <span className="sub-title red-dark text-underline">About us</span>
                                    <h2 className="text-transform side_line">Discover our story of innovation & excellence.</h2>
                                </div>
                                <p>Welcome to Mucheco®, your one-stop solution for simplifying online retailing across multiple marketplaces like eBay, Amazon, Rakuten, Sears, Jet.com, and Newegg. We are a cloud-based application that offers cost-effective solutions for online selling, along with creative and responsive design services that ensure your online presence stands out.

                                </p>
                                <Link to="/about" className="main-btn bg_blu">learn more</Link>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {/* <!--====== End About Section ======--> */}
            {/* <!--====== Start Features Section ======--> */}
            <section className="fancy-features light-gray-bg pt-120 pb-90 Features_start home_what_we_do">
                <div className="container">
                    <div className="row justify-content-center">
                        <div className="col-lg-6">
                            <div className="section-title text-center mb-45 wow fadeInUp" data-aos="fade-up">
                                <span className="sub-title red-dark text-underline">what we do?</span>
                                <h2 className="text-uppercase">Bringing your online vision to life with innovative design and development.</h2>
                            </div>
                        </div>
                    </div>
                    <div className="row">
                        <div className="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div className="block-style-two animate-icon mb-40 wow fadeInUp" data-aos="fade-up" data-aos-duration="500">
                                <div className="icon">
                                    <img src={require("../image/icon-2.png")} alt="" />
                                </div>
                                <div className="text">
                                    <h3 className="text-underline"><Link to="/inventory-management">Multichannel Management</Link></h3>
                                    <p>We enable seamless communication and coordination across various channels with omnichannel integration.
                                    </p>
                                    {/* <!-- <Link to="#" className="red-dark">Read More</Link> --> */}
                                </div>
                            </div>
                        </div>
                        <div className="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div className="block-style-two animate-icon mb-40 wow fadeInUp" data-aos="fade-up" data-aos-duration="700">
                                <div className="icon">
                                    <img src={require("../image/icon-3.png")} alt="" />
                                </div>
                                <div className="text">
                                    <h3 className="text-underline"><Link to="/discovery-and-design">Development and Support</Link></h3>
                                    <p>We offer end-to-end software development and maintenance services with agile methodologies.
                                    </p>
                                    {/* <!-- <Link to="#" className="red-dark">Read More</Link> --> */}
                                </div>
                            </div>
                        </div>
                        <div className="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div className="block-style-two animate-icon mb-40 wow fadeInUp" data-aos="fade-up" data-aos-duration="900">
                                <div className="icon">
                                    <img src={require("../image/icon-4.png")} alt="" />
                                </div>
                                <div className="text">
                                    <h3 className="text-underline"><Link to="/search-engine-optimization">Digital Marketing</Link></h3>
                                    <p>Our data-driven approach to SEO, PPC, and SMM helps to increase online visibility.
                                    </p>
                                    {/* <!-- <Link to="#" className="red-dark">Read More</Link> --> */}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {/* <!--====== End Features Section ======--> */}
            {/* <!-- case study section start --> */}
            {isCasestudyDataErr?<div className="case_study">
                <div className="container">
                    <div className="section-title mb-45 wow fadeInUp case_study_title">
                        <div className="blank_case_study"></div>
                        <div className="case_title_main">
                            <span className="sub-title red-dark text-underline">latest Case Studies</span>
                            <h2 className="text-uppercase">A diversified resilient portfolio.</h2>

                        </div>
                    </div>
                    {/* <!-- Slider --> */}
                    <div className="" id="case_studyy">
                        <OwlCarousel className='owl-theme' loop margin={30} nav autoplay={true} {...options}>
                            {Array.isArray(caseStudyData?.data) ? <>
                                {caseStudyData?.data.map((each, key) => {

                                    return (
                                        <div key={key.toString()} className="item" >
                                            <div className="case_study_img_wrap">
                                            <img src={each.card_image} alt="" width="100%" />
                                            </div>
                                            <div className="case_img_overtxt" onClick={()=>readmoreHandler(each.id)} id={each.id}>
                                                <div className="case_img_overtxt_details" >
                                                    <h3 onClick={()=>readmoreHandler(each.id)} id={each.id}>{each.site_name}</h3>
                                                    <p onClick={()=>readmoreHandler(each.id)} id={each.id}>{each.site_work}</p>
                                                </div>
                                            </div>
                                        </div>
                                    )
                                })}
                            </> : null}
                            
                        </OwlCarousel>
                    </div>
                    {/* <!-- Slider END --> */}
                </div>

            </div>:null}
            
            {/* <!-- case study section end --> */}

            {/* <!--====== Start Service Section ======--> */}
            <section className="service-area dark-black-bg pt-130 pb-130" id="service_section">
                <div className="container">
                    <div className="row align-items-center service-style-one">
                        <div className="col-lg-4">
                            <div className="text-wrapper mb-40 wow fadeInLeft" data-aos="fade-right" data-aos-duration="1000">
                                <div className="section-title section-title mb-20">
                                    <span className="sub-title red-dark text-underline">HOW WE WORK?</span>
                                    <h2 className="text-uppercase">Innovation doesn't happen by chance.
                                    </h2>
                                </div>
                                <p>Partnering with you for success, every step of the way. From effective communication, to expert planning, and flawless execution.</p>
                                <Link to="/Portfolio" className="main-btn">explore projects</Link>
                            </div>
                        </div>
                        <div className="col-lg-8">
                            <div className="service-wrapper">
                                <div className="row no-gutters">
                                    <div className="col-md-6">
                                        <div className="block-style-three animate-icon border-right-1 wow fadeInUp"
                                        >
                                            <div className="service_wrapper_icon_txt" data-aos="fade-up" data-aos-duration="300">
                                                <div className="icon">
                                                    <img src={require("../image/service_icon2.png")} alt="" />
                                                </div>
                                                <div className="text">
                                                    <h3 className="title"><Link to="#">Strategy</Link></h3>
                                                    <p>We align the project scope with client's requirements, conduct feasibility studies and define project roadmap.</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div className="col-md-6">
                                        <div className="block-style-three animate-icon pr-lg-0 wow fadeInUp">
                                            <div className="service_wrapper_icon_txt" data-aos="fade-up" data-aos-duration="500">
                                                <div className="icon">
                                                    <img src={require("../image/service_icon1.png")} alt="" />
                                                </div>
                                                <div className="text">
                                                    <h3 className="title"><Link to="#">Design & Development</Link></h3>
                                                    <p>Our experts develop high-quality software with robust architecture, optimized coding, and responsive design.</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div className="col-md-6">
                                        <div className="block-style-three animate-icon border-right-1 wow fadeInUp">
                                            <div className="service_wrapper_icon_txt" data-aos="fade-up" data-aos-duration="700">
                                                <div className="icon">
                                                    <img src={require("../image/service_icon3.png")} alt="" />
                                                </div>
                                                <div className="text">
                                                    <h3 className="title"><Link to="#">Testing</Link></h3>
                                                    <p>Our QA team ensures software quality with various testing methodologies, like manual, automated, and regression testing. </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div className="col-md-6">
                                        <div className="block-style-three animate-icon pr-lg-0 wow fadeInUp">
                                            <div className="service_wrapper_icon_txt" data-aos="fade-up" data-aos-duration="900">
                                                <div className="icon">
                                                    <img src={require("../image/service_icon4.png")} alt="" />
                                                </div>
                                                <div className="text">
                                                    <h3 className="title"><Link to="#">Deploy</Link></h3>
                                                    <p>We use a continuous integration, and delivery (CI/CD) pipeline during deployment for seamless delivery.</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {/* <!-- ====== End Service Section ====== --> */}
            {/* <!-- portfolio section start --> */}
            {isPortfolioDataErr?<div className="portfolio" id="portfolio">
                <div className="container">
                    <div className="portfolio-title mb-45 wow fadeInUp portfolio_title">
                        <div className="portfolio_title_main side_line">
                            <span className="sub-title red-dark text-underline">Testimonials</span>
                            <h2 className="text-uppercase">Our Client Reviews</h2>

                        </div>
                    </div>
                    {/* <!-- Slider --> */}
                    <div className="" id="portfolioo">
                        <OwlCarousel className='owl-theme'  loop margin={30} nav autoplay={true} {...portfolio_slider}>
                            {Array.isArray(testimonialData?.data) ? <>
                                {testimonialData?.data?.map((each, key) => {
                                    return (
                                        <div className="item" key={key}>
                                            <div className="testimonial-item">
                                                <div className="item-content basic">
                                                    <span><img src={require("../image/quote_portfolio.png")} className="quote_img" alt="image" /></span>
                                                    <p>{each.description}</p>
                                                </div>
                                                <div className="testimonial-content">
                                                    <div className="image-wrap">
                                                        <img src={each.profile} className="attachment-large size-large wp-post-image" alt="" />
                                                    </div>
                                                    <div className="testimonial-information">
                                                        <div className="testimonial-name">{each.company}</div>
                                                        <span className="testimonial-title">{each.customer_name}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    )
                                })}
                            </> : null}
                        </OwlCarousel>

                    </div>
                    {/* <!-- Slider END --> */}
                </div>

            </div>:null}
            {/* <!-- portfolio section end --> */}

            {/* <!-- news&blog section start --> */}
            {isBlogDataErr? <div className="news_blog">
                <div className="container">
                    <div className="portfolio-title mb-30 wow fadeInUp portfolio_title">
                        <div className="portfolio_title_main side_line">
                            <span className="sub-title red-dark text-underline">News & BLog</span>
                            <h2 className="text-uppercase">Read Our Latest News & Articles</h2>

                        </div>
                    </div>
                    {/* <!-- Slider --> */} 
                    <div className="" id="news_blog">
                        <OwlCarousel className='owl-theme' items={3} loop margin={30} nav autoplay={true} {...options}>
                        {Array.isArray(blogData?.data) ? <>
                            {blogData?.data.map((each, key) => {
                                return (
                                    <div className="item" key={key}>
                                        <div className="blog-inner-wrap ">
                                            <div className="image-wrap">
                                                <Link className="pointer-events"
                                                    to="#"
                                                    tabIndex="0">
                                                    <img src={each?.media}
                                                        className="post-image"
                                                        alt="" /> </Link>
                                                <div className="date"><i className='far fa-clock'></i>
                                                    {each?.created_at}</div>
                                            </div>
                                            <div className="blog-content">
                                                <h3 className="blog-name"><Link className="pointer-events"
                                                    to="#">{each?.title}</Link></h3>
                                                <div dangerouslySetInnerHTML={{ __html: each?.meta_description }} className="home-blog-description"></div>
                                                {/* <p className="home-blog-description">{each?.description}</p> */}
                                                <div className="blog-btn-part btn_borer_no">
                                                    <span className="blog-btn"
                                                        >
                                                        <span onClick={()=>homeBlogHandler(each)} id={each?.id} className="btn-txt">Get Started</span>
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                )
                            })}
                            </>:null}


                        </OwlCarousel>

                    </div>
                    {/* <!-- Slider END --> */}
                </div>

            </div>:null}
           
            {/* <!-- news&blog section end --> */}
            {/* <!--====== Start Features Section ======--> */}
            <section className="fancy-features banner_over_cnt">
                <div className="continer-fluid p-0">
                    <div className="features-style-one pt-50 pb-50">
                        <div className="container">
                            <div className="row">
                                <div className="col-lg-6">
                                    <div className="section-title mb-45 wow fadeInUp"
                                        style={{ visibility: 'visible' }}>
                                        <p className="sub-title red-dark">25 Glorious Years  <span> of Crafting </span></p>
                                        <h2 className="text-uppercase">Success Stories for Global Brands</h2>
                                    </div>
                                </div>
                            </div>
                            <div className="brands">
                                {brands.map((each, key) => {
                                    return (
                                        <div className="brand" key={key}>
                                            <img src={require(`../image/${each}`)} alt="" />
                                        </div>)
                                })}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {/* <!--====== End Features Section ======--> */}
            {/* </CursorCircle> */}

            <Outlet />
        </>
    );
}

export default Home_page;