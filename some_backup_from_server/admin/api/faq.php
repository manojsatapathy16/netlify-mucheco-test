<?php
session_cache_limiter('private, must-revalidate');

require_once("../config/header.php");
header('Content-type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request_type = $_POST['request_type'];

    if ($request_type == 'faq') {
    
        $data = array(
            [
                'question' => "What services does Mucheco offer?",
                'answer' => "Mucheco offers a range of IT, e-commerce, and digital marketing services, including website design and development, mobile app development, e-commerce solutions, digital marketing solutions and more. Our services are customized to fit each client's unique needs.",
            ],
            [
                'question' => "How long has Mucheco been in business?",
                'answer' => "Mucheco has been in business for 25 years, providing high-quality IT, e-commerce, and digital marketing solutions to clients across various industries.",
            ],
            [
                'question' => "What is the pricing for Mucheco's services?",
                'answer' => "The pricing for Mucheco's services varies depending on the scope of the project and the specific needs of the client. We provide transparent and competitive pricing, and we work closely with each client to develop a customized pricing plan that fits their budget and meets their goals.",
            ],
            [
                'question' => "What industries does Mucheco specialize in?",
                'answer' => "Mucheco has experience working with clients across a wide range of industries, including healthcare, finance, education, retail, and more. We have a team of experts with diverse skill sets that can adapt to the unique needs of any industry.",
            ],
            [
                'question' => "How does Mucheco ensure the security of client data?",
                'answer' => "At Mucheco, we take data security very seriously. We use the latest security protocols and technologies to protect our client's data and ensure that it is only accessible to authorized personnel. We also provide regular security updates and maintenance to keep our client's data safe and secure.",
            ],
            [
                'question' => "What is Mucheco's approach to customer service?",
                'answer' => "At Mucheco, we prioritize our client's needs and goals above all else. We work closely with each client to understand their unique needs and develop customized solutions that meet those needs. We provide transparent communication, regular updates, and ongoing support to ensure that our clients are satisfied with our services.",
            ],
            [
                'question' => "How does Mucheco keep up with the latest trends in technology and marketing?",
                'answer' => "Our team at Mucheco is committed to staying up-to-date on the latest trends and technologies in IT, e-commerce, and digital marketing. We attend industry events, participate in training and certification programs, and stay informed on the latest news and developments to ensure that we are offering our clients the best possible solutions.",
            ],
            [
                'question' => "What is Mucheco's process for developing custom solutions for clients?",
                'answer' => "At Mucheco, we follow a collaborative and iterative process for developing custom solutions for our clients. We work closely with each client to understand their unique needs and develop a detailed project plan. We then provide regular updates and opportunities for feedback throughout the development process to ensure that the final product meets the client's expectations.",
            ],
            [
                'question' => "Can Mucheco provide references or case studies from previous clients?",
                'answer' => "Yes, we can provide references and case studies from previous clients upon request. We are proud of the work we have done for our clients and are happy to share our success stories.",
            ],
            [
                'question' => "Does Mucheco offer ongoing support and maintenance for its solutions?",
                'answer' => "Yes, we offer ongoing support and maintenance for all of our solutions. We understand that technology and marketing solutions require regular updates and maintenance to ensure their effectiveness, and we provide regular updates and maintenance to ensure that our solutions are always up-to-date.",
            ],
            [
                'question' => "How does Mucheco measure the success of its services?",
                'answer' => "At Mucheco, we measure the success of our services based on our client's goals and objectives. We work closely with each client to establish clear goals and metrics for success, and we track our progress regularly to ensure that we are meeting those goals.",
            ],
            [
                'question' => "What is Mucheco's policy on intellectual property rights?",
                'answer' => "We respect our client's intellectual property rights and take steps to ensure that their confidential information and proprietary materials are protected. We have strict policies and procedures in place to ensure that our client's intellectual property is not compromised.",
            ],
            [
                'question' => "How does Mucheco handle changes or updates to a project during the development process?",
                'answer' => "We understand that changes and updates may be necessary during the development process, and we work closely with our clients to accommodate those changes. We provide regular updates and opportunities for feedback throughout the development process to ensure that any necessary changes are made in a timely and efficient manner.",
            ],
            [
                'question' => "What is the typical timeline for a project with Mucheco?",
                'answer' => "The timeline for a project with Mucheco varies depending on the scope of the project and the specific needs of the client. We work closely with each client to establish a realistic timeline and provide regular updates throughout the development process.",
            ],
            [
                'question' => "How does Mucheco handle communication with clients throughout a project?",
                'answer' => "At Mucheco, we believe that clear and transparent communication is essential to the success of any project. We provide regular updates and opportunities for feedback throughout the development process, and we are always available to answer questions and address concerns. We also provide a dedicated project manager to ensure that communication is streamlined and efficient.",
            ],
        );
        

        if (!empty($data)) {
            $responce['status'] = 1;
            $responce['data'] = $data;
        } else {
            $responce['status'] = 0;
            $responce['data'] = array();
        }
    }
} else {
    $responce['status'] = 0;
    $responce['message'] = "method POST required";
}

echo json_encode($responce);