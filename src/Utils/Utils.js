import { CallApi_Without_Token } from '../Services/Client';
import { API } from '../Services/Apis';


export const getUniqueValues = (val) => {
    var serchkeys = [];
    val.data.map(each => serchkeys.push(each.search_key))
    let outputArray = serchkeys.filter(function (v, i, self) {

        return i == self.indexOf(v);
    });
    outputArray.unshift('All');

    return outputArray;


}



export const helmet = async (type,setData) => {
    var formdata = new FormData();
    formdata.append("request_type", 'get_meta_tags');
    formdata.append("page", type);
    const data = await CallApi_Without_Token('POST', API.ALL_PAGE_METATAG, formdata)
    if (data.status === 1) {
        setData(data);
    } 

}


