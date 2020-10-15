<!-- breadcumb-area start -->
<div class="breadcumb-area black-opacity bg-img-6">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcumb-wrap">
                    <h2 class="white">Contact Us</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcumb-area end -->

<!-- contact-area start -->
<div class="contact-area pt-120">
    <div class="container">
        <div class="col-md-12 text-center mb-3">
            <h4>Get in touch with us! </h4>
        </div>
        <?php
        if (isset($_SESSION['contact_us_email_sent_succ'])) {
        ?>
            <div class="alert alert-success"><?php echo $_SESSION['contact_us_email_sent_succ'] ?></div>
        <?php
        }
        ?>

        <?php
        if (isset($_SESSION['contact_us_email_sent_err'])) {
        ?>
            <div class="alert alert-danger"><?php echo $_SESSION['contact_us_email_sent_err'] ?></div>
        <?php
        }
        ?>
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="contact-form">
                    <div class="cf-msg"></div>
                    <form action="<?php echo base_url() ?>account/sendContactUsEmail" method="post">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <label>Fullname*</label>
                                <input type="text" placeholder="enter your full name" id="full_name_field" name="full_name_field" required>
                            </div>
                            <div class="col-md-6 col-12">
                                <label>Email*</label>
                                <input type="email" placeholder="enter your email address" id="email_field" name="email_field" required>
                            </div>
                            <div class="col-12">
                                <label>Subject*</label>
                                <input type="text" placeholder="enter subject for email" id="subject_field" name="subject_field" required>
                            </div>
                            <div class="col-12">
                                <label>Message*</label>
                                <textarea class="contact-textarea" placeholder="enter your message" id="message_field" name="message_field"></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" id="contact_us_btn" class="cont-submit btn-contact btn-style" name="contact_us_btn">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12">
                <div class="contact-wrap">
                    <p class="mb-2"><span class="fw-600"><i class="fa fa-phone"></i> Phone number : </span> <span> (714) 516 2100</span></p>
                    <p class="mb-2"><span class="fw-600"><i class="fa fa-envelope"></i> Email :</span> <span>scot@kr-commercial.com</span></p>
                    <p class="mb-2"><span class="fw-600"><i class="fa fa-location-arrow"></i> Location: </span><span>1011 East Lacy Avenue Anaheim, CA 92805, USA</span></p>
                </div>
                <h4 class="mt-2">Location</h4>
                <div id="googleMap"></div>
            </div>
        </div>
    </div>

</div>