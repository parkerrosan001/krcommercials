<!-- breadcumb-area start -->
<div class="breadcumb-area black-opacity" style="background: url(<?php echo base_url() . 'uploads/' . $page_data->banner_image; ?>) no-repeat center center / cover">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcumb-wrap">
                    <h2 class="white"><?php echo $page_data->page_heading; ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcumb-area end -->

<!-- service-area start -->
<div class="service-area" id="projects">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-4">
                <p><?php echo $page_data->sub_text; ?></p>
            </div>
            <div class="tab col-md-12 text-center mb-3 row m-0 p-0">
                <div class="col-md-6 p-0">
                    <a href="<?php echo base_url() ?>services"> <button class="tablinks   active">Project Services</button></a>
                </div>
                <div class="col-md-6 p-0">
                    <a href="<?php echo base_url() ?>services/skilledTradeServices"> <button class="tablinks">Skilled Trade Services</button></a>
                </div>
            </div>
            <div id="service1'" class="tabcontent" style="display: block">
                <div class="row services">

                    <?php
                    if (!empty($services_data) && sizeof($services_data) > 0) {
                        foreach ($services_data as $service) {
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
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- service-area end -->