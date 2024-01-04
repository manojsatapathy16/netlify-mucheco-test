import { useState, useLayoutEffect, useEffect } from 'react';
import './style.css';
import { CallApi_Without_Token } from '../../Services/Client';
import { API } from '../../Services/Apis';
import { CKEditor } from '@ckeditor/ckeditor5-react';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';


function UploadBlog() {

    // const getInitialState = () => {
    //     const title = '';
    //     const description = '';
    //     const type = 'File';
    //     const url = '';
    //     const file = '  ';
    //     const Meta_title = '';
    //     const meta_keyword = '';
    //     const Meta_Description = '';
    //     return title, description, type, url, file, meta_keyword, Meta_title, Meta_Description;
    // };
    const [value, setValue] = useState({title : '',
    description : '',
     type : 'File',
     url : '',
     file : '',
     Meta_title : '',
     meta_keyword :'',
     Meta_Description : ''});
    const [isLoginClicked, setIsLoginClicked] = useState(false);
    const [textfieldValue, settextfieldValue] = useState('');
    const [fileData, setFileData] = useState('');

    // useEffect(() => {
    //     console.log(fileData, "USE EFFECT------------------>")
    // }, [fileData])




    // console.log(value)
    // console.log(textfieldValue)


    const fetchInfo = async () => {
        var formdata = new FormData();
        formdata.append("request_type", "blog_post");
        formdata.append("title", value.title);
        formdata.append("description", textfieldValue);
        if (value.type == 'URL') {
            formdata.append("media_link", value.url);
        }
        formdata.append("media_file", fileData);
        formdata.append("meta_title", value.Meta_title);
        formdata.append("meta_keyword", value.meta_keyword);
        formdata.append("meta_description", value.Meta_Description);

        const data = await CallApi_Without_Token('POST', API.INSIGHT_UPLOAD, formdata)
        // setLoading(false)
        // console.log(value.file)
        if (data.status === 1) {
            // set blank field after form submit start
            setValue({title : '',
           description : '',
            type : 'File',
            url : '',
            file : '',
            Meta_title : '',
            meta_keyword :'',
            Meta_Description : ''});
            settextfieldValue('');
            setFileData('');
            // set blank field after form submit end
        } else {
            // setLoading(false)
        }
    }
    const compairDataString = localStorage.getItem("credential");
    const compairData = JSON.parse(compairDataString);

    const loginHandler = () => {
        setIsLoginClicked(true);
    }
    const logoutHandler = () => {
        setIsLoginClicked(false);
        localStorage.removeItem('credential');
        window.location = '';
    }
    const modalClose = () => {
        setIsLoginClicked(false);
    }
    const inputHandleChange = (e) => {
        // console.log(e.target.name, "iiiiiiiiiiiiiii", e.target.files)
        // 

        if (e.target.name == 'file' && e.target.files) {

            setFileData(e.target.files[0])
        }
        setValue({ ...value, [e.target.name]: e.target.value })
    }
    const handleLoginSubmit = (e) => {
        e.preventDefault();
        fetchInfo();

    }
    const textFieldHandleChange = (e) => {
        // settextfieldValue(...textfieldValue,e.target.value);
        // console.log(e);


    }

    const heightVar = window.innerHeight - 190;
    const toolbarConfig = {
        height: heightVar,
        toolbar: 'Full',
        allowedContent: true,
        startupFocus: true,
    };







    return (
        <>
            <div className="header">
                <div className="menu_list">

                    <div>
                        <div className='upload_btn' onClick={loginHandler} ><span><i className="fa fa-upload" aria-hidden="true"></i></span> Upload New Blog</div>
                        {/* {(!isLogin) ? <span onClick={loginHandler} className="login_header">Admin Login</span> : (<span onClick={logoutHandler} className="login_header">Logout</span>)} */}
                    </div>
                    {(!isLoginClicked) ? '' : <div className="login_modal">
                        <form action="" onSubmit={handleLoginSubmit} className='uploadForm' >
                            <h4>Upload Blog</h4>
                            <button className='close_btn' onClick={modalClose} type='submit'>x</button>


                            <div className='row'>
                                <div className='col-lg-4'>
                                    <label htmlFor="">Heading</label>
                                    <input type="text" name='title' placeholder='Enter user Name' value={value.title}
                                        onChange={inputHandleChange} />
                                </div>
                                <div className='col-md-4'>
                                    <label htmlFor="">Select Upload Type</label>

                                    <select name='type' className='uploadInput' value={value.type} onChange={inputHandleChange}>
                                        <option value="File">File</option>
                                        <option value="URL">URL</option>
                                    </select>
                                </div>
                                <div className='col-md-4'>

                                    {/* <div><label htmlFor="">file</label>
                                        <div className="uploadInput">
                                            <input type="file" name='file' value={fileData}
                                                onChange={inputHandleChange} />
                                        </div>
                                    </div> */}
                                    {value.type == 'File' ? (

                                        <div><label htmlFor="">file</label>
                                            <div className="uploadInput">
                                                <input type="file" name='file' value={value.file}
                                                    onChange={inputHandleChange} accept="image/png, image/gif, image/jpeg" />
                                            </div>
                                        </div>)
                                        : (
                                            <div><label htmlFor="">Url</label><input type="text" className='uploadInput' name='url' placeholder='Url' value={value.Url}
                                                onChange={inputHandleChange} />
                                            </div>)
                                    }



                                </div>

                            </div>
                            <div className='row'>
                                <div className='col-lg-4'>
                                    <label htmlFor="">Meta Title</label>
                                    <input type="text" name='Meta_title' placeholder='Enter Meta Title' value={value.Meta_title}
                                        onChange={inputHandleChange} />
                                </div>
                                <div className='col-lg-4'>
                                    <label htmlFor="">Meta Description</label>
                                    <input type="text" name='Meta_Description' placeholder='Enter Meta Description' value={value.Meta_Description}
                                        onChange={inputHandleChange} />
                                </div>
                                <div className='col-lg-4'>
                                    <label htmlFor="">Meta keyword</label>
                                    <input type="text" name='meta_keyword' placeholder='Enter user Name' value={value.meta_keyword}
                                        onChange={inputHandleChange} />
                                </div>

                            </div>
                            <div>
                                <label htmlFor="">Description</label>
                                <CKEditor
                                    name='description'
                                    disabled={false}
                                    editor={ClassicEditor}
                                    // config={toolbarConfig}
                                    data={textfieldValue}



                                    onReady={editor => {
                                        // You can store the "editor" and use when it is needed.
                                        
                                    }}

                                    onChange={(event, editor) => {
                                        const data = editor.getData();
                                        settextfieldValue(data);
                                    }}
                                    onBlur={(event, editor) => {
                                       
                                    }}
                                    onFocus={(event, editor) => {
                                       
                                    }}
                                />
                            </div>
                            <button onClick={() => {
                               
                            }} className='login_submit btn' type='submit'>Submit</button>
                        </form>
                    </div>}



                </div>
            </div>
        </>
    );
}

export default UploadBlog;
