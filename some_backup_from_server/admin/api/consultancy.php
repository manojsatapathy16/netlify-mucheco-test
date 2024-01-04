<?php
session_cache_limiter('private, must-revalidate');

require_once("../config/header.php");
header('Content-type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request_type = $_POST['request_type'];

    if ($request_type == 'consultancy') {

        $description = "Guiding Your Path to Success, Mucheco has been your go-to partner for complete IT consulting services, transforming the digital landscape with exceptional solutions,  elevating your business with captivating web design, cutting-edge mobile apps, and expertise in WordPress, Magento, and more. Our talented team specializes in Native Mobile applications, Flutter, and React Native, ensuring immersive user experiences. From HTML to CSS, we create elegant, functional masterpieces. Boost your growth through digital marketing services, including SEO, SMM, and PPC campaigns. We extend our proficiency to marketplace management for Amazon, eBay, and more, opening doors to limitless e-commerce possibilities. Join Mucheco on this seamless digital journey and redefine your success. Let's create something extraordinary together!";
    
        $market_place = array(
            'title' => "Website & Mobile App Design and Development",
            'description' => "At Mucheco, we specialize in crafting exceptional website and mobile app experiences that elevate your business to new heights. With a rich heritage in the IT industry, we have honed our expertise for decades to deliver cutting-edge solutions tailored to your needs. Our talented team of experts leverages the latest technologies to ensure captivating and immersive user experiences. From concept to implementation, we create elegant and functional masterpieces that leave lasting impressions on your audience. So, let's embark on this exciting journey together and create something extraordinary for your business!",
            'lis' => ["Unmatched IT Excellence and Expertise spanning over a decade.","Tailored Solutions Enabling Unprecedented Business Growth.","Proficiency in Cutting-edge Frameworks and Technologies - WordPress, Magento, Native Mobile Applications, Flutter, and React Native.","Streamlined Development Process Ensuring Flawless Website and Mobile App Delivery.","User-Centric Design for Immersive and Engaging Experiences.","Comprehensive Support and Maintenance Services for Uninterrupted Performance."]
        );
        $store_management = array(
            'title' => "Digital Marketing",
            'description' => "At Mucheco, we excel in providing comprehensive digital marketing solutions that propel your business to the forefront of the digital landscape. With our illustrious industry legacy, spanning over two decades, we have honed our expertise to deliver cutting-edge strategies tailored to your specific needs. Our talented team of digital marketing experts harnesses the latest trends and technologies to craft engaging campaigns that drive results. From SEO, SMM, to PPC, we ensure enhanced visibility, higher engagement, and increased conversions for your brand. So, experience the Mucheco difference let's embark on this transformative journey together and create a digital presence that stands out from the crowd!",
            'lis' => ["Tailored Strategies Aligned with Your Unique Business Goals.","Mastery in Diverse Digital Marketing Channels - SEO, SMM, PPC, and more.","Data-Driven Approach for Optimized and High-Performing Campaigns.","Personalized and Targeted Audience Engagement for Maximum Impact.","In-Depth Analysis and Competitor Research to Stay Ahead in the Market.","Continuous Monitoring and Fine-Tuning for Exceptional Results."]
        );
        $end_to_end = array(
            'title' => "eCommerce Marketplaces",
            'description' => "At Mucheco, we specialize in providing comprehensive e-commerce marketplace solutions that drive your business to unprecedented success. With a wealth of industry expertise, we have honed our skills to deliver cutting-edge strategies tailored to your specific requirements. Our team of experts excels in navigating major marketplaces like Amazon, eBay, Rakuten, Sears, Jet.com, Newegg and more, ensuring optimized listings and enhanced account performance. From contract to returns, we handle all aspects of international expansion, allowing you to focus on reaching new markets. So, let's join hands on this transformative journey together and redefine your marketplace success forever!",
            'lis' => ["Compelling store design & Description content","Generate Interest with Images & Titles to Drive Traffic to the Listing.","Strategic Insertion of Keywords","Assessment of All Listings to Improve Quality.","Support for inventory Management, Product Optimisation, customizations and integrations.","Inventory Performance Reviews all platforms (Analytics, Optimisation, Audits)."]
        );
        
        $data = array(
            'description' => $description,
            'market_place' => $market_place,
            'store_management' => $store_management,
            'end_to_end' => $end_to_end,
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