<div class="container-fluid">
    <?php
    if (isset($_SESSION['folder_err'])) {
    ?>
        <div class="alert alert-danger"><?php echo $_SESSION['folder_err'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['folder_succ'])) {
    ?>
        <div class="alert alert-success"><?php echo $_SESSION['folder_succ'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['folder_rename_err'])) {
    ?>
        <div class="alert alert-danger"><?php echo $_SESSION['folder_rename_err'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['folder_rename_succ'])) {
    ?>
        <div class="alert alert-success"><?php echo $_SESSION['folder_rename_succ'] ?></div>
    <?php
    }
    ?>
    <?php
    if (isset($_SESSION['folder_delete_err'])) {
    ?>
        <div class="alert alert-danger"><?php echo $_SESSION['folder_delete_err'] ?></div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['folder_delete_succ'])) {
    ?>
        <div class="alert alert-success"><?php echo $_SESSION['folder_delete_succ'] ?></div>
    <?php
    }
    ?>
    <div class="row">
        <div class="col-md-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Folder</h3>
                </div>
                <form enctype="multipart/form-data" action="<?php echo base_url() ?>admin/FileSystem/createFolder" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Folder Name</label>
                            <input type="text" name="folder_name_field" id="folder_name_field" class="form-control" placeholder="enter folder name" required>
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
                        <input type="submit" value="Create Folder" class="btn btn-primary" name="create_folder_btn">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">All Folders</h3>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Action</th>
                                <th>Folder Name</th>
                                <th>Branch</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($folders_data) && sizeof($folders_data) > 0) {
                                $no = 0;
                                foreach ($folders_data as $folder) {
                                    $no = $no + 1;
                            ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td>
                                            <a data-toggle="modal" id="<?php echo $folder->id; ?>" base_url="<?php echo $folder->folder_name; ?>" branch="<?php echo $folder->branch; ?>" class="renameFolder text-success">
                                                <label class="text-primary">
                                                    <i class="fa fa-edit"></i>
                                                </label>
                                            </a>
                                            
                                            <a href="<?php echo base_url() . 'admin/FileSystem/viewFolder/' . $folder->id; ?>">
                                                <label class="text-success">
                                                    <i class="fas fa-eye"></i>
                                                </label>
                                            </a>
                                            
                                            <a href="<?php echo base_url() . 'admin/FileSystem/deleteFolder/' . $folder->id; ?>" onclick="return confirm('Are you sure to delete this folder? All Files inside this folder will be lost.')">
                                                <label class="text-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                </label>
                                            </a>
                                        </td>
                                        <td><?php echo $folder->folder_name; ?></td>
                                        <td>
                                            <?php
                                            if ($folder->branch == 'CAL') {
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

<div class="modal fade" id="editFolderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Rename Folder</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo base_url() ?>admin/FileSystem/renameFolder" method="POST" id="editFolderForm">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Folder Name</label>
                                <input type="hidden" name="id_field" id="id_field">
                                <input type="text" name="rename_folder_name_field" id="rename_folder_name_field" class="form-control" placeholder="enter project title" required>
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
                            <input type="submit" name="rename_folder_btn" id="rename_folder_btn" class="btn btn-primary" value="Rename Folder">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Edit Item Modal ends here -->