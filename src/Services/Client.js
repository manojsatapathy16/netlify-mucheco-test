
const loaddata = async (url, options) => {
  try {
    const response = await fetch(url, options);
    const data = await response.json();
    return data;
  } catch (error) {
    console.log(error, "API CONTROLLER PAGE");
  }
};

export const CallApi = async (method, apiPath, params) => {
  let token = await localStorage.getItem('access_token');

  let options = {
    method: method,
    headers: {
      Authorization: `Bearer ${token}`,
      Accept: 'application/json',
      'Content-Type': 'multipart/form-data',
    },
    body: params,
    redirect: 'follow'
  };

  return loaddata(apiPath, options);
};

export const CallApi_Without_Token = async (method, apiPath, params) => {  
  let options = {
    method: method,
    body: params,
    redirect: 'follow'
  };

  return loaddata(apiPath, options);
};

