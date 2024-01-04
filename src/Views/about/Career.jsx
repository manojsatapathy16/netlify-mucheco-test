import React, { useEffect, useState } from 'react';
import Header from '../Header';
import { Helmet } from "react-helmet";
import {helmet} from '../../Utils/Utils';

function Career(props) {
    const[metaData,setMetaData]=useState('');
    const api_type = props.type;
    useEffect( () => {
        helmet(api_type,setMetaData);
        window.scrollTo({top: 0, behavior: 'smooth'});
    }, [api_type])
 
  return (
    <>
     <div className="inner_pages_wrapper">
    <Header class_bg='black_bg' />
    <Helmet>
    <title>{metaData?.data?.meta_title}</title>
                <meta name="description" content={metaData?.data?.meta_description} />
                <meta name="keywords" content={metaData?.data?.meta_keyword} />
            </Helmet>

        {/* <!--====== Start Features Section ======--> */}
        <section className="features-area features-style-four pt-60">
            <div className="container">
                <div className="row align-items-center">
                    <div className="col-lg-6">
                        <div className="text-wrapper">
                            <div className="section-title mb-25 wow fadeInUp" data-aos="fade-up">
                                <span className="sub-title sub-title-bg blue-light-bg">WHY JOIN US?</span>
                                <h2 className="">Expertise, dedication, and results - that's our team.</h2>
                            </div>
                            
                            <div className="block-style-twentyOne d-flex wow fadeInUp" data-aos="fade-up">
                                <div className="icon purple-blue-bg">
                                    <img src={require("../../image/career/secure-shield.png")} alt=""/>
                                </div>
                                <div className="text">
                                    <h4>Job security and stability</h4>
                                    <p>Secure and reliable employment with long-term growth potential.</p>
                                </div>
                            </div>
                            <div className="block-style-twentyOne d-flex wow fadeInUp" data-aos="fade-up">
                                <div className="icon blue-light-bg">
                                    <img src={require("../../image/career/increment.png")} alt=""/>
                                </div>
                                <div className="text">
                                    <h4>Competitive Salary & Bonuses</h4>
                                    <p>We offer competitive salaries and comprehensive benefits packages.</p>
                                </div>
                            </div>
                            <div className="block-style-twentyOne d-flex wow fadeInUp" data-aos="fade-up">
                                <div className="icon purple-blue-bg">
                                    <img src={require("../../image/menu_icons/career.png")} alt=""/>
                                </div>
                                <div className="text">
                                    <h4>Career development</h4>
                                    <p>Grow your career with training, mentorship, and advancement opportunities.</p>
                                </div>
                            </div>
                            <div className="block-style-twentyOne d-flex wow fadeInUp" data-aos="fade-up">
                                <div className="icon blue-light-bg">
                                    <img src={require("../../image/career/work-flexible.png")} alt=""/>
                                </div>
                                <div className="text">
                                    <h4>Flexible Timings</h4>
                                    <p>Achieve work-life balance with flexible schedules and remote options.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="col-lg-6">
                        <div className="img-holder-box">
                            <div className="row">
                                <div className="col-md-6">
                                    <div className="img-holder border-top-left-radius wow fadeInLeft" data-aos="fade-left">
                                        <img src={require("../../image/career/img-7.jpg")} alt="Features Image"/>
                                    </div>
                                </div>
                                <div className="col-md-6">
                                    <div className="img-holder wow fadeInUp" data-aos="fade-up">
                                        <img src={require("../../image/career/img-8.jpg")} alt="Features Image"/>
                                    </div>
                                </div>
                                <div className="col-md-6">
                                    <div className="img-holder wow fadeInDown" data-aos="fade-down">
                                        <img src={require("../../image/career/img-9.jpg")} alt="Features Image"/>
                                    </div>
                                </div>
                                <div className="col-md-6">
                                    <div className="img-holder border-bottom-right-radius mt-30 wow fadeInRight" data-aos="fade-right">
                                        <img src={require("../../image/career/img-10.jpg")} alt="Features Image"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {/* <!--====== End Features Section ======--> */}
        {/* <!--====== Start Features Section ======--> */}
        <section className="features-area pt-120 pb-100">
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-lg-6">
                        <div className="section-title mb-25 wow fadeInUp text-center" data-aos="fade-up">
                            <span className="sub-title sub-title-bg blue-light-bg">HOW WE HIRE?</span>
                            <h2 className="">Candidate skills, passion, and personality over qualifications</h2>
                        </div>
                       
                    </div>
                </div>
                <div className="row">
                    <div className="col-md-6 col-sm-12">
                        <div className="block-style-twentyTwo animate-icon d-flex align-items-start mb-30 wow fadeInUp" data-wow-delay=".2s" data-aos="fade-up" data-aos-duration="400">
                            <div className="icon">
                                <i className="fal fa-briefcase"></i>
                            </div>
                            <div className="text">
                                <h3>CV screening</h3>
                                <p>Assess qualifications, experience, leadership, and teamwork skills.</p>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-6 col-sm-12">
                        <div className="block-style-twentyTwo animate-icon d-flex align-items-start mb-30 wow fadeInUp" data-wow-delay=".3s" data-aos="fade-up" data-aos-duration="600">
                            <div className="icon">
                                <i className="fal fa-atom-alt"></i>
                            </div>
                            <div className="text">
                                <h3>Interview</h3>
                                <p>Evaluate fit, motivation, culture, and communication skills.</p>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-6 col-sm-12">
                        <div className="block-style-twentyTwo animate-icon d-flex align-items-start mb-30 wow fadeInUp" data-wow-delay=".4s" data-aos="fade-up" data-aos-duration="800">
                            <div className="icon">
                                <i className="fal fa-bell"></i>
                            </div>
                            <div className="text">
                                <h3>Skills assessment</h3>
                                <p>Test technical skills, problem-solving, design, or project management.</p>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-6 col-sm-12">
                        <div className="block-style-twentyTwo animate-icon d-flex align-items-start mb-30 wow fadeInUp" data-wow-delay=".5s" data-aos="fade-up" data-aos-duration="1000">
                            <div className="icon">
                                <i className="fal fa-headphones-alt"></i>
                            </div>
                            <div className="text">
                                <h3>Offer and onboarding</h3>
                                <p>Collaborate on offers, negotiate, conduct background checks, and onboard.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {/* <!--====== End Features Section ======--> */}
        {/* <!--====== Start Job Section ======--> */}
        <section className="job-area job-style-one light-gray-bg pb-130 pt-130">
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-lg-6">
                        <div className="section-title mb-25 wow fadeInUp text-center" data-aos="fade-up">
                            <span className="sub-title sub-title-bg blue-light-bg">OUR CURRENT OPENINGS</span>
                            {/* <!-- <h2 className="">We are hiring for diverse roles and backgrounds, apply now.</h2> --> */}
                            <h2 className="">We do not have any open positions available at this time.</h2>
                        </div>
                        
                    </div>
                </div>
                <div className="no_vacancy">
                    <img src={require("../../image/career/no_vacancy.png")} alt=""/>
                </div>
                 {/* <div className="open_vacancy">
                <div className="row">
                    <div className="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div className="single-job-item text-center mb-30 wow fadeInUp" data-wow-delay=".2s"  data-aos="fade-up" data-aos-duration="400">
                            <div className="icon">
                                <img src={require("../../image/icon-3.png")} alt=""/>
                            </div>
                            <div className="text">
                                <h3 className="title"><a href="#">Senior Design</a></h3>
                                <span className="salary"><i className="far fa-tags"></i>$250 - 859/ monthly</span>
                                <p>Quis autem veleum reprehe
                                    nderit quin voluptate</p>
                                <a href="#" className="main-btn btn-purple">apply now</a>
                            </div>
                        </div>
                    </div>
                    <div className="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div className="single-job-item text-center mb-30 wow fadeInUp" data-wow-delay=".3s" data-aos="fade-up" data-aos-duration="600">
                            <div className="icon">
                                <img src={require("../../image/icon-3.png")} alt=""/>
                            </div>
                            <div className="text">
                                <h3 className="title"><a href="#">Senior Design</a></h3>
                                <span className="salary"><i className="far fa-tags"></i>$250 - 859/ monthly</span>
                                <p>Quis autem veleum reprehe
                                    nderit quin voluptate</p>
                                <a href="#" className="main-btn btn-purple">apply now</a>
                            </div>
                        </div>
                    </div>
                    <div className="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div className="single-job-item text-center mb-30 wow fadeInUp" data-wow-delay=".4s"  data-aos="fade-up" data-aos-duration="800">
                            <div className="icon">
                                <img src={require("../../image/icon-3.png")} alt=""/>
                            </div>
                            <div className="text">
                                <h3 className="title"><a href="#">Senior Design</a></h3>
                                <span className="salary"><i className="far fa-tags"></i>$250 - 859/ monthly</span>
                                <p>Quis autem veleum reprehe
                                    nderit quin voluptate</p>
                                <a href="#" className="main-btn btn-purple">apply now</a>
                            </div>
                        </div>
                    </div>
                    <div className="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div className="single-job-item text-center mb-30 wow fadeInUp" data-wow-delay=".5s"  data-aos="fade-up" data-aos-duration="1000">
                            <div className="icon">
                                <img src={require("../../image/icon-3.png")} alt=""/>
                            </div>
                            <div className="text">
                                <h3 className="title"><a href="#">Senior Design</a></h3>
                                <span className="salary"><i className="far fa-tags"></i>$250 - 859/ monthly</span>
                                <p>Quis autem veleum reprehe
                                    nderit quin voluptate</p>
                                <a href="#" className="main-btn btn-purple">apply now</a>
                            </div>
                        </div>
                    </div>
                    <div className="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div className="single-job-item text-center mb-30 wow fadeInUp" data-wow-delay=".6s"  data-aos="fade-up" data-aos-duration="1200">
                            <div className="icon">
                                <img src={require("../../image/icon-3.png")} alt=""/>
                            </div>
                            <div className="text">
                                <h3 className="title"><a href="#">Senior Design</a></h3>
                                <span className="salary"><i className="far fa-tags"></i>$250 - 859/ monthly</span>
                                <p>Quis autem veleum reprehe
                                    nderit quin voluptate</p>
                                <a href="#" className="main-btn btn-purple">apply now</a>
                            </div>
                        </div>
                    </div>
                    <div className="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div className="single-job-item text-center mb-30 wow fadeInUp" data-wow-delay=".7s" data-aos="fade-up" data-aos-duration="1400">
                            <div className="icon">
                                <img src={require("../../image/icon-3.png")} alt=""/>
                            </div>
                            <div className="text">
                                <h3 className="title"><a href="#">Senior Design</a></h3>
                                <span className="salary"><i className="far fa-tags"></i>$250 - 859/ monthly</span>
                                <p>Quis autem veleum reprehe
                                    nderit quin voluptate</p>
                                <a href="#" className="main-btn btn-purple">apply now</a>
                            </div>
                        </div>
                    </div>
                    <div className="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div className="single-job-item text-center mb-30 wow fadeInUp" data-wow-delay=".8s" data-aos="fade-up" data-aos-duration="1600">
                            <div className="icon">
                                <img src={require("../../image/icon-3.png")} alt=""/>
                            </div>
                            <div className="text">
                                <h3 className="title"><a href="#">Senior Design</a></h3>
                                <span className="salary"><i className="far fa-tags"></i>$250 - 859/ monthly</span>
                                <p>Quis autem veleum reprehe
                                    nderit quin voluptate</p>
                                <a href="#" className="main-btn btn-purple">apply now</a>
                            </div>
                        </div>
                    </div>
                    <div className="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div className="single-job-item text-center mb-30 wow fadeInUp" data-wow-delay=".9s"  data-aos="fade-up" data-aos-duration="1800">
                            <div className="icon">
                                <img src={require("../../image/icon-3.png")} alt=""/>
                            </div>
                            <div className="text">
                                <h3 className="title"><a href="#">Senior Design</a></h3>
                                <span className="salary"><i className="far fa-tags"></i>$250 - 859/ monthly</span>
                                <p>Quis autem veleum reprehe
                                    nderit quin voluptate</p>
                                <a href="#" className="main-btn btn-purple">apply now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="row">
                    <div className="col-lg-12">
                        <div className="button text-center mt-30" data-wow-delay=".8s">
                            <a href="#" className="main-btn btn-blue-light ">View more jobs</a>
                        </div>
                    </div>
                </div>
            </div>  */}
            </div>
        </section>
        {/* <!--====== End Job Section ======--> */}
   
     </div>
   
     
    </>
    );
}

export default Career;