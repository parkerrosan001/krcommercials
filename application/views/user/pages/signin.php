<!-- contact-area start -->
<div class="contact-area pt-120" style="background: url('<?php echo base_url() ?>assets/images/banner-2.jpg') no-repeat;background-size: cover">
    <div class="container">

        <div class="row">
            <div class="col-lg-6 col-12 offset-lg-3 ">
                <div class="col-md-12 text-center mb-3">
                    <h3 class="white">Sign In</h3>
                </div>
                <?php
                if (isset($_SESSION['login_err'])) {
                ?>
                    <div class="alert alert-danger"><?php echo $_SESSION['login_err'] ?></div>
                <?php
                }
                ?>

                <?php
                if (isset($_SESSION['login__status_err'])) {
                ?>
                    <div class="alert alert-danger"><?php echo $_SESSION['login__status_err'] ?>
                        <a href="<?php echo base_url() ?>Contactus">Contact Administrator</a>
                    </div>

                <?php
                }
                ?>

                <?php
                if (isset($_SESSION['reset_succ'])) {
                ?>
                    <div class="alert alert-success"><?php echo $_SESSION['reset_succ'] ?></div>
                <?php
                }
                ?>
                <div class="contact-form sign-up-bg">
                    <div class="cf-msg"></div>
                    <form action="<?php echo base_url() ?>account/userLoginValidate" method="post">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <label class="fw-600">Email</label>
                                <input type="email" placeholder="enter your email address" id="email_field" name="email_field" required>
                            </div>
                            <div class="col-md-12 col-12">
                                <label class="fw-600">Password</label>
                                <input type="password" placeholder="enter your password" id="password_field" name="password_field" required>
                            </div>

                            <div class="col-12 text-center">
                                <button type="submit" class="cont-submit btn-contact btn-style" name="user_login_btn" id="user_login_btn">Sign In</button>
                                <!-- <input type="submit" name="user_login_btn" id="user_login_btn" value="Sign In" class="cont-submit btn-contact btn-style"> -->
                            </div>
                            <div class="col-12 text-center mt-2">
                                <p>Don't have an account? <a href="<?php echo base_url() ?>account/signup">Register</a></p>
                                <p><a href="<?php echo base_url() ?>account/forgotPassword">Forgot Password?</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>