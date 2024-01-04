<?php ?>
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <!-- <div class="sidebar-brand-icon rotate-n-15"> -->
        <div class="sidebar-brand-icon">
            <!-- <i class="fas fa-laugh-wink"></i> -->
            <img src="assets/img/logo_m.png" alt="" height="35">
        </div>
        <div class="sidebar-brand-text mx-3"><img src="assets/img/logo.png" alt="" height="35"></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php echo $_SESSION["item"] == "index" ? "active" : ""; ?>">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Page Components</span>
        </a>
        <div id="collapseTwo" class="collapse <?php echo $_SESSION["page_component"] == "page-component" ? "show" : ""; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php echo $_SESSION["item"] == "meta-tags" ? "active" : ""; ?>" href="meta-tags.php"><i class="<?php echo $_SESSION["item"] == "meta-tags" ? "fas" : "far"; ?> fa-circle fa-xs mr-2"></i> Meta Tags</a>
                <a class="collapse-item <?php echo $_SESSION["item"] == "category" ? "active" : ""; ?>" href="category.php"><i class="<?php echo $_SESSION["item"] == "category" ? "fas" : "far"; ?> fa-circle fa-xs mr-2"></i> Category</a>
                <a class="collapse-item <?php echo $_SESSION["item"] == "portfolio" ? "active" : ""; ?>" href="portfolio-details.php"><i class="<?php echo $_SESSION["item"] == "portfolio" ? "fas" : "far"; ?> fa-circle fa-xs mr-2"></i> Portfolio Details</a>
                <a class="collapse-item <?php echo $_SESSION["item"] == "blog-details" ? "active" : ""; ?>" href="blog-details.php"><i class="<?php echo $_SESSION["item"] == "blog-details" ? "fas" : "far"; ?> fa-circle fa-xs mr-2"></i> Blog Detais</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAboutUs" aria-expanded="true" aria-controls="collapseAboutUs">
            <i class="fas fa-fw fa-cog"></i>
            <span>About Us</span>
        </a>
        <div id="collapseAboutUs" class="collapse <?php echo $_SESSION["page_component"] == "about-us" ? "show" : ""; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php echo $_SESSION["item"] == "policy-details" ? "active" : ""; ?>" href="policy-details.php"><i class="<?php echo $_SESSION["item"] == "policy-details" ? "fas" : "far"; ?> fa-circle fa-xs mr-2"></i> Policy Details</a>
                <a class="collapse-item <?php echo $_SESSION["item"] == "case-study" ? "active" : ""; ?>" href="casestudy-details.php"><i class="<?php echo $_SESSION["item"] == "case-study" ? "fas" : "far"; ?> fa-circle fa-xs mr-2"></i> Case Study Details</a>
                <a class="collapse-item <?php echo $_SESSION["item"] == "testimonial" ? "active" : ""; ?>" href="testimonial.php"><i class="<?php echo $_SESSION["item"] == "testimonial" ? "fas" : "far"; ?> fa-circle fa-xs mr-2"></i> Testimonial</a>
                <a class="collapse-item <?php echo $_SESSION["item"] == "faq" ? "active" : ""; ?>" href="faq-details.php"><i class="<?php echo $_SESSION["item"] == "faq" ? "fas" : "far"; ?> fa-circle fa-xs mr-2"></i> FAQ</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <!-- <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div> -->

</ul>