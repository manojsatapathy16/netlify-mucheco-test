import React,{useEffect,useState} from 'react';
import Header from '../Header';
import OwlCarousel from 'react-owl-carousel';
import testimonial from '../../image/testimonial-bg-1.jpg';
import { Helmet } from "react-helmet";
import { Outlet } from 'react-router-dom';
import {helmet} from '../../Utils/Utils';
import OurCustomer from '../../components/OurCustomer';
import Testimonial from '../../components/Testimonial';
import { CallApi_Without_Token } from '../../Services/Client';
import { API } from '../../Services/Apis';

function WhychooseUs(props) {
    const[metaData,setMetaData]=useState('');
    const [testimonialDataErr, setIsTestimonialDataErr] = useState(true);
    const [ourCustomerDataErr, setIsourCustomerDataErr] = useState(true);
    const [testimonialData, setTestimonialData] = useState([]);
    const api_type = props.type;
    useEffect( () => {
        helmet(api_type,setMetaData);
        window.scrollTo({top: 0, behavior: 'smooth'});
        fetchInfo();
    }, [api_type])

    const fetchInfo = async () => {
        try{
        var formdata = new FormData();
        formdata.append("request_type", 'testimonial');
        const data = await CallApi_Without_Token('POST', API.ABOUT_US, formdata)

        if (data.status === 1) {
            setTestimonialData(data.data)
          
          
        }
        else{
            }
    }
    catch(e){ 
        
       
    }
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

    
      {/* <!--====== Start About Section ======--> */}
    <section className="fancy-about fancy-about-four pt-60 pb-60">
        <div className="container">
            <div className="row">
                <div className="col-lg-7">
                    <div className="about-content-box mb-50" data-aos="fade-right" data-aos-duration="1000">
                        <div className="section-title mb-25 wow fadeInUp">
                            <span className="sub-title sub-title-bg blue-light-bg">Why Choose Us?</span>
                            <h2 className="">We help you create an exceptional eCommerce experience for your customers.</h2>
                        </div>
                        <strong>A team with a constant source of innovation and excellence</strong>
                        <p>With world-className expertise in leading eCommerce platforms, including Magento, Shopify, BigCommerce, and WooCommerce, we've got all the tools and knowledge needed to help you succeed. From creating beautiful and functional online stores to building custom software solutions and integrating complex systems, we've got you covered.</p>
<p>What sets us apart is our unwavering dedication to your success. We don't just want to deliver a project and move on - we want to be your long-term partner, helping you grow and scale your eCommerce business for years to come. Our team is committed to providing top-notch service, exceptional quality, and timely delivery, all with a personal touch.</p>
                    </div>
                </div>
                <div className="col-lg-5">
                    <div className="about_top_rgt_img" data-aos="fade-left" data-aos-duration="1000">
                        <img src={require("../../image/about/why_choose_us.jpg")} alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {/* <!--====== End About Section ======--> */}
    {/* <!--====== Start mission & Vission Section ======--> */}
    <section className="features-area mission_vission pt-60 pb-60 why_choose_us_experties">
        <div className="container ">
            <div className="section-title text-center mb-25 wow fadeInUp">
                <div className="row justify-content-center">
                    <div className="col-md-6">
                        <span className="sub-title sub-title-bg blue-light-bg">Competencies</span>
                        <h2 className="">What We Excel At?</h2>
                    </div>
                </div>
               
            </div>
            <div className="about_para">
                <p>Mucheco brings together a dedicated team of developers, designers, project managers, QAs and analysts with world-className expertise to deliver stunning eCommerce sites that drive growth and success. Whether you're a startup or an established enterprise, we've the knowledge and expertise to help you succeed.</p>
            </div>
            <section className="faq-area about_acordion pt-50 pb-50">
                <div className="container">
                    <div className="row">
                        <div className="col-lg-6">
                            <div className="block-style-twenty animate-icon d-flex mb-30 wow fadeInUp aos-init aos-animate" data-aos="fade-up" data-aos-duration="500">
                                <div className="icon square_icon">
                                    {/* <!-- <i className="flaticon-help"></i> --> */}
                                    <img src={require("../../image/about/technical_ex.png")} alt=""/>
                                </div>
                                <div className="text">
                                    <h3 className="">Technical Expertise </h3>
                                    <p className="justify_txt">We are passionate about creating exceptional multichannel shopping experiences that drive your eCommerce success. Our team of experts has a deep understanding of leading eCommerce platforms such as Magento, Shopify, BigCommerce, and WooCommerce, and we're dedicated to delivering outstanding results that exceed your expectations.</p>
                                </div>
                            </div>
                        </div>
                        <div className="col-lg-6">
                            <div className="block-style-twenty animate-icon d-flex mb-30 wow fadeInUp aos-init aos-animate" data-aos="fade-up" data-aos-duration="700">
                                <div className="icon square_icon">
                                    {/* <!-- <i className="flaticon-technical-support"></i> --> */}
                                    <img src={require("../../image/about/vastly_experienced.png")} alt=""/>
                                </div>
                                <div className="text">
                                    <h3 className="">Vastly Experienced </h3>
                                    <p className="justify_txt">With years of experience in the eCommerce industry, we have a proven track record of delivering successful solutions for a diverse range of organizations. Our vast experience and expertise ensure that we're well-equipped to tackle any challenge and deliver exceptional results for your business.</p>
                                </div>
                            </div>
                        </div>
                        <div className="col-lg-6">
                            <div className="block-style-twenty animate-icon d-flex mb-30 wow fadeInUp aos-init aos-animate" data-aos="fade-up" data-aos-duration="900">
                                <div className="icon square_icon">
                                    {/* <!-- <i className="flaticon-it"></i> --> */}
                                    <img src={require("../../image/about/mutual_nature.png")} alt=""/>
                                </div>
                                <div className="text">
                                    <h3 className="">Mutual by Nature  </h3>
                                    <p className="justify_txt">We believe that the key to success is collaboration. That's why we work closely with our clients, aiming to establish a true partnership that extends beyond the typical vendor-client relationship. We strive to make your team feel like an integral part of our team, working together towards a common goal. With Mucheco, you can count on a long-term partnership that drives success for your business. </p>
                                </div>
                            </div>
                        </div>
                        <div className="col-lg-6">
                            <div className="block-style-twenty animate-icon d-flex mb-30 wow fadeInUp aos-init" data-aos="fade-up" data-aos-duration="1100">
                                <div className="icon square_icon">
                                    {/* <!-- <i className="flaticon-technical-support-1"></i> --> */}
                                    <img src={require("../../image/about/fully_commited.png")} alt=""/>
                                </div>
                                <div className="text">
                                    <h3 className="">Fully Committed  </h3>
                                    <p className="justify_txt">We're fully committed to delivering exceptional customer service and support.Our open platform for support allows you to easily monitor and manage your requests and queries, providing you with peace of mind and quick resolution of any issues. With Mucheco, you can count on personalized and dedicated support that truly puts your business first. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
           
        </div>
    </section>
    {/* <!--====== end mission & Vission Section ======--> */}

    <section className="How_can_we_help pt-60 pb-60">
        <div className="container ">
            <div className="section-title text-center mb-25 wow fadeInUp">
                <div className="row justify-content-center">
                    <div className="col-md-6">
                        <span className="sub-title sub-title-bg blue-light-bg">How can we help?</span>
                        <h2 className="">We plan to delight customers by providing services in the following areas</h2>
                    </div>
                </div>
               
            </div>
          
            <section className="faq-area about_acordion pt-50 pb-50">
                <div className="container">
                    <div className="row">
                       <div className="col-lg-12">
                       <ul className="check-list list-circle-bg mb-20 wow fadeInUp aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                                        {/* {Array.isArray(consultancyData?.data?.market_place?.lis) ? <>
                                            {consultancyData?.data?.market_place?.lis?.map((each, key) => <li>{each}</li>)}
                                        </> : null} */}
                                        <li>Branding, concept and business plan development for eCommerce businesses.</li>
                                        <li>eCommerce website design Magento/Shopify, custom web development using platforms such as Laravel.</li>
                                        <li>Systems implementation, integration and design. This incorporates Mucheco’s multichannel system. (How many users are using this platform successfully?)</li>
                                        <li>Development of fully serviced plugins for partners including Laravel, Magento, Shopify, BigCommerce and their customers</li>
                                        <li>Managed services and data optimisation</li>
                                        <li>Salesforce CRM customisation and delivery for eCommerce and non-eCommerce based situations</li>
                                      

                                    </ul>
                       </div>
                    </div>
                </div>
            </section>
           
        </div>
    </section>



    {/* <!--====== Start Testimonial Section ======--> */}
    {testimonialData.length?<section className="testimonial-area testimonial-style-two bg_cover pt-60 pb-100"
  style={{backgroundImage:`url(${testimonial})`}}>
  <div className="container">
      <div className="row justify-content-center">
          <div className="col-lg-6">
              <div className="section-title text-center mb-50 wow fadeInUp" data-aos="fade-up"
                  data-aos-duration="800">
                  <span className="sub-title sub-title-bg blue-light-bg">Our testimonials</span>
                  <h2 className="">What Our Clients Say About
                      Our IT Solutions</h2>
              </div>
          </div>
      </div>
      {/* <!-- Slider --> */}
      <div className=" testimonial-slider-two" id="news_blog">
      
      <Testimonial data={testimonialData}/>
         

      </div>
      {/* <!-- Slider END --> */}

  </div>
</section>:null}
  
    {/* <!--====== End Testimonial Section ======--> */}
        {/* <!--====== our customer Section start ======--> */}
        {ourCustomerDataErr?<OurCustomer isOurCustomerErr={setIsourCustomerDataErr}/>:null}
    
    {/* <!--====== our customer Section start ======--> */}
    </div>
    <Outlet />
    </>
    );
}

export default WhychooseUs;