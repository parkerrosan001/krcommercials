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
            <?php
            if (!empty($projects_data) && sizeof($projects_data) > 0) {
                foreach ($projects_data as $project) {
            ?>
                    <div class="col-sm-6 col-12 col-lg-4">
                        <div class="service-wrap">
                            <div class="service-img">
                                <img src="<?php echo base_url() . 'uploads/' . $project->project_image; ?>" alt="">
                            </div>
                            <div class="service-content text-center">
                                <h4 class="theme-color-2"><?php echo $project->project_title; ?></h4>
                                <p><?php echo $project->project_description; ?></p>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
        <!-- <div class="col-12 text-center">
            <div class="pagination-wrap text-center">
                <ul>
                    <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                    <li> <span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
            </div>
        </div> -->
    </div>
</div>
<!-- service-area end -->