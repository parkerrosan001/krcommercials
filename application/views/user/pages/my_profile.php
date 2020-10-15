 <!-- breadcumb-area start -->
 <div class="breadcumb-area black-opacity bg-img-6">
     <div class="container">
         <div class="row">
             <div class="col-12 text-center">
                 <div class="breadcumb-wrap">
                     <h2 class="white">Profile</h2>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- breadcumb-area end -->
 <!-- contact-area start -->
 <div class="contact-area pt-120">
     <div class="container">
         <div class="row">
             <div class="col-lg-12 col-12">

                 <div class="contact-form">

                     <?php
                        if (isset($_SESSION['update_profile_err'])) {
                        ?>
                         <div class="alert alert-danger"><?php echo $_SESSION['update_profile_err'] ?></div>
                     <?php
                        }
                        ?>

                     <?php
                        if (isset($_SESSION['update_profile_succ'])) {
                        ?>
                         <div class="alert alert-success"><?php echo $_SESSION['update_profile_succ'] ?></div>
                     <?php
                        }
                        ?>

                     <?php
                        if (isset($_SESSION['signup_succ'])) {
                        ?>
                         <div class="alert alert-success"><?php echo $_SESSION['signup_succ'] ?></div>
                     <?php
                        }
                        ?>
                     <?php
                        if (isset($_SESSION['upd_pass_err'])) {
                        ?>
                         <div class="alert alert-danger"><?php echo $_SESSION['upd_pass_err'] ?></div>
                     <?php
                        }
                        ?>

                     <form action="<?php echo base_url() ?>account/updateProfile" method="post">
                         <div class="row">
                             <div class="col-md-12">
                                 <h4 class="fw-600">Personal Information</h4>
                             </div>
                             <div class="col-md-6 col-12">
                                 <label>Full Name</label>
                                 <input type="text" placeholder="enter your full name" id="full_name_field" name="full_name_field" required value="<?php echo $user_data->user_full_name; ?>">
                             </div>
                             <div class="col-md-6 col-12">
                                 <label>Email Address</label>
                                 <input type="email" placeholder="enter your email address" id="email_field" name="email_field" required value="<?php echo $user_data->email; ?>">
                             </div>

                             <div class="col-md-4 col-12">
                                 <label>Phone #</label>
                                 <input type="text" placeholder="enter your phone number" id="phone_field" name="phone_field" required value="<?php echo $user_data->user_phone; ?>">
                             </div>

                             <div class="col-md-4 col-12">
                                 <label>Branch</label>
                                 <select name="branch_field" id="branch_field" class="form-control" required>
                                     <option value="">select your branch</option>
                                     <option value="FL" <?php if ($user_data->user_branch == 'FL') {
                                                            echo 'selected';
                                                        } ?>>Florida</option>
                                     <option value="CAL" <?php if ($user_data->user_branch == 'CAL') {
                                                                echo 'selected';
                                                            } ?>>California</option>
                                 </select>
                             </div>

                             <div class="col-md-4 col-12">
                                 <label>Address</label>
                                 <textarea name="address_field" id="address_field" placeholder="enter your complete address" class="form-control" rows="1"><?php echo $user_data->user_address; ?></textarea>
                             </div>

                             <div class="col-12 text-right">
                                 <button type="submit" id="profile_update_btn" class="cont-submit btn-contact btn-style" name="profile_update_btn">Update</button>
                             </div>
                         </div>
                     </form>
                     <hr>

                     <form action="<?php echo base_url() ?>account/updatePassword" method="post">
                         <div class="row">
                             <div class="col-md-12">
                                 <h4 class="fw-600">Change Password</h4>
                             </div>
                             <div class="col-md-4 col-12">
                                 <label>Current Password</label>
                                 <input type="password" placeholder="enter your current password" id="current_pass_field" name="current_pass_field">
                                 <?php echo form_error('current_pass_field', '<p class="text-danger mt-2">', '</p>'); ?>
                             </div>
                             <div class="col-md-4 col-12">
                                 <label>New Password</label>
                                 <input type="password" placeholder="enter your new password" id="new_pass_field" name="new_pass_field">
                                 <?php echo form_error('new_pass_field', '<p class="text-danger mt-2">', '</p>'); ?>
                             </div>
                             <div class="col-md-4 col-12">
                                 <label>Confirm Password</label>
                                 <input type="password" placeholder="confirm your new password" id="c_new_pass_field" name="c_new_pass_field">
                                 <?php echo form_error('c_new_pass_field', '<p class="text-danger mt-2">', '</p>'); ?>
                             </div>

                             <div class="col-12 text-right">
                                 <button type="submit" id="update_pass_btn" class="cont-submit btn-contact btn-style" name="update_pass_btn">Update</button>
                             </div>
                         </div>
                     </form>
                     <hr>
                     <div class="row">
                         <div class="col-md-12">
                             <h4 class="fw-600">Upload Profile Image</h4>
                         </div>
                         <div class="col-md-4 col-12">
                             <form action="<?php echo base_url() ?>account/updateProfileImage" method="post" enctype="multipart/form-data">

                                 <div class="form-group">
                                     <div class="form-group">
                                         <div class="col-sm-6 col-md-12 imgUp p-0">
                                             <img src="<?php echo base_url().'uploads/'.$user_data->user_pic?>" id="output_image" onclick="$(#file).click()" style=" height: 250px; width: 250px; border-radius: 10px;" onerror="this.src='<?php echo base_url() ?>assets/admin_assets/dist/img/camera.png';">
                                             <label class="btn theme-color upload-btn white">
                                                 Upload<input type="file" class="uploadFile img" name="user_image_field" value="Upload Photo" id="user_image_field" style="width: 0px;height: 0px;overflow: hidden;border: 0px;" id="file" accept="image/*" onchange="preview_image(event)" required>
                                             </label>
                                         </div>
                                     </div>
                                 </div>
                         </div>
                         <div class="col-12 text-right">
                             <button id="profile_image_btn" type="submit" class="cont-submit btn-contact btn-style" name="profile_image_btn">Update</button>
                         </div>
                         </form>
                     </div>
                 </div>
             </div>

         </div>
     </div>

 </div>