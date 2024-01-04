import React,{useState} from 'react';
import './Form.css';
import {country_data} from'../../Constants/CountryCode';
import { Link, useNavigate } from 'react-router-dom';



function ZohoContact() {
  const initialValues = { SingleLine: '', SingleLine1: '', PhoneNumber_countrycode: '', Email: '',Website:'',Dropdown:'', MultiLine: '' };
  const [formValues, setFormValues] = useState(initialValues);
  const [formErrors, setFormErrors] = useState({});
  const navigate = useNavigate();
  // const [isSubmit, setIsSubmit] = useState(false);
    // onchange handler
    const handleChange = (e) => {
      const { name, value } = e.target;
      setFormValues({ ...formValues, [name]: value });
  };
const onSubmitcheck=(event)=>{
  'javascript:document.charset="UTF-8"'
  console.log(formValues)
  setFormErrors(validate(formValues));
  if (Object.keys(validate(formValues)).length === 0 ){
    navigate("/contact");
  }
  else{
    
    console.log(formErrors,'form error')
    event.preventDefault();
  }
   

 
}

 // validate form
 const validate = (values) => {
  const errors = {};
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/i;
  if (!values.SingleLine) {
      errors.firstname = 'First name is required!';
  }
  if (!values.SingleLine1) {
      errors.lastname = 'Last name is required!';
  }
//   if (!values.Website) {
//     errors.Website = 'Website is required!';
// }
if (!values.Dropdown) {
  errors.Dropdown = 'select one of the list item!';
}
  if (!values.Email) {
      errors.email = 'Email is required!';
  } else if (!regex.test(values.Email)) {
      errors.email = 'This is not a valid email format!';
  }
  if (!values.PhoneNumber_countrycode) {
      errors.phone = 'phone number is required!';
  } else if (!values.PhoneNumber_countrycode.length == 10) {
      errors.phone = 'phone number is required!';
  }

  return errors;
};

// console.log(countryCode)
// console.log(errors)
  return (
    <section class="contact-area contact-style-two">
    <div class="zf-templateWidth .contact-form">
      
      <form action='https://forms.zohopublic.in/david2/form/SendUsMessage/formperma/bsMdedz1BjY-_ITShu0pICvJq_GNUgVkHGP_EJ6Uq3g/htmlRecords/submit' name='form' method='POST' onSubmit={onSubmitcheck} accept-charset='UTF-8' enctype='multipart/form-data' id='form'><input type="hidden" name="zf_referrer_name"  />
        <input type="hidden" name="zf_redirect_url" />
          <input type="hidden" name="zc_gad" />
            <div class="zf-templateWrapper">
              <ul class="zf-tempHeadBdr"><li class="zf-tempHeadContBdr">
                <p class="zf-frmDesc"></p>
                <div class="zf-clearBoth"></div></li></ul>

              <div class="zf-subContWrap zf-topAlign"><ul>


                <li class="zf-tempFrmWrapper zf-small">
                  <div class="zf-tempContDiv">
                    <span> <input type="text" className='form_control' name="SingleLine" checktype="c1"  maxlength="255" fieldType={1} placeholder="First Name" value={formValues.SingleLine} onChange={handleChange} /></span> <p className='error'>{formErrors.firstname}</p>
                  </div><div class="zf-clearBoth"></div></li>

                <li class="zf-tempFrmWrapper zf-small">
                  <div class="zf-tempContDiv">
                    <span> <input type="text" className='form_control' name="SingleLine1" checktype="c1"  maxlength="255" fieldType={1} placeholder="Last Name" value={formValues.SingleLine1} onChange={handleChange}/></span> <p className='error'>{formErrors.lastname}</p>
                  </div><div class="zf-clearBoth"></div></li>

                <li class="zf-tempFrmWrapper zf-small">
                  <div class="zf-tempContDiv">
                    <span> <input fieldType={9} type="text" className='form_control' maxlength="255" name="Email" checktype="c5"  placeholder="Email Address" value={formValues.Email} onChange={handleChange}/></span> <p className='error'>{formErrors.email}</p>
                  </div><div class="zf-clearBoth"></div></li>

                <li class="zf-tempFrmWrapper zf-small">
                  <div class="zf-tempContDiv zf-phonefld">
                    <div
                      class="zf-phwrapper"
                    >

                      <span>
                        {/* <CustomDropdown /> */}
                        
                         <select compname="PhoneNumber_countrycodeval" className='form_control' name="PhoneNumber_countrycodeval" checktype="c7" maxlength="10" phoneFormat="1" isCountryCodeEnabled={true} id="international_PhoneNumber_countrycodeval" valType="code" placeholder="" >
                      {country_data.map((each)=> <option value={each.dial_code}><div className="flag_code_wrapper"><span className='flag'>{each.flag}  </span><span className='country_code'>{each.dial_code}</span></div></option>)}
                       </select>
                        </span>
                      <span> <input type="text" className='form_control' compname="PhoneNumber" name="PhoneNumber_countrycode" maxlength="20" checktype="c7"  phoneFormat="1" isCountryCodeEnabled={true} fieldType="11" id="international_PhoneNumber_countrycode" valType="number" phoneFormatType="1" placeholder="Phone Number" value={formValues.PhoneNumber_countrycode} onChange={handleChange}/>
                        </span>
                      <div class="zf-clearBoth"></div></div><p className='error'>{formErrors.phone}</p>
                  </div><div class="zf-clearBoth"></div></li>

                <li class="zf-tempFrmWrapper zf-small">
                  <div class="zf-tempContDiv">
                    <span> <input type="text" className='form_control' maxlength="2083" name="Website" checktype="c6"  placeholder="Website" value={formValues.Website} onChange={handleChange}/></span> <p className='error'>{formErrors.Website}</p>
                  </div><div class="zf-clearBoth"></div></li>

                <li class="zf-tempFrmWrapper zf-small">
                  <div class="zf-tempContDiv">
                    <select class="zf-form-sBox form_control" name="Dropdown" checktype="c1" value={formValues.Dropdown} onChange={handleChange}>
                      <option selected="true" value="-Select-">How Did You Hear About Us</option>
                      <option value="Google">Google</option>
                      <option value="Bing">Bing</option>
                      <option value="An&#x20;Email">An Email</option>
                      <option value="A&#x20;Web&#x20;Portal">A Web Portal</option>
                      <option value="A&#x20;Recent&#x20;Event">A Recent Event</option>
                    </select><p className='error'>{formErrors.Dropdown}</p>
                  </div><div class="zf-clearBoth"></div></li>

                <li class="zf-tempFrmWrapper zf-small">
                  <div class="zf-tempContDiv">
                    <span> <textarea name="MultiLine" className='form_control' checktype="c1" maxlength="65535" placeholder="Message" value={formValues.MultiLine} onChange={handleChange}></textarea> </span><p className='error'>{formErrors.SingleLine}</p>
                  </div><div class="zf-clearBoth"></div></li>
              </ul></div>
              <ul><li class="zf-fmFooter"><button class="zf-submitColor main-btn btn-purple" >send message</button></li></ul></div></form></div>
              </section>

        )

}

        export default ZohoContact;