<div class="container-fluid">
    <?php
    if (isset($_SESSION['services_add_err'])) {
    ?>
        <div class="alert alert-danger"><?php echo $_SESSION['services_add_err'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['services_add_succ'])) {
    ?>
        <div class="alert alert-success"><?php echo $_SESSION['services_add_succ'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['services_delete_err'])) {
    ?>
        <div class="alert alert-danger"><?php echo $_SESSION['services_delete_err'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['services_delete_succ'])) {
    ?>
        <div class="alert alert-success"><?php echo $_SESSION['services_delete_succ'] ?></div>
    <?php
    }
    ?>
    <?php
    if (isset($_SESSION['services_edit_err'])) {
    ?>
        <div class="alert alert-danger"><?php echo $_SESSION['services_edit_err'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['services_edit_succ'])) {
    ?>
        <div class="alert alert-success"><?php echo $_SESSION['services_edit_succ'] ?></div>
    <?php
    }
    ?>
    <div class="row">
        <div class="col-md-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add New Service</h3>
                </div>
                <form enctype="multipart/form-data" action="<?php echo base_url() ?>admin/services/addServices" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Service Type</label>
                            <select name="services_type_field" id="services_type_field" class="form-control" required>
                                <option value="">select a services type</option>
                                <option value="Project Services">Project Services</option>
                                <option value="Skilled Trade Services">Skilled Trade Services</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Service Title</label>
                            <input type="text" name="services_title_field" id="services_title_field" class="form-control" placeholder="enter service title" required>
                        </div>
                        <div class="form-group">
                            <label>Branch</label>
                            <select name="services_branch_field" id="services_branch_field" class="form-control" required>
                                <option value="">select a branch</option>
                                <option value="FL">Florida</option>
                                <option value="CAL">California</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Service Description <span class="text-danger"> ( Max. 200 Characters )</span></label>
                            <textarea name="services_description_field" id="services_description_field" rows="5" class="form-control" required maxlength="200"></textarea>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <input type="submit" value="Add Services" class="btn btn-primary" name="services_add_btn">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">All Services</h3>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Action</th>
                                <th>Service Type</th>
                                <th>Service Title</th>
                                <th>Branch</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($services_data) && sizeof($services_data) > 0) {
                                $no = 0;
                                foreach ($services_data as $service) {
                                    $no = $no + 1;
                            ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td>
                                            <a data-toggle="modal" id="<?php echo $service->id; ?>" base_url="<?php echo base_url(); ?>" class="editService text-success">
                                                <label class="text-primary" id="<?php echo $service->id . 'service_edit_link'; ?>">Edit</label>
                                                <i class="fa fa-spinner fa-spin text-primary" style="font-size:18px; display: none;" id="<?php echo $service->id . 'service_edit_waiting'; ?>"></i>
                                            </a>
                                            /
                                            <a href="<?php echo base_url() . 'admin/services/deleteService/' . $service->id; ?>" onclick="return confirm('Are you sure to delete this Service?')">
                                                <label class="text-danger">Delete</label>
                                            </a>
                                        </td>
                                        <td><?php echo $service->service_type; ?></td>
                                        <td><?php echo $service->service_title; ?></td>
                                        <td>
                                            <?php
                                            if ($service->branch == 'CAL') {
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

<div class="modal fade" id="editServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Services</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editServicesForm">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Service Type</label>
                                <select name="services_edit_type_field" id="services_edit_type_field" class="form-control" required>
                                    <option value="">select a services type</option>
                                    <option value="Project Services">Project Services</option>
                                    <option value="Skilled Trade Services">Skilled Trade Services</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Service Title</label>
                                <input type="hidden" name="id_field" id="id_field">
                                <input type="hidden" id="base_url_field" name="base_url_field" value="<?php echo base_url(); ?>">
                                <input type="text" name="service_edit_title_field" id="service_edit_title_field" class="form-control" placeholder="enter service title" required>
                            </div>
                            <div class="form-group">
                                <label>Branch</label>
                                <select name="service_edit_branch_field" id="service_edit_branch_field" class="form-control" required>
                                    <option value="">select a branch</option>
                                    <option value="FL">Florida</option>
                                    <option value="CAL">California</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Service Description <span class="text-danger"> ( Max. 200 Characters )</span></label>
                                <textarea name="service_edit_description_field" id="service_edit_description_field" rows="5" class="form-control" required maxlength="200"></textarea>
                            </div>
                        </div>

                        <div class="card-footer">
                            <input type="submit" name="service_edit_btn" id="service_edit_btn" class="btn btn-primary" value="Update Services">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Edit Item Modal ends here -->