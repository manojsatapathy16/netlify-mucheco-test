<?php
function validate($type = null, $key = null, $value = null)
{
    $result = array(
        'fail' => 0,
        'message' => ''
    );
    if ($type == 'contact') {
        switch ($key) {
            case "first_name":
                if (strlen($value) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'First Name is required';
                } else if (strlen($value) < 3 || strlen($value) > 15) {
                    $result['fail'] = 1;
                    $result['message'] = 'First Name must be in 3 to 15 characters.';
                }
                break;
            case "last_name":
                if (strlen($value) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Last Name is required';
                } else if (strlen($value) < 3 || strlen($value) > 15) {
                    $result['fail'] = 1;
                    $result['message'] = 'Last Name must be in 3 to 15 characters.';
                }
                break;
            case "email":
                if (strlen($value) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Email is required';
                } else if (!filter_var($value, FILTER_VALIDATE_EMAIL) && !preg_match('/@.+\./', $value)) {
                    $result['fail'] = 1;
                    $result['message'] = 'Invalid Email';
                }
                break;
            case "phone":
                if (strlen($value) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Phone number is required';
                } else if (strlen($value) < 10 || strlen($value) > 10) {
                    $result['fail'] = 1;
                    $result['message'] = 'Phone number must be of 10 digits.';
                }
                break;
            // case "message":
            //     if (strlen($value) == 0) {
            //         $result['fail'] = 1;
            //         $result['message'] = 'Message is required';
            //     } else if (strlen($value) < 5) {
            //         $result['fail'] = 1;
            //         $result['message'] = 'Message must be of minimum 5 character.';
            //     }
            //     break;
            default:
                $result;
        }
    } elseif ($type == 'get_in_touch') {
        switch ($key) {
            case "first_name":
                if (strlen($value) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Name is required';
                } else if (strlen($value) < 3 || strlen($value) > 30) {
                    $result['fail'] = 1;
                    $result['message'] = 'Name must be in 3 to 30 characters.';
                }
                break;
            case "email":
                if (strlen($value) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Email is required';
                } else if (!filter_var($value, FILTER_VALIDATE_EMAIL) && !preg_match('/@.+\./', $value)) {
                    $result['fail'] = 1;
                    $result['message'] = 'Invalid Email';
                }
                break;
            case "phone":
                if (strlen($value) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Phone number is required';
                }
                break;
            case "message":
                if (strlen($value) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Message is required';
                } else if (strlen($value) < 5) {
                    $result['fail'] = 1;
                    $result['message'] = 'Message must be of minimum 5 character.';
                }
                break;
            default:
                $result;
        }
    } elseif ($type == 'user') {
        switch ($key) {
            case "username":
                if (strlen($value) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Username is required';
                } else if (strlen($value) < 3 || strlen($value) > 15) {
                    $result['fail'] = 1;
                    $result['message'] = 'Username must be in 3 to 15 characters.';
                }
                break;
            case "password":
                if (strlen($value) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Password is required';
                } else if (strlen($value) < 3 || strlen($value) > 15) {
                    $result['fail'] = 1;
                    $result['message'] = 'Password must be in 6 to 15 characters.';
                }
                break;
            default:
                $result;
        }
    } elseif ($type == 'article') {
        switch ($key) {
            case "title":
                if (strlen(trim($value)) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Title is required';
                } else if (strlen($value) < 5) {
                    $result['fail'] = 1;
                    $result['message'] = 'Title must be of minimum 5 character.';
                }
                break;
            case "description":
                if (strlen(trim($value)) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'description is required';
                } else if (strlen(trim($value)) < 10) {
                    $result['fail'] = 1;
                    $result['message'] = 'Description must be of minimum 10 character.';
                }
                break;
            case "meta_title":
                if (strlen(trim($value)) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Meta Title is required';
                } else if (strlen(trim($value)) < 3) {
                    $result['fail'] = 1;
                    $result['message'] = 'Meta Title must be of minimum 3 character.';
                }
                break;
            case "meta_description":
                if (strlen(trim($value)) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Meta Description is required';
                } else if (strlen(trim($value)) < 10) {
                    $result['fail'] = 1;
                    $result['message'] = 'Meta Description must be of minimum 10 character.';
                }
                break;
            case "meta_keyword":
                if (strlen(trim($value)) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Meta Keyword is required';
                } else if (strlen(trim($value)) < 2) {
                    $result['fail'] = 1;
                    $result['message'] = 'Meta Keyword must be of minimum 2 character.';
                }
                break;
            default:
                $result;
        }
    } elseif ($type == 'meta_tag') {
        switch ($key) {
            case "meta_title":
                if (strlen(trim($value)) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Meta Title is required';
                } else if (strlen(trim($value)) < 3 || strlen($value) > 70) {
                    $result['fail'] = 1;
                    $result['message'] = 'Meta Title must be in 3 to 70 characters.';
                }
                break;
            case "meta_description":
                if (strlen(trim($value)) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Meta Description is required';
                } else if (strlen(trim($value)) < 10 || strlen($value) > 180) {
                    $result['fail'] = 1;
                    $result['message'] = 'Meta Description must in 10 to 180 character.';
                }
                break;
            // case "meta_keyword":
            //     if (strlen(trim($value)) == 0) {
            //         $result['fail'] = 1;
            //         $result['message'] = 'Meta Keyword is required';
            //     } else if (strlen(trim($value)) < 2) {
            //         $result['fail'] = 1;
            //         $result['message'] = 'Meta Keyword must be of minimum 2 character.';
            //     }
            //     break;
            default:
                $result;
        }
    } elseif ($type == 'testimonial') {
        switch ($key) {
            case "customer_name":
                if (strlen($value) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Customer Name is required';
                } else if (strlen($value) < 3 || strlen($value) > 30) {
                    $result['fail'] = 1;
                    $result['message'] = 'Customer Name must be in 3 to 30 characters.';
                }
                break;
            case "company":
                if (strlen(trim($value)) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Company is required';
                } else if (strlen(trim($value)) < 5) {
                    $result['fail'] = 1;
                    $result['message'] = 'Company must be of minimum 5 character.';
                }
                break;
            case "key_point":
                if (strlen(trim($value)) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Key Point is required';
                } else if (strlen(trim($value)) < 5) {
                    $result['fail'] = 1;
                    $result['message'] = 'Key Point must be of minimum 5 character.';
                }
                break;
            case "description":
                if (strlen(trim($value)) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Description is required';
                } else if (strlen(trim($value)) < 10) {
                    $result['fail'] = 1;
                    $result['message'] = 'Description must be of minimum 10 character.';
                }
                break;
            default:
                $result;
        }
    } elseif ($type == 'portfolio') {
        switch ($key) {
            case "site_name":
                if (strlen($value) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Site Name is required';
                } else if (strlen($value) < 3) {
                    $result['fail'] = 1;
                    $result['message'] = 'Site Name must be of 3 characters.';
                }
                break;
            case "site_link":
                if (strlen(trim($value)) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'site Link is required';
                }
                break;
            case "technology":
                if (strlen(trim($value)) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Technology used is required';
                }
                break;
            case "category":
                if (strlen(trim($value)) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Category is required';
                }
                break;
            default:
                $result;
        }
    } elseif ($type == 'policy') {
        switch ($key) {
            case "policy_name":
                if (strlen($value) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Policy Name is required';
                } else if (strlen($value) < 3 || strlen($value) > 15) {
                    $result['fail'] = 1;
                    $result['message'] = 'Policy Name must be in 3 to 15 characters.';
                }
                break;
            case "description":
                if (trim($value) == "<p><br></p>") {
                    $result['fail'] = 1;
                    $result['message'] = 'Description is required.';
                }
                break;
            default:
                $result;
        }
    } elseif ($type == 'casestudy') {
        switch ($key) {
            case "site_name":
                if (strlen($value) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Site Name is required';
                } else if (strlen($value) < 3) {
                    $result['fail'] = 1;
                    $result['message'] = 'Site Name can not be less than 3 character';
                }
                break;
            case "site_work":
                if (strlen($value) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Site Work is required';
                } else if (strlen($value) < 5) {
                    $result['fail'] = 1;
                    $result['message'] = 'Site Work can not be less than 5 character';
                }
                break;
            case "description":
                if (trim($value) == "<p><br></p>") {
                    $result['fail'] = 1;
                    $result['message'] = 'Description is required.';
                }
                break;
            case "requirements":
                if (trim($value) == "<p><br></p>") {
                    $result['fail'] = 1;
                    $result['message'] = 'Requirements required.';
                }
                break;
            case "challenges":
                if (trim($value) == "<p><br></p>") {
                    $result['fail'] = 1;
                    $result['message'] = 'Challenges required.';
                }
                break;
            case "solutions":
                if (trim($value) == "<p><br></p>") {
                    $result['fail'] = 1;
                    $result['message'] = 'Solutions required.';
                }
                break;
            case "result":
                if (trim($value) == "<p><br></p>") {
                    $result['fail'] = 1;
                    $result['message'] = 'Result is required.';
                }
                break;
            default:
                $result;
        }
    } elseif ($type == 'faq') {
        switch ($key) {
            case "question":
                if (strlen($value) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Question is required';
                } else if (strlen($value) < 10) {
                    $result['fail'] = 1;
                    $result['message'] = 'Question can not be less than 10 characters.';
                }
                break;
            case "answer":
                if (strlen($value) == 0) {
                    $result['fail'] = 1;
                    $result['message'] = 'Answer is required';
                } else if (strlen($value) < 10) {
                    $result['fail'] = 1;
                    $result['message'] = 'Answer can not be less than 10 characters.';
                }
                break;
            default:
                $result;
        }
    }
    return $result;
}

function reqValidator($type = null, $array = [])
{
    $isError = 0;
    $result = array(
        'fail' => 0,
        'message' => ''
    );
    if ($type == 'contact') {
        foreach ($array as $key => $value) {
            $data = validate($type, $key, $value);
            if ($data['fail']) {
                $result = array(
                    'fail' => 1,
                    'message' => $data['message']
                );
                break;
            }
        }
    } elseif ($type == 'get_in_touch') {
        foreach ($array as $key => $value) {
            $data = validate($type, $key, $value);
            if ($data['fail']) {
                $result = array(
                    'fail' => 1,
                    'message' => $data['message']
                );
                break;
            }
        }
    } elseif ($type == 'user') {
        if (!array_key_exists('username', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Username Required'
            );
        }
        if (!array_key_exists('password', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Password Required'
            );
        }
        if (!$isError) {
            foreach ($array as $key => $value) {
                $data = validate($type, $key, $value);
                if ($data['fail']) {
                    $result = array(
                        'fail' => 1,
                        'message' => $data['message']
                    );
                    break;
                }
            }
        }
    } elseif ($type == 'article') {
        if (!array_key_exists('title', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Title Required'
            );
        }
        if (!array_key_exists('description', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Description Required'
            );
        }
        if (!array_key_exists('meta_title', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Meta Title Required'
            );
        }
        if (!array_key_exists('meta_description', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Meta Description Required'
            );
        }
        if (!array_key_exists('meta_keyword', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Meta Keywords Required'
            );
        }
        if (!$isError) {
            foreach ($array as $key => $value) {
                $data = validate($type, $key, $value);
                if ($data['fail']) {
                    $result = array(
                        'fail' => 1,
                        'message' => $data['message']
                    );
                    break;
                }
            }
        }
    } elseif ($type == 'meta_tag') {

        if (!array_key_exists('meta_title', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Meta Title Required'
            );
        }
        if (!array_key_exists('meta_description', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Meta Description Required'
            );
        }
        // if (!array_key_exists('meta_keyword', $array)) {
        //     $isError = 1;
        //     $result = array(
        //         'fail' => 1,
        //         'message' => 'Meta Keywords Required'
        //     );
        // }
        if (!$isError) {
            foreach ($array as $key => $value) {
                $data = validate($type, $key, $value);
                if ($data['fail']) {
                    $result = array(
                        'fail' => 1,
                        'message' => $data['message']
                    );
                    break;
                }
            }
        }
    } elseif ($type == 'testimonial') {

        if (!array_key_exists('customer_name', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Customer Name Required.'
            );
        }
        if (!array_key_exists('company', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Company Required.'
            );
        }
        if (!array_key_exists('key_point', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Key Point Required.'
            );
        }
        if (!array_key_exists('description', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Description Required.'
            );
        }
        if (!$isError) {
            foreach ($array as $key => $value) {
                $data = validate($type, $key, $value);
                if ($data['fail']) {
                    $result = array(
                        'fail' => 1,
                        'message' => $data['message']
                    );
                    break;
                }
            }
        }
    } elseif ($type == 'portfolio') {

        if (!array_key_exists('site_name', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Site Name Required.'
            );
        }
        if (!array_key_exists('site_link', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Site Link Required.'
            );
        }
        if (!array_key_exists('technology', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Technology used Required.'
            );
        }
        if (!array_key_exists('category', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Category Required.'
            );
        }
        if (!$isError) {
            foreach ($array as $key => $value) {
                $data = validate($type, $key, $value);
                if ($data['fail']) {
                    $result = array(
                        'fail' => 1,
                        'message' => $data['message']
                    );
                    break;
                }
            }
        }
    } elseif ($type == 'policy') {

        if (!array_key_exists('policy_name', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Policy Name Required.'
            );
        }
        if (!array_key_exists('description', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Description Required.'
            );
        }
        if (!$isError) {
            foreach ($array as $key => $value) {
                $data = validate($type, $key, $value);
                if ($data['fail']) {
                    $result = array(
                        'fail' => 1,
                        'message' => $data['message']
                    );
                    break;
                }
            }
        }
    } elseif ($type == 'casestudy') {

        if (!array_key_exists('site_name', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Site Name Required.'
            );
        }
        if (!array_key_exists('site_work', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Site Work Required.'
            );
        }
        if (!array_key_exists('description', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Description Required.'
            );
        }
        if (!array_key_exists('requirements', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Requirements Required.'
            );
        }
        if (!array_key_exists('challenges', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Challenges Required.'
            );
        }
        if (!array_key_exists('solutions', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Solutions Required.'
            );
        }
        if (!array_key_exists('result', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Result Required.'
            );
        }
        if (!$isError) {
            foreach ($array as $key => $value) {
                $data = validate($type, $key, $value);
                if ($data['fail']) {
                    $result = array(
                        'fail' => 1,
                        'message' => $data['message']
                    );
                    break;
                }
            }
        }
    } elseif ($type == 'faq') {

        if (!array_key_exists('question', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Question Required.'
            );
        }
        if (!array_key_exists('answer', $array)) {
            $isError = 1;
            $result = array(
                'fail' => 1,
                'message' => 'Answer Required.'
            );
        }
        if (!$isError) {
            foreach ($array as $key => $value) {
                $data = validate($type, $key, $value);
                if ($data['fail']) {
                    $result = array(
                        'fail' => 1,
                        'message' => $data['message']
                    );
                    break;
                }
            }
        }
    }
    return $result;
}
