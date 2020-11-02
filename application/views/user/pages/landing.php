<!-- slider-area start -->
<div class="slider-area">
    <div class="slider-active next-prev-style">
        <div class="slider-items">
            <img src="<?php echo base_url() ?>assets/images/banner-1.jpg" alt="" class="slider">
            <div class="slider-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-text">

                                <h2><span class="d-block">Discover</span>Your Dream <span class="color">Hotel</span> </h2>
                                <p>Why Over <span>50,0000+ </span> Customers Have Choosen <span>Architecture & Interior</span> Design. </p>
                                <a href="projects-ca.html" class="banner-btn">See Projects <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-items">
            <img src="<?php echo base_url() ?>assets/images/banner-2.jpg" alt="" class="slider">
            <div class="slider-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-text">

                                <h2><span class="color">KR</span> Commercial Interior Inc.</h2>
                                <p>Why Over <span>50,0000+ </span> Customers Have Choosen <span>Architecture & Interior</span> Design. </p>
                                <a href="contact-ca.html" class="banner-btn">Contact Us <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-items">
            <img src="<?php echo base_url() ?>assets/images/banner-3.jpg" alt="" class="slider">
            <div class="slider-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-text">

                                <h2><span class="d-block">Discover</span>Your Dream <span class="color">Hotel</span> </h2>
                                <p>Why Over <span>50,0000+ </span> Customers Have Choosen <span>Architecture & Interior</span> Design. </p>
                                <a href="services-ca.html" class="banner-btn">See Services <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider-area end -->

<!-- ablout-area start -->
<div class="about-area ptb-120 bg-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="about-wrap">
                    <h2>WELCOME TO </h2>
                    <h3>KR Commercial Interiors Inc.</h3>
                    <p>KR Commercial Interiors Inc. offers a wide variety of service to the Hotel Owner. From budget development to project
                        close out, every detail is important. We can tailor-fit a service to match your needs. Whether it is a pre-purchase
                        property survey to a design/ build ground up project, we are here with our experienced and professional staff.</p>

                </div>
            </div>
            <div class="col-md-6 d-none d-lg-block">
                <div class="about-img">
                    <img src="<?php echo base_url() ?>assets/images/about/1.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ablout-area end -->

<!-- spacial-area start -->
<div class="spacial-area ptb-120 ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h2>OUR SPECIALIZATION</h2>
                    <h3>A wall for our project glory and a place to find more</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 d-lg-block d-none ">
                <div class="spacial-img">
                    <img src="<?php echo base_url() ?>assets/images/spacial/1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="spacial-wrap">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="spacial-item">
                                <span class="flaticon-house-3"></span>
                                <h4>Architecture</h4>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="spacial-item">
                                <span class="flaticon-house"></span>
                                <h4>Interior Design</h4>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="spacial-item">
                                <span class="flaticon-cityscape"></span>
                                <h4>Building Design</h4>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="spacial-item">
                                <span class="flaticon-house-1"></span>
                                <h4>Art Design</h4>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="spacial-item">
                                <span class="flaticon-house-4"></span>
                                <h4>Home Design</h4>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="spacial-item">
                                <span class="flaticon-home"></span>
                                <h4>Hotel design</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- spacial-area end -->

<!-- .project-area start -->
<div class="project-area bg-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center">
                <div class="section-title">
                    <h2>Latest Projects</h2>
                    <p> <?php echo $proj_page_data->sub_text; ?></p>
                </div>

            </div>
        </div>
        <div class="row grid">
            <?php

            if (!empty($projects_data) && sizeof($projects_data)) {
                $no = 0;
                foreach ($projects_data as $project) {
                    $no++;
                    if ($no <= 3) {
            ?>
                        <div class="col-lg-4 col-sm-6 col-12 project cat3 cat4">
                            <div class="project-wrap">
                                <img src="<?php echo base_url().'uploads/'.$project->project_image; ?>" alt="">
                                <div class="project-content">
                                    <a href="<?php echo base_url().'uploads/'.$project->project_image; ?>" class="popup"><i class="fa fa-search"></i></a>
                                    <h3><?php echo $project->project_title; ?></h3>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            }

            ?>
        </div>
        <div class="col-md-12 text-center">
            <a href="<?php echo base_url() ?>projects" class="view-btn">View More</a>
        </div>
    </div>
</div>
<!-- .project-area end -->

<!-- service-area start -->
<div class="service-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h2>Services We Do</h2>
                    <p><?php echo $ser_page_data->sub_text ?></p>
                </div>
            </div>
        </div>
        <div class="row services">
            <?php

            if (!empty($services_data) && sizeof($services_data)) {
                $no = 0;
                foreach ($services_data as $service) {
                    $no++;
                    if ($no <= 3) {
            ?>
                        <div class="col-sm-6 col-12 col-lg-4">
                            <div class="service-wrap">
                                <div class="spacial-item">
                                    <!-- <i class="fa fa-credit-card" aria-hidden="true"></i> -->
                                    <h4 class="fw-600"><?php echo $service->service_title; ?></h4>
                                    <p><?php echo $service->service_description; ?></p>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            }

            ?>
        </div>
        <div class="col-md-12 text-center">
            <a href="<?php echo base_url() ?>services" class="view-btn">View More</a>
        </div>
    </div>
</div>
<!-- service-area end -->