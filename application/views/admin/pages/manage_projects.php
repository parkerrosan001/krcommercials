<div class="container-fluid">
    <?php
    if (isset($_SESSION['project_add_err'])) {
    ?>
        <div class="alert alert-danger"><?php echo $_SESSION['project_add_err'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['project_add_succ'])) {
    ?>
        <div class="alert alert-success"><?php echo $_SESSION['project_add_succ'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['project_delete_err'])) {
    ?>
        <div class="alert alert-danger"><?php echo $_SESSION['project_delete_err'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['project_delete_succ'])) {
    ?>
        <div class="alert alert-success"><?php echo $_SESSION['project_delete_succ'] ?></div>
    <?php
    }
    ?>
    <?php
    if (isset($_SESSION['project_edit_err'])) {
    ?>
        <div class="alert alert-danger"><?php echo $_SESSION['project_edit_err'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['project_edit_succ'])) {
    ?>
        <div class="alert alert-success"><?php echo $_SESSION['project_edit_succ'] ?></div>
    <?php
    }
    ?>
    <div class="row">
        <div class="col-md-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add New Project</h3>
                </div>
                <form enctype="multipart/form-data" action="<?php echo base_url() ?>admin/projects/addProject" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Project Title</label>
                            <input type="text" name="project_title_field" id="project_title_field" class="form-control" placeholder="enter project title" required>
                        </div>
                        <div class="form-group">
                            <label>Branch</label>
                            <select name="project_branch_field" id="project_branch_field" class="form-control" required>
                                <option value="">select a branch</option>
                                <option value="FL">Florida</option>
                                <option value="CAL">California</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Project Description <span class="text-danger"> ( Max. 200 Characters )</span></label>
                            <textarea name="project_description_field" id="project_description_field" rows="5" class="form-control" required required maxlength="200"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-7">
                                    <label>Project Image</label>
                                    <input type="file" name="project_pic_field" id="project_pic_field" class="form-control" id="file" accept="image/*" onchange="project_preview_image(event)" required>
                                </div>
                                <div class="col-md-5">
                                    <img src="" id="project_output_image" onclick="$(#file).click()" style=" height: 150px; width: 150px; border-radius: 10px;" onerror="this.src='<?php echo base_url() ?>assets/admin_assets/dist/img/camera.png';">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <input type="submit" value="Add Project" class="btn btn-primary" name="project_add_btn">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">All Projects</h3>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Action</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Branch</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($projects_data) && sizeof($projects_data) > 0) {
                                $no = 0;
                                foreach ($projects_data as $project) {
                                    $no = $no + 1;
                            ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td>
                                            <a data-toggle="modal" id="<?php echo $project->id; ?>" base_url="<?php echo base_url(); ?>" class="editProject text-success">
                                                <label class="text-primary" id="<?php echo $project->id . 'project_edit_link'; ?>">Edit</label>
                                                <i class="fa fa-spinner fa-spin text-primary" style="font-size:18px; display: none;" id="<?php echo $project->id . 'project_edit_waiting'; ?>"></i>
                                            </a>
                                            /
                                            <a href="<?php echo base_url() . 'admin/projects/deleteProject/' . $project->id; ?>" onclick="return confirm('Are you sure to delete this Project?')">
                                                <label class="text-danger">Delete</label>
                                            </a>
                                        </td>
                                        <td>
                                            <img src="<?php echo base_url() . 'uploads/' . $project->project_image; ?>" style=" height: 50px; width: 50px; border-radius: 10px;" onerror="this.src='<?php echo base_url() ?>assets/admin_assets/dist/img/camera.png';">
                                        </td>
                                        <td><?php echo $project->project_title; ?></td>
                                        <td>
                                            <?php
                                            if ($project->branch == 'CAL') {
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

<div class="modal fade" id="editProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Project</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editProjectForm">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Project Title</label>
                                <input type="hidden" name="id_field" id="id_field">
                                <input type="hidden" id="base_url_field" name="base_url_field" value="<?php echo base_url(); ?>">
                                <input type="text" name="project_edit_title_field" id="project_edit_title_field" class="form-control" placeholder="enter project title" required>
                            </div>
                            <div class="form-group">
                                <label>Branch</label>
                                <select name="project_edit_branch_field" id="project_edit_branch_field" class="form-control" required>
                                    <option value="">select a branch</option>
                                    <option value="FL">Florida</option>
                                    <option value="CAL">California</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Project Description <span class="text-danger"> ( Max. 200 Characters )</span></label>
                                <textarea name="project_edit_description_field" id="project_edit_description_field" rows="5" class="form-control" required maxlength="200"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label>Project Image</label>
                                        <input type="hidden" id="project_old_pic_field" name="project_old_pic_field">
                                        <input type="file" name="project_edit_image_field" id="project_edit_image_field" class="form-control" id="file" accept="image/*" onchange="preview_image_edit_project(event)">
                                    </div>
                                    <div class="col-md-5">
                                        <img src="" id="output_image_edit_project" onclick="$(#file).click()" style=" height: 150px; width: 150px; border-radius: 10px;" onerror="this.src='<?php echo base_url() ?>assets/admin_assets/dist/img/camera.png';">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <input type="submit" name="project_edit_btn" id="project_edit_btn" class="btn btn-primary" value="Update Project">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Edit Item Modal ends here -->