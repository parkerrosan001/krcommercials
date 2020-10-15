<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $page_title; ?></title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url() ?>assets/images/fav-icon-fl.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600&amp;subset=latin-ext" rel="stylesheet">
    <!-- CSS -->
    <link href="<?php echo base_url() ?>assets/css/main.css" rel="stylesheet">

    <!-- JS -->
    <script src="<?php echo base_url() ?>assets/js/modernizr-2.8.3.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery-1.12.0.min.js"></script>
</head>

<body>
    <div class="site" id="page">
        <a class="skip-link sr-only" href="#main">Skip to content</a>


        <section class="hero-section hero-section--image clearfix clip">
            <div class="hero-section__wrap">
                <div class="hero-section__option">
                    <img src="<?php echo base_url() ?>assets/images/banner-3.jpg" alt="Hero section image">
                </div>
                <!-- .hero-section__option -->

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="title__description">
                                <h2>KR Commercial Interiors Inc.</h2>
                            </div>
                            <div class="title-01 title-01--11 text-center">
                                <h4 class="title__heading">
                                    <span>We Offer Best</span>
                                    <strong class="hero-section__words">
                                        <span class="title__effect is-visible">Quality </span>
                                        <span class="title__effect"> Services</span>
                                        <span class="title__effect">Budget</span>
                                    </strong>
                                </h4>

                                <div class="title__description">Select Your Branch</div>

                                <!-- Options btn color: .btn-success | .btn-info | .btn-warning | .btn-danger | .btn-primary -->
                                <div class="title__action">
                                    <a href="<?php echo base_url() ?>home/landing/FL" class="btn btn-info btn-theme-1">&nbsp;Florida&nbsp;&nbsp;</a>
                                    <a href="<?php echo base_url() ?>home/landing/CAL" class="btn btn-info btn-theme-1">California</a>
                                </div>
                            </div>
                            <!-- .title-01 -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- .hero-section -->
    </div>

    <!-- JS -->
    <script src="<?php echo base_url() ?>assets/js/animate-headline.js"></script>
    <script src="<?php echo base_url() ?>assets/js/main.js"></script>
</body>

</html>