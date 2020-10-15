<!-- contact-area start -->
<div class="contact-area pt-120" style="background: url('<?php echo base_url() ?>assets/images/banner-2.jpg') no-repeat;background-size: cover">
    <div class="container">

        <div class="row">
            <div class="col-lg-6 col-12 offset-lg-3">
                <div class="col-md-12 text-center mb-3">
                    <h3 class="white">Register an Account</h3>
                </div>
                <?php
                if (isset($_SESSION['signup_err'])) {
                ?>
                    <div class="alert alert-danger"><?php echo $_SESSION['signup_err'] ?></div>
                <?php
                }
                ?>
                <div class="contact-form sign-up-bg">
                    <div class="cf-msg"></div>
                    <form action="<?php echo base_url() ?>account/userSignUp" method="post">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <label class="fw-600">Full Name</label>
                                <input type="text" placeholder="enter your full name" id="full_name_field" name="full_name_field" value="<?php echo set_value('full_name_field'); ?>">
                                <?php echo form_error('full_name_field', '<p class="text-danger mt-2">', '</p>'); ?>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="fw-600">Phone #</label>
                                <input type="text" placeholder="enter your phone number" id="phone_field" name="phone_field" value="<?php echo set_value('phone_field'); ?>">
                                <?php echo form_error('phone_field', '<p class="text-danger mt-2">', '</p>'); ?>
                            </div>
                            <div class="col-md-12 col-12">
                                <label class="fw-600">Email</label>
                                <input type="email" placeholder="enter your email address" id="email_field" name="email_field" value="<?php echo set_value('email_field'); ?>">
                                <?php echo form_error('email_field', '<p class="text-danger mt-2">', '</p>'); ?>
                            </div>
                            <div class="col-md-12 col-12">
                                <label class="fw-600">Branch</label>
                                <select name="branch_field" id="branch_field" class="form-control" required>
                                    <option value="">select your branch</option>
                                    <option value="FL">Florida</option>
                                    <option value="CAL">California</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="fw-600">Password</label>
                                <input type="password" placeholder="enter your password" id="password_field" name="password_field">
                                <?php echo form_error('password_field', '<p class="text-danger mt-2">', '</p>'); ?>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="fw-600">Confirm Password</label>
                                <input type="password" placeholder="confirm your password" id="confirm_password_field" name="confirm_password_field">
                                <?php echo form_error('confirm_password_field', '<p class="text-danger mt-2">', '</p>'); ?>
                            </div>
                            <div class="col-md-12 col-12">
                                <input type="checkbox" id="checkbox" name="cb" style="width:auto;height: auto" required><span> I accept the <a href="#">Terms of service.</a></span>
                            </div>

                            <div class="col-12 text-center">
                                <button name="user_register_btn" id="user_register_btn" class="cont-submit btn-contact btn-style">Register</button>
                            </div>
                            <div class="col-12 text-center mt-2">
                                <p>Already have an account? <a href="<?php echo base_url() ?>account">Sign In</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>