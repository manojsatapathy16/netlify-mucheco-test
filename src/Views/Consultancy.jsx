import React, { useEffect, useState } from 'react';
import Header from './Header';
import { Helmet } from "react-helmet";
import { helmet } from '../Utils/Utils';
import Loader from '../components/Loader';
import { CallApi_Without_Token } from '../Services/Client';
import { API } from '../Services/Apis';
import { useNavigate} from 'react-router-dom';
function Consultancy(props) {
    const [consultancyData, setConsultancyData] = useState([]);
    const [loading, setLoading] = useState(false);
    const [metaData, setMetaData] = useState('');
    const api_type = props.type;
    const navigate = useNavigate();
    useEffect(() => {
        helmet(api_type, setMetaData);
        fetchInfo();
    }, [api_type])

    const fetchInfo = async () => {
        try{
        setLoading(true)
        var formdata = new FormData();
        formdata.append("request_type", 'consultancy');
        const data = await CallApi_Without_Token('POST', API.CONSULTANCY, formdata)
        setLoading(false)
        if (data.status === 1) {
            setConsultancyData(data)
            setLoading(false)
            window.scrollTo({top: 0, behavior: 'smooth'});
        } else {
            setLoading(true)
        }
    }
    catch (e) {
        setLoading(true)
        setTimeout(() => {navigate("/");},5000);
        
    }
    }
    

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
                {/* <!--====== Start consultancy Section ======--> */}
                <section className="pt-0 pb-95">
                    <div className="consultancy_banner">
                        <img title="consultancy" alt="consultancy" src={require("../image/consultancy_banner.jpg")} />
                        <div className="container">
                            <div className="transparent_txt_banner_wrap">
                                <h1>Consultancy</h1>
                            </div>
                        </div>
                    </div>
                    <div className="container">
                        <div className="row">
                            <div className="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <p>{consultancyData?.data?.description}</p>
                            </div>
                        </div>


                    </div>
                    <div className="grybg_consultancy">
                        <div className="container">

                            <div className="row innerBlock" data-aos="fade-up" data-aos-duration="1000">
                                <div className="">
                                    <div className="nomber"><span className="nomber_span">01.</span><div className="tilt"></div></div>
                                    <h2 className="block_heading">{consultancyData?.data?.market_place?.title}</h2>
                                    <p>{consultancyData?.data?.market_place?.description}</p>

                                    <ul className="check-list list-circle-bg mb-20 wow fadeInUp aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                                        {Array.isArray(consultancyData?.data?.market_place?.lis) ? <>
                                            {consultancyData?.data?.market_place?.lis?.map((each, key) => <li>{each}</li>)}
                                        </> : null}

                                    </ul>
                                </div>
                            </div>
                            <div className="row innerBlock" data-aos="fade-up" data-aos-duration="1000">
                                <div className="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <div className="nomber"><span className="nomber_span">02.</span><div className="tilt"></div></div>
                                    <h2 className="block_heading">{consultancyData?.data?.store_management?.title}</h2>
                                    <p>{consultancyData?.data?.store_management?.description}</p>

                                    <ul className="check-list list-circle-bg mb-20 wow fadeInUp aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                                        {Array.isArray(consultancyData?.data?.store_management?.lis) ? <>
                                            {consultancyData?.data?.store_management?.lis?.map((each, key) => <li>{each}</li>)}
                                        </> : null}
                                    </ul>
                                </div>
                            </div>
                            <div className="row innerBlock" data-aos="fade-up" data-aos-duration="1000">
                                <div className="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <div className="nomber"><span className="nomber_span">03.</span><div className="tilt"></div> </div>
                                    <h2 className="block_heading">{consultancyData?.data?.end_to_end?.title}</h2>
                                    <p>{consultancyData?.data?.end_to_end?.description}</p>
                                    <ul className="check-list list-circle-bg mb-20 wow fadeInUp aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                                        {Array.isArray(consultancyData?.data?.end_to_end?.lis) ? <>
                                            {consultancyData?.data?.end_to_end?.lis?.map((each, key) => <li dangerouslySetInnerHTML={{__html: each}} />)}
                                        </> : null}
                                    </ul>

                                </div>
                            </div>
                            
                        </div>
                    </div>
                </section>
                {/* <!--====== End consultancy Section ======--> */}
            </div>

        </>
    );
}

export default Consultancy;