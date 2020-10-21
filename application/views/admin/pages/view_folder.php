<div class="container-fluid">
    <?php
    if (isset($_SESSION['file_upload_err'])) {
    ?>
        <div class="alert alert-danger"><?php echo $_SESSION['file_upload_err'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['file_upload_succ'])) {
    ?>
        <div class="alert alert-success"><?php echo $_SESSION['file_upload_succ'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['file_delete_err'])) {
    ?>
        <div class="alert alert-danger"><?php echo $_SESSION['file_delete_err'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['file_delete_succ'])) {
    ?>
        <div class="alert alert-success"><?php echo $_SESSION['file_delete_succ'] ?></div>
    <?php
    }
    ?>
    <?php
    if (isset($_SESSION['file_rename_err'])) {
    ?>
        <div class="alert alert-danger"><?php echo $_SESSION['file_rename_err'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['file_rename_succ'])) {
    ?>
        <div class="alert alert-success"><?php echo $_SESSION['file_rename_succ'] ?></div>
    <?php
    }
    ?>
    <div class="row">
        <div class="col-md-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Upload File(s)</h3>
                </div>
                <form action="<?php echo base_url() ?>admin/FileSystem/uploadFiles" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" name="folder_id_field" id="folder_id_field" value="<?php echo $folder_id; ?>">
                            <input type="file" class="form-control" name="images[]" id="files_field" multiple required />
                        </div>
                        <div class="form-group">
                            <label>Branch</label>
                            <select name="branch_field" id="branch_field" class="form-control" required>
                                <option value="">select a branch</option>
                                <option value="FL">Florida</option>
                                <option value="CAL">California</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <input type="submit" value="Upload" class="btn btn-primary" name="files_upload_btn">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Files in Folder</h3>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Action</th>
                                <th>File Name</th>
                                <th>Branch</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($files_data) && sizeof($files_data) > 0) {
                                $no = 0;
                                foreach ($files_data as $files) {
                                    $no = $no + 1;
                            ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td>
                                            <a data-toggle="modal" id="<?php echo $files->id; ?>" base_url="<?php echo $files->display_name; ?>" folder_id="<?php echo $files->folder_id; ?>" branch="<?php echo $files->branch; ?>" class="renameFile text-success">
                                                <label class="text-primary">
                                                    <i class="fa fa-edit"></i>
                                                </label>
                                            </a>
                                            <a href="<?php echo base_url() . 'uploads/' . $files->file_name; ?>" target="_blank">
                                                <label class="text-success">
                                                    <i class="fas fa-download"></i>
                                                </label>
                                            </a>
                                            <a href="<?php echo base_url() . 'admin/FileSystem/deleteFile/' . $files->id . '/' . $files->folder_id; ?>" onclick="return confirm('Are you sure to delete this file?')">
                                                <label class="text-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                </label>
                                            </a>
                                        </td>
                                        <td><?php echo $files->display_name; ?></td>
                                        <td>
                                            <?php
                                            if ($files->branch == 'CAL') {
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

<div class="modal fade" id="editFileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Rename File</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo base_url() ?>admin/FileSystem/renameFile" method="POST" id="editFileForm">
                        <div class="card-body">
                            <div class="form-group">
                                <label>File Name</label>
                                <input type="hidden" name="id_field" id="id_field">
                                <input type="hidden" name="fol_id_field" id="fol_id_field">
                                <input type="text" name="rename_file_name_field" id="rename_file_name_field" class="form-control" placeholder="enter project title" required>
                            </div>
                            <div class="form-group">
                                <label>Branch</label>
                                <select name="folder_edit_branch_field" id="folder_edit_branch_field" class="form-control" required>
                                    <option value="">select a branch</option>
                                    <option value="FL">Florida</option>
                                    <option value="CAL">California</option>
                                </select>
                            </div>
                        </div>

                        <div class="card-footer">
                            <input type="submit" name="rename_file_btn" id="rename_file_btn" class="btn btn-primary" value="Rename File">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Edit Item Modal ends here -->