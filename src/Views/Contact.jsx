import React, { useState, useEffect, useLayoutEffect, useRef } from 'react';
import Header from './Header';
import { Helmet } from "react-helmet";
import { Link } from 'react-router-dom';
import { API } from '../Services/Apis';
import ZohoContact from './ZohoContact';


function Contact() {

    const initialValues = { firstname: '', lastname: '', phone: '', email: '', lead: '', website: '', message: '' };
    const [formValues, setFormValues] = useState(initialValues);
    const [formErrors, setFormErrors] = useState({});
    const [isSubmit, setIsSubmit] = useState(false);
    const [isSuccess, setIsSuccess] = useState({});
    const [showMessage, setShowMessage] = useState(0);
    const iframeContainer = useRef(null);

    useLayoutEffect(() => {
        window.scrollTo({ top: 1, behavior: 'smooth' });
    }, []);
    // console.log(isSuccess,'contact page')

    useEffect(() => {
        if (showMessage == 1) {
            setTimeout(() => {
                setShowMessage(0)
            }, 10000);
        }
    }, [showMessage])

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
        formdata.append("request_type", 'contact_us');
        formdata.append("first_name", value.firstname);
        formdata.append("last_name", value.lastname);
        formdata.append("email", value.email);
        formdata.append("phone", value.phone);
        formdata.append("url", value.website);
        formdata.append("lead", value.lead);
        formdata.append("message", value.message);
        var requestOptions = {
            method: 'POST',
            body: formdata,
            redirect: 'follow'
        };

        fetch(API.CONTACT_US, requestOptions)
            .then(response => response.json())
            .then(json => {
                setIsSuccess(json)
                setShowMessage(json.status)
            })


            //   .then(response => response.text())
            //   .then(result => setIsSuccess(JSON.parse(result)))
            .catch(error => console.log('error', error));

    }


    useEffect(() => {

        if (Object.keys(formErrors).length === 0 && isSubmit) {
            //   console.log(formValues);
            sendData(formValues);

            setFormValues(initialValues);

        }

    }, [formErrors]);
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

    //  Will scroll smoothly to the top of the next section
    const handleClickScroll = () => {
        const element = document.getElementById('contact-wrapper');
        if (element) {
            element.scrollIntoView({ behavior: 'smooth' });
        }
    }

   


    return (
    <>
            <div className="inner_pages_wrapper">
                <Header class_bg='black_bg' />
                <Helmet>
                    <title>mucheco</title>
                    <meta name="description" content="Helmet application" />
                    <meta name="keywords" content="HTML, CSS, JavaScript" />
                </Helmet>
                {/* <!--====== Start Contact Information Section ======--> */}
                <section className="contact-information-area contact-information-style-one pt-50 pb-80">
                    <div className="container">
                        <div className="row no-gutters">
                            <div className="col-lg-8">
                                <div className="information-wrapper wow fadeInLeft">
                                    <div className="row">
                                        <div className="col-lg-6">
                                            <div className="information-item mb-60">
                                                <div className="icon">
                                                    <img src={require("../image/contact/location.png")} alt="" />
                                                </div>
                                                <div className="text">
                                                    <h5>UK Office</h5>
                                                    <p>Mucheco Limited,
                                                        ProHal,
                                                        Iveco House, Station Road,
                                                        Watford WD171ET
                                                        United Kingdom
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="col-lg-6">
                                            <div className="information-item mb-60">
                                                <div className="icon">
                                                    <img src={require("../image/contact/phone-call.png")} alt="" />
                                                </div>
                                                <div className="text">
                                                    <h5>Our Hotlines</h5>
                                                    <p><span>Mobile :</span><Link href="tel:+442030049800"> UK +44 203 004 9800</Link></p>
                                                    <p><span>Phone :</span><Link href="tel:+17329317070">USA +1 732 931 7070</Link></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="col-lg-6">
                                            <div className="information-item mb-60">
                                                <div className="icon">
                                                    <img src={require("../image/contact/location.png")} alt="" />
                                                </div>
                                                <div className="text">
                                                    <h5>US Office</h5>
                                                    <p>Suyog Computech Inc,
                                                        345 Plainfield Ave.
                                                        Ste. 102
                                                        Edison, NJ 08817
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="col-lg-6">
                                            <div className="information-item mb-60">
                                                <div className="icon">
                                                    <img src={require("../image/contact/mail.png")} alt="" />

                                                </div>
                                                <div className="text">
                                                    <h5>Email Address</h5>

                                                    <p><Link href="#">sales@mucheco.com</Link></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-4">
                                <div className="information-cta wow fadeInRight">
                                    <div className="information-box mb-25">
                                        <h3>Business Hour</h3>
                                        <h5>Mon - Friday   :  09am - 05pm</h5>
                                        <h5>Satarday : 9am - 2pm</h5>
                                        <h5 className="st-close">Sunday Closed</h5>
                                    </div>
                                    <div className="information-box mb-25">
                                        <h3>Ready To Work With Us?</h3>
                                        <p>Please feel free to connect with us for any queries.</p>
                                        <button onClick={handleClickScroll} className="main-btn main-btn-blue">Contact Us</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {/* <!--====== End Contact Information Section ======--> */}
                {/* <!--====== Start Map section ======--> */}
                <section className="contact-page-map wow fadeInUp">
                    <div className="map-box">
                        <iframe src="https://www.google.com/maps/d/embed?mid=1CnxPO10N4aG2q9qubcllad5vez0&amp;hl=en"></iframe>
                    </div>
                </section>
                {/* <!--====== End Map section ======--> */}
                {/* <!--====== Start Contact Section ======--> */}
                <section className="contact-area contact-style-two">
                    <div className="contact-wrapper" id='contact-wrapper'>
                        <div className="container">
                            <div className="row justify-content-center">
                                <div className="col-lg-6">
                                    <div className="section-title text-center mb-55 wow fadeInUp">
                                        <h2>Send Us Message</h2>
                                        <h5>Don’t Hesited To Contact With Us! Feel Free To Message Us</h5>
                                    </div>
                                </div>
                            </div>
                            <div className="row">
                                <div className="col-lg-12">
                                    <div className="contact-form wow fadeInUp">
                                        {/* <form onSubmit={handleSubmit}>
                                {showMessage ? (<p className='success_message'>{isSuccess.message} Our team will be in touch with you shortly.</p>) : null}
                                    <div className="row justify-content-center">
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
                                        <div className="col-lg-6 col-md-6 col-sm-12">
                                            <div className="form_group">
                                                <input type="url" className="form_control" placeholder="Website" name="website" value={formValues.website} onChange={handleChange}  />
                                            </div>
                                        </div>
                                        
                                        
                                        <div className="col-lg-6 col-md-6 col-sm-12">
                                            <div className="form_group">
                                            <select className="form_control" name="lead" onChange={handleChange} value={formValues.lead}>
                                            <option value="How Did You Hear About Us">How Did You Hear About Us?</option>
                                            <option value="Google">Google</option>
                                            <option value="Bing">Bing</option>
                                            <option value="An Email">An Email</option>
                                            <option value="A Web Portal">A Web Portal</option>
                                            <option value="A Recent Event">A Recent Event</option>
                                            <option value="Other">Other</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div className="col-lg-12 col-md-12 col-sm-12">
                                            <div className="form_group">
                                                <textarea name="message" placeholder="Message" className="form_control" value={formValues.message} onChange={handleChange}></textarea>
                                            </div>
                                        </div>
                                        <div className="col-lg-5">
                                            <div className="form_group text-center">
                                                <button className="main-btn btn-purple w-100" type='submit'>send message</button>
                                            </div>
                                        </div>
                                    </div>
                                </form> */}
                                        {/* joho form start */}

<ZohoContact/>
                                        

                                                {/* joho form end */}
                                            </div>
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

                export default Contact;