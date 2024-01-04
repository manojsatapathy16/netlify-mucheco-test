import React, { useEffect, useState } from 'react';
import { CallApi_Without_Token } from '../../Services/Client';
import { API } from '../../Services/Apis';

export default function OurCustomer(props) {
    const [ourCustomerData, setOurCustomerData] = useState([]);
    useEffect(() => {

        fetchInfo();
    }, [])

    const fetchInfo = async () => {
        try{
        var formdata = new FormData();
        formdata.append("request_type", 'our_customers');
        const data = await CallApi_Without_Token('POST', API.ABOUT_US, formdata)
        if (data.status === 1) {
            setOurCustomerData(data)
            props.isOurCustomerErr(true)
        }
        else{props.isOurCustomerErr(false)}
    }
    catch(e){ 
        props.isOurCustomerErr(false)
    }
    }
   

    return (

        <div className="section pt-60 pb-60">
            <div className="container banner_over_cnt about_brand">
                <div className="row justify-content-center">
                    <div className="section-title text-center mb-25 wow fadeInUp">
                        <span className="sub-title sub-title-bg blue-light-bg">Our Customers</span>
                        <h2 className="">Some of our customers </h2>
                    </div>
                    
                    {/* <a href="#" className="main-btn btn btn-purple wow fadeInUp about_brand_morebtn">load more</a> */}
                </div>
                <div className="brands">
                        {Array.isArray(ourCustomerData?.data) ? <>
                            {ourCustomerData?.data?.map((each, key) => {
                                return (
                                    <div className="brand" key={'abcdefg'+key}>
                                        <img src={each} alt="" />
                                    </div>
                                )
                            })}
                        </> : null}
                    </div>
            </div>
        </div>

    )
}