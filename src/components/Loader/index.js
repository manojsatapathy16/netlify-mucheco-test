import React from 'react';
import './style.css';
const Loader = ({ show }) => {

    return (
        <>
            <div style={{ display: !show ? 'none' : 'flex' }} className="loader_section">
                <img src={require("../../image/Loader/loader.gif")} style={{ width: "500px" }} />

            </div>
        </>
    );
}

export default Loader;

// const CHNAGEdATA={}

// const data = [
//     {
//         title: 'All',
//         data: [{}, {}]
//     },
//     {
//         title: 'MAgentio',
//         data: [{}, {}]
//     },
//     {
//         title: 'MAgentio',
//         data: []
//     },
// ]

// bituarray=[
//     {
//         searchkey:'Magento',
//         image:'url',
//         title:'',
//         subtitle:''
//     },
//     {
//         searchkey:'Magento',
//         image:'url',
//         title:'',
//         subtitle:''
//     },
//     {
//         searchkey:'All',
//         image:'url',
//         title:'',
//         subtitle:''
//     }
// ]

// map.data{(data)=>{
//     return(
//         <li onClick={()=>{CHNAGEdATA=data.title}}>{data.title}</li>
//     )
// }
// }
// map.data{(data)=>{
//     return(
//         {data.title===CHNAGEdATA?<li onClick={()=>{CHNAGEdATA=data.title}}>{data.title}</li>:null}
//     )
// }
// }
