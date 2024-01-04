import React, { useEffect, useState } from 'react';
import Header from '../Header';
import OwlCarousel from 'react-owl-carousel';
import testimonial from '../../image/testimonial-bg-1.jpg';
import { Helmet } from "react-helmet";
import { Link, Outlet } from 'react-router-dom';
import {helmet} from '../../Utils/Utils';
import OurCustomer from '../../components/OurCustomer';
import Testimonial from '../../components/Testimonial';
import { CallApi_Without_Token } from '../../Services/Client';
import { API } from '../../Services/Apis';
function About(props) {
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
                            <span className="sub-title sub-title-bg blue-light-bg">why work with us?</span>
                            <h2 className="">We make great success achievable for any business</h2>
                        </div>
                        <p>Whether you're just starting out or looking to scale, we have all the solutions to help you reach your full potential.</p>
                        <blockquote className="quote-content mb-35 wow fadeInUp">
                            Stand out in the crowded eCommerce space and Let Mucheco®'s innovative team help you shine.
                        </blockquote>
                        <ul className="check-list list-circle-bg mb-20 wow fadeInUp">
                            <li>Technical Expertise</li>
                            <li>Vastly Experienced</li>
                            <li>Mutual by Nature</li>
                            <li>Fully Committed</li>
                        </ul>
                        {/* <!-- <a href="about.html" className="main-btn btn btn-purple wow fadeInUp">learn about more</a> --> */}
                    </div>
                </div>
                <div className="col-lg-5">
                    <div className="about_top_rgt_img" data-aos="fade-left" data-aos-duration="1000">
                        <img src={require("../../image/about/about_top.jpg")} alt="" />
                    </div>
                   
                </div>
            </div>
        </div>
    </section>
    {/* <!--====== End About Section ======--> */}
    {/* <!--====== Start mission & Vission Section ======--> */}
    <section className="mission_vission pt-60 pb-60">
        <div className="container ">
            <div className="section-title text-center mb-25 wow fadeInUp">
                <div className="row justify-content-center">
                    <div className="col-md-6">
                        <span className="sub-title sub-title-bg blue-light-bg">About Us</span>
                        <h2 className="">Driving Business Growth Through Quality IT Services</h2>
                    </div>
                </div>
               
            </div>
            <div className="about_para">
                <p>mucheco Commerce brings together a dedicated team of developers, designers, project managers,
                    QAs and analysts with world-className expertise in Magento and Mucheco CloudHub. Specialists in ecommerce,
                    integration and custom software development, we help ambitious businesses to grow…Mucheco® is a cloud-based application that simplifies online retailing across multiple marketplaces. We provide creative and responsive design services, integrated marketing solutions, and quality software services. Our team has expertise in IT education and training, and we've earned ISO 9001-2008 certification for our e-commerce solutions.</p>
            </div>
            <section className="faq-area about_acordion pt-50 pb-50">
                <div className="container">
                    <div className="row align-items-center">
                        <div className="col-lg-6">
                            <div className="faq-img mb-50 wow fadeInLeft">
                                <img src={require("../../image/about/mission.png")} alt="" />
                            </div>
                        </div>
                        <div className="col-lg-6">
                            <div className="faq-content-box faq-content-box-one mb-50">
                                
                                <div className="faq-accordian faq-accordian-two wow fadeInUp" id="accordianOne" >
                                    <div className="card">
                                        <div className="card-header">
                                            <Link href="#" className="collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true">
                                                Our Mission:
                                            </Link>
                                        </div>
                                        <div id="collapseOne" className="collapse show" data-parent="#accordianOne">
                                            <div className="card-body">
                                                <p>Our mission is to be a leader in the IT industry by providing innovative solutions that drive growth, improve efficiency, and create value for our customers. We are guided by the following five core principles:</p>
                                                <ul className="check-list list-circle-bg mb-20 wow fadeInUp">
                                                    <li>Customer centricity</li>
                                                    <li>Exceptional quality</li>
                                                    <li>Work in collaboration</li>
                                                    <li>Agile and nimble</li>
                                                    <li>Social Responsibility</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="card">
                                        <div className="card-header">
                                            <Link href="#" className="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false">
                                                Our Vision:
                                            </Link>
                                        </div>
                                        <div id="collapseTwo" className="collapse" data-parent="#accordianOne">
                                            <div className="card-body">
                                                <p>We envision a world where technology is harnessed to empower individuals and organizations to achieve their full potential. Our vision is anchored in the following five core principles:</p>
                                                    
                <ul className="check-list list-circle-bg mb-20 wow fadeInUp">
                    <li>Democratize technology </li>
                    <li>Push boundaries & solve problems </li>
                    <li>Sustainability for a better future</li>
                    <li>Embrace diversity & support all </li>
                    <li>Transform lives</li>
                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="card">
                                        <div className="card-header">
                                            <Link href="#" className="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false">
                                                Our Values
                                            </Link>
                                        </div>
                                        <div id="collapseThree" className="collapse" data-parent="#accordianOne">
                                            <div className="card-body">
                                                <p>Our values define who we are as a company and guide us in delivering exceptional services and solutions to our clientsthrough our five core values:</p>
                                                
                                                <ul className="check-list list-circle-bg mb-20 wow fadeInUp">
                                                    <li>Customer first always</li>
                                                    <li>Uncompromising Quality and Integrity</li>
                                                    <li>Collaborative Excellence</li>
                                                    <li>Relentless Innovation and Inspiration</li>
                                                    <li>Full Ownership and Speed of Delivery</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
           
        </div>
    </section>
    {/* <!--====== end mission & Vission Section ======--> */}

    {/* <!--====== our customer Section start ======--> */}
    {ourCustomerDataErr?<OurCustomer isOurCustomerErr={setIsourCustomerDataErr}/>:null}
    {/* <!--====== our customer Section start ======--> */}

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
  
     </div>

    {/* <Outlet /> */}
     
    </>
    );
}

export default About;