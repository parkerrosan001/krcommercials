<div class="container-fluid">
    <?php
    if (isset($_SESSION['fl_welcome_section_content_err'])) {
    ?>
        <div class="alert alert-danger"><?php echo $_SESSION['fl_welcome_section_content_err'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['fl_welcome_section_content_succ'])) {
    ?>
        <div class="alert alert-success"><?php echo $_SESSION['fl_welcome_section_content_succ'] ?></div>
    <?php
    }
    ?>
    <?php
    if (isset($_SESSION['cal_welcome_section_content_err'])) {
    ?>
        <div class="alert alert-danger"><?php echo $_SESSION['cal_welcome_section_content_err'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['cal_welcome_section_content_succ'])) {
    ?>
        <div class="alert alert-success"><?php echo $_SESSION['cal_welcome_section_content_succ'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['fl_special_section_content_err'])) {
    ?>
        <div class="alert alert-danger"><?php echo $_SESSION['fl_special_section_content_err'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['fl_special_section_content_succ'])) {
    ?>
        <div class="alert alert-success"><?php echo $_SESSION['fl_special_section_content_succ'] ?></div>
    <?php
    }
    ?>
    <?php
    if (isset($_SESSION['cal_special_section_content_err'])) {
    ?>
        <div class="alert alert-danger"><?php echo $_SESSION['cal_special_section_content_err'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['cal_special_section_content_succ'])) {
    ?>
        <div class="alert alert-success"><?php echo $_SESSION['cal_special_section_content_succ'] ?></div>
    <?php
    }
    ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Welcome Section Content Florida Branch</h3>
                </div>
                <form enctype="multipart/form-data" action="<?php echo base_url() ?>admin/content/updateFlWelcomeSectionContent" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Heading</label>
                            <input type="hidden" value="<?php echo $fl_welcome_section_data->id; ?>" name="fl_id_field" id="fl_id_field">
                            <input type="text" name="fl_heading_field" id="fl_heading_field" class="form-control" placeholder="enter title heading" value="<?php echo $fl_welcome_section_data->heading; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Description <span class="text-danger"> ( Max. 500 Characters )</span></label>
                            <textarea name="fl_description_field" id="fl_description_field" rows="10" class="form-control" required maxlength="500"><?php echo $fl_welcome_section_data->description; ?></textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-7">
                                    <label>Banner Image</label>
                                    <input type="hidden" id="fl_banner_old_pic_field" name="fl_banner_old_pic_field" value="<?php echo $fl_welcome_section_data->image; ?>">
                                    <input type="file" name="fl_banner_pic_field" id="fl_banner_pic_field" class="form-control" id="file" accept="image/*" onchange="fl_preview_image(event)">
                                </div>
                                <div class="col-md-5">
                                    <img src="<?php echo base_url() . 'uploads/' . $fl_welcome_section_data->image; ?>" id="fl_output_image" onclick="$(#file).click()" style=" height: 150px; width: 150px; border-radius: 10px;" onerror="this.src='<?php echo base_url() ?>assets/admin_assets/dist/img/camera.png';">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <input type="submit" value="Update Content" class="btn btn-primary" name="fl_home_section_content_updt_btn">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Welcome Section Content California Branch</h3>
                </div>
                <form enctype="multipart/form-data" action="<?php echo base_url() ?>admin/content/updateCalWelcomeSectionContent" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Heading</label>
                            <input type="hidden" value="<?php echo $cal_welcome_section_data->id; ?>" name="cal_id_field" id="cal_id_field">
                            <input type="text" name="cal_heading_field" id="cal_heading_field" class="form-control" placeholder="enter title heading" value="<?php echo $cal_welcome_section_data->heading; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Description <span class="text-danger"> ( Max. 500 Characters )</span></label>
                            <textarea name="cal_description_field" id="cal_description_field" rows="10" class="form-control" required maxlength="500"><?php echo $cal_welcome_section_data->description; ?></textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-7">
                                    <label>Banner Image</label>
                                    <input type="hidden" id="cal_banner_old_pic_field" name="cal_banner_old_pic_field" value="<?php echo $cal_welcome_section_data->image; ?>">
                                    <input type="file" name="cal_banner_pic_field" id="cal_banner_pic_field" class="form-control" id="file" accept="image/*" onchange="cal_preview_image(event)">
                                </div>
                                <div class="col-md-5">
                                    <img src="<?php echo base_url() . 'uploads/' . $cal_welcome_section_data->image; ?>" id="cal_output_image" onclick="$(#file).click()" style=" height: 150px; width: 150px; border-radius: 10px;" onerror="this.src='<?php echo base_url() ?>assets/admin_assets/dist/img/camera.png';">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <input type="submit" value="Update Content" class="btn btn-primary" name="cal_home_section_content_updt_btn">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Specialization Section Content Florida Branch</h3>
                </div>
                <form enctype="multipart/form-data" action="<?php echo base_url() ?>admin/content/updateFlSpecialSectionContent" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Heading</label>
                            <input type="hidden" value="<?php echo $fl_special_section_data->id; ?>" name="fl_id_field" id="fl_id_field">
                            <input type="text" name="fl_heading_field" id="fl_heading_field" class="form-control" placeholder="enter title heading" value="<?php echo $fl_special_section_data->heading; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Description <span class="text-danger"> ( Max. 500 Characters )</span></label>
                            <textarea name="fl_description_field" id="fl_description_field" rows="10" class="form-control" required maxlength="500"><?php echo $fl_special_section_data->description; ?></textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-7">
                                    <label>Banner Image</label>
                                    <input type="hidden" id="fl_banner_old_pic_field" name="fl_banner_old_pic_field" value="<?php echo $fl_special_section_data->image; ?>">
                                    <input type="file" name="fl_banner_pic_field" id="fl_banner_pic_field" class="form-control" id="file" accept="image/*" onchange="preview_special_image(event)">
                                </div>
                                <div class="col-md-5">
                                    <img src="<?php echo base_url() . 'uploads/' . $fl_special_section_data->image; ?>" id="output_special_image" onclick="$(#file).click()" style=" height: 150px; width: 150px; border-radius: 10px;" onerror="this.src='<?php echo base_url() ?>assets/admin_assets/dist/img/camera.png';">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <input type="submit" value="Update Content" class="btn btn-primary" name="fl_special_section_content_updt_btn">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Specialization Section Content California Branch</h3>
                </div>
                <form enctype="multipart/form-data" action="<?php echo base_url() ?>admin/content/updateCalSpecialSectionContent" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Heading</label>
                            <input type="hidden" value="<?php echo $cal_special_section_data->id; ?>" name="cal_id_field" id="cal_id_field">
                            <input type="text" name="cal_heading_field" id="cal_heading_field" class="form-control" placeholder="enter title heading" value="<?php echo $cal_special_section_data->heading; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Description <span class="text-danger"> ( Max. 500 Characters )</span></label>
                            <textarea name="cal_description_field" id="cal_description_field" rows="10" class="form-control" required maxlength="500"><?php echo $cal_special_section_data->description; ?></textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-7">
                                    <label>Banner Image</label>
                                    <input type="hidden" id="cal_banner_old_pic_field" name="cal_banner_old_pic_field" value="<?php echo $cal_special_section_data->image; ?>">
                                    <input type="file" name="cal_banner_pic_field" id="cal_banner_pic_field" class="form-control" id="file" accept="image/*" onchange="preview_special_image1(event)">
                                </div>
                                <div class="col-md-5">
                                    <img src="<?php echo base_url() . 'uploads/' . $cal_special_section_data->image; ?>" id="output_special_image1" onclick="$(#file).click()" style=" height: 150px; width: 150px; border-radius: 10px;" onerror="this.src='<?php echo base_url() ?>assets/admin_assets/dist/img/camera.png';">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <input type="submit" value="Update Content" class="btn btn-primary" name="cal_special_section_content_updt_btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>