<div class="container-fluid">
    <?php
    if (isset($_SESSION['cal_project_page_content_err'])) {
    ?>
        <div class="alert alert-danger"><?php echo $_SESSION['cal_project_page_content_err'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['cal_project_page_content_succ'])) {
    ?>
        <div class="alert alert-success"><?php echo $_SESSION['cal_project_page_content_succ'] ?></div>
    <?php
    }
    ?>
    <?php
    if (isset($_SESSION['fl_project_page_content_err'])) {
    ?>
        <div class="alert alert-danger"><?php echo $_SESSION['fl_project_page_content_err'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['fl_project_page_content_succ'])) {
    ?>
        <div class="alert alert-success"><?php echo $_SESSION['fl_project_page_content_succ'] ?></div>
    <?php
    }
    ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Project Page Content Florida Branch</h3>
                </div>
                <form enctype="multipart/form-data" action="<?php echo base_url() ?>admin/projects/updateFlProjectPageContent" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Page Heading</label>
                            <input type="hidden" value="<?php echo $fl_page_data->id; ?>" name="fl_id_field" id="fl_id_field">
                            <input type="text" name="fl_page_heading_field" id="fl_page_heading_field" class="form-control" placeholder="enter page heading" value="<?php echo $fl_page_data->page_heading; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Sub-Text</label>
                            <textarea name="fl_sub_text_field" id="fl_sub_text_field" rows="5" class="form-control" required><?php echo $fl_page_data->sub_text; ?></textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-7">
                                    <label>Banner Image</label>
                                    <input type="hidden" id="fl_banner_old_pic_field" name="fl_banner_old_pic_field" value="<?php echo $fl_page_data->banner_image; ?>">
                                    <input type="file" name="fl_banner_pic_field" id="fl_banner_pic_field" class="form-control" id="file" accept="image/*" onchange="fl_preview_image(event)">
                                </div>
                                <div class="col-md-5">
                                    <img src="<?php echo base_url() . 'uploads/' . $fl_page_data->banner_image; ?>" id="fl_output_image" onclick="$(#file).click()" style=" height: 150px; width: 150px; border-radius: 10px;" onerror="this.src='<?php echo base_url() ?>assets/admin_assets/dist/img/camera.png';">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <input type="submit" value="Update Content" class="btn btn-primary" name="fl_project_content_updt_btn">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Project Page Content California Branch</h3>
                </div>
                <form enctype="multipart/form-data" action="<?php echo base_url() ?>admin/projects/updateCALProjectPageContent" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Page Heading</label>
                            <input type="hidden" value="<?php echo $cal_page_data->id; ?>" name="cal_id_field" id="cal_id_field">
                            <input type="text" name="cal_page_heading_field" id="cal_page_heading_field" class="form-control" placeholder="enter page heading" value="<?php echo $cal_page_data->page_heading; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Sub-Text</label>
                            <textarea name="cal_sub_text_field" id="cal_sub_text_field" rows="5" class="form-control" required><?php echo $cal_page_data->sub_text; ?></textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-7">
                                    <label>Banner Image</label>
                                    <input type="hidden" id="cal_banner_old_pic_field" name="cal_banner_old_pic_field" value="<?php echo $cal_page_data->banner_image; ?>">
                                    <input type="file" name="cal_banner_pic_field" id="cal_banner_pic_field" class="form-control" id="file" accept="image/*" onchange="cal_preview_image(event)">
                                </div>
                                <div class="col-md-5">
                                    <img src="<?php echo base_url() . 'uploads/' . $cal_page_data->banner_image; ?>" id="cal_output_image" onclick="$(#file).click()" style=" height: 150px; width: 150px; border-radius: 10px;" onerror="this.src='<?php echo base_url() ?>assets/admin_assets/dist/img/camera.png';">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <input type="submit" value="Update Content" class="btn btn-primary" name="cal_project_content_updt_btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>