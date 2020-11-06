<div class="container-fluid">
    <?php
    if (isset($_SESSION['fl_slider_content_err'])) {
    ?>
        <div class="alert alert-danger"><?php echo $_SESSION['fl_slider_content_err'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['fl_slider_content_succ'])) {
    ?>
        <div class="alert alert-success"><?php echo $_SESSION['fl_slider_content_succ'] ?></div>
    <?php
    }
    ?>
    <?php
    if (isset($_SESSION['cal_slider_content_err'])) {
    ?>
        <div class="alert alert-danger"><?php echo $_SESSION['cal_slider_content_err'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['cal_slider_content_succ'])) {
    ?>
        <div class="alert alert-success"><?php echo $_SESSION['cal_slider_content_succ'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['slide_delete_err'])) {
    ?>
        <div class="alert alert-danger"><?php echo $_SESSION['slide_delete_err'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['slide_delete_succ'])) {
    ?>
        <div class="alert alert-success"><?php echo $_SESSION['slide_delete_succ'] ?></div>
    <?php
    }
    ?>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Slider Content Florida Branch</h3>
                        </div>
                        <form enctype="multipart/form-data" action="<?php echo base_url() ?>admin/content/addFlSlider" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Slider Heading <span class="text-danger"> ( Max. 35 Characters )</span></label>
                                    <input type="text" name="heading_fl_field" id="heading_fl_field" class="form-control" placeholder="enter slider heading" required maxlength="35">
                                </div>
                                <div class="form-group">
                                    <label>Slider Sub-title Text <span class="text-danger"> ( Max. 200 Characters )</span></label>
                                    <textarea name="sub_title_fl_field" id="sub_title_fl_field" placeholder="enter slider sub-title text" rows="5" class="form-control" required required maxlength="200"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <label>Slider Image</label>
                                            <input type="file" name="slider_image_fl_field" id="slider_image_fl_field" class="form-control" accept="image/*" onchange="preview_slider_image(event)">
                                        </div>
                                        <div class="col-md-5">
                                            <img src="" id="output_slider_image" onclick="$(#slider_image_fl_field).click()" style=" height: 150px; width: 150px; border-radius: 10px;" onerror="this.src='<?php echo base_url() ?>assets/admin_assets/dist/img/camera.png';">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" name="add_fl_slider_btn" id="add_fl_slider_btn" value="Add Slider" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">All Slides Florida Branch</h3>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Action</th>
                                        <th>Image</th>
                                        <th>Heading</th>
                                        <th>Sub-Tite</th>
                                        <th>Branch</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($fl_sliders_data) && sizeof($fl_sliders_data) > 0) {
                                        $no = 0;
                                        foreach ($fl_sliders_data as $fl_slider) {
                                            $no++;
                                    ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url() . 'admin/content/deleteSlide/' . $fl_slider->id; ?>" onclick="return confirm('Are you sure to delete this Slide?')">
                                                        <label class="text-danger">Delete</label>
                                                    </a>
                                                </td>
                                                <td>
                                                    <img src="<?php echo base_url() . 'uploads/' . $fl_slider->slider_image; ?>" style=" height: 50px; width: 50px; border-radius: 10px;" onerror="this.src='<?php echo base_url() ?>assets/admin_assets/dist/img/camera.png';">
                                                </td>
                                                <td><?php echo $fl_slider->slider_heading; ?></td>
                                                <td><?php echo $fl_slider->slider_sub_text; ?></td>
                                                <td>
                                                    <?php
                                                    if ($fl_slider->branch == 'FL') {
                                                        echo 'Florida';
                                                    } else {
                                                        echo 'California';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Slider Content California Branch</h3>
                        </div>
                        <form enctype="multipart/form-data" action="<?php echo base_url() ?>admin/content/addCalSlider" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Slider Heading <span class="text-danger"> ( Max. 35 Characters )</span></label>
                                    <input type="text" name="heading_cal_field" id="heading_cal_field" class="form-control" placeholder="enter slider heading" required maxlength="35">
                                </div>
                                <div class="form-group">
                                    <label>Slider Sub-title Text <span class="text-danger"> ( Max. 200 Characters )</span></label>
                                    <textarea name="sub_title_cal_field" id="sub_title_cal_field" placeholder="enter slider sub-title text" rows="5" class="form-control" required required maxlength="200"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <label>Slider Image</label>
                                            <input type="file" name="slider_image_cal_field" id="slider_image_cal_field" class="form-control" accept="image/*" onchange="preview_slider_image1(event)">
                                        </div>
                                        <div class="col-md-5">
                                            <img src="" id="output_slider_image1" onclick="$(#slider_image_cal_field).click()" style=" height: 150px; width: 150px; border-radius: 10px;" onerror="this.src='<?php echo base_url() ?>assets/admin_assets/dist/img/camera.png';">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" name="add_cal_slider_btn" id="add_cal_slider_btn" value="Add Slider" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">All Slides California Branch</h3>
                        </div>
                        <div class="card-body">
                            <table id="datatable1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Action</th>
                                        <th>Image</th>
                                        <th>Heading</th>
                                        <th>Sub-Tite</th>
                                        <th>Branch</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($cal_sliders_data) && sizeof($cal_sliders_data) > 0) {
                                        $no = 0;
                                        foreach ($cal_sliders_data as $cal_slider) {
                                            $no++;
                                    ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url() . 'admin/content/deleteSlide/' . $cal_slider->id; ?>" onclick="return confirm('Are you sure to delete this Slide?')">
                                                        <label class="text-danger">Delete</label>
                                                    </a>
                                                </td>
                                                <td>
                                                    <img src="<?php echo base_url() . 'uploads/' . $cal_slider->slider_image; ?>" style=" height: 50px; width: 50px; border-radius: 10px;" onerror="this.src='<?php echo base_url() ?>assets/admin_assets/dist/img/camera.png';">
                                                </td>
                                                <td><?php echo $cal_slider->slider_heading; ?></td>
                                                <td><?php echo $cal_slider->slider_sub_text; ?></td>
                                                <td>
                                                    <?php
                                                    if ($cal_slider->branch == 'FL') {
                                                        echo 'Florida';
                                                    } else {
                                                        echo 'California';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>