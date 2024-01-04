import React from 'react';
import OwlCarousel from 'react-owl-carousel';

export default function Testimonial(props) {
    const options = {
        responsive: {
            0: {
                items: 1,
            },
            400: {
                items: 1,
            },
            600: {
                items: 2,
            },
            700: {
                items: 3,
            }
        },
    };

    return (
        

        <OwlCarousel className='owl-theme' loop margin={30} nav autoplay ={true} {...options}>
            <>
                            {props?.data?.map((each, key) => {
                                return (
                                    <div className="item" data-aos="fade-up" data-aos-duration="500" key={each.id+'ids'+key}>
                                    <div className="testimonial-item wow fadeInUp">
                                        <div className="wt-thumb-box">
                                            <div className="thumb">
                                                <img src={each.profile} alt="testimonial image" />
                                            </div>
                                            <div className="comment">
                                                <h5>{each.key_point}</h5>
                                            </div>
                                        </div>
                                        <div className="wt-content">
                                            <p>{each.description}</p>
                                            <div className="quote-title-box">
                                                <div className="quote">
                                                    <i className="flaticon-quotation"></i>
                                                </div>
                                                <div className="author-title">
                                                    <h5>{each.company}</h5>
                                                    <span className="position">{each.customer_name}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                )
                            })}
                        </>
     
        </OwlCarousel>
                       
       

    

    )
}