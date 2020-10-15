<!-- contact-area start -->
<div class="contact-area pt-120" style="background: url('<?php echo base_url() ?>assets/images/banner-2.jpg') no-repeat;background-size: cover">
    <div class="container">

        <?php
        if (isset($_SESSION['forget_email_sent_succ'])) {
        ?>
            <div class="alert alert-success"><?php echo $_SESSION['forget_email_sent_succ'] ?></div>
        <?php
        }
        ?>

        <?php
        if (isset($_SESSION['reset_err'])) {
        ?>
            <div class="alert alert-danger"><?php echo $_SESSION['reset_err'] ?></div>
        <?php
        }
        ?>

        <?php
        if (isset($_SESSION['pin_err'])) {
        ?>
            <div class="alert alert-danger"><?php echo $_SESSION['pin_err'] ?></div>
        <?php
        }
        ?>

        <div class="row">
            <div class="col-lg-6 col-12 offset-lg-3">
                <div class="col-md-12 text-center mb-3">
                    <h3 class="white">Reset your password below</h3>
                </div>
                <div class="contact-form sign-up-bg">
                    <div class="cf-msg"></div>
                    <form action="<?php echo base_url() ?>account/resetPasswordForm" method="post">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <label class="fw-600">Reset Pin *</label>
                                <input type="number" id="pin_field" name="pin_field" class="form-control" placeholder="enter 4 digit pin code" />
                                <?php echo form_error('pin_field', '<p class="text-danger mt-2">', '</p>'); ?>
                            </div>

                            <div class="col-md-12 col-12">
                                <label class="fw-600">New Password *</label>
                                <input type="password" id="new_pass_field" name="new_pass_field" class="form-control" placeholder="enter you new password" />
                                <?php echo form_error('new_pass_field', '<p class="text-danger mt-2">', '</p>'); ?>
                            </div>

                            <div class="col-md-12 col-12">
                                <label class="fw-600">Confirm New Password *</label>
                                <input type="password" id="confirm_new_pass_field" name="confirm_new_pass_field" class="form-control" placeholder="confirm new password" />
                                <?php echo form_error('confirm_new_pass_field', '<p class="text-danger mt-2">', '</p>'); ?>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" id="reset_pass_btn" class="cont-submit btn-contact btn-style" name="reset_pass_btn">Reset Password</button>
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