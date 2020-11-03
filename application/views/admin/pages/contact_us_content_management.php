<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Contact Us Content Florida Branch</h3>
                </div>
                <form action="<?php echo base_url() ?>admin/content/updateFlContactUsContent" method="POST">
                    <input type="hidden" id="fl_id_field" name="fl_id_field" value="<?php echo $fl_contact_us_data->id; ?>">
                    <div class="card-body">
                        <?php
                        if (isset($_SESSION['fl_contact_updt_err'])) {
                        ?>
                            <div class="alert alert-danger"><?php echo $_SESSION['fl_contact_updt_err'] ?></div>
                        <?php
                        }
                        ?>

                        <?php
                        if (isset($_SESSION['fl_contact_updt_succ'])) {
                        ?>
                            <div class="alert alert-success"><?php echo $_SESSION['fl_contact_updt_succ'] ?></div>
                        <?php
                        }
                        ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Email Address</label>
                                    <input type="email" name="fl_email_field" id="fl_email_field" class="form-control" required value="<?php echo $fl_contact_us_data->email; ?>">
                                </div>
                                <div class="col-md-4">
                                    <label>Phone</label>
                                    <input type="text" name="fl_phone_field" id="fl_phone_field" class="form-control" required value="<?php echo $fl_contact_us_data->phone; ?>">
                                </div>
                                <div class="col-md-4">
                                    <label>Fax</label>
                                    <input type="text" name="fl_fax_field" id="fl_fax_field" class="form-control" required value="<?php echo $fl_contact_us_data->fax; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Facebook</label>
                                    <input type="text" name="fl_facebook_field" id="fl_facebook_field" class="form-control" value="<?php echo $fl_contact_us_data->facebook_url; ?>">
                                </div>
                                <div class="col-md-4">
                                    <label>Twitter</label>
                                    <input type="text" name="fl_twitter_field" id="fl_twitter_field" class="form-control" value="<?php echo $fl_contact_us_data->twitter_url; ?>">
                                </div>
                                <div class="col-md-4">
                                    <label>LinkedIn</label>
                                    <input type="text" name="fl_linkedin_field" id="fl_linkedin_field" class="form-control" value="<?php echo $fl_contact_us_data->linkedin_url; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Latitude</label>
                                    <input type="text" name="fl_latitude_field" id="fl_latitude_field" class="form-control" value="<?php echo $fl_contact_us_data->latitude; ?>">
                                </div>
                                <div class="col-md-4">
                                    <label>Longitude</label>
                                    <input type="text" name="fl_longitude_field" id="fl_longitude_field" class="form-control" required value="<?php echo $fl_contact_us_data->longitude; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="fl_address_field" id="fl_address_field" rows="5" class="form-control" required><?php echo $fl_contact_us_data->address; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Footer Short Description <span class="text-danger"> ( Max. 200 Characters )</span></label>
                            <textarea name="fl_short_description" id="fl_short_description" rows="5" class="form-control" required maxlength="200"><?php echo $fl_contact_us_data->short_description; ?></textarea>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" name="fl_contact_btn" id="fl_contact_btn" class="btn btn-primary">Update Contact Us Content</button>
                    </div>
                </form>
            </div>

        </div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Contact Us Content California Branch</h3>
                </div>
                <form action="<?php echo base_url() ?>admin/content/updateCalContactUsContent" method="POST">
                    <input type="hidden" id="cal_id_field" name="cal_id_field" value="<?php echo $cal_contact_us_data->id; ?>">
                    <div class="card-body">
                        <?php
                        if (isset($_SESSION['cal_contact_updt_err'])) {
                        ?>
                            <div class="alert alert-danger"><?php echo $_SESSION['cal_contact_updt_err'] ?></div>
                        <?php
                        }
                        ?>

                        <?php
                        if (isset($_SESSION['cal_contact_updt_succ'])) {
                        ?>
                            <div class="alert alert-success"><?php echo $_SESSION['cal_contact_updt_succ'] ?></div>
                        <?php
                        }
                        ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Email Address</label>
                                    <input type="email" name="cal_email_field" id="cal_email_field" class="form-control" required value="<?php echo $cal_contact_us_data->email; ?>">
                                </div>
                                <div class="col-md-4">
                                    <label>Phone</label>
                                    <input type="text" name="cal_phone_field" id="cal_phone_field" class="form-control" required value="<?php echo $cal_contact_us_data->phone; ?>">
                                </div>
                                <div class="col-md-4">
                                    <label>Fax</label>
                                    <input type="text" name="cal_fax_field" id="cal_fax_field" class="form-control" required value="<?php echo $cal_contact_us_data->fax; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Facebook</label>
                                    <input type="text" name="cal_facebook_field" id="cal_facebook_field" class="form-control" value="<?php echo $cal_contact_us_data->facebook_url; ?>">
                                </div>
                                <div class="col-md-4">
                                    <label>Twitter</label>
                                    <input type="text" name="cal_twitter_field" id="cal_twitter_field" class="form-control" value="<?php echo $cal_contact_us_data->twitter_url; ?>">
                                </div>
                                <div class="col-md-4">
                                    <label>LinkedIn</label>
                                    <input type="text" name="cal_linkedin_field" id="cal_linkedin_field" class="form-control" value="<?php echo $cal_contact_us_data->linkedin_url; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Latitude</label>
                                    <input type="text" name="cal_latitude_field" id="cal_latitude_field" class="form-control" value="<?php echo $cal_contact_us_data->latitude; ?>">
                                </div>
                                <div class="col-md-4">
                                    <label>Longitude</label>
                                    <input type="text" name="cal_longitude_field" id="cal_longitude_field" class="form-control" required value="<?php echo $cal_contact_us_data->longitude; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="cal_address_field" id="cal_address_field" rows="5" class="form-control" required><?php echo $cal_contact_us_data->address; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Footer Short Description <span class="text-danger"> ( Max. 200 Characters )</span></label>
                            <textarea name="cal_short_description" id="cal_short_description" rows="5" class="form-control" required maxlength="200"><?php echo $cal_contact_us_data->short_description; ?></textarea>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" name="cal_contact_btn" id="cal_contact_btn" class="btn btn-primary">Update Contact Us Content</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>