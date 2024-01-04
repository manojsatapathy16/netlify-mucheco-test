import React, { useEffect, useState } from 'react';
import Header from '../Header';
import { Helmet } from "react-helmet";

import { NavLink, useNavigate } from 'react-router-dom';
import { helmet } from '../../Utils/Utils';
import { CallApi_Without_Token } from '../../Services/Client';
import { API } from '../../Services/Apis';
function CaseStudy(props) {
    const [metaData, setMetaData] = useState('');
    const [caseStudyData, setCaseStudyData] = useState([]);
    const [isCasestudyDataErr, setIsCasestudyDataErr] = useState(true);
    const navigate = useNavigate();
    const api_type = props.type;
    useEffect(() => {
        helmet(api_type, setMetaData);
        window.scrollTo({ top: 0, behavior: 'smooth' });
        fetchCaseStudy();
    }, [api_type])

    const fetchCaseStudy = async () => {
        var formdata = new FormData();
        formdata.append("request_type", 'get_case_study_list');
        const data = await CallApi_Without_Token('POST', API.CASE_STUDY, formdata)
        if (data.status === 1) {
            setCaseStudyData(data)
        }
        else {
            setIsCasestudyDataErr(false)
        }
    }

    const readmoreHandler = (id) => {
        // const clickedId = e.target.id;
    
        navigate('/caseStudy-details', { state: { id } });
    }

    return (
        <>
            <div className="inner_pages_wrapper">
                <Header class_bg='black_bg' />
                <Helmet>
                    <title>{metaData?.data?.meta_title}</title>
                    <meta name="description" content={metaData?.data?.meta_description} />
                    <meta name="keywords" content={metaData?.data?.meta_keyword} />
                </Helmet>


                {/* <!--====== Start case_study_landing Section ======--> */}
                <section className="case_study_page">
                    <div className="section-title text-center mb-25 wow fadeInUp">
                        <div className="row justify-content-center">
                            <div className="col-md-6">
                                <span className="sub-title sub-title-bg blue-light-bg">CASE STUDIES</span>
                                <h2 className="">IT Excellence Showcased</h2>
                            </div>
                        </div>

                    </div>
                    <div className="container">
                        <div className="row">
                            {Array.isArray(caseStudyData?.data) ? <>
                                {caseStudyData?.data.map((each, key) => {

                                    return (

                                        <div className="col-lg-4 col-md-6 col-xs-1 case-item " >
                                            <div className="case-item_inner" data-aos="fade-up" data-aos-duration="400">
                                            <div className="case_study_img_wrap">
                                                <img loading="lazy"
                                                    src={each.card_image}
                                                    className="attachment-solvency_portfolio-slider size-solvency_portfolio-slider wp-post-image"
                                                    alt="" decoding="async" />
                                                    </div>
                                                <div className="case-content">
                                                    <div className="p-icon">
                                                        <span onClick={()=>readmoreHandler(each.id)} id={each.id}><i aria-hidden="true" className="fas fa-arrow-right"></i> </span>
                                                    </div>

                                                    <h3 className="p-title">
                                                        <span className="p-category"> <span rel="tag">{each.site_name}</span></span>
                                                        <span>{each.site_work}</span>
                                                    </h3>

                                                </div>
                                            </div>
                                        </div>
                                    )
                                })}
                            </> : null}
                            {/* <div className="col-lg-4 col-md-6 col-xs-1 case-item " >
                                <div className="case-item_inner" data-aos="fade-up" data-aos-duration="400">

                                    <img loading="lazy"
                                        src={require("../../image/case-study/uk_pallet.jpg")}
                                        className="attachment-solvency_portfolio-slider size-solvency_portfolio-slider wp-post-image"
                                        alt="" decoding="async" />
                                    <div className="case-content">
                                        <div className="p-icon">
                                            <NavLink to='/about/CaseStudy/CaseStudy_Details'><i aria-hidden="true" className="fas fa-arrow-right"></i> </NavLink>
                                        </div>

                                        <h3 className="p-title">
                                            <span className="p-category"> <NavLink to='/about/CaseStudy/CaseStudy_Details' rel="tag">UK PALLET</NavLink></span>
                                            <NavLink to='/about/CaseStudy/CaseStudy_Details'>Commercial Deliveries</NavLink>
                                        </h3>

                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-4 col-md-6 col-xs-1 case-item ">
                                <div className="case-item_inner" data-aos="fade-up" data-aos-duration="600">

                                    <img loading="lazy"
                                        src={require("../../image/case-study/2-520x640.jpg")}
                                        className="attachment-solvency_portfolio-slider size-solvency_portfolio-slider wp-post-image"
                                        alt="" decoding="async" />
                                    <div className="case-content">
                                        <div className="p-icon">
                                            <a href="Case_Study_details.html"><i aria-hidden="true" className="fas fa-arrow-right"></i> </a>
                                        </div>

                                        <h3 className="p-title">
                                            <span className="p-category"> <a href="#" rel="tag">Business</a></span>
                                            <a href="">Business Analytics</a>
                                        </h3>

                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-4 col-md-6 col-xs-1 case-item ">
                                <div className="case-item_inner" data-aos="fade-up" data-aos-duration="800">

                                    <img loading="lazy"
                                        src={require("../../image/case-study/3-520x640.jpg")}
                                        className="attachment-solvency_portfolio-slider size-solvency_portfolio-slider wp-post-image"
                                        alt="" decoding="async" />
                                    <div className="case-content">
                                        <div className="p-icon">
                                            <a href="Case_Study_details.html"><i aria-hidden="true" className="fas fa-arrow-right"></i> </a>
                                        </div>

                                        <h3 className="p-title">
                                            <span className="p-category"> <a href="#" rel="tag">Business</a></span>
                                            <a href="">Business Analytics</a>
                                        </h3>

                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-4 col-md-6 col-xs-1 case-item ">
                                <div className="case-item_inner" data-aos="fade-up" data-aos-duration="400">

                                    <img loading="lazy"
                                        src={require("../../image/case-study/4-1-520x640.png")}
                                        className="attachment-solvency_portfolio-slider size-solvency_portfolio-slider wp-post-image"
                                        alt="" decoding="async" />
                                    <div className="case-content">
                                        <div className="p-icon">
                                            <a href="Case_Study_details.html"><i aria-hidden="true" className="fas fa-arrow-right"></i> </a>
                                        </div>

                                        <h3 className="p-title">
                                            <span className="p-category"> <a href="#" rel="tag">Business</a></span>
                                            <a href="">Business Analytics</a>
                                        </h3>

                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-4 col-md-6 col-xs-1 case-item ">
                                <div className="case-item_inner" data-aos="fade-up" data-aos-duration="600">

                                    <img loading="lazy"
                                        src={require("../../image/case-study/5-1-520x640.png")}
                                        className="attachment-solvency_portfolio-slider size-solvency_portfolio-slider wp-post-image"
                                        alt="" decoding="async" />
                                    <div className="case-content">
                                        <div className="p-icon">
                                            <a href="Case_Study_details.html"><i aria-hidden="true" className="fas fa-arrow-right"></i> </a>
                                        </div>

                                        <h3 className="p-title">
                                            <span className="p-category"> <a href="#" rel="tag">Business</a></span>
                                            <a href="">Business Analytics</a>
                                        </h3>

                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-4 col-md-6 col-xs-1 case-item ">
                                <div className="case-item_inner" data-aos="fade-up" data-aos-duration="800">

                                    <img loading="lazy"
                                        src={require("../../image/case-study/6-2-520x640.png")}
                                        className="attachment-solvency_portfolio-slider size-solvency_portfolio-slider wp-post-image"
                                        alt="" decoding="async" />
                                    <div className="case-content">
                                        <div className="p-icon">
                                            <a href="Case_Study_details.html"><i aria-hidden="true" className="fas fa-arrow-right"></i> </a>
                                        </div>

                                        <h3 className="p-title">
                                            <span className="p-category"> <a href="#" rel="tag">Business</a></span>
                                            <a href="">Business Analytics</a>
                                        </h3>

                                    </div>
                                </div>
                            </div> */}
                        </div>
                    </div>
                </section>
                {/* <!--====== End case_study_landing Section ======--> */}

            </div>


        </>
    );
}

export default CaseStudy;