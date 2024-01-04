import React, { useEffect, useState } from 'react';
import Header from '../Header';
import Loader from '../../components/Loader';
import { CallApi_Without_Token } from '../../Services/Client';
import { API } from '../../Services/Apis';
import { useLocation,useNavigate} from 'react-router-dom';
import { Helmet } from "react-helmet";
import { helmet } from '../../Utils/Utils';

function CaseStudy_Details(props) {
    const navigate = useNavigate();
   
    const location = useLocation();
    // const api_type = props.type
    const [detailsData, setDetailsData] = useState([]);
    const [loading, setLoading] = useState(false);
    const [metaData, setMetaData] = useState('');
    const api_type = props.type;
    useEffect(() => {
        helmet(api_type, setMetaData);
        window.scrollTo({ top: 1, behavior: 'smooth' });
        getBlogByID();
    }, [api_type])

    const idFrom_PrevPage = location?.state?.id;
    // console.log(idFrom_PrevPage,'ids from home page...........')


    const getBlogByID = async () => {
        try {
            setLoading(true)
            var formdata = new FormData();
            formdata.append("request_type", 'get_case_study_by_id');
            formdata.append("casestudy_id", idFrom_PrevPage);
            const data = await CallApi_Without_Token('POST', API.CASE_STUDY, formdata)
            setLoading(false)
            if (data.status === 1) {
                setDetailsData(data)
                setLoading(false)
                
            } else {
                setLoading(true)
                navigate("/case-study");
                // setTimeout(() => {navigate("/case-study");},12000);
            }
        } catch (e) {
            setLoading(true)
            // setTimeout(() => {navigate("/case-study");},12000);
            navigate("/case-study");
            
        }

    }
    // console.log(detailsData,'casestudy detailsData.at...........')

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

                {/* <!--====== Start case_study_landing Section ======--> */}
                <section className="case_study_details_page pb-50">
                    <div className="inner_banner">
                        <img src={detailsData?.data?.banner_image} alt="" />
                    </div>
                    <div className="container">
                        <div dangerouslySetInnerHTML={{ __html: detailsData?.data?.description }}></div>

                        <div className="case_details_items" data-aos="fade-up" data-aos-duration="1000">
                            <div className="nomber"><span className="nomber_span">01.</span><div className="tilt"></div></div>
                            <h2 className="block_heading">Requirements</h2>

                            <div dangerouslySetInnerHTML={{ __html: detailsData?.data?.requirements }}></div>
                        </div>
                        <div className="case_details_items" data-aos="fade-up" data-aos-duration="1000">
                            <div className="nomber"><span className="nomber_span">02.</span><div className="tilt"></div></div>
                            <h2 className="block_heading">Challenges</h2>



                            <div dangerouslySetInnerHTML={{ __html: detailsData?.data?.challenges }}></div>

                        </div>
                        <div className="case_details_items" data-aos="fade-up" data-aos-duration="1000">
                            <div className="nomber"><span className="nomber_span">03.</span><div className="tilt"></div></div>
                            <h2 className="block_heading">Solutions We Provided</h2>

                            <div dangerouslySetInnerHTML={{ __html: detailsData?.data?.solutions }}></div>
                        </div>
                        <div className="case_details_items" data-aos="fade-up" data-aos-duration="1000">
                            <div className="nomber"><span className="nomber_span">04.</span><div className="tilt"></div></div>
                            <h2 className="block_heading">The Result</h2>
                            <div className="rerult_imgs">

                            </div>
                            {(detailsData?.data?.result_image.length) ? <div className="rerult_imgs">
                                {detailsData?.data?.result_image?.map((each, key) => {
                                    return (
                                        <div className="result_img" id={`result_img`+key}>
                                            <img src={each} alt="" />
                                        </div>
                                    )
                                })}
                            </div> : null}

                            <div dangerouslySetInnerHTML={{ __html: detailsData?.data?.result }}></div>
                        </div>

                    </div>
                </section>
                {/* <!--====== End case_study_landing Section ======--> */}

            </div>


        </>
    );
}

export default CaseStudy_Details;