
import Header from './Header';
import React, { useEffect, useState } from 'react';
import { CallApi_Without_Token } from '../Services/Client';
import { API } from '../Services/Apis';
import { Link } from 'react-router-dom';

function Faq() {
    const [faqData, setFaqData] = useState([]);
    useEffect(() => {

        fetchInfo();
        window.scrollTo({top: 0, behavior: 'smooth'});
    }, [])

    const fetchInfo = async () => {
        var formdata = new FormData();
        formdata.append("request_type", 'faq');
        const data = await CallApi_Without_Token('POST', API.FAQ, formdata)
        if (data.status === 1) {
            setFaqData(data)
        }
    }
   
 
  return (
    <>
    <Header class_bg='black_bg' />
    <section className="faq-area about_acordion faq_acordion pt-50 pb-50">
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-lg-12">
                        <div className="faq-content-box faq-content-box-one mb-50">
                           
                            <div className="section-title mb-25 wow fadeInUp faq-heading">
                                <div className="">
                                    <div className="">
                                        <span className="sub-title sub-title-bg blue-light-bg">FAQ</span>
                                        <h2 className="">Frequently Asked Questions</h2>
                                    </div>
                                </div>
                               
                            </div>
                            <div className="faq-accordian faq-accordian-two wow fadeInUp" id="accordianOne" >
                         
                            {Array.isArray(faqData?.data) ? <>
                            {faqData?.data?.map((each, key) => {
                                return (
                                  key ? <div className="card">
                                  <div className="card-header">
                                      <Link href="#" className="collapsed circle_pointer" data-toggle="collapse" data-target={ `#collapse${key}` } aria-expanded="true" >
                                          {each.question}
                                  
                                      </Link>
                                  </div>
                                  <div id={ `collapse${key}` } className="collapse" data-parent="#accordianOne">
                                      <div className="card-body">
                                          <p>{each.answer}</p>
                                      </div>
                                  </div>
                              </div>: <div className="card">
                              <div className="card-header">
                                  <Link href="#" className="collapsed circle_pointer" data-toggle="collapse" data-target={ `#collapse${key}` } aria-expanded="true" >
                                      {each.question}
                              
                                  </Link>
                              </div>
                              <div id={ `collapse${key}` } className="collapse show" data-parent="#accordianOne">
                                  <div className="card-body">
                                      <p>{each.answer}</p>
                                  </div>
                              </div>
                          </div>
                                   
                                   
                                )
                            })}
                        </> : null}



                                
                               
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
    </>
    );
}

export default Faq;