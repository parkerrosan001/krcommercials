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
<!-- team-area start -->
<div class="team-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <p><?php echo $page_data->sub_text; ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            if (!empty($staff_data) && sizeof($staff_data) > 0) {
                foreach ($staff_data as $staff) {
            ?>
                    <div class="col-lg-3 col-md-4  col-sm-6 col-12">
                        <div class="team-wrap">
                            <div class="team-img">
                                <img src="<?php echo base_url().'uploads/'.$staff->staff_image; ?>" alt="">
                            </div>
                            <div class="team-content">
                                <h4><?php echo $staff->full_name; ?></h4>
                                <p><?php echo $staff->designation; ?></p>
                                <ul>
                                    <?php
                                        if($staff->facebook != ''){
                                            $facebook_url = $staff->facebook;
                                        }
                                        else{
                                            $facebook_url = '#';
                                        }

                                        if($staff->twitter != ''){
                                            $twitter_url = $staff->twitter;
                                        }
                                        else{
                                            $twitter_url = '#';
                                        }

                                        if($staff->google_plus != ''){
                                            $google_plus_url = $staff->google_plus;
                                        }
                                        else{
                                            $google_plus_url = '#';
                                        }
                                    ?>
                                    <li><a href="<?php echo $facebook_url; ?>"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="<?php echo $twitter_url; ?>"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="<?php echo $google_plus_url; ?>"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
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
<!-- team-area end -->