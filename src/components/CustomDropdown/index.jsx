import React, { useState } from 'react';
import { country_data } from '../../Constants/CountryCode';
import './dropdown.css';

function CustomDropdown() {
    const [selectedOption, setSelectedOption] = useState(''); // State to track the selected option
    const [isOpen, setIsOpen] = useState(false); // State to track the dropdown open/close

    const options = country_data;

    const handleSelect = (option) => {
        setSelectedOption(option.dial_code);
        setIsOpen(false);
    };
    return (
        <div className="list-unstyled form_control" onClick={() => setIsOpen(!isOpen)} value={selectedOption} compname="PhoneNumber_countrycodeval" name="PhoneNumber_countrycodeval" checktype="c7" maxlength="10" phoneFormat="1" isCountryCodeEnabled={true} id="international_PhoneNumber_countrycodeval" valType="code">

            <li className="init"><span style={{ marginRight: '5px' }}></span>{selectedOption ? options.find(option => option.dial_code === selectedOption)?.flag : ''}{selectedOption ? options.find(option => option.dial_code === selectedOption)?.dial_code : '[SELECT]'}</li>
            <ul>
                {isOpen && options.map(option => (
                    <li key={option.dial_code} data-value={option.dial_code} onClick={() => handleSelect(option)}>
                        {option.flag}   {option.dial_code}
                    </li>

                ))}
            </ul>
        </div>

    )

}

export default CustomDropdown;