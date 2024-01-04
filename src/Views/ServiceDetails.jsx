import { React, useState, useLayoutEffect, useEffect } from 'react';
import Header from './Header';
import ctabg from "../image/cta-bg-2.jpg";
import testimonialbg from "../image/testimonial-bg-1.jpg";
import Loader from '../components/Loader';
import { CallApi_Without_Token } from '../Services/Client';
import { API } from '../Services/Apis';
import { Helmet } from "react-helmet";
import { helmet } from '../Utils/Utils';
import { Link, useNavigate } from 'react-router-dom';


function ServiceDetails(props) {


    const api_type = props.type
    const [detailsData, setDetailsData] = useState([]);
    const [loading, setLoading] = useState(false);
    // contact submit and validation
    const initialValues = { firstname: '', lastname: '', phone: '', email: '', message: '' };
    const [formValues, setFormValues] = useState(initialValues);
    const [formErrors, setFormErrors] = useState({});
    const [isSubmit, setIsSubmit] = useState(false);
    const [isSuccess, setIsSuccess] = useState({})
    const [showMessage, setShowMessage] = useState(0)
    // const [start, setStart] = useState(1)

    const [metaData, setMetaData] = useState('');
    const navigate = useNavigate();
    useEffect(() => {
        helmet(api_type, setMetaData);
        isReadMoreOpen();
        
    }, [api_type])
    // console.log(isSuccess,'service')

    useLayoutEffect(() => {
        fetchInfo();
    }, [api_type])

    useEffect(() => {
        if (Object.keys(formErrors).length === 0 && isSubmit) {
            // console.log(formValues);
            sendData(formValues);

            setFormValues(initialValues);
        }
    }, [formErrors]);

    useEffect(()=>{
    if(showMessage==1){
        setTimeout(()=>{
            setShowMessage(0)
        }, 10000);
    }
    },[showMessage])

    const fetchInfo = async () => {
        try {
            setLoading(true)
            var formdata = new FormData();
            formdata.append("request_type", api_type);
            const data = await CallApi_Without_Token('POST', API.SERVICE_DETAILS, formdata)
            setLoading(false)
            if (data.status === 1) {
                setDetailsData(data)
                setLoading(false)
                window.scrollTo({ top: 0, behavior: 'smooth' });
            } else {
                setLoading(true);
                setTimeout(() => { navigate("/"); }, 5000);
            }
        }
        catch (e) {
            setLoading(true);
            setTimeout(() => { navigate("/"); }, 5000);
        }
    }
    // onchange handler
    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormValues({ ...formValues, [name]: value });
    };
    // onsubmit handler
    const handleSubmit = (e) => {
        e.preventDefault();
        setFormErrors(validate(formValues));
        setIsSubmit(true);
    };
    //   send data to backend
    const sendData = (value) => {
        var formdata = new FormData();
        formdata.append("request_type", 'service');
        formdata.append("service", detailsData?.data?.readmore?.title);
        formdata.append("first_name", value.firstname);
        formdata.append("last_name", value.lastname);
        formdata.append("email", value.email);
        formdata.append("phone", value.phone);
        formdata.append("message", value.message);
        var requestOptions = {
            method: 'POST',
            body: formdata,
            redirect: 'follow'
        };



        fetch(API.CONTACT_US, requestOptions)
        .then(response => response.json())
        .then(json => {setIsSuccess(json)
            setShowMessage(json.status)
        })
            // .then(response => response.text())
            .catch(error => console.log('error', error));

    }
   



    // validate form
    const validate = (values) => {
        const errors = {};
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/i;
        if (!values.firstname) {
            errors.firstname = 'First name is required!';
        }
        if (!values.lastname) {
            errors.lastname = 'Last name is required!';
        }
        if (!values.email) {
            errors.email = 'Email is required!';
        } else if (!regex.test(values.email)) {
            errors.email = 'This is not a valid email format!';
        }
        if (!values.phone) {
            errors.phone = 'phone number is required!';
        } else if (!values.phone.length == 10) {
            errors.phone = 'phone number is required!';
        }

        return errors;
    };
    // read more read less
    function myFunction() {
        var btnText = document.getElementById("readmore");
        var short_description=document.getElementById("desc_short");
        var long_description=document.getElementById("desc_long");
        if (btnText.innerHTML.trim() == 'Read More <i className="fal fa-long-arrow-right"></i>') {
            btnText.innerHTML = 'Read less <i className="fal fa-long-arrow-right"></i>';
            long_description.style.display = "block";
            short_description.style.display = "none";
        } else if(btnText.innerHTML.trim() == 'Read less <i className="fal fa-long-arrow-right"></i>') {
            btnText.innerHTML = 'Read More <i className="fal fa-long-arrow-right"></i>';
            long_description.style.display = "none";
            short_description.style.display = "block";
        }
    }
    function isReadMoreOpen() {
        var btnText = document.getElementById("readmore");
        var short_description=document.getElementById("desc_short");
        var long_description=document.getElementById("desc_long");
            if(btnText.innerHTML.trim() == 'Read less <i className="fal fa-long-arrow-right"></i>') {
            btnText.innerHTML = 'Read More <i className="fal fa-long-arrow-right"></i>';
            long_description.style.display = "none";
            short_description.style.display = "block";
        }
    }
    // console.log(detailsData?.data?.process.length)

    return (
        <>
            <div className="inner_pages_wrapper">
                <Header class_bg='black_bg' />

                <Loader show={loading} />
                <Helmet>
                    <title>{metaData?.data?.meta_title}</title>
                    <meta name="description" content={metaData?.data?.meta_description} />
                    <meta name="keywords" content={metaData?.data?.meta_keyword} />
                </Helmet>

                {/* <!--====== Start About Section ======--> */}
                <section className="fancy-about fancy-about-five pt-50 pb-80 my_fancy">
                    <div className="container">
                        <div className="row align-items-center">
                            <div className="col-lg-7">
                                <div className="text-wrapper" data-aos="fade-right" data-aos-duration="1000">
                                    <div className="experience-box wow fadeInLeft">

                                        <div className="content">
                                            <div className="section-title service_details_heading mb-25">
                                                <span className="sub-title sub-title-bg blue-light-bg">{detailsData?.data?.readmore?.title}</span>
                                                <h2 className="">{detailsData?.data?.readmore?.heading}</h2>
                                            </div>

                                            <blockquote>
                                            <p id='desc_short'>{detailsData?.data?.readmore?.desc_short}</p>
                                            <p id='desc_long' dangerouslySetInnerHTML={{__html: detailsData?.data?.readmore?.desc_long}}></p>
                                                <button onClick={myFunction} id="readmore">Read More <i className="fal fa-long-arrow-right"></i></button>
                                            </blockquote>
                                            <ul className="check-list list-circle-bg mb-20 wow fadeInUp absolute_check">
                                                <li>{detailsData?.data?.readmore?.lis[0]}</li>
                                                <li>{detailsData?.data?.readmore?.lis[1]}</li>
                                                <li>{detailsData?.data?.readmore?.lis[2]}</li>
                                                <li>{detailsData?.data?.readmore?.lis[3]}</li>
                                                <li>{detailsData?.data?.readmore?.lis[4]}</li>
                                                <li>{detailsData?.data?.readmore?.lis[5]}</li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div className="col-lg-5">
                                <div className="service_details_top_right" data-aos="fade-left" data-aos-duration="1000">
                                    <img src={require("../image/service_details/about-9.jpg")} alt="" />
                                </div>

                            </div>

                        </div>
                    </div>

                </section>
                {/* <!--====== End About Section ======--> */}

                {/* <!--====== Start counter Section ======--> */}
                <section className="features-area position-relative mb-90-minus" data-aos="fade-up" data-aos-duration="1000">

                    <div className="container">
                        <div className="row">
                            <div className="col-md-4 col-6 counter-column">
                                <div className="counter_column_inn">
                                    <div className="counter_icon">
                                        <img src={require("../image/service_details/customer-feedback.png")} alt="" />
                                    </div>
                                    <div className="counter-item">
                                        <h2 className="number"><span className="count count-num">{detailsData?.data?.liveCount[0]?.count}</span>+</h2>
                                        <p>{detailsData?.data?.liveCount[0]?.title}</p>
                                    </div>
                                </div>
                            </div>
                            <div className="col-md-4 col-6 counter-column">
                                <div className="counter_column_inn">
                                    <div className="counter_icon">
                                        <img src={require("../image/service_details/evaluation.png")} alt="" />
                                    </div>
                                    <div className="counter-item">
                                        <h2 className="number"><span className="count count-num">{detailsData?.data?.liveCount[1]?.count}</span>+</h2>
                                        <p>{detailsData?.data?.liveCount[1]?.title}</p>
                                    </div>
                                </div>
                            </div>
                            <div className="col-md-4 col-6 counter-column">
                                <div className="counter_column_inn">
                                    <div className="counter_icon">
                                        <img src={require("../image/service_details/complete.png")} alt="" />
                                    </div>
                                    <div className="counter-item">
                                        <h2 className="number"><span className="count count-num">{detailsData?.data?.liveCount[2]?.count}</span>+</h2>
                                        <p>{detailsData?.data?.liveCount[2]?.title}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {/* <!--====== End counter Section ======--> */}
                {/* <!--====== Start Features Section ======--> */}
                <section className="features-area light-gray-bg pt-220 pb-100">
                    <div className="container">
                        <div className="row justify-content-center">
                            <div className="col-lg-6">
                                <div className="section-title text-center mb-50 wow fadeInUp" data-aos="fade-up" data-aos-duration="1000">
                                    <span className="sub-title sub-title-bg blue-light-bg">what we do</span>
                                    <h2 className="">{detailsData?.data?.key_features_title}</h2>
                                </div>
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-lg-6">
                                <div className="block-style-twenty animate-icon d-flex mb-30 wow fadeInUp" data-aos="fade-up" data-aos-duration="500">
                                    <div className="icon">
                                        {/* <!-- <i className="flaticon-help"></i> --> */}
                                        <img src={require("../image/flaticon-help.png")} alt="" />
                                    </div>
                                    <div className="text">
                                        <h3 className="">{detailsData?.data?.key_features[0]?.title}</h3>
                                        <p>{detailsData?.data?.key_features[0]?.description}</p>
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-6">
                                <div className="block-style-twenty animate-icon d-flex mb-30 wow fadeInUp" data-aos="fade-up" data-aos-duration="700">
                                    <div className="icon">
                                        {/* <!-- <i className="flaticon-technical-support"></i> --> */}
                                        <img src={require("../image/expertise.png")} alt="" />
                                    </div>
                                    <div className="text">
                                        <h3 className="">{detailsData?.data?.key_features[1]?.title}</h3>
                                        <p>{detailsData?.data?.key_features[1]?.description}</p>
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-6">
                                <div className="block-style-twenty animate-icon d-flex mb-30 wow fadeInUp" data-aos="fade-up" data-aos-duration="900">
                                    <div className="icon">
                                        {/* <!-- <i className="flaticon-it"></i> --> */}
                                        <img src={require("../image/powerful_database.png")} alt="" />
                                    </div>
                                    <div className="text">
                                        <h3 className="">{detailsData?.data?.key_features[2]?.title}</h3>
                                        <p>{detailsData?.data?.key_features[2]?.description}</p>
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-6">
                                <div className="block-style-twenty animate-icon d-flex mb-30 wow fadeInUp" data-aos="fade-up" data-aos-duration="1100">
                                    <div className="icon">
                                        {/* <!-- <i className="flaticon-technical-support-1"></i> --> */}
                                        <img src={require("../image/brand_representation.png")} alt="" />
                                    </div>
                                    <div className="text">
                                        <h3 className="">{detailsData?.data?.key_features[3]?.title}</h3>
                                        <p>{detailsData?.data?.key_features[3]?.description}</p>
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-6">
                                <div className="block-style-twenty animate-icon d-flex mb-30 wow fadeInUp" data-aos="fade-up" data-aos-duration="1100">
                                    <div className="icon">
                                        {/* <!-- <i className="flaticon-technical-support-1"></i> --> */}
                                        <img src={require("../image/product_engineering.png")} alt="" />
                                    </div>
                                    <div className="text">
                                        <h3 className="">{detailsData?.data?.key_features[4]?.title}</h3>
                                        <p>{detailsData?.data?.key_features[4]?.description}</p>
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-6">
                                <div className="block-style-twenty animate-icon d-flex mb-30 wow fadeInUp" data-aos="fade-up" data-aos-duration="1100">
                                    <div className="icon">
                                        {/* <!-- <i className="flaticon-technical-support-1"></i> --> */}
                                        <img src={require("../image/technical-support.png")} alt="" />
                                    </div>
                                    <div className="text">
                                        <h3 className="">{detailsData?.data?.key_features[5]?.title}</h3>
                                        <p>{detailsData?.data?.key_features[5]?.description}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {/* <!--====== End Features Section ======--> */}

                {/* <!--====== Start Fancy Block Section ======--> */}
                <section className="fancy-text-block fancy-text-block-eleven pt-130 pb-80">
                    <div className="container">
                        <div className="row">
                            <div className="col-lg-6">
                                <div className="img-holder-box mb-20">
                                    <div className="row align-items-center">
                                        <div className="col-lg-6 col-6">
                                            <div className="img-holder border-top-left-radius mb-30 wow fadeInLeft" data-aos="fade-right" data-aos-duration="1000">
                                                <img src={require("../image/gallery-9.jpg")} alt="" />
                                            </div>
                                            <div className="img-holder border-bottom-left-radius mb-30 wow fadeInLeft" data-aos="fade-right" data-aos-duration="1000">
                                                <img src={require("../image/gallery-10.jpg")} alt="" />
                                            </div>
                                        </div>
                                        <div className="col-lg-6 col-6">
                                            <div className="img-holder mb-30 wow fadeInRight" data-aos="fade-right" data-aos-duration="1000">
                                                <img src={require("../image/gallery-11.jpg")} alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-6">
                                <div className="text-wrapper mb-50">
                                    <div className="section-title mb-25 wow fadeInUp" data-aos="fade-up" data-aos-duration="1000">
                                        <span className="sub-title sub-title-bg blue-light-bg">{detailsData?.data?.why_choose?.title}</span>
                                        <h2 className="">{detailsData?.data?.why_choose?.heading}</h2>
                                        <p>{detailsData?.data?.why_choose?.description}</p>
                                    </div>

                                    <ul className="check-list list-circle-bg mb-20 wow fadeInUp" data-aos="fade-up" data-aos-duration="1000">
                                        <li>{detailsData?.data?.why_choose?.lis[0]}</li>
                                        <li>{detailsData?.data?.why_choose?.lis[1]}</li>
                                        <li>{detailsData?.data?.why_choose?.lis[2]}</li>
                                        <li>{detailsData?.data?.why_choose?.lis[3]}</li>
                                        <li>{detailsData?.data?.why_choose?.lis[4]}</li>
                                        <li>{detailsData?.data?.why_choose?.lis[5]}</li>
                                    </ul>
                                    {/* <a href="about.html" className="main-btn btn-blue-light wow fadeInUp" data-aos="fade-up" data-aos-duration="1000">Learn More</a> */}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {/* <!--====== End Fancy Block Section ======--> */}
                {/* <!--====== Start workflow Section ======--> */}
                <section className="work_flow_section">
                    <div className="container">
                        <div className="row justify-content-center">
                            <div className="col-lg-6">
                                <div className="section-title text-center mb-50 wow fadeInUp" data-aos="fade-up" data-aos-duration="1000">
                                    <span className="sub-title sub-title-bg blue-light-bg">HOW ITS DONE?</span>
                                    <h2 className="">Process Flowchart</h2>
                                </div>
                            </div>
                        </div>
                        <div className="flow_items">
                        {/* {detailsData?.data?.process.map((i, key) => {
                            if (start >= 1 && start <= 3) {
                                html += (start == 1) ? `<div className="row"><p>${i}</p>` : (start == 3) ? `<p>${i}</p></div>` : `<p>${i}</p>`;
                              }
                              if (start >= 4 && start <= 6) {
                                html += start == 4 ? `<div className="even-row"><p>${i}</p>` : start == 6 ? `<p>${i}</p></div>` : `<p>${i}</p>`;
                              }
                              if (start == 6) {
                                setStart(1);
                              } else {
                                setStart(start+1);
                              }

return (<></>);
                        })} */}
                            <div className="row">
                                <div className="col-lg-4">
                                    <div className="elementor-widget-container" data-aos="fade-right" data-aos-duration="400">
                                        <div className="pt-process-step pt-process-2">
                                            <img className="pt-before-img"
                                                src={require("../image/arrow-1.png")}
                                                alt="arrow-img" />
                                            <div className="pt-process-icon"><span><img src={require("../image/project_planning.png")} alt="" /></span><span
                                                className="pt-process-number">{detailsData?.data?.process[0]?.sl}</span></div>
                                            <div className="pt-process-info">
                                                <h4 className="pt-process-title">{detailsData?.data?.process[0]?.title}</h4>
                                                <p className="pt-process-description">{detailsData?.data?.process[0]?.description}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div className="col-lg-4">
                                    <div className="elementor-widget-container" data-aos="fade-right" data-aos-duration="600">
                                        <div className="pt-process-step pt-process-2">
                                            <img decoding="async" className="pt-before-img"
                                                src={require("../image/arrow-2.png")}
                                                alt="arrow-img" />
                                            <div className="pt-process-icon"><span><img src={require("../image/sitemap_servicedetails.png")} alt="" /></span><span
                                                className="pt-process-number">{detailsData?.data?.process[1]?.sl}</span></div>
                                            <div className="pt-process-info">
                                                <h4 className="pt-process-title">{detailsData?.data?.process[1]?.title}</h4>
                                                <p className="pt-process-description">{detailsData?.data?.process[1]?.description}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div className="col-lg-4">
                                    <div className="elementor-widget-container" data-aos="fade-right" data-aos-duration="800">
                                        <div className="pt-process-step pt-process-2">
                                            <img decoding="async" className="pt-before-img end_arrow"
                                                src={require("../image/arrow-1.png")}
                                                alt="arrow-img" />
                                            <div className="pt-process-icon"><span><img src={require("../image/content_creation.png")} alt="" /></span><span
                                                className="pt-process-number">{detailsData?.data?.process[2]?.sl}</span></div>
                                            <div className="pt-process-info">
                                                <h4 className="pt-process-title">{detailsData?.data?.process[2]?.title}</h4>
                                                <p className="pt-process-description">{detailsData?.data?.process[2]?.description}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div className="row even_row_flow_items">
                                <div className="col-lg-4">
                                    <div className="elementor-widget-container" data-aos="fade-left" data-aos-duration="1400">
                                        <div className="pt-process-step pt-process-2">
                                        {detailsData?.data?.process.length>6?<img className="pt-before-img"
                            src={require("../image/arrow-2.png")}
                            alt="arrow-img"/> :''}
                                            <div className="pt-process-icon"><span><img src={require("../image/site_launch.png")} alt="" /></span><span
                                                className="pt-process-number">{detailsData?.data?.process[5]?.sl}</span></div>
                                            <div className="pt-process-info">
                                                <h4 className="pt-process-title">{detailsData?.data?.process[5]?.title}</h4>
                                                <p className="pt-process-description">{detailsData?.data?.process[5]?.description}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div className="col-lg-4">
                                    <div className="elementor-widget-container" data-aos="fade-left" data-aos-duration="1200">
                                        <div className="pt-process-step pt-process-2">
                                            <img decoding="async" className="pt-before-img"
                                                src={require("../image/arrow-2.png")}
                                                alt="arrow-img" />
                                            <div className="pt-process-icon"><span><img src={require("../image/testing_service_details.png")} alt="" /></span><span
                                                className="pt-process-number">{detailsData?.data?.process[4]?.sl}</span></div>
                                            <div className="pt-process-info">
                                                <h4 className="pt-process-title">{detailsData?.data?.process[4]?.title}</h4>
                                                <p className="pt-process-description">{detailsData?.data?.process[4]?.description}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div className="col-lg-4">
                                    <div className="elementor-widget-container" data-aos="fade-left" data-aos-duration="1000">
                                        <div className="pt-process-step pt-process-2">
                                            <img decoding="async" className="pt-before-img"
                                                src={require("../image/arrow-1.png")}
                                                alt="arrow-img" />
                                            <div className="pt-process-icon"><span><img src={require("../image/start_planning.png")} alt="" /></span><span
                                                className="pt-process-number">{detailsData?.data?.process[3]?.sl}</span></div>
                                            <div className="pt-process-info">
                                                <h4 className="pt-process-title">{detailsData?.data?.process[3]?.title}</h4>
                                                <p className="pt-process-description">{detailsData?.data?.process[3]?.description}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            {detailsData?.data?.process.length>6? <div className="row">
                                <div className="col-lg-4">
                                    <div className="elementor-widget-container" data-aos="fade-right" data-aos-duration="400">
                                        <div className="pt-process-step pt-process-2">
                                            <img className="pt-before-img"
                                                src={require("../image/arrow-1.png")}
                                                alt="arrow-img" />
                                            <div className="pt-process-icon"><span><img src={require("../image/service_details/product-return.png")} alt="" /></span><span
                                                className="pt-process-number">{detailsData?.data?.process[6]?.sl}</span></div>
                                            <div className="pt-process-info">
                                                <h4 className="pt-process-title">{detailsData?.data?.process[6]?.title}</h4>
                                                <p className="pt-process-description">{detailsData?.data?.process[6]?.description}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                {detailsData?.data?.process.length>=8? <div className="col-lg-4">
                                    <div className="elementor-widget-container" data-aos="fade-right" data-aos-duration="600">
                                        <div className="pt-process-step pt-process-2">
                                            <img decoding="async" className="pt-before-img"
                                                src={require("../image/arrow-2.png")}
                                                alt="arrow-img" />
                                            <div className="pt-process-icon"><span><img src={require("../image/service_details/inventory_optimisation.png")} alt="" /></span><span
                                                className="pt-process-number">{detailsData?.data?.process[7]?.sl}</span></div>
                                            <div className="pt-process-info">
                                                <h4 className="pt-process-title">{detailsData?.data?.process[7]?.title}</h4>
                                                <p className="pt-process-description">{detailsData?.data?.process[7]?.description}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>:''}
                                {detailsData?.data?.process.length>=9?  <div className="col-lg-4">
                                    <div className="elementor-widget-container" data-aos="fade-right" data-aos-duration="800">
                                        <div className="pt-process-step pt-process-2">
                                            
                                            <div className="pt-process-icon"><span><img src={require("../image/service_details/warehouse_management.png")} alt="" /></span><span
                                                className="pt-process-number">{detailsData?.data?.process[8]?.sl}</span></div>
                                            <div className="pt-process-info">
                                                <h4 className="pt-process-title">{detailsData?.data?.process[8]?.title}</h4>
                                                <p className="pt-process-description">{detailsData?.data?.process[8]?.description}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>:''}
                              

                            </div>:''}
                        </div>
                    </div>
                </section>
                {/* <!--====== End workflow Section ======--> */}
                {/* 
      <!--====== Start gallery Section ======--> */}
                <section className="galllery_section">
                    <div className="container">
                        <div className="row justify-content-center">
                            <div className="col-lg-6">
                                <div className="section-title text-center mb-50 wow fadeInUp" data-aos="fade-up" data-aos-duration="1000">
                                    <span className="sub-title sub-title-bg blue-light-bg">OUR PORTFOLIO</span>
                                    <h2 className="">{detailsData?.data?.portfolio}+ Successful Projects <br /> Explore Our Work</h2>
                                </div>
                            </div>
                        </div>
                        <div className="row masonry-row" style={{ position: 'relative', height: '1455.18px' }}>
                            <div className="col-lg-6 portfolio-column" style={{ position: 'absolute', left: '0%', top: '0px' }}>
                                <div className="portfolio-block-four bg-one text-center wow fadeInUp" data-wow-delay=".2s" style={{ visibility: 'visible', animationDelay: '0.2s', animationName: 'fadeInUp' }} data-aos="fade-up" data-aos-duration="500">
                                    <div className="portfolio-img">
                                        <img src={require("../image/service_details/mercato_place_home.png")} alt="portfolio image" />
                                        <div className="portfolio-hover">
                                            <div className="hover-content">
                                                <Link to="https://mercatoplace.com/" target="_blank" className="img-popup"><i className="far fa-long-arrow-right"></i></Link>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="portfolio-content">
                                        <h3 className="title"><Link to="https://mercatoplace.com/">Mercato Marketplace</Link></h3>
                                        <span className="category">Web Design And Development</span>
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-6 portfolio-column" style={{ position: 'absolute', left: '50%', top: '0px' }}>
                                <div className="portfolio-block-four bg-two text-center wow fadeInUp" data-wow-delay=".3s" style={{ visibility: 'visible', animationDelay: '0.3s', animationName: 'fadeInUp' }} data-aos="fade-up" data-aos-duration="700">
                                    <div className="portfolio-img">
                                        <img src={require("../image/service_details/bookodisha_home.png")} alt="portfolio image" />
                                        <div className="portfolio-hover">
                                            <div className="hover-content">
                                                <Link to="https://www.bookodisha.com/" target="_blank" className="img-popup"><i className="far fa-long-arrow-right"></i></Link>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="portfolio-content">
                                        <h3 className="title"><Link to="https://www.bookodisha.com">Booking Engine</Link></h3>
                                        <span className="category">Web Development And Booking</span>
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-6 portfolio-column" style={{ position: 'absolute', left: '50%', top: '612.617px' }}>
                                <div className="portfolio-block-four bg-three text-center wow fadeInUp" data-wow-delay=".4s" style={{ visibility: 'visible', animationDelay: '0.4s', animationName: 'fadeInUp' }} data-aos="fade-up" data-aos-duration="900">
                                    <div className="portfolio-img">
                                        <img src={require("../image/service_details/holidays.jpg")} alt="portfolio image" />
                                        <div className="portfolio-hover">
                                            <div className="hover-content">
                                                <Link to="https://www.clubpuertocolon.com/" target="_blank" className="img-popup"><i className="far fa-long-arrow-right"></i></Link>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="portfolio-content">
                                        <h3 className="title"><Link to="https://www.clubpuertocolon.com/">puerto colon club</Link></h3>
                                        <span className="category">Web Development And Designing</span>
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-6 portfolio-column" style={{ position: 'absolute', left: '0%', top: '728.85px' }}>
                                <div className="portfolio-block-four bg-four text-center wow fadeInUp" data-wow-delay=".5s" style={{ visibility: 'visible', animationDelay: '0.5s', animationName: 'fadeInUp' }} data-aos="fade-up" data-aos-duration="1100">
                                    <div className="portfolio-img">
                                        <img src={require("../image/service_details/uk-pallet.jpg")} alt="portfolio image" />
                                        <div className="portfolio-hover">
                                            <div className="hover-content">
                                                <Link to="https://www.ukpalletcommercialdeliveries.com/" target="_blank" className="img-popup"><i className="far fa-long-arrow-right"></i></Link>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="portfolio-content">
                                        <h3 className="title"><Link to="https://www.ukpalletcommercialdeliveries.com/">Uk Pallet</Link></h3>
                                        <span className="category">Web Development And Designing</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-lg-12">
                                <div className="button mt-50 text-center wow fadeInUp" data-wow-delay=".5s" style={{ visibility: 'visible', animationDelay: '0.5s', animationName: 'fadeInUp' }} data-aos="fade-up" data-aos-duration="1300">
                                    <Link to="/portfolio" className="main-btn btn-orange-dark">View more gallery</Link>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
                {/* <!--====== End gallery Section ======--> */}
                {/* <!--====== Start CTA Section ======--> */}
                <section className="cta-area cta-style-three bg_cover pt-135 pb-140" style={{ backgroundImage: `url(${ctabg})` }}>
                    <div className="container">
                        <div className="row justify-content-center">
                            <div className="col-lg-8">
                                <div className="cta-content-box text-center wow fadeInUp">
                                    <h2>Ready To Get Our Services ?</h2>
                                    <ul className="button">
                                        <li><Link to="/Contact" className="main-btn btn-blue-light">Contact Us</Link></li>
                                        <li><Link href="service-1.html" className="main-btn btn-purple">Our services</Link></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {/* <!--====== End CTA Section ======--> */}
                {/* <!--====== Start Contact Section ======--> */}
                <section className="contact-area contact-style-three bg_cover pt-130 pb-80"
                    style={{ backgroundImage: `url(${testimonialbg})` }}>
                    <div className="container">
                        <div className="row align-items-center">
                            <div className="col-lg-5">
                                <div className="contact-section-box mb-50 wow fadeInLeft">
                                    <div className="section-title mb-25">
                                        <span className="sub-title sub-title-bg blue-light-bg">NEED ANY HELP?</span>
                                        <h2 className="">Let's discuss your IT needs.</h2>
                                    </div>
                                    <p>Get expert IT solutions to propel your business forward with our custom software development, e-commerce, and digital marketing services to help you succeed in the digital age.</p>
                                    <ul className="social-link">
                                        <li><Link to="https://www.facebook.com/muchecodotcom" target='_blank'><i className="fab fa-facebook-f"></i></Link></li>
                                        <li><Link to="https://www.instagram.com/mucheco_ltd/" target='_blank'><i className="fab fa-instagram"></i></Link></li>
                                        <li><Link to="https://www.linkedin.com/company/mucheco" target='_blank'><i className="fab fa-linkedin"></i></Link></li>
                                        <li><Link to="https://twitter.com/muchecodotcom" target='_blank'><i className="fab fa-twitter"></i></Link></li>
                                        <li><Link to="https://www.youtube.com/c/muchecodotcom" target='_blank'><i className="fab fa-youtube"></i></Link></li>
                                    </ul>
                                </div>
                            </div>
                            <div className="col-lg-7">
                                <div className="contact-wrapper mb-50 wow fadeInRight">
                                    <form className="contact-form" onSubmit={handleSubmit}>
                                        {showMessage ? (<p className='success_message'>{isSuccess.message} Our team will be in touch with you shortly.</p>) : null}
                                        <div className="row">
                                            <div className="col-lg-6 col-md-6 col-sm-12">
                                                <div className="form_group">
                                                    <input type="text" className="form_control" placeholder="First Name*" name="firstname" value={formValues.firstname} onChange={handleChange} />
                                                </div>
                                                <p className='error'>{formErrors.firstname}</p>
                                            </div>
                                            <div className="col-lg-6 col-md-6 col-sm-12">
                                                <div className="form_group">
                                                    <input type="text" className="form_control" placeholder="Last Name*" name="lastname" value={formValues.lastname} onChange={handleChange} />
                                                </div>
                                                <p className='error'>{formErrors.lastname}</p>
                                            </div>
                                            <div className="col-lg-6 col-md-6 col-sm-12">
                                                <div className="form_group">
                                                    <input type="email" className="form_control" placeholder="Email Address*" name="email" value={formValues.email} onChange={handleChange} />
                                                </div>
                                                <p className='error'>{formErrors.email}</p>
                                            </div>
                                            <div className="col-lg-6 col-md-6 col-sm-12">
                                                <div className="form_group">
                                                    <input type="text" className="form_control" placeholder="Phone Number*" name="phone" value={formValues.phone} onChange={handleChange} />
                                                </div>
                                                <p className='error'>{formErrors.phone}</p>
                                            </div>
                                            <div className="col-lg-12">
                                                <div className="form_group">
                                                    <textarea className="form_control" placeholder="Write Message" name="message" value={formValues.message} onChange={handleChange}
                                                        required></textarea>
                                                </div>
                                            </div>
                                            <div className="col-lg-12">
                                                <div className="form_group">
                                                    <div className="col-lg-12">
                                                        <button className="main-btn btn-purple">Get free consultations</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {/* <!--====== End Contact Section ======--> */}
            </div>


        </>
    );
}

export default ServiceDetails;