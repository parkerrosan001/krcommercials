<div class="container-fluid">
    <?php
    if (isset($_SESSION['staff_add_err'])) {
    ?>
        <div class="alert alert-danger"><?php echo $_SESSION['staff_add_err'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['staff_add_succ'])) {
    ?>
        <div class="alert alert-success"><?php echo $_SESSION['staff_add_succ'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['staff_delete_err'])) {
    ?>
        <div class="alert alert-danger"><?php echo $_SESSION['staff_delete_err'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['staff_delete_succ'])) {
    ?>
        <div class="alert alert-success"><?php echo $_SESSION['staff_delete_succ'] ?></div>
    <?php
    }
    ?>
    <?php
    if (isset($_SESSION['staff_edit_err'])) {
    ?>
        <div class="alert alert-danger"><?php echo $_SESSION['staff_edit_err'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['staff_edit_succ'])) {
    ?>
        <div class="alert alert-success"><?php echo $_SESSION['staff_edit_succ'] ?></div>
    <?php
    }
    ?>
    <div class="row">
        <div class="col-md-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add New Team Member</h3>
                </div>
                <form enctype="multipart/form-data" action="<?php echo base_url() ?>admin/staff/addStaff" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="full_name_field" id="full_name_field" class="form-control" placeholder="enter full name" required>
                        </div>
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" name="designation_field" id="designation_field" class="form-control" placeholder="enter designation" required>
                        </div>
                        <div class="form-group">
                            <label>Facebook Profile</label>
                            <input type="text" name="facebook_field" id="facebook_field" class="form-control" placeholder="enter facebook profile url">
                        </div>
                        <div class="form-group">
                            <label>Twitter Profile URL</label>
                            <input type="text" name="twitter_field" id="twitter_field" class="form-control" placeholder="enter twitter profile url">
                        </div>
                        <div class="form-group">
                            <label>Google Plus Profile URL</label>
                            <input type="text" name="google_plus_field" id="google_plus_field" class="form-control" placeholder="enter google plus profile url">
                        </div>
                        <div class="form-group">
                            <label>Branch</label>
                            <select name="staff_branch_field" id="staff_branch_field" class="form-control" required>
                                <option value="">select a branch</option>
                                <option value="FL">Florida</option>
                                <option value="CAL">California</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-7">
                                    <label>Employee Image</label>
                                    <input type="file" name="employee_pic_field" id="employee_pic_field" class="form-control" id="file" accept="image/*" onchange="employee_preview_image(event)" required>
                                </div>
                                <div class="col-md-5">
                                    <img src="" id="employee_output_image" onclick="$(#file).click()" style=" height: 150px; width: 150px; border-radius: 10px;" onerror="this.src='<?php echo base_url() ?>assets/admin_assets/dist/img/camera.png';">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <input type="submit" value="Add Team Member" class="btn btn-primary" name="staff_add_btn">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">All Team Members</h3>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Action</th>
                                <th>Image</th>
                                <th>Full Name</th>
                                <th>Designation</th>
                                <th>Facebook</th>
                                <th>Twitter</th>
                                <th>Google Plus</th>
                                <th>Branch</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($staff_data) && sizeof($staff_data) > 0) {
                                $no = 0;
                                foreach ($staff_data as $staff) {
                                    $no = $no + 1;
                            ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td>
                                            <a data-toggle="modal" id="<?php echo $staff->id; ?>" base_url="<?php echo base_url(); ?>" class="editStaff text-success">
                                                <label class="text-primary" id="<?php echo $staff->id . 'staff_edit_link'; ?>">Edit</label>
                                                <i class="fa fa-spinner fa-spin text-primary" style="font-size:18px; display: none;" id="<?php echo $staff->id . 'staff_edit_waiting'; ?>"></i>
                                            </a>
                                            /
                                            <a href="<?php echo base_url() . 'admin/staff/deleteStaff/' . $staff->id; ?>" onclick="return confirm('Are you sure to delete this Team Member?')">
                                                <label class="text-danger">Delete</label>
                                            </a>
                                        </td>
                                        <td>
                                            <img src="<?php echo base_url() . 'uploads/' . $staff->staff_image; ?>" style=" height: 50px; width: 50px; border-radius: 10px;" onerror="this.src='<?php echo base_url() ?>assets/admin_assets/dist/img/camera.png';">
                                        </td>
                                        <td><?php echo $staff->full_name; ?></td>
                                        <td><?php echo $staff->designation; ?></td>
                                        <td><?php echo $staff->facebook; ?></td>
                                        <td><?php echo $staff->twitter; ?></td>
                                        <td><?php echo $staff->google_plus; ?></td>
                                        <td>
                                            <?php
                                            if ($staff->branch == 'CAL') {
                                                echo 'California';
                                            } else {
                                                echo 'Florida';
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

<!-- Edit Item Modal starts here -->

<div class="modal fade" id="editStaffModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Team Member</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editStaffForm">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="hidden" name="id_field" id="id_field">
                                <input type="hidden" id="base_url_field" name="base_url_field" value="<?php echo base_url(); ?>">
                                <input type="text" name="staff_edit_full_name_field" id="staff_edit_full_name_field" class="form-control" placeholder="enter full name" required>
                            </div>
                            <div class="form-group">
                                <label>Designation</label>
                                <input type="text" name="staff_edit_designation_field" id="staff_edit_designation_field" class="form-control" placeholder="enter designation" required>
                            </div>
                            <div class="form-group">
                                <label>Facebook Profile</label>
                                <input type="text" name="staff_edit_facebook_field" id="staff_edit_facebook_field" class="form-control" placeholder="enter facebook profile url">
                            </div>
                            <div class="form-group">
                                <label>Twitter Profile URL</label>
                                <input type="text" name="staff_edit_twitter_field" id="staff_edit_twitter_field" class="form-control" placeholder="enter twitter profile url">
                            </div>
                            <div class="form-group">
                                <label>Google Plus Profile URL</label>
                                <input type="text" name="staff_edit_google_plus_field" id="staff_edit_google_plus_field" class="form-control" placeholder="enter google plus profile url">
                            </div>
                            <div class="form-group">
                                <label>Branch</label>
                                <select name="staff_edit_branch_field" id="staff_edit_branch_field" class="form-control" required>
                                    <option value="">select a branch</option>
                                    <option value="FL">Florida</option>
                                    <option value="CAL">California</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label>Employee Image</label>
                                        <input type="hidden" id="staff_old_pic_field" name="staff_old_pic_field">
                                        <input type="file" name="staff_edit_image_field" id="staff_edit_image_field" class="form-control" id="file" accept="image/*" onchange="preview_image_edit_staff(event)">
                                    </div>
                                    <div class="col-md-5">
                                        <img src="" id="output_image_edit_staff" onclick="$(#file).click()" style=" height: 150px; width: 150px; border-radius: 10px;" onerror="this.src='<?php echo base_url() ?>assets/admin_assets/dist/img/camera.png';">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <input type="submit" name="staff_edit_btn" id="staff_edit_btn" class="btn btn-primary" value="Update Team Member">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Edit Item Modal ends here -->