import React, { useEffect, useState } from 'react';
import Header from '../Header';
import OwlCarousel from 'react-owl-carousel';
import { Helmet } from "react-helmet";
import { helmet } from '../../Utils/Utils';

function Ourdeliveryprocess(props) {
    const [metaData, setMetaData] = useState('');
    const api_type = props.type;
    useEffect(() => {
        helmet(api_type, setMetaData);
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }, [api_type])

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


    return (
        <>
            <div className="inner_pages_wrapper">
                <Header class_bg='black_bg' />
                <Helmet>
                    <title>{metaData?.data?.meta_title}</title>
                    <meta name="description" content={metaData?.data?.meta_description} />
                    <meta name="keywords" content={metaData?.data?.meta_keyword} />
                </Helmet>
                {/* <!--====== Start About Section ======--> */}

                <section className="our_Delivery_Process pt-60 pb-60">
                    <div className="container">
                        <div className="row">
                            <div className="col-md-12">
                                <div className="pt-tabs-1">
                                    <div className="nav nav-tabs nav-fill" id="nav-tab" role="tablist"><a
                                        className="pt-tabs nav-item nav-link active" id="nav-home-0" data-toggle="tab" href="#nav-0"
                                        role="tab" aria-controls="nav-home-0" aria-selected="true">
                                        <div className="pt-tabs-icon"><i className=" flaticon-012-fingerprint"></i><span>Solid Project
                                            Planning</span></div>
                                    </a><a className="pt-tabs nav-item nav-link" id="nav-home-1" data-toggle="tab" href="#nav-1"
                                        role="tab" aria-controls="nav-home-1" aria-selected="false">
                                            <div className="pt-tabs-icon"><i className=" flaticon-call-center"></i><span>Agile Development
                                                Methodologies</span></div>
                                        </a><a className="pt-tabs nav-item nav-link" id="nav-home-2" data-toggle="tab" href="#nav-2"
                                            role="tab" aria-controls="nav-home-2" aria-selected="false">
                                            <div className="pt-tabs-icon"><i className=" flaticon-018-magnifying-glass"></i><span>JIRA
                                                Project Management Tools</span></div>
                                        </a><a className="pt-tabs nav-item nav-link" id="nav-home-3" data-toggle="tab" href="#nav-3"
                                            role="tab" aria-controls="nav-home-3" aria-selected="false">
                                            <div className="pt-tabs-icon"><i className=" flaticon-bullhorn"></i><span>Maintenance and
                                                Optimisation</span>
                                            </div>
                                        </a></div>
                                    <div className="tab-content text-left" id="nav-tabContent">
                                        <div className="tab-pane fade active show" id="nav-0" role="tabpanel"
                                            aria-labelledby="nav-home-0">
                                            <div className="row">
                                                <div className="col-lg-6">
                                                    <img decoding="async" src={require("../../image/about/our delivery process/blog-5.jpg")}
                                                        alt="seo-image" />
                                                </div>
                                                <div className="col-lg-6 align-self-center">
                                                    <div className="pt-tab-info">
                                                        <h2>Solid Project
                                                            Planning</h2>
                                                        <p>Our structured project planning approach acknowledges eight specific project development phases. Starting from defining detailed requirement specifications to approving a fully prepared and tested e-commerce platform, we assist and advise clients throughout the entire project lifecycle and beyond.</p>
                                                        <h3>&nbsp;</h3>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div className="tab-pane fade" id="nav-1" role="tabpanel" aria-labelledby="nav-home-1">
                                            <div className="row flex-row-reverse">
                                                <div className="col-lg-6">
                                                    <img decoding="async" src={require("../../image/about/our delivery process/agiles-project-management.jpg")}
                                                        alt="seo-image" />
                                                </div>
                                                <div className="col-lg-6 align-self-center">
                                                    <div className="pt-tab-info">
                                                        <h2>Agile Development Methodologies</h2>
                                                        <p>We take a collaborative approach to e-commerce development and integration projects. Using Agile methodologies, we aim for rapid and iterative planning and development cycles. Our solutions evolve through the combined effort of cross-functional client and agency teams.</p>
                                                        <h3>&nbsp;</h3>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div className="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-home-2">
                                            <div className="row">
                                                <div className="col-lg-6">
                                                    <img decoding="async" src={require("../../image/about/our delivery process/jira-pmt.jpg")}
                                                        alt="seo-image" />
                                                </div>
                                                <div className="col-lg-6 align-self-center">
                                                    <div className="pt-tab-info">
                                                        <h2>JIRA
                                                            Project Management Tools</h2>
                                                        <p>We heavily depend on Atlassian's Jira project management system to organize our development work. Jira is used for task-level scoping and planning and offers complete access to sprint boards, tickets, comments, attachments, and code commits.</p>
                                                        <h3>&nbsp;</h3>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div className="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-home-3">
                                            <div className="row flex-row-reverse">
                                                <div className="col-lg-6">
                                                    <img decoding="async" src={require("../../image/about/our delivery process/management-and-optimize.jpg")}
                                                        alt="seo-image" />
                                                </div>
                                                <div className="col-lg-6 align-self-center">
                                                    <div className="pt-tab-info">
                                                        <h2>Maintenance and Optimisation</h2>
                                                        <p>We don't limit our services to only design and development, but also provide ongoing site security and maintenance. We continually optimize site performance, implements timely upgrades and security patches, and ensures the highest levels of site and server security, including regular backups of critical data.</p>
                                                        <h3>&nbsp;</h3>
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
                {/* <!--====== End About Section ======--> */}
                <section className="our_work_process">
                    <div className="container">
                        <div className="row justify-content-center">
                            <div className="col-lg-6">
                                <div className="section-title text-center mb-50 wow fadeInUp" data-aos="fade-up"
                                    data-aos-duration="800">
                                    <span className="sub-title sub-title-bg blue-light-bg">Our Work Process</span>
                                    <h2 className="">Our Project
                                        Planning
                                        Framework</h2>
                                </div>
                            </div>
                        </div>
                        {/* <!-- Slider --> */}
                        <div id="our_work_process">
                            <OwlCarousel className='owl-theme' loop margin={10} nav autoplay={true} {...options}>
                                <div className="item">
                                    <div className="pt-fancybox-boxslider fancyslider-2 ">
                                        <div className="pt-fancy-media"><img src={require("../../image/project_planning.png")} alt="" />
                                            <h3 className="pt-fancy-box-title">01</h3>
                                        </div>
                                        <div className="pt-fancy-info">
                                            <h4 className="pt-fancy-title">Explore</h4>
                                            <p>Our early engagement team will meet with your team to explore the options available to you for your new ecommerce platform.</p>
                                        </div>
                                    </div>
                                </div>
                                <div className="item">
                                    <div className="pt-fancybox-boxslider fancyslider-2 ">
                                        <div className="pt-fancy-media"><img src={require("../../image/plan.png")} alt="" />
                                            <h3 className="pt-fancy-box-title">02</h3>
                                        </div>
                                        <div className="pt-fancy-info">
                                            <h4 className="pt-fancy-title">Plan</h4>
                                            <p>Highly qualified Magento specialists ensure the functionality you require is explored, defined, tested and delivered. </p>
                                        </div>
                                    </div>

                                </div>
                                <div className="item">
                                    <div className="pt-fancybox-boxslider fancyslider-2 ">
                                        <div className="pt-fancy-media"><img src={require("../../image/design.png")} alt="" />
                                            <h3 className="pt-fancy-box-title">03</h3>
                                        </div>
                                        <div className="pt-fancy-info">
                                            <h4 className="pt-fancy-title">Design</h4>
                                            <p>A creative "kick-off" captures all the critical information including your objectives, customer demographics, user personas and aspirations. </p>
                                        </div>
                                    </div>

                                </div>
                                <div className="item">
                                    <div className="pt-fancybox-boxslider fancyslider-2 ">
                                        <div className="pt-fancy-media"><img src={require("../../image/development.png")} alt="" />
                                            <h3 className="pt-fancy-box-title">04</h3>
                                        </div>
                                        <div className="pt-fancy-info">
                                            <h4 className="pt-fancy-title">Develop</h4>
                                            <p>An incredibly talented group of developers look for the most robust solutions to give you the functionality and results you need. </p>
                                        </div>
                                    </div>

                                </div>
                                <div className="item">
                                    <div className="pt-fancybox-boxslider fancyslider-2 ">
                                        <div className="pt-fancy-media"><img src={require("../../image/testing_service_details.png")} alt="" />
                                            <h3 className="pt-fancy-box-title">05</h3>
                                        </div>
                                        <div className="pt-fancy-info">
                                            <h4 className="pt-fancy-title">Test </h4>
                                            <p>Our testers QA against the original specs to ensure sites are the highest quality, both operationally and visually.  </p>
                                        </div>
                                    </div>

                                </div>
                                <div className="item">
                                    <div className="pt-fancybox-boxslider fancyslider-2 ">
                                        <div className="pt-fancy-media"><img src={require("../../image/deploy.png")} alt="" />
                                            <h3 className="pt-fancy-box-title">06</h3>
                                        </div>
                                        <div className="pt-fancy-info">
                                            <h4 className="pt-fancy-title">Deploy </h4>
                                            <p>Our early engagement team will meet with your team to explore the options available to you for your new ecommerce platform.  </p>
                                        </div>
                                    </div>

                                </div>
                                <div className="item">
                                    <div className="pt-fancybox-boxslider fancyslider-2 ">
                                        <div className="pt-fancy-media"><img src={require("../../image/site_launch.png")} alt="" />
                                            <h3 className="pt-fancy-box-title">07</h3>
                                        </div>
                                        <div className="pt-fancy-info">
                                            <h4 className="pt-fancy-title">Launch </h4>
                                            <p>Once the new online store has been thoroughly tested on a staging site and is exactly as you want, it's time to go live.  </p>
                                        </div>
                                    </div>

                                </div>
                                <div className="item">
                                    <div className="pt-fancybox-boxslider fancyslider-2 ">
                                        <div className="pt-fancy-media"><img src={require("../../image/optimise.png")} alt="" />
                                            <h3 className="pt-fancy-box-title">08</h3>
                                        </div>
                                        <div className="pt-fancy-info">
                                            <h4 className="pt-fancy-title">Optimise</h4>
                                            <p>After your site has gone live, we can advise you on how best to optimise your store to increase sales and improve efficiency. </p>
                                        </div>
                                    </div>

                                </div>
                                <div className="item">
                                    <div className="pt-fancybox-boxslider fancyslider-2 ">
                                        <div className="pt-fancy-media"><img src={require("../../image/extend.png")} alt="" />
                                            <h3 className="pt-fancy-box-title">09</h3>
                                        </div>
                                        <div className="pt-fancy-info">
                                            <h4 className="pt-fancy-title">Extend </h4>
                                            <p>Extend your platform with new features, functionality and capabilities, fully customised to integrate with your back-office processes.  </p>
                                        </div>
                                    </div>

                                </div>
                            </OwlCarousel>

                        </div>
                        {/* <!-- Slider END --> */}
                    </div>

                </section>

            </div>


        </>
    );
}

export default Ourdeliveryprocess;