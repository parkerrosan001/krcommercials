<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">All Customers</h3>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_SESSION['user_enable_err'])) {
                    ?>
                        <div class="alert alert-danger"><?php echo $_SESSION['user_enable_err'] ?></div>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($_SESSION['user_enable_succ'])) {
                    ?>
                        <div class="alert alert-success"><?php echo $_SESSION['user_enable_succ'] ?></div>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($_SESSION['user_disable_err'])) {
                    ?>
                        <div class="alert alert-danger"><?php echo $_SESSION['user_disable_err'] ?></div>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($_SESSION['user_disable_succ'])) {
                    ?>
                        <div class="alert alert-success"><?php echo $_SESSION['user_disable_succ'] ?></div>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($_SESSION['user_edit_err'])) {
                    ?>
                        <div class="alert alert-danger"><?php echo $_SESSION['user_edit_err'] ?></div>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($_SESSION['user_edit_succ'])) {
                    ?>
                        <div class="alert alert-success"><?php echo $_SESSION['user_edit_succ'] ?></div>
                    <?php
                    }
                    ?>

                    <table id="datatable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Action</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Branch</th>
                                <th>Address</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($users_data) && sizeof($users_data) > 0) {
                                $no = 0;
                                foreach ($users_data as $user) {
                                    $no++;
                            ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td>
                                            <a data-toggle="modal" id="<?php echo $user->acc_id; ?>" base_url="<?php echo base_url(); ?>" class="editUser">
                                                <label class=" btn btn-primary" id="<?php echo $user->acc_id . 'user_edit_link'; ?>">Edit</label>
                                                <i class="fa fa-spinner fa-spin text-primary" style="font-size:18px; display: none;" id="<?php echo $user->acc_id . 'user_edit_waiting'; ?>"></i>
                                            </a>
                                            <?php
                                            if ($user->status == 'Active') {
                                            ?>
                                                <a href="<?php echo base_url() . 'admin/users/disableUser/' . $user->acc_id; ?>" onclick="return confirm('Are you sure to disable this user account?')">
                                                    <label class="btn btn-danger">Disable</label>
                                                </a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="<?php echo base_url() . 'admin/users/enableUser/' . $user->acc_id; ?>" onclick="return confirm('Are you sure to enable this user account?')">
                                                    <label class="btn btn-success">Enable</label>
                                                </a>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $user->user_full_name; ?></td>
                                        <td><?php echo $user->email; ?></td>
                                        <td><?php echo $user->user_phone; ?></td>
                                        <td><?php echo $user->user_branch; ?></td>
                                        <td><?php echo $user->user_address; ?></td>
                                        <td>
                                            <?php
                                            if ($user->status == 'Active') {
                                            ?>
                                                <label class="text-success"><?php echo $user->status; ?></label>
                                            <?php
                                            } else {
                                            ?>
                                                <label class="text-danger"><?php echo $user->status; ?></label>
                                            <?php
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

<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update User</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editUserForm">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="hidden" name="id_field" id="id_field">
                                <input type="hidden" id="base_url_field" name="base_url_field" value="<?php echo base_url(); ?>">
                                <input type="text" name="user_edit_name_field" id="user_edit_name_field" class="form-control" placeholder="enter user's full name" required>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="text" readonly name="user_edit_email_field" id="user_edit_email_field" class="form-control" placeholder="enter user's email address" required>
                            </div>

                            <div class="form-group">
                                <label>Phone #</label>
                                <input type="text" name="user_edit_phone_field" id="user_edit_phone_field" class="form-control" placeholder="enter user's phone" required>
                            </div>
                            <div class="form-group">
                                <label>User Branch</label>
                                <select class="form-control" name="user_edit_branch_field" id="user_edit_branch_field" required>
                                    <option value="">select a branch</option>
                                    <option value="FL">Florida</option>
                                    <option value="CAL">California</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>User Address</label>
                                <textarea name="user_edit_address_field" id="user_edit_address_field" class="form-control" placeholder="enter user's address"></textarea>
                            </div>
                            <div class="form-group">
                                <label>User Status</label>
                                <select class="form-control" name="user_edit_status_field" id="user_edit_status_field" required>
                                    <option value="">select a status</option>
                                    <option value="Active">Active</option>
                                    <option value="In-Active">In-Active</option>
                                </select>
                            </div>
                        </div>

                        <div class="card-footer">
                            <input type="submit" name="user_edit_btn" id="user_edit_btn" class="btn btn-primary" value="Update User Profile">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>