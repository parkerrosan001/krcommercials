<!-- contact-area start -->
<div class="contact-area pt-120" style="background: url('<?php echo base_url() ?>assets/images/banner-2.jpg') no-repeat;background-size: cover">
    <div class="container">

        <?php
        if (isset($_SESSION['forget_email_err'])) {
        ?>
            <div class="alert alert-danger"><?php echo $_SESSION['forget_email_err'] ?></div>
        <?php
        }
        ?>

        <?php
        if (isset($_SESSION['forget_email_sent_err'])) {
        ?>
            <div class="alert alert-danger"><?php echo $_SESSION['forget_email_sent_err'] ?></div>
        <?php
        }
        ?>

        <div class="row">
            <div class="col-lg-6 col-12 offset-lg-3">
                <div class="col-md-12 text-center mb-3">
                    <h3 class="white">Forgot Password</h3>
                </div>
                <div class="contact-form sign-up-bg">
                    <div class="cf-msg"></div>
                    <form action="<?php echo base_url() ?>account/sendResetPin" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <p>Enter your registered email address to get the reset password 4 digit pin code.</p>
                            </div>
                            <div class="col-md-12 col-12">
                                <label class="fw-600">Email Address</label>
                                <input type="email" placeholder="enter your registered email addresss" id="email_field" name="email_field" required>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" id="forget_pass_pin_btn" class="cont-submit btn-contact btn-style" name="forget_pass_pin_btn">Send Email</button>
                            </div>
                            <div class="col-12 text-center mt-2">
                                <p>Back to <a href="<?php echo base_url() ?>account">Login</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>