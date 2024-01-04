<?php
session_cache_limiter('private, must-revalidate');

require_once("../config/header.php");
header('Content-type: application/json');
require_once("../config/env.php");
$base_url = $APP_ENV == 'live' ? $APP_URL : $TEST_URL;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request_type = $_POST['request_type'];
    if ($request_type == 'discovery-and-design-service') {

        $readmore = array(
            'title' => "DISCOVERY AND DESIGN SERVICE",
            'heading' => "Unleash the power of your online presence",
            'desc_short' => "Mucheco is your one-stop shop for all things web - from discovery to design. Whether you're an entrepreneur with a brilliant idea, or an established business looking to revamp your online presence, Mucheco's team of experts has got you covered. ...",
            'desc_long' => "Mucheco is your one-stop shop for all things web - from discovery to design. Whether you're an entrepreneur with a brilliant idea, or an established business looking to revamp your online presence, Mucheco's team of experts has got you covered. The journey starts with web discovery, where we dive deep into your business goals, target audience, and competition to gain a comprehensive understanding of what you need from your website. With our keen market research and analysis skills, we ensure that your website stands out from the crowd and appeals to your target audience. When it comes to design, Mucheco's experts wield the latest technologies like a magician's wand, conjuring up websites that are not only visually stunning but also highly functional. From HTML,CSS, JavaScript, React, and Angular for front-end development to PHP, Python, Ruby on Rails, Node.js, Django, and Laravel for back-end development, we use a mix of tools and techniques to create websites that are optimized for all devices. We also use content management systems like WordPress, Drupal, Joomla, Shopify, and Magento to make website management a breeze. Our design tools, such as Adobe Creative Suite, Sketch, and Figma, allow them to bring their creative visions to life, creating websites that are not just beautiful but also easy to navigate. Ready to join hands with Mucheco and take the first step towards building your online empire? Say hello to our team now.",
            'lis' => ["Entire website design", "Custom Template Design", "Server optimisation", "Custom theme design", "UI and UX improvements and overhaul", "Website brand alignment"]
        );
        $liveCount = array(
            ['title' => "Happy Customer", 'count' => '100'],
            ['title' => "Team Members", 'count' => '50'],
            ['title' => "Project Completed", 'count' => '200'],
        );
        $key_features_title = "Key Features of Our Design Solutions";
        $key_features = array(
            ['title' => "Customized Approach", 'description' => "Mucheco offers a customized approach to web discovery and design, taking the time to understand clients' business goals, target audience, and competition to create a tailored solution that meets their specific needs."],
            ['title' => "Expertise and Experience", 'description' => "Our team of experts brings years of experience in web discovery and design, providing clients with high-quality solutions that meet their needs and exceed their expectations."],
            ['title' => "Cutting-Edge Technologies", 'description' => "With access to the latest technologies and design tools, we can create websites that are not only visually appealing but also highly functional, providing a seamless user experience for visitors."],
            ['title' => "Strong Brand Representation", 'description' => "Our focus on design excellence and attention to detail ensures that clients' websites effectively represent their brand and attract their target audience, creating a strong online presence."],
            ['title' => "Comprehensive Service", 'description' => "Our range of services includes web discovery, design, development, and optimization, providing clients with a one-stop solution for their online needs and peace of mind."],
            ['title' => "Dedicated Support", 'description' => "Our commitment to customer satisfaction means that we provide ongoing support and maintenance services, ensuring clients' websites remain up-to-date, secure, and functioning smoothly over the long-term."],
        );
        $why_choose = array(
            'title' => "WHY CHOOSE THIS SERVICE?",
            'heading' => "Creating a Stunning and Effective Web Presence",
            'description' => "We offer comprehensive web design and development services, including discovery and analysis of client needs, creation of customized designs and layouts, and implementation of scalable and efficient web solutions using modern technologies and frameworks.",
            'lis' => ["Customized web design and layout tailored to your brand and audience", "Responsive design to ensure optimal viewing experience across all devices", "Attention to detail and focus on user experience to drive engagement and conversions", "Use of modern and scalable web technologies and frameworks", "Ongoing support and maintenance to keep your website up-to-date and secure", "Proven track record of successful projects and satisfied clients."]
        );
        $process = array(
            ['sl' => '1', 'title' => "Discover", 'description' => "Collaborating with the client to establish the purpose of the new website and the goals it must achieve."],
            ['sl' => '2', 'title' => "Documentation", 'description' => "Creating detailed documentation outlining project requirements, timelines, and milestones."],
            ['sl' => '3', 'title' => "Content Creation", 'description' => "Developing the content for each page, keeping SEO in mind for clear, focused topics."],
            ['sl' => '4', 'title' => "Visual Elements", 'description' => "Refining the visual style and brand, using tools like style tiles, mood boards, and element collages."],
            ['sl' => '5', 'title' => "Testing", 'description' => "Checking the functionality and user experience of the website on various devices and resolving any issues."],
            ['sl' => '6', 'title' => "Deploy", 'description' => "Planning and executing the site launch, including the timing and communication strategy."]
        );
        $service_portfolio = array(
            ['title' => "Mercato Marketplace", 'url' => "https://mercatoplace.com/", "category" => "Web Design And Development", 'image' => $base_url . "assets/images/service/development_support-1.png"],
            ['title' => "Dream Furnishing", 'url' => "https://www.dreamfurnishings.co.uk/", "category" => "Web Design And Development", 'image' => $base_url . "assets/images/service/development_support-2.jpg"],
            ['title' => "Electropolis", 'url' => "https://www.electropolis.es/", "category" => "Web Design And Development", 'image' => $base_url . "assets/images/service/development_support-3.jpg"],
            ['title' => "Desenfunda", 'url' => "https://www.desenfunda.com/", "category" => "Web Design And Development", 'image' => $base_url . "assets/images/service/development_support-4.jpg"],
        );
        $portfolio = 200;
        $filter_key = "All";
        $data = array(
            'readmore' => $readmore,
            'liveCount' => $liveCount,
            'key_features' => $key_features,
            'key_features_title' => $key_features_title,
            'why_choose' => $why_choose,
            'process' => $process,
            'portfolio' => $portfolio,
            'service_portfolio' => $service_portfolio,
            'filter_key' => $filter_key,
        );

        if (!empty($data)) {
            $responce['status'] = 1;
            $responce['data'] = $data;
        } else {
            $responce['status'] = 0;
            $responce['data'] = array();
        }
    } else if ($request_type == 'cloud-transformation-services') {

        $readmore = array(
            'title' => "CLOUD TRANSFORMATION SOLUTIONS",
            'heading' => "Transform your digital landscape with the limitless potential of the cloud",
            'desc_short' => "At Mucheco, we are a leading provider of cutting-edge Cloud transformation services that can help you take your business to new heights of success. Our team of expert professionals works at the intersection of domain expertise, data analysis, and advanced technology to seamlessly move your applications and data platforms to the cloud. ...",
            'desc_long' => "At Mucheco, we are a leading provider of cutting-edge Cloud transformation services that can help you take your business to new heights of success. Our team of expert professionals works at the intersection of domain expertise, data analysis, and advanced technology to seamlessly move your applications and data platforms to the cloud. Through our Cloud transformation services, we leverage the latest advancements in cloud computing, such as Infrastructure-as-a-Service (IaaS), Platform-as-a-Service (PaaS), and Software-as-a-Service (SaaS) to help you maximize the power and scalability of the cloud. We specialize in a wide range of cloud-based technologies, including Amazon Web Services (AWS), Microsoft Azure, Google Cloud, and more. Our team of certified cloud experts has extensive experience in cloud migration, cloud architecture design, cloud security, and cloud optimization. We use advanced analytics and machine learning to analyze your data and provide insights that enable you to make better decisions and gain a competitive edge in your industry. At Mucheco, we understand that every business is unique, which is why we offer tailored cloud transformation solutions to meet your specific needs. Our services include a comprehensive assessment of your current systems, a detailed cloud migration plan, and ongoing support to ensure that your cloud infrastructure is secure, optimized, and performing at its best.",
            'lis' => ['Cloud Migration', 'Native App', 'Cloud Operations', 'Cloud Security', 'Data Engineering and Operations', 'Legacy Modernization']
        );
        $liveCount = array(
            ['title' => "Happy Customer", 'count' => '100'],
            ['title' => "Team Members", 'count' => '50'],
            ['title' => "Project Completed", 'count' => '200'],
        );
        $key_features_title = 'Key Features of Cloud Transformation Solutions';
        $key_features = array(
            ['title' => "Domain, Data, and Technology Expertise", 'description' => "We leverage our investments in development platforms and our capabilities focused on domain expertise, data analytics, and advanced technology to provide you with a seamless cloud transformation experience. Our team is proficient in cloud technologies such as Infrastructure-as-a-Service (IaaS), Platform-as-a-Service (PaaS), and Software-as-a-Service (SaaS) and uses advanced analytics and machine learning to analyze your data and provide actionable insights."],
            ['title' => "Experienced Cloud Practitioners", 'description' => 'We have a team of over 50 certified cloud professionals and 100+ experienced cloud practitioners who are proficient in cloud migration across a wide range of industries, including Life Sciences, Financial Services, and Telecom. Our team of experts has extensive experience in cloud migration, cloud architecture design, cloud security, and cloud optimization.'],
            ['title' => "Cloud Governance", 'description' => 'We offer cloud governance solutions that ensure compliance, cost optimization, and risk management in your cloud environment. Our experts help you establish and enforce cloud policies, monitor your cloud infrastructure, and optimize cloud costs, resulting in improved efficiency and cost savings.'],
            ['title' => "Comprehensive Integrated Capabilities", 'description' => "We provide an end-to-end integrated approach to application and data migration to the cloud, which involves strategy, assessment, migration planning and execution, and post-migration operations. We use cloud-native tools and techniques to ensure a seamless migration experience and a high level of performance."],
            ['title' => "Global Delivery Model", 'description' => "We have a global delivery model that leverages our strong offshore and nearshore capabilities. We provide outstanding talent at attractive cost points, ensuring that you receive the highest quality services at a competitive price."],
            ['title' => "Cloud Automation", 'description' => "Our cloud automation solutions leverage cutting-edge technologies such as Infrastructure-as-Code (IAC) and Configuration Management to automate your cloud operations. We help you to reduce manual efforts, improve scalability, and increase efficiency by automating your cloud infrastructure and operations."],
        );
        $why_choose = array(
            'title' => "WHY CHOOSE THIS SERVICE?",
            'heading' => "Harness the power of the cloud with Mucheco's integrated approach",
            'description' => "We leverage domain, data, and technology to architect, migrate, optimize, and manage cloud infrastructure for optimal performance and scalability. With our integrated approach, certified cloud professionals, global delivery model, and DevOps practices, we deliver a seamless, and secure cloud environment.",
            'lis' => ["Expert cloud practitioners leveraging domain, data, and technology.", "Certified cloud professionals and global delivery model.", "Seamless, secure, and cost-effective cloud environment.", "Integrated approach to cloud migration and management.", "DevOps practices for streamlined operations.", "Customized cloud migration strategy"]
        );
        $process = array(
            ['sl' => '1', 'title' => "Discovery And Assessment", 'description' => "Assessing the client's business and technical requirements and identifying suitable applications and data platforms for cloud migration."],
            ['sl' => '2', 'title' => "Cloud Platform Selection", 'description' => "Identifying the most appropriate cloud platform, deployment model, and cloud service model that aligns with the customer's requirements."],
            ['sl' => '3', 'title' => "Design And Architecture:", 'description' => "Design and architect the cloud environment, including cloud networking, security, storage, and computing."],
            ['sl' => '4', 'title' => "Migration Planning And Execution", 'description' => "Planning and executing the migration of applications and data platforms to the cloud, using cloud-native tools and techniques."],
            ['sl' => '5', 'title' => "Cloud Infrastructure Deployment", 'description' => "Configuring and deploying the cloud infrastructure and services, including databases, analytics, and DevOps tools."],
            ['sl' => '6', 'title' => "Optimization And Management", 'description' => "Monitoring and implementing cloud automation and DevOps practices to the cloud environment to ensure optimal performance, scalability, and cost efficiency."],
        );
        $service_portfolio = array(
            ['title' => "Mercato Marketplace", 'url' => "https://mercatoplace.com/", "category" => "Web Design And Development", 'image' => $base_url . "assets/images/service/development_support-1.png"],
            ['title' => "Dream Furnishing", 'url' => "https://www.dreamfurnishings.co.uk/", "category" => "Web Design And Development", 'image' => $base_url . "assets/images/service/development_support-2.jpg"],
            ['title' => "Electropolis", 'url' => "https://www.electropolis.es/", "category" => "Web Design And Development", 'image' => $base_url . "assets/images/service/development_support-3.jpg"],
            ['title' => "Desenfunda", 'url' => "https://www.desenfunda.com/", "category" => "Web Design And Development", 'image' => $base_url . "assets/images/service/development_support-4.jpg"],
        );
        $portfolio = 200;
        $filter_key = "All";
        $data = array(
            'readmore' => $readmore,
            'liveCount' => $liveCount,
            'key_features' => $key_features,
            'key_features_title' => $key_features_title,
            'why_choose' => $why_choose,
            'process' => $process,
            'portfolio' => $portfolio,
            'service_portfolio' => $service_portfolio,
            'filter_key' => $filter_key
        );


        if (!empty($data)) {
            $responce['status'] = 1;
            $responce['data'] = $data;
        } else {
            $responce['status'] = 0;
            $responce['data'] = array();
        }
    } else if ($request_type == 'code-recovery-and-support') {

        $readmore = array(
            'title' => "CODE RECOVERY & SUPPORT",
            'heading' => "Leave your code worries behind and let us help you lead the tech race",
            'desc_short' => "As a top IT company, we understand the importance of seamless technology for businesses. That's why we offer Code Recovery & Support services to rescue businesses from the sea of technical challenges. From fixing broken code to providing ongoing technical support, we've got your back! ...",
            'desc_long' => "As a top IT company, we understand the importance of seamless technology for businesses. That's why we offer Code Recovery & Support services to rescue businesses from the sea of technical challenges. From fixing broken code to providing ongoing technical support, we've got your back! Our team of expert coders is well-versed in a wide range of programming languages and technologies, including Python, Java, C++, and more. We have the skills and experience to quickly identify and resolve issues, restoring your technology to its full potential. With Code Recovery & Support from our company, you'll enjoy peace of mind knowing that you have a reliable partner to turn to in times of need. Our quick response times and attention to detail ensure that your technology is back up and running smoothly in no time. Ready to say goodbye to code mishaps and hello to tech success with our support Contact us now and let us help you stay ahead of the tech game!",
            'lis' => ["Data recovery from damaged or corrupted storage devices, databases, and file systems.", "Code refactoring to help improve code readability and reduce technical debt.", "Performance Optimization to identify & fix bottlenecks and other issues.", "Malware removal like viruses, Trojan horses, and spyware.", "Error debugging to identify and remove errors in code.", "Backup and disaster recovery to ensure protection from data loss."]
        );
        $liveCount = array(
            ['title' => "Happy Customer", 'count' => '100'],
            ['title' => "Team Members", 'count' => '50'],
            ['title' => "Project Completed", 'count' => '200'],
        );
        $key_features_title = 'Key Features of Our Code Recovery & Support Solutions';
        $key_features = array(
            ['title' => "Time-Saving", 'description' => "With Mucheco's Code Recovery & Support service, you can save precious time by letting us handle the technicalities of code recovery and support. Our experienced team will quickly identify and resolve any issues, leaving you free to focus on your core business activities."],
            ['title' => "Expertise", 'description' => "Our team of experts has years of experience in the field of code recovery and support. They have the technical know-how and skills to quickly resolve even the most complex of issues, ensuring that your code is functioning optimally."],
            ['title' => "Cost-Effective", 'description' => "Taking Code Recovery & Support services from Mucheco is a cost-effective solution compared to hiring an in-house team or outsourcing to multiple providers. Our bundled services are priced competitively to help you maximize your ROI."],
            ['title' => "Better Code Quality", 'description' => "By taking Code Recovery & Support services from us, you can be assured of the quality of your code. Our experts will go through your code with a fine-tooth comb, fixing any bugs and optimizing it for better performance."],
            ['title' => "Quick Turnaround Time", 'description' => "Our team is dedicated to delivering results as quickly as possible, without sacrificing quality. We understand the importance of timely solutions, and strive to meet or exceed your expectations."],
            ['title' => "Proactive Support", 'description' => "Our team is proactive in their approach to Code Recovery & Support services. They will monitor your code and identify any potential issues before they become major problems, keeping your code functioning optimally at all times."],
        );
        $why_choose = array(
            'title' => "WHY CHOOSE THIS SERVICE?",
            'heading' => "Say goodbye to technical woes forever.",
            'description' => "Mucheco offers comprehensive Code Recovery & Support Solutions to our clients, utilizing advanced techniques and tools to retrieve lost or corrupted code, optimize performance, and provide ongoing technical support to ensure seamless operation and maintenance of their software systems.",
            'lis' => ["Advanced technologies like machine learning, artificial intelligence, and DevOps practices", "Our quick turnaround time by using agile methodologies like Scrum.", "Effective updates on progress using collaboration tools like Slack, Asana, and Trello.", "Works with any software platform or programming language.", "Cost-effective solutions using tools like JetBrains, PyCharm, and Visual Studio.", "Ongoing maintenance and support through software like JIRA."]
        );
        $process = array(
            ['sl' => '1', 'title' => "Inquiry From Customer", 'description' => "The customer contacts us with a request for code recovery and support services."],
            ['sl' => '2', 'title' => "Assessment & Quotation", 'description' => "Our team assesses the customer's needs and provides a detailed quotation for the services required."],
            ['sl' => '3', 'title' => "Agreement & Payment", 'description' => "The customer agrees to the quotation and makes payment for the services."],
            ['sl' => '4', 'title' => "Code Recovery & Repair", 'description' => "Our team works to recover and repair the customer's code, ensuring its proper functioning."],
            ['sl' => '5', 'title' => "Testing & Quality Assurance", 'description' => "The repaired code is thoroughly tested and subjected to quality assurance checks."],
            ['sl' => '6', 'title' => "Deployment & Implementation", 'description' => "The repaired code is deployed and implemented in the customer's software system."],
        );
        $service_portfolio = array(
            ['title' => "Mercato Marketplace", 'url' => "https://mercatoplace.com/", "category" => "Web Design And Development", 'image' => $base_url . "assets/images/service/development_support-1.png"],
            ['title' => "Dream Furnishing", 'url' => "https://www.dreamfurnishings.co.uk/", "category" => "Web Design And Development", 'image' => $base_url . "assets/images/service/development_support-2.jpg"],
            ['title' => "Electropolis", 'url' => "https://www.electropolis.es/", "category" => "Web Design And Development", 'image' => $base_url . "assets/images/service/development_support-3.jpg"],
            ['title' => "Desenfunda", 'url' => "https://www.desenfunda.com/", "category" => "Web Design And Development", 'image' => $base_url . "assets/images/service/development_support-4.jpg"],
        );
        $portfolio = 200;
        $filter_key = "All";
        $data = array(
            'readmore' => $readmore,
            'liveCount' => $liveCount,
            'key_features' => $key_features,
            'key_features_title' => $key_features_title,
            'why_choose' => $why_choose,
            'process' => $process,
            'portfolio' => $portfolio,
            'service_portfolio' => $service_portfolio,
            'filter_key' => $filter_key
        );


        if (!empty($data)) {
            $responce['status'] = 1;
            $responce['data'] = $data;
        } else {
            $responce['status'] = 0;
            $responce['data'] = array();
        }
    } else if ($request_type == 'digital-engineering') {

        $readmore = array(
            'title' => "DIGITAL ENGINEERING",
            'heading' => "Agile solutions for a digital-first world with Mucheco's Digital Engineering",
            'desc_short' => "At Mucheco, our Digital Engineering Solutions are designed to enable organizations to adapt and thrive in today's rapidly evolving digital landscape. We leverage the latest technologies, including cloud computing, DevOps, and agile methodologies, to modernize legacy applications and systems and bring them to the cloud. ...",
            'desc_long' => "At Mucheco, our Digital Engineering Solutions are designed to enable organizations to adapt and thrive in today's rapidly evolving digital landscape. We leverage the latest technologies, including cloud computing, DevOps, and agile methodologies, to modernize legacy applications and systems and bring them to the cloud. Our approach to digital engineering is centered around enhancing the customer experience, improving operational efficiency, and driving business growth. We work closely with our clients to understand their unique business requirements and develop customized solutions that meet their needs. Our comprehensive suite of digital engineering services includes legacy modernization, application development and management, data engineering and analytics, and cloud enablement. We also provide expert consulting and advisory services to help our clients navigate the complex digital landscape and identify the best path forward for their organization. Our expert team of engineers, developers, and consultants work together to deliver innovative, agile solutions that empower businesses to remain competitive and grow in today's digital-first world.",
            'lis' => ["Systems integration", "Web applications and platforms", "Application maintenance", "Cloud-native application development", "Legacy modernization", "Mobile app development", "Data engineering and analytics", "Digital transformation consulting and advisory"]
        );
        $liveCount = array(
            ['title' => "Happy Customer", 'count' => '100'],
            ['title' => "Team Members", 'count' => '50'],
            ['title' => "Project Completed", 'count' => '200'],
        );
        $key_features_title = "Key Features of Our Digital Engineering Solutions";
        $key_features = array(
            ['title' => "Full-stack engineering capabilities", 'description' => "Our experienced team includes solution architects, front-end and back-end developers, DevOps engineers, scrum masters, technical leads, quality engineers, and business analysts, who have expertise in a wide range of technologies, including cloud computing, microservices, and big data."],
            ['title' => "Agile processes and modern tech stack experience", 'description' => "Our agile methodologies and DevOps capabilities leverage the latest technologies and tools, such as Docker, Kubernetes, and Jenkins, to deliver high-quality software solutions quickly and efficiently. We can help you implement and scale modern tech stacks for data applications, enabling you to stay ahead of the competition."],
            ['title' => "Accelerated innovation", 'description' => "Our deep experience in cloud transformation, legacy modernization, and platform modernization will help you achieve faster time-to-market and speed up your innovation cycles. We use agile and DevOps practices to accelerate the software development life cycle and reduce the time to value."],
            ['title' => "User-centered approach", 'description' => "We employ a user-centered approach to analyzing your challenges, iterating, testing, and implementing solutions. Our user experience (UX) designers and engineers ensure that the software we develop is intuitive, easy to use, and meets your users' needs."],
            ['title' => "Domain expertise", 'description' => "We have distilled our experience working across various industries, including financial services, telecom, and life sciences, and across myriads of complex projects. We bring a deep understanding of industry-specific challenges and best practices to your projects."],
            ['title' => "Quality assurance", 'description' => "A dedicated quality assurance (QA) team that ensures all software we develop is rigorously tested for functionality, usability, performance, and security. We use automated testing tools, such as Selenium and Appium, to improve the efficiency and accuracy of our testing processes."],
        );
        $why_choose = array(
            'title' => "WHY CHOOSE THIS SERVICE?",
            'heading' => "Transform Your Business with Agile and Scalable Digital Engineering",
            'description' => "Get a full-stack approach to application development with deep experience in cloud transformation, using agile methodologies and DevOps capabilities to provide nimble, user-centered solutions that are tailored to meet the needs of complex projects.",
            'lis' => ["Full-stack engineering capabilities", "Accelerated innovation with cloud transformation", "Scalability with microservices and cloud-based solutions.", "Agile processes and DevOps capabilities", "Quality engineering and business analysis", "Legacy modernization"]
        );
        $process = array(
            ['sl' => '1', 'title' => "Discovery", 'description' => "Conducting a detailed analysis of your existing infrastructure, including an assessment of your hardware and software systems, to determine the scope of the project."],
            ['sl' => '2', 'title' => "Planning", 'description' => "Developing a project plan that outlines the software and hardware requirements, scope, timeline, and budget."],
            ['sl' => '3', 'title' => "Design", 'description' => "Designing the architecture of your application, including the database schema, system integration, and user interface."],
            ['sl' => '4', 'title' => "Development", 'description' => "Developing the application using agile methodologies and DevOps practices, ensuring high-quality code, maintainability, and scalability."],
            ['sl' => '5', 'title' => "Testing", 'description' => "Thorough testing of the application to ensure that it functions as intended, is user-friendly, and meets performance expectations."],
            ['sl' => '6', 'title' => "Deployment", 'description' => "Deploying the application to your infrastructure, on-premises or on a cloud-based solution, ensuring seamless integration with your existing systems."],
        );
        $service_portfolio = array(
            ['title' => "Mercato Marketplace", 'url' => "https://mercatoplace.com/", "category" => "Web Design And Development", 'image' => $base_url . "assets/images/service/development_support-1.png"],
            ['title' => "Dream Furnishing", 'url' => "https://www.dreamfurnishings.co.uk/", "category" => "Web Design And Development", 'image' => $base_url . "assets/images/service/development_support-2.jpg"],
            ['title' => "Electropolis", 'url' => "https://www.electropolis.es/", "category" => "Web Design And Development", 'image' => $base_url . "assets/images/service/development_support-3.jpg"],
            ['title' => "Desenfunda", 'url' => "https://www.desenfunda.com/", "category" => "Web Design And Development", 'image' => $base_url . "assets/images/service/development_support-4.jpg"],
        );
        $portfolio = 200;
        $filter_key = "All";
        $data = array(
            'readmore' => $readmore,
            'liveCount' => $liveCount,
            'key_features' => $key_features,
            'key_features_title' => $key_features_title,
            'why_choose' => $why_choose,
            'process' => $process,
            'portfolio' => $portfolio,
            'service_portfolio' => $service_portfolio,
            'filter_key' => $filter_key
        );


        if (!empty($data)) {
            $responce['status'] = 1;
            $responce['data'] = $data;
        } else {
            $responce['status'] = 0;
            $responce['data'] = array();
        }
    } else if ($request_type == 'search-engine-optimization') {

        $readmore = array(
            'title' => "SEARCH ENGINE OPTIMIZATION",
            'heading' => "Maximize Traffic and Boost Revenue with Mucheco's SEO Mastery",
            'desc_short' => "If you're looking for significant business growth, search engine optimization (SEO) is the answer. SEO is a digital marketing technique that helps your website rank higher in relevant search results on search engines like Google, attracting more qualified traffic. It encompasses various methods, from incorporating keywords on your pages to building links to your site. ...",
            'desc_long' => "If you're looking for significant business growth, search engine optimization (SEO) is the answer. SEO is a digital marketing technique that helps your website rank higher in relevant search results on search engines like Google, attracting more qualified traffic. It encompasses various methods, from incorporating keywords on your pages to building links to your site. At Mucheco, we reign supreme in the realm of SEO services. Our impressive track record is a testament to our expertise. Our all-in-one SEO solution at Mucheco covers on-page, off-page, and technical SEO, making it easy for your target audience to find you online. With an experience of generating millions in revenue over the last decade for clients and an award-winning team of SEO experts, our SEO services are a sure way to enhance your website's search engine rankings and boost revenue. <span class='italian_text'>So, are you ready to tap into the potential of organic search? Contact us today to speak with one of our experienced SEO strategists.</span>",
            'lis' => ["Keyword Research and Analysis", "Off-Page Optimization", "High-quality Link Building and Outreach", "On-Page Optimization", "Content Creation and Marketing", "Regular Reporting and Analytics"]
        );
        $liveCount = array(
            ['title' => "Happy Customer", 'count' => '100'],
            ['title' => "Team Members", 'count' => '50'],
            ['title' => "Project Completed", 'count' => '200'],
        );
        $key_features_title = "Key Features of Our Search Engine Optimization Solutions";
        $key_features = array(
            ['title' => "Increased Traffic", 'description' => "By optimizing your website for search engines, you can attract more relevant and high-quality traffic to your site, leading to increased engagement and conversions."],
            ['title' => "Improved User Experience", 'description' => "Mucheco's SEO team will work to make sure that your website is user-friendly and easy to navigate, which will improve the overall experience for your visitors."],
            ['title' => "Higher Search Engine Rankings", 'description' => "With our expertise in SEO, we can help you achieve higher search engine rankings, making it easier for potential customers to find you online."],
            ['title' => "Increased Brand Visibility", 'description' => "As your website ranks higher in search results, your brand will become more visible to a wider audience, leading to increased brand recognition and awareness."],
            ['title' => "Competitive Advantage", 'description' => "By optimizing your website for search engines, you can gain a competitive advantage over other businesses in your industry, allowing you to stand out and attract more customers."],
            ['title' => "Better Return on Investment", 'description' => "SEO can be a cost-effective way to drive traffic and generate leads, making it a smart investment for your business."],
        );
        $why_choose = array(
            'title' => "WHY CHOOSE THIS SERVICE?",
            'heading' => "Conquer the search engine landscape with Mucheco",
            'description' => "Mucheco offers advanced Search Engine Optimization solutions, using cutting-edge techniques such as keyword analysis, link building, on-page optimization, and content marketing, to improve website visibility and drive organic traffic.",
            'lis' => ["Boost website visibility and organic traffic.", "Optimizing website content and structure", "Tailored to the unique needs of each client", "Improve search engine rankings", "Drive engagement and conversions", "Detailed performance metrics and regular reporting."]
        );
        $process = array(
            ['sl' => '1', 'title' => "Keyword Research", 'description' => "Identifying the target keywords that align with your business goals and user intent."],
            ['sl' => '2', 'title' => "Website Analysis", 'description' => "Conducting an in-depth analysis of your website, including technical SEO factors and content quality."],
            ['sl' => '3', 'title' => "On-Page Optimization", 'description' => "Optimizing your website's content and structure, such as title tags, meta descriptions, header tags, and more."],
            ['sl' => '4', 'title' => "Off-Page Optimization", 'description' => "Building high-quality backlinks from reputable websites to improve your website's authority and search engine rankings."],
            ['sl' => '5', 'title' => "Content Creation & Marketing", 'description' => "Developing and promoting high-quality, relevant, and valuable content to engage your target audience and drive traffic to your website."],
            ['sl' => '6', 'title' => "Reporting & Analytics", 'description' => "Tracking and analyzing your website's performance regularly, including search engine rankings, traffic, and conversions."],
        );
        $service_portfolio = array(
            ['title' => "Uk Pallet Commercial Deliveries Ltd", 'url' => "https://www.ukpalletcommercialdeliveries.com/", "category" => "Digital Marketing", 'image' => $base_url . "assets/images/service/digital_marketing-1.jpg"],
            ['title' => "Ifieldknives", 'url' => "https://ifieldknives.com/", "category" => "Digital Marketing", 'image' => $base_url . "assets/images/service/digital_marketing-2.jpg"],
            ['title' => "Electropolis", 'url' => "https://www.electropolis.es/", "category" => "Digital Marketing", 'image' => $base_url . "assets/images/service/digital_marketing-3.jpg"],
            ['title' => "The Envelope Supplier", 'url' => "https://www.theenvelopesupplier.com/", "category" => "Digital Marketing", 'image' => $base_url . "assets/images/service/digital_marketing-4.jpg"],
        );
        $portfolio = 200;
        $filter_key = "Digital Marketing";
        $data = array(
            'readmore' => $readmore,
            'liveCount' => $liveCount,
            'key_features' => $key_features,
            'key_features_title' => $key_features_title,
            'why_choose' => $why_choose,
            'process' => $process,
            'portfolio' => $portfolio,
            'service_portfolio' => $service_portfolio,
            'filter_key' => $filter_key
        );


        if (!empty($data)) {
            $responce['status'] = 1;
            $responce['data'] = $data;
        } else {
            $responce['status'] = 0;
            $responce['data'] = array();
        }
    } else if ($request_type == 'social-media-optimization') {

        $readmore = array(
            'title' => "SOCIAL MEDIA OPTIMIZATION",
            'heading' => "Skyrocket Your ROI with our power pact SMO solutions",
            'desc_short' => "Did you know that 75% of people rely on social media when making a purchase? It's a crucial touchpoint for both B2C and B2B industries, and smart companies invest in professional social media services. ...",
            'desc_long' => "Did you know that 75% of people rely on social media when making a purchase? It's a crucial touchpoint for both B2C and B2B industries, and smart companies invest in professional social media services. Unleash the full potential of Facebook, Instagram, and LinkedIn with Mucheco's social media optimization services. With a client recommendation score much higher than the industry average and unmatched revenue growth, Mucheco is the go-to choice for social media optimization services. Partner with us to skyrocket your brand awareness, customer loyalty, and revenue! <span class='italian_text'>Ready to see results? Contact us now for a chat with one of our expert strategists.</span>",
            'lis' => ["Social Media Profile Creation and Management", "Social Media Advertising", "Social Listening and Reputation Management", "Content Creation and Curation", "Influencer Marketing", "Analytics and Reporting"]
        );
        $liveCount = array(
            ['title' => "Happy Customer", 'count' => '100'],
            ['title' => "Team Members", 'count' => '50'],
            ['title' => "Project Completed", 'count' => '200'],
        );
        $key_features_title = "Key Features of Social Media Optimization Solutions";
        $key_features = array(
            ['title' => "Increased Brand Awareness", 'description' => "By creating and managing a strong online presence on social media, businesses can increase brand recognition and reach a wider audience."],
            ['title' => "Improved Customer Engagement", 'description' => "Social media optimization services help businesses engage with customers in a more personal and meaningful way, fostering brand loyalty and positive brand associations."],
            ['title' => "Increased Traffic and Sales", 'description' => "By promoting products and services on social media and running targeted advertisements, businesses can drive traffic to their website and increase sales."],
            ['title' => "Cost-Effective Marketing", 'description' => "Social media optimization services offer an affordable and effective way for businesses to reach their target audience and achieve their marketing goals without breaking the bank."],
            ['title' => "Better Insights and Analytics", 'description' => "Through social media analytics and reporting, businesses can gain valuable insights into their social media performance and adjust their strategies accordingly to achieve better results."],
            ['title' => "Better Online Reputation Management", 'description' => "By monitoring social media for mentions of the brand and responding to customer queries and feedback, businesses can maintain a positive online reputation and address any negative comments or reviews."],
        );
        $why_choose = array(
            'title' => "WHY CHOOSE THIS SERVICE?",
            'heading' => "Turn followers into fans and fans into loyal customers.",
            'description' => "From crafting compelling content to analyzing audience insights, we use the latest tools and techniques to ensure your brand stands out in the crowded social media landscape and always stay ahead of the competition.",
            'lis' => ["Increased brand awareness and recognition", "Drive more website traffic and leads", "Expand your reach to new audiences", "Enhanced customer engagement and satisfaction", "Build a loyal fan base and community", "Valuable insights for future marketing strategies"]
        );
        $process = array(
            ['sl' => '1', 'title' => "Discovery And Analysis", 'description' => "Conducting a thorough analysis of the client's business goals, target audience, and current social media presence."],
            ['sl' => '2', 'title' => "Content Creation And Scheduling", 'description' => "Create visually appealing and high-quality content, such as images, and videos, and schedule them for optimal reach and engagement."],
            ['sl' => '3', 'title' => "Social Media Advertising", 'description' => "Planning and executing targeted advertisements on social media platforms to increase brand visibility and reach."],
            ['sl' => '4', 'title' => "Influencer Marketing", 'description' => "Partnering with influencers to promote the client's brand and reach a wider audience on social media."],
            ['sl' => '5', 'title' => "Social Media Analytics And Reporting", 'description' => "Tracking and analyzing social media performance metrics, such as engagement, reach, and conversion rates, to measure the effectiveness of social media efforts and provide insights for future campaigns."],
            ['sl' => '6', 'title' => "Continual Improvement", 'description' => "Reviewing and analyzing social media performance regularly and adjusting strategies as needed to continuously improve results."],
        );
        $service_portfolio = array(
            ['title' => "Uk Pallet Commercial Deliveries Ltd", 'url' => "https://www.ukpalletcommercialdeliveries.com/", "category" => "Digital Marketing", 'image' => $base_url . "assets/images/service/digital_marketing-1.jpg"],
            ['title' => "Ifieldknives", 'url' => "https://ifieldknives.com/", "category" => "Digital Marketing", 'image' => $base_url . "assets/images/service/digital_marketing-2.jpg"],
            ['title' => "Electropolis", 'url' => "https://www.electropolis.es/", "category" => "Digital Marketing", 'image' => $base_url . "assets/images/service/digital_marketing-3.jpg"],
            ['title' => "The Envelope Supplier", 'url' => "https://www.theenvelopesupplier.com/", "category" => "Digital Marketing", 'image' => $base_url . "assets/images/service/digital_marketing-4.jpg"],
        );
        $portfolio = 200;
        $filter_key = "Digital Marketing";
        $data = array(
            'readmore' => $readmore,
            'liveCount' => $liveCount,
            'key_features' => $key_features,
            'key_features_title' => $key_features_title,
            'why_choose' => $why_choose,
            'process' => $process,
            'portfolio' => $portfolio,
            'service_portfolio' => $service_portfolio,
            'filter_key' => $filter_key
        );


        if (!empty($data)) {
            $responce['status'] = 1;
            $responce['data'] = $data;
        } else {
            $responce['status'] = 0;
            $responce['data'] = array();
        }
    } else if ($request_type == 'app-store-optimization') {

        $readmore = array(
            'title' => "APP STORE OPTIMIZATION (ASO)",
            'heading' => "Unlock the Power of Customized App Store Optimization (ASO) Services with Mucheco!",
            'desc_short' => "Are you tired of your app being lost in the sea of millions in the app store? It's time to stand out and reach your target audience with Mucheco's expert ASO services! Our 360-degree approach to app store optimization will take your app to new heights and guarantee success. ...",
            'desc_long' => "Are you tired of your app being lost in the sea of millions in the app store? It's time to stand out and reach your target audience with Mucheco's expert ASO services! Our 360-degree approach to app store optimization will take your app to new heights and guarantee success. Skyrocket your views and downloads with Mucheco's targeted approach to keywords and advanced tools for monitoring search rankings and competitors. Our team of experts will analyze every aspect of your app to ensure maximum optimization, from the size and title to downloads, ratings, and reviews. We even cover category analysis, iOS compliance, and more! <span class='italian_text'>Ready to revolutionize the app store and drive downloads like never before? Contact us now for a chat with one of our ASO strategists.</span>",
            'lis' => ["Stunning App Icon Design", "Keyword Tracking and Optimization", "Powerful Marketing Strategies", "Clear and Compelling App Description", "Driving Maximum Downloads", "Maximizing User Engagement"]
        );
        $liveCount = array(
            ['title' => "Happy Customer", 'count' => '100'],
            ['title' => "Team Members", 'count' => '50'],
            ['title' => "Project Completed", 'count' => '200'],
        );
        $key_features_title = "Key Features of Our App Store Optimization (ASO) Solutions";
        $key_features = array(
            ['title' => "Improved App Search Engine Rankings", 'description' => "We will help optimize your app's keywords, titles, and descriptions, resulting in improved search engine rankings and making it easier for users to find your app."],
            ['title' => "Increased Visibility", 'description' => "We will optimize your app's visibility on the app store, making it easier for users to find your app and increasing the chances of downloads."],
            ['title' => "Targeted Marketing", 'description' => "We will target the right audience for your app, ensuring that your app is marketed to those who are most likely to download and use it."],
            ['title' => "Data-Driven Strategies", 'description' => "We will use data and analytics to develop and execute ASO strategies that are tailored to your specific needs and goals. This data-driven approach ensures that your app is optimized for maximum visibility and downloads."],
            ['title' => "Increased Downloads", 'description' => "By optimizing your app's visibility and making it easier to find, we will increase the number of downloads of your App. This will result in increased user engagement and success."],
            ['title' => "Continuous Improvement", 'description' => "We will continually track and measure the results of your ASO campaigns, providing you with detailed reports and insights. This allows you to make data-driven decisions and continuously improve your ASO strategy for better results."],
        );
        $why_choose = array(
            'title' => "WHY CHOOSE THIS SERVICE?",
            'heading' => "Unleash the power of ASO and watch your App soar",
            'description' => "We craft an optimized metadata strategy that'll boost your visibility, conversion rate, and retention, making sure your app will skyrocket in the app store rankings, attracting a flood of organic downloads and engaged users.",
            'lis' => ["Increased app visibility, downloads, and user retention", "Eye catching visual elements.", "Industry best practices and algorithm updates", "Highly data-driven metadata strategy", "A dedicated team of ASO experts", "Ongoing performance monitoring and reporting"]
        );
        $process = array(
            ['sl' => '1', 'title' => "Keyword Research", 'description' => "Conducting extensive research to identify the keywords relevant to your app and the app's target audience."],
            ['sl' => '2', 'title' => "App Title And Description Optimization", 'description' => "Optimizing your app's title and description to include relevant keywords and provide a clear, concise overview of the app's functionality."],
            ['sl' => '3', 'title' => "App Icon And Screenshots", 'description' => "Creating an eye-catching app icon and screenshots that accurately reflect the app's functionality and visually appealing to the target audience."],
            ['sl' => '4', 'title' => "Monitor Keyword Rankings", 'description' => "Monitoring your app's keyword rankings regularly to track the effectiveness of our ASO strategy and identify areas for improvement."],
            ['sl' => '5', 'title' => "User Ratings And Reviews", 'description' => "Encouraging users to rate and review your app, and respond to both positive and negative feedback."],
            ['sl' => '6', 'title' => "Marketing", 'description' => "Leveraging marketing channels such as social media, paid advertising, and influencer marketing to drive traffic and downloads to your app."],
        );
        $service_portfolio = array(
            ['title' => "Uk Pallet Commercial Deliveries Ltd", 'url' => "https://www.ukpalletcommercialdeliveries.com/", "category" => "Digital Marketing", 'image' => $base_url . "assets/images/service/digital_marketing-1.jpg"],
            ['title' => "Ifieldknives", 'url' => "https://ifieldknives.com/", "category" => "Digital Marketing", 'image' => $base_url . "assets/images/service/digital_marketing-2.jpg"],
            ['title' => "Electropolis", 'url' => "https://www.electropolis.es/", "category" => "Digital Marketing", 'image' => $base_url . "assets/images/service/digital_marketing-3.jpg"],
            ['title' => "The Envelope Supplier", 'url' => "https://www.theenvelopesupplier.com/", "category" => "Digital Marketing", 'image' => $base_url . "assets/images/service/digital_marketing-4.jpg"],
        );
        $portfolio = 200;
        $filter_key = "Digital Marketing";
        $data = array(
            'readmore' => $readmore,
            'liveCount' => $liveCount,
            'key_features' => $key_features,
            'key_features_title' => $key_features_title,
            'why_choose' => $why_choose,
            'process' => $process,
            'portfolio' => $portfolio,
            'service_portfolio' => $service_portfolio,
            'filter_key' => $filter_key
        );


        if (!empty($data)) {
            $responce['status'] = 1;
            $responce['data'] = $data;
        } else {
            $responce['status'] = 0;
            $responce['data'] = array();
        }
    } else if ($request_type == 'pay-per-click') {

        $readmore = array(
            'title' => "PPC MANAGEMENT SOLUTIONS",
            'heading' => "Boost Your Sales Sky-High with Mucheco's PPC Management Solutions",
            'desc_short' => "Pay-per-click (PPC) advertising is an effective way to reach your target audience and outperform competitors. Mucheco, a leading PPC management company, leverages paid search to drive sales for your business. ...",
            'desc_long' => "Pay-per-click (PPC) advertising is an effective way to reach your target audience and outperform competitors. Mucheco, a leading PPC management company, leverages paid search to drive sales for your business. Our tech-driven PPC services will help you achieve your goals, be it increasing leads, website traffic, or both, and accurately measure your ROI. Let us help you increase conversions and revenue with our tailored PPC campaign. <span class='italian_text'>Ready to take advantage of paid advertising? Contact us now to speak with a knowledgeable strategist from our PPC team and boost your revenue with PPC ads.</span>",
            'lis' => ["Keyword Research and Analysis", "Landing Page Optimization", "Performance Tracking and Reporting", "Ad Creation and Optimization", "Campaign Structure and Management", "Bid Management and Budget Optimization"]
        );
        $liveCount = array(
            ['title' => "Happy Customer", 'count' => '100'],
            ['title' => "Team Members", 'count' => '50'],
            ['title' => "Project Completed", 'count' => '200'],
        );
        $key_features_title = "Key Features of Our PPC Management Solutions";
        $key_features = array(
            ['title' => "Increased ROI", 'description' => "Our PPC management services are designed to maximize your return on investment by targeting the right audience with the right message at the right time."],
            ['title' => "Targeted Advertising", 'description' => "Our experts will conduct thorough research and analysis to determine the most relevant and profitable keywords for your business, allowing us to target your ideal audience with precision."],
            ['title' => "Expert Campaign Management", 'description' => "Our team of experienced PPC specialists will set up and manage your campaigns, ensuring they are structured for optimal results. We will continually monitor and adjust campaigns as needed to achieve your goals."],
            ['title' => "Comprehensive Tracking and Reporting", 'description' => "We will use advanced tracking and reporting tools to measure the performance of your campaigns and provide you with regular reports and insights. This will allow you to see the results of your PPC investment in real time."],
            ['title' => "Time and Cost Savings", 'description' => "Outsourcing your PPC management to us will save you time and money. Our team of experts will handle all aspects of your campaign, freeing up your time to focus on other aspects of your business. Additionally, our expertise in PPC management means we can achieve better results for less, saving you money in the long run."],
            ['title' => "Increased Conversion Rates", 'description' => "Our PPC management services are designed to drive more qualified traffic to your website, resulting in increased conversion rates. Our team will optimize your landing pages and campaigns to ensure the right message is being delivered to the right audience, increasing the likelihood of a conversion."],
        );
        $why_choose = array(
            'title' => "WHY CHOOSE THIS SERVICE?",
            'heading' => "Get more clicks and conversions with our PPC expertise.",
            'description' => "We follow a data-driven approach to maximize ROI and drive high-quality traffic. We offer keyword research, ad copy optimization, bidding, and performance monitoring to achieve campaign objectives and improve ad relevance and quality score.",
            'lis' => ["Comprehensive keyword research and analysis.", "Customized bidding strategies", "Integration with Google Analytics and other tracking tools", "A/B testing and ad copy optimization", "Data-driven performance monitoring and reporting", "Ongoing campaign optimization"]
        );
        $process = array(
            ['sl' => '1', 'title' => "Initial Consultation", 'description' => "Gathering information about your business, target audience, and marketing goals to determine the best approach for your PPC campaign."],
            ['sl' => '2', 'title' => "Keyword Research And Analysis", 'description' => "Conducting thorough research to determine the most relevant and profitable keywords for your business."],
            ['sl' => '3', 'title' => "Campaign Set-Up", 'description' => "Setting up and structuring your PPC campaigns including creating ad groups, writing ads, setting bids and budgets, and selecting targeting options."],
            ['sl' => '4', 'title' => "Ad Creation And Optimization", 'description' => "Creating compelling and eye-catching ads that grab the attention of your target audience and continually monitor and optimize your ads to ensure they are performing at their best."],
            ['sl' => '5', 'title' => "Landing Page Optimization", 'description' => "Optimizing your landing pages to ensure they are designed for both user experience and conversions."],
            ['sl' => '6', 'title' => "Campaign Management", 'description' => "Monitoring your campaigns on an ongoing basis, making adjustments as needed to ensure they are meeting your goals and delivering the best results."],
            ['sl' => '7', 'title' => "Performance Tracking And Reporting", 'description' => "Using advanced tracking and reporting tools to measure the performance of your campaigns and provide you with regular reports and insights."],
            ['sl' => '8', 'title' => "Optimization And Refinement", 'description' => "Doing ongoing optimizations and refinements to your campaigns to ensure they are always delivering the best results."],
            ['sl' => '9', 'title' => "Review And Analysis", 'description' => "Reviewing your campaigns regularly to ensure they are meeting your goals and provide recommendations for improvements and continue to refine your campaigns as needed."],
        );
        $service_portfolio = array(
            ['title' => "Uk Pallet Commercial Deliveries Ltd", 'url' => "https://www.ukpalletcommercialdeliveries.com/", "category" => "Digital Marketing", 'image' => $base_url . "assets/images/service/digital_marketing-1.jpg"],
            ['title' => "Ifieldknives", 'url' => "https://ifieldknives.com/", "category" => "Digital Marketing", 'image' => $base_url . "assets/images/service/digital_marketing-2.jpg"],
            ['title' => "Electropolis", 'url' => "https://www.electropolis.es/", "category" => "Digital Marketing", 'image' => $base_url . "assets/images/service/digital_marketing-3.jpg"],
            ['title' => "The Envelope Supplier", 'url' => "https://www.theenvelopesupplier.com/", "category" => "Digital Marketing", 'image' => $base_url . "assets/images/service/digital_marketing-4.jpg"],
        );
        $portfolio = 200;
        $filter_key = "Digital Marketing";
        $data = array(
            'readmore' => $readmore,
            'liveCount' => $liveCount,
            'key_features' => $key_features,
            'key_features_title' => $key_features_title,
            'why_choose' => $why_choose,
            'process' => $process,
            'portfolio' => $portfolio,
            'service_portfolio' => $service_portfolio,
            'filter_key' => $filter_key
        );


        if (!empty($data)) {
            $responce['status'] = 1;
            $responce['data'] = $data;
        } else {
            $responce['status'] = 0;
            $responce['data'] = array();
        }
    } else if ($request_type == 'inventory-management') {

        $readmore = array(
            'title' => "INVENTORY MANAGEMENT",
            'heading' => "Take the hassle out of eCommerce inventory management and choose Mucheco for effortless solutions.",
            'desc_short' => "At Mucheco, we understand the importance of having a seamless inventory management system for eCommerce businesses. That's why we provide top-notch eCommerce Inventory Management services that are designed to help our clients manage their inventory with ease and efficiency. ...",
            'desc_long' => "At Mucheco, we understand the importance of having a seamless inventory management system for eCommerce businesses. That's why we provide top-notch eCommerce Inventory Management services that are designed to help our clients manage their inventory with ease and efficiency. With our cutting-edge technology, our clients can keep a track of their stock levels in real-time, ensuring that they never run out of stock or overstock their products. Our inventory management system integrates with various eCommerce platforms, making it easier for our clients to manage their products, orders, and shipments from one central location. Our team of experts is dedicated to providing tailored solutions to meet the unique needs of each of our clients. Whether it's providing automated inventory replenishment or real-time reporting and analytics, we have got you covered. <span class='italian_text'>Get in touch with us today to experience the difference a reliable inventory management system can make!</span>",
            'lis' => ["Product Data Management", "Inventory Optimization", "Shipping and Logistics Management", "Order Fulfillment", "Warehouse Management", "Return Management"]
        );
        $liveCount = array(
            ['title' => "Happy Customer", 'count' => '100'],
            ['title' => "Team Members", 'count' => '50'],
            ['title' => "Project Completed", 'count' => '200'],
        );
        $key_features_title = "Key Features of Our eCommerce Inventory Management Solutions";
        $key_features = array(
            ['title' => "Improved Accuracy", 'description' => "Our inventory management services will provide real-time, accurate information on product availability, pricing, and inventory levels, helping to ensure that your customers have access to up-to-date information and that orders are fulfilled quickly and accurately. This will help you avoid the frustration and lost sales that can result from incorrect information or unavailable products."],
            ['title' => "Increased Efficiency", 'description' => "Our services will help streamline your inventory management processes, reducing manual labor and errors, and optimizing your inventory levels to minimize costs and maximize efficiency. This will help you save time, money, and resources while improving the overall efficiency of your operations."],
            ['title' => "Better Customer Experience", 'description' => "By providing accurate information and quickly fulfilling orders, our services will help improve the overall customer experience and increase customer satisfaction. This will help you build stronger customer relationships and improve customer loyalty, ultimately driving more sales and growing your business."],
            ['title' => "Reduced Costs", 'description' => "Our inventory management services will help you minimize costs associated with overstocking, stockouts, and inefficient warehouse operations. By optimizing your inventory levels and streamlining your processes, you will be able to save money and increase profitability."],
            ['title' => "Increased Sales", 'description' => "By providing a better customer experience and improving the accuracy and efficiency of your inventory management processes, our services will help increase sales and grow your business. By providing customers with accurate information and fulfilling orders quickly and efficiently, you will be able to win more sales and increase your market share."],
            ['title' => "Scalability", 'description' => "Our services are scalable, so as your business grows, we can adapt and expand our services to meet your changing needs, helping you to continue to grow and succeed. Our services will help you keep pace with growth, ensuring that your inventory management processes can handle the increased volume and complexity that comes with success."],
        );
        $why_choose = array(
            'title' => "WHY CHOOSE THIS SERVICE?",
            'heading' => "Say goodbye to inventory headaches and hello to effortless management.",
            'description' => "Our eCommerce Inventory Management Solutions offer end-to-end visibility and control of your inventory. We integrate with leading eCommerce platforms to offer real-time stock updates, order management, and optimization of your fulfillment processes for enhanced customer satisfaction and cost savings.",
            'lis' => ["Real-time inventory tracking and alerts for accurate stock management.", "Automated inventory replenishment to ensure optimal stock levels and avoid stockouts.", "Customizable workflows and rules to suit your unique needs.", "Seamless integration with leading eCommerce platforms", "Powerful reporting and analytics to make data-driven decisions.", "Expert support and guidance from a highly experienced team."]
        );
        $process = array(
            ['sl' => '1', 'title' => "Product Data Management", 'description' => "Collecting and maintaining accurate information on product details, pricing, and inventory levels."],
            ['sl' => '2', 'title' => "Order Receiving", 'description' => "Receiving orders from customers through various channels, such as an online store, mobile app, or call center."],
            ['sl' => '3', 'title' => "Order Processing", 'description' => "Verifying the availability of products and updating the inventory management system accordingly."],
            ['sl' => '4', 'title' => "Order Fulfillment", 'description' => "Picking the products from the warehouse and preparing them for shipment."],
            ['sl' => '5', 'title' => "Shipping And Logistics Management", 'description' => "Coordinating with shipping carriers and logistics providers to deliver the products to the customers."],
            ['sl' => '6', 'title' => "Order Confirmation And Tracking", 'description' => "Confirming the order and providing tracking information to the customers."],
            ['sl' => '7', 'title' => "Return Management", 'description' => "Receiving and processing returns from customers and updating the inventory management system accordingly."],
            ['sl' => '8', 'title' => "Inventory Optimization", 'description' => "Analyzing data and optimizing inventory levels to minimize costs and maximize efficiency."],
            ['sl' => '9', 'title' => "Warehouse Management", 'description' => "Managing the storage and organization of products in the warehouse and ensuring efficient and effective operations."],
        );
        $service_portfolio = array(
            ['title' => "Burgi Diamonds", 'url' => "https://www.amazon.com/burgi", "category" => "Multichannel Management", 'image' => $base_url . "assets/images/service/amazon-1.jpg"],
            ['title' => "Prosecco Deli Shop", 'url' => "https://www.ebay.co.uk/str/proseccoandwineco", "category" => "Multichannel Management", 'image' => $base_url . "assets/images/service/ebay-2.jpg"],
            ['title' => "Akribos XXIV", 'url' => "https://www.amazon.com/stores/node/2581890011", "category" => "Multichannel Management", 'image' => $base_url . "assets/images/service/amazon-3.jpg"],
            ['title' => "RecoveryUK 4x4", 'url' => "https://www.ebay.co.uk/str/recoveryuk4x4", "category" => "Multichannel Management", 'image' => $base_url . "assets/images/service/ebay-4.jpg"],
        );
        $portfolio = 200;
        $filter_key = "Amazon";
        $data = array(
            'readmore' => $readmore,
            'liveCount' => $liveCount,
            'key_features' => $key_features,
            'key_features_title' => $key_features_title,
            'why_choose' => $why_choose,
            'process' => $process,
            'portfolio' => $portfolio,
            'service_portfolio' => $service_portfolio,
            'filter_key' => $filter_key
        );


        if (!empty($data)) {
            $responce['status'] = 1;
            $responce['data'] = $data;
        } else {
            $responce['status'] = 0;
            $responce['data'] = array();
        }
    } else if ($request_type == 'order-management') {

        $readmore = array(
            'title' => "ECOMMERCE ORDER MANAGEMENT",
            'heading' => "Stop struggling with eCommerce order management and start soaring to success with Mucheco!",
            'desc_short' => "Are you tired of spending countless hours managing orders for your eCommerce business? Let Mucheco take the reins with our cutting-edge eCommerce Order Management service! ...",
            'desc_long' => "Are you tired of spending countless hours managing orders for your eCommerce business? Let Mucheco take the reins with our cutting-edge eCommerce Order Management service! With our integrated system, we streamline your order process and take care of everything from order receipt to shipment tracking, so you can focus on growing your business. And the best part? Our platform updates in real-time, allowing you to quickly adapt to changes in demand and keep your customers happy with timely and accurate fulfillment. Our advanced reporting and analytics give you a bird's eye view of your order history and customer behavior, providing valuable insights to drive your business forward. And if you ever run into any issues, our team of experts is available 24x7 to provide the support you need. Whether you need help with a technical problem or just need a little guidance, we're always here for you. <span class='italian_text'>Contact our experts now and let us take your eCommerce game to the next level with our comprehensive and creative eCommerce Order Management solution.</span>",
            'lis' => ["Comprehensive Order Processing", "Accurate Inventory Management", "24x7 Customer Service", "Secure and Flexible Payment Processing", "Complete Shipping and Fulfillment Solution", "Advanced Reporting and Analytics"]
        );
        $liveCount = array(
            ['title' => "Happy Customer", 'count' => '100'],
            ['title' => "Team Members", 'count' => '50'],
            ['title' => "Project Completed", 'count' => '200'],
        );
        $key_features_title = "Key Features of Our eCommerce Order Management Solutions";
        $key_features = array(
            ['title' => "Streamlined Processes", 'description' => "Our eCommerce Order Management services streamline your business processes, helping you save time and increase efficiency. Our system integrates with your eCommerce platform and automates many of the manual tasks associated with order management."],
            ['title' => "Increased Customer Satisfaction", 'description' => "By providing accurate and timely order fulfillment, tracking information, and excellent customer service, Mucheco helps you increase customer satisfaction and build brand loyalty."],
            ['title' => "Improved Inventory Management", 'description' => "Our real-time inventory tracking and automated fulfillment processes help you keep your inventory levels accurate and up-to-date, reducing the risk of stockouts and overstocking."],
            ['title' => "Enhanced Payment Processing", 'description' => "Our payment processing service provides a secure and flexible solution for processing payments and reconciling transactions. Our integration with multiple payment providers helps you choose the right payment solution for your business."],
            ['title' => "Robust Data and Analytics", 'description' => "Our advanced reporting and analytics capabilities provide valuable insights into your business operations, helping you make informed decisions and drive growth."],
            ['title' => "24x7 Customer Support", 'description' => "At Mucheco, we understand the importance of providing excellent customer service, and that's why we offer a comprehensive customer support solution. Our team of experts is available 24x7 to help you with any questions or issues that may arise."],
        );
        $why_choose = array(
            'title' => "WHY CHOOSE THIS SERVICE?",
            'heading' => "Streamline your eCommerce order processing and take your business to the next level.",
            'description' => "Get a comprehensive platform for managing all aspects of order processing, including order capture, payment processing, and fulfillment management. We integrate with leading eCommerce platforms to provide a seamless end-to-end solution.",
            'lis' => ["1. End-to-end order management.", "2. Seamless integration with leading eCommerce platforms", "3. Advanced order tracking and real-time status updates", "4. Customizable workflows and automation", "5. Multi-channel order management to centralize all your orders", "6. Intuitive user interface and dashboard"]
        );
        $process = array(
            ['sl' => '1', 'title' => "Order Integration", 'description' => "Order details are transferred to Mucheco's order management system"],
            ['sl' => '2', 'title' => "Inventory Control", 'description' => "Inventory levels are checked and updated to maintain accuracy."],
            ['sl' => '3', 'title' => "Payment Authorization", 'description' => "Payment is processed and confirmed"],
            ['sl' => '4', 'title' => "Order Execution", 'description' => "The order is order is picked, packed, and shipped"],
            ['sl' => '5', 'title' => "Shipment Tracking", 'description' => "Shipping information is updated in the order management system"],
            ['sl' => '6', 'title' => "Order Closure", 'description' => "The order is marked as complete in our order management system."]
        );
        $service_portfolio = array(
            ['title' => "Burgi Diamonds", 'url' => "https://www.amazon.com/burgi", "category" => "Multichannel Management", 'image' => $base_url . "assets/images/service/amazon-1.jpg"],
            ['title' => "Prosecco Deli Shop", 'url' => "https://www.ebay.co.uk/str/proseccoandwineco", "category" => "Multichannel Management", 'image' => $base_url . "assets/images/service/ebay-2.jpg"],
            ['title' => "Akribos XXIV", 'url' => "https://www.amazon.com/stores/node/2581890011", "category" => "Multichannel Management", 'image' => $base_url . "assets/images/service/amazon-3.jpg"],
            ['title' => "RecoveryUK 4x4", 'url' => "https://www.ebay.co.uk/str/recoveryuk4x4", "category" => "Multichannel Management", 'image' => $base_url . "assets/images/service/ebay-4.jpg"],
        );
        $portfolio = 200;
        $filter_key = "Amazon";
        $data = array(
            'readmore' => $readmore,
            'liveCount' => $liveCount,
            'key_features' => $key_features,
            'key_features_title' => $key_features_title,
            'why_choose' => $why_choose,
            'process' => $process,
            'portfolio' => $portfolio,
            'service_portfolio' => $service_portfolio,
            'filter_key' => $filter_key
        );


        if (!empty($data)) {
            $responce['status'] = 1;
            $responce['data'] = $data;
        } else {
            $responce['status'] = 0;
            $responce['data'] = array();
        }
    } else if ($request_type == 'amazon-store-design-and-optimization') {

        $readmore = array(
            'title' => "AMAZON STORE DESIGN AND OPTIMIZATION",
            'heading' => "Build an Amazon store store that not only looks stunning, but also entices visitors to stay and explore.",
            'desc_short' => "At Mucheco, we believe that a well-designed and optimized Amazon store is the key to success in today's competitive online marketplace. That's why we offer our clients the ultimate Amazon Store Design and Optimization experience, crafted to perfection by our team of experts. ...",
            'desc_long' => "At Mucheco, we believe that a well-designed and optimized Amazon store is the key to success in today's competitive online marketplace. That's why we offer our clients the ultimate Amazon Store Design and Optimization experience, crafted to perfection by our team of experts. Our talented designers will work with you to bring your brand to life, creating a visually appealing store that accurately reflects who you are and what you stand for. With intuitive navigation and easy-to-find products, customers will have a seamless shopping experience. But design is just the beginning. Our optimization specialists will take your store to the next level, increasing its visibility and ranking in search results. With thorough keyword research and proven optimization techniques, we'll help you reach a wider audience and make more sales. Whether you're starting from scratch or revamping your existing store, our team will work closely with you to understand your unique needs and goals, tailoring our approach to meet your specific requirements. <span class='italian_text'>Ready to make a lasting impression on your customers and take your business to new heights? Get in touch with us today to start your Amazon Store Design and Optimization journey!</span>",
            'lis' => ["Visually Appealing Store Design and Branding", "Product Listing Optimization", "Conversion Rate Optimization", "Navigation Optimization to the shopping experience seamless.", "Keyword Research and Optimization", "Regular Reporting and Analytics"]
        );
        $liveCount = array(
            ['title' => "Happy Customer", 'count' => '100'],
            ['title' => "Team Members", 'count' => '50'],
            ['title' => "Project Completed", 'count' => '200'],
        );
        $key_features_title = "Key Features of Our Amazon Store Design and Optimization Solutions";
        $key_features = array(
            ['title' => "Increased Visibility", 'description' => "We will optimize your store and product listings to increase your visibility and ranking in search results, reaching a wider audience and driving more sales. Our optimization specialists will perform thorough keyword research, implement proven optimization techniques, and ensure that your store and product listings are optimized for search engines. This will help you reach your target customers and increase your visibility on Amazon."],
            ['title' => "Enhanced Brand Identity", 'description' => "Our talented designers will work with you to create a visually appealing store that accurately reflects your brand and entices visitors to stay and explore. Our designers will ensure that your store stands out and makes a lasting impression on your customers, helping you to build your brand and establish a strong online presence."],
            ['title' => "Increased Conversion Rate", 'description' => "Our team will analyze your store's data and implement strategies to increase your conversion rate, turning more visitors into customers and boosting your sales. We will identify areas for improvement, implement proven strategies, and help you turn more visitors into customers, increasing your sales and growing your business."],
            ['title' => "Data-Driven Decisions", 'description' => "We will provide you with regular reports and analytics to help you understand the performance of your store and make data-driven decisions. Our team will help you track your progress, identify trends, and make informed decisions about the future of your store, ensuring that you are always moving in the right direction."],
            ['title' => "Improved User Experience", 'description' => "Our team will optimize your store's navigation, making it easy for customers to find what they're looking for and making the shopping experience seamless. We will help your customers navigate your store with ease and find what they're looking for quickly, improving the overall user experience and reducing bounce rates."],
            ['title' => "Expert Support", 'description' => "Our team of experienced designers and optimization specialists will work closely with you to understand your unique needs and goals, tailoring our approach to meet your specific requirements and helping you achieve success on Amazon. Our team will be with you every step of the way, offering expert support and guidance to help you grow your business and succeed on Amazon."],
        );
        $why_choose = array(
            'title' => "WHY CHOOSE THIS SERVICE?",
            'heading' => "Transform Your Amazon Store into a Sales-Generating Machine",
            'description' => "Mucheco offers comprehensive Amazon store design and optimization services, leveraging cutting-edge techniques such as A/B testing, SEO, and UX design to boost sales, enhance product visibility, and optimize customer engagement.",
            'lis' => ["Custom Amazon store design and optimization", "Tailored strategies to optimize customer engagement.", "Boosted sales potential and increased customer loyalty.", "Enhanced product visibility and increased sales.", "Comprehensive analysis and optimization of product listings.", "High-quality images and engaging product descriptions."]
        );
        $process = array(
            ['sl' => '1', 'title' => "Initial Consultation", 'description' => "Scheduling a consultation with you to understand your business, goals, and needs."],
            ['sl' => '2', 'title' => "Market And Competitor Analysis", 'description' => "Performing a thorough analysis of your target market and competitors, including market trends, customer demographics, and competitor strategies."],
            ['sl' => '3', 'title' => "Design And Optimization", 'description' => "Creating a visually appealing store that accurately reflects your brand, while also optimizing your store and product listings for search engines."],
            ['sl' => '4', 'title' => "Testing And Launch", 'description' => "Testing your store to ensure that it is fully functional and launching your optimized store on Amazon."],
            ['sl' => '5', 'title' => "Ongoing Support", 'description' => "Providing ongoing support and maintenance for your store, ensuring that it remains optimized and up-to-date."],
            ['sl' => '6', 'title' => "Analytics And Reporting", 'description' => "Providing regular reports and analytics to help you understand the performance of your store and make data-driven decisions."]
        );
        $service_portfolio = array(
            ['title' => "Burgi Diamonds", 'url' => "https://www.amazon.com/burgi", "category" => "Amazon Store Design", 'image' => $base_url . "assets/images/service/amazon-1.jpg"],
            ['title' => "Nana Jewels", 'url' => "https://www.amazon.com/nanajewels", "category" => "Amazon Store Design", 'image' => $base_url . "assets/images/service/amazon-2.jpg"],
            ['title' => "Akribos XXIV", 'url' => "https://www.amazon.com/stores/node/2581890011", "category" => "Amazon Store Design", 'image' => $base_url . "assets/images/service/amazon-3.jpg"],
            ['title' => "Joshua & Sons", 'url' => "https://www.amazon.com/stores/page/B66E8F0B-9412-450D-9721-4A7E381F4CD7", "category" => "Amazon Store Design", 'image' => $base_url . "assets/images/service/amazon-4.jpg"],
        );
        $portfolio = 200;
        $filter_key = "Amazon";
        $data = array(
            'readmore' => $readmore,
            'liveCount' => $liveCount,
            'key_features' => $key_features,
            'key_features_title' => $key_features_title,
            'why_choose' => $why_choose,
            'process' => $process,
            'portfolio' => $portfolio,
            'service_portfolio' => $service_portfolio,
            'filter_key' => $filter_key
        );


        if (!empty($data)) {
            $responce['status'] = 1;
            $responce['data'] = $data;
        } else {
            $responce['status'] = 0;
            $responce['data'] = array();
        }
    } else if ($request_type == 'ebay-store-design-and-optimization') {

        $readmore = array(
            'title' => "EBAY STORE DESIGN AND OPTIMIZATION",
            'heading' => "Transform your online store into a sales powerhouse with Mucheco's eBay Store Design and Optimization services",
            'desc_short' => "At Mucheco, we believe that the world of e-commerce is a constantly evolving landscape, and success depends on more than just having a pretty store. That's why we offer the best in eBay Store Design and Optimization services. Our team of experts will work hand-in-hand with you to craft a store that's not just a feast for the eyes but also an effective tool for boosting your sales. ...",
            'desc_long' => "At Mucheco, we believe that the world of e-commerce is a constantly evolving landscape, and success depends on more than just having a pretty store. That's why we offer the best in eBay Store Design and Optimization services. Our team of experts will work hand-in-hand with you to craft a store that's not just a feast for the eyes but also an effective tool for boosting your sales. We'll give your store a fresh, custom look that will reflect the unique personality of your brand and make it stand out from the crowd. And that's just the beginning. Our optimization wizards will then get to work, ensuring that your store is easily discoverable and optimized for maximum conversions. From keyword research to product categorization, no detail will be overlooked in our quest for e-commerce excellence. We are dedicated to helping our clients achieve their e-commerce dreams. Whether you're starting from scratch or revitalizing your existing eBay store, we've got the skills and experience to help you reach your full potential. <span class='italian_text'>So, don't let a lackluster store hold you back any longer. Let Mucheco ignite the spark that will light up the digital marketplace and drive your sales skyward!</span>",
            'lis' => ["Visually appealing custom store design", "Listing description optimization", "Effortless Store Management", "Design Optimization", "Store Marketing and Promotion", "Store Analytics and Reporting"]
        );
        $liveCount = array(
            ['title' => "Happy Customer", 'count' => '100'],
            ['title' => "Team Members", 'count' => '50'],
            ['title' => "Project Completed", 'count' => '200'],
        );
        $key_features_title = "Key Features of Our eBay Store Design and Optimization Solutions";
        $key_features = array(
            ['title' => "Increased Visibility and Traffic", 'description' => "Our eBay store design and optimization services will help you increase the visibility of your store and drive more traffic to your listings. With a professional and optimized store, you'll attract more shoppers and grow your customer base, giving your sales a much-needed boost."],
            ['title' => "Improved User Experience", 'description' => "Our custom store design will improve the user experience for your customers, making it easier for them to find what they're looking for and making them more likely to complete a purchase. From a streamlined navigation to visually appealing product listings, every aspect of your store will be designed with your customers in mind."],
            ['title' => "Boosted Sales", 'description' => "By optimizing your store and listings, our team will help you drive more sales and increase your revenue. With our expertise, you'll see a significant boost in your conversion rates, giving you a competitive edge in the eBay marketplace."],
            ['title' => "Better Brand Representation", 'description' => "Our custom eBay store design will accurately reflect your brand, helping you build a stronger brand image and make a lasting impression on your customers. From custom logos to color schemes that match your brand, we'll ensure your eBay store accurately reflects who you are as a brand."],
            ['title' => "Time and Cost Savings", 'description' => "With our eBay store management services, you'll save time and money by outsourcing the day-to-day tasks involved in running an online store. From managing orders to handling customer inquiries, our team will take care of it all, freeing up your time to focus on growing your business."],
            ['title' => "Data-Driven Insights", 'description' => "Our analytics and reporting services will provide you with valuable insights into the performance of your store, helping you make informed decisions for continued growth and success. With regular analytics and reporting, you'll always know what's working and what needs improvement, enabling you to make the necessary changes to keep growing your business."],
        );
        $why_choose = array(
            'title' => "WHY CHOOSE THIS SERVICE?",
            'heading' => "Transform Your eBay Store into a Sales-Generating Machine",
            'description' => "Mucheco offers top-notch eBay store design and optimization solutions, leveraging advanced techniques such as listing optimization, multi-variation listings, and structured data to enhance product visibility, improve search ranking, and drive sales.",
            'lis' => ["Custom eBay store design and optimization", "Effective eBay storefronts for maximum sales", "High-quality images and engaging product descriptions", "Improved product visibility and search ranking.", "Tailored strategies to optimize customer engagement.", "Continual monitoring and optimization of performance metrics."]
        );
        $process = array(
            ['sl' => '1', 'title' => "Discovery And Consultation", 'description' => " Knowing you and your business, and gather information about your target audience and goals for your eBay store."],
            ['sl' => '2', 'title' => "Store Design And Development", 'description' => "Creating a custom design for your eBay store, taking into account the unique needs and goals of your business."],
            ['sl' => '3', 'title' => "Optimization And Listing Creation", 'description' => "Optimizing your store and product listings to ensure that they are optimized for search engines and provide a seamless shopping experience for your customers."],
            ['sl' => '4', 'title' => "Launch And Ongoing Management", 'description' => "Launching your new eBay store and provide ongoing management services, including order management, customer service, and reporting and analytics."],
            ['sl' => '5', 'title' => "Analytics And Reporting", 'description' => "Providing regular analytics and reporting to help you stay informed about the performance of your store and make data-driven decisions for growth and success."],
            ['sl' => '6', 'title' => "Ongoing Optimization", 'description' => "Continually monitoring your store and make any necessary optimizations, ensuring that you're always one step ahead of the competition."]
        );
        $service_portfolio = array(
            ['title' => "DIY Home & Garden", 'url' => "https://www.ebay.co.uk/str/diyhomegarden", "category" => "eBay Store Design", 'image' => $base_url . "assets/images/service/ebay-1.jpg"],
            ['title' => "Prosecco Deli Shop", 'url' => "https://www.ebay.co.uk/str/proseccoandwineco", "category" => "eBay Store Design", 'image' => $base_url . "assets/images/service/ebay-2.jpg"],
            ['title' => "Mountain Warehouse", 'url' => "https://www.ebay.co.uk/str/mountainwarehouse", "category" => "eBay Store Design", 'image' => $base_url . "assets/images/service/ebay-3.jpg"],
            ['title' => "RecoveryUK 4x4", 'url' => "https://www.ebay.co.uk/str/recoveryuk4x4", "category" => "eBay Store Design", 'image' => $base_url . "assets/images/service/ebay-4.jpg"],
        );
        $portfolio = 200;
        $filter_key = "eBay";
        $data = array(
            'readmore' => $readmore,
            'liveCount' => $liveCount,
            'key_features' => $key_features,
            'key_features_title' => $key_features_title,
            'why_choose' => $why_choose,
            'process' => $process,
            'portfolio' => $portfolio,
            'service_portfolio' => $service_portfolio,
            'filter_key' => $filter_key
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
