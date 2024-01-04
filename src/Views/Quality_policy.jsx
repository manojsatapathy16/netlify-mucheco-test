import Header from './Header';
import React, { useEffect, useState } from 'react';
import { CallApi_Without_Token } from '../Services/Client';
import { API } from '../Services/Apis';
function Quality_policy() {
    const [privacypolicy, privacypolicyData] = useState([]);
    useEffect(() => {

        fetchInfo();
    }, [])

    const fetchInfo = async () => {
        var formdata = new FormData();
        formdata.append("request_type", 'policy');
        formdata.append("slug", 'quality-policy');
        const data = await CallApi_Without_Token('POST', API.PRIVACY_POLICY, formdata)
        if (data.status === 1) {
            privacypolicyData(data)
            window.scrollTo({ top: 0, behavior: 'smooth' });

        }
    }
    return (
        <>
            <div className="inner_pages_wrapper">
                <Header class_bg='black_bg' />
                <section>
                    <div className="container">
                        <div className="std">
                            <div className='some_policys'>
                                <div dangerouslySetInnerHTML={{ __html: privacypolicy?.data?.description }} />
                                {/* {privacypolicy?.data?.description} */}

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </>
    );
}

export default Quality_policy;