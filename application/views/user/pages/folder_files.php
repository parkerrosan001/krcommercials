<!-- breadcumb-area start -->
<div class="breadcumb-area black-opacity" style="background: url('<?php echo base_url() ?>assets/images/bg/6.jpg') no-repeat;background-size: cover">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcumb-wrap">
                    <h2 class="white"><?php echo $folder_name; ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcumb-area end -->
<!-- service-area start -->
<div class="service-area" id="projects">
    <div class="container">
        <div class="row">
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
            <div class="col-md-12 row m-0 mb-3 p-0">
                <div class="col-md-6">
                    <form action="<?php echo base_url() ?>FileSystem/searchFiles" method="POST">
                        <i class="fa fa-search search-folder-icon" aria-hidden="true"></i>
                        <input type="hidden" value="<?php echo $folder_id; ?>" name="folder_id_field" id="folder_id_field" />
                        <input type="text" name="search_field" id="search_field" class="form-control border-transparent form-focus-none" placeholder="type keywords and press enter to search for files" onchange="this.form.submit();">
                    </form>
                </div>
                <div class="col-md-2 col-6 text-right  mt-4 mt-md-0">
                    <form action="<?php echo base_url() ?>FileSystem/filterFiles" method="POST">
                        <input type="hidden" value="<?php echo $folder_id; ?>" name="folder_id_field" id="folder_id_field" />
                        <select class="form-control sort-by" onchange="this.form.submit();" name="sort_field" id="sort_field">
                            <option value="ASC_NAME">Sort By</option>
                            <option value="ASC_NAME">A-Z</option>
                            <option value="DESC_NAME">Z-A</option>
                            <option value="DESC_DATE">Latest to Oldest</option>
                            <option value="ASC_DATE">Oldest to Latest</option>
                        </select>
                    </form>
                </div>
                <div class="col-md-2 col-6 text-right  mt-4 mt-md-0">
                    <a href="<?php echo base_url() . 'FileSystem/viewFolder/' . $folder_id ?>" class="view-btn cursor"> Reset Filters </a>
                </div>
                <div class="col-md-2 col-6  text-right  mt-4 mt-md-0">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="view-btn cursor" data-toggle="modal" data-target="#upload-file"> + Upload File</span>
                        </div>
                        <div class="col-md-12 mt-4">
                            <!-- <span class="view-btn cursor createSubFolder" data-toggle="modal" data-target="#create-folder"> + Create Folder </span> -->
                            <a data-toggle="modal" parrent_folder_id="<?php echo $folder_id; ?>" class="view-btn cursor createSubFolder">
                                <span>+ Create Folder</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="<?php echo base_url() ?>FileSystem"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back to folders</a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 p-0 row m-0">
                <?php
                if (!empty($files_data) && sizeof($files_data)) {
                    foreach ($files_data as $file) {
                ?>
                        <div class="col-lg-3 col-12">
                            <div class="recent-files">
                                <div class="recentf-inner">
                                    <div class="r-file-title">
                                        <div class="r-file-icon">
                                            <?php
                                            if ($file->type == 'Folder') {
                                            ?>
                                                <i class="fa fa-folder-open" aria-hidden="true"></i>
                                            <?php
                                            } else if ($file->file_ext == 'pdf') {
                                            ?>
                                                <i class="fa fa-file-pdf-o" aria-hidden="true" style="color: #36c684"></i>
                                            <?php
                                            } else if ($file->file_ext == 'xlxs') {
                                            ?>
                                                <i class="fa fa-file-excel-o" aria-hidden="true" style="color: #36c684"></i>
                                            <?php
                                            } else if ($file->file_ext == 'doc') {
                                            ?>
                                                <i class="fa fa-file-word-o" aria-hidden="true" style="color: #36c684"></i>
                                            <?php
                                            } else if ($file->file_ext == 'ppt') {
                                            ?>
                                                <i class="fa fa-file-powerpoint-o" aria-hidden="true" style="color: #36c684"></i>
                                            <?php
                                            } else if ($file->file_ext == 'png' || $file->file_ext == 'jpg' || $file->file_ext == 'jpeg') {
                                            ?>
                                                <i class="fa fa-file-image-o" aria-hidden="true" style="color: #36c684"></i>
                                            <?php
                                            } else {
                                            ?>
                                                <i class="fa fa-file" aria-hidden="true"></i>
                                            <?php
                                            }

                                            ?>

                                        </div>
                                        <div class="r-file-name">
                                            <div class="r-file-name-text">
                                                <?php
                                                if ($file->type === 'Folder') {
                                                ?>
                                                    <a href="<?php echo base_url() . 'FileSystem/viewSubFolder/' . $file->folder_id; ?>" class="title"><?php echo $file->display_name; ?></a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a href="<?php echo base_url() . 'uploads/' . $file->file_name ?>" target="_blank" class="title"><?php echo $file->display_name; ?></a>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="r-file-desc">
                                        <li class="date">
                                            <?php
                                            $dt = new DateTime($file->created_at);
                                            echo $dt->format('M-d-Y');
                                            ?>

                                        </li>
                                        <?php
                                        if ($file->type !== 'Folder') {
                                        ?>
                                            <li class="size">
                                                <?php
                                                $precision = 2;
                                                $base = log($file->file_size, 1024);
                                                $suffixes = array('', 'KB', 'MB', 'GB', 'TB');

                                                echo round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
                                                ?>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="r-file-actions">
                                    <div class="dropdown p-0">
                                        <span class="dropdown-toggle btn btn-sm btn-icon btn-trigger cursor" data-toggle="dropdown">
                                            <i class="fa fa-ellipsis-h"></i>
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right p-0">
                                            <ul class="link-list-plain no-bdr">
                                                <?php
                                                if ($file->type === 'Folder') {
                                                ?>
                                                    <li>
                                                        <a href="<?php echo base_url() . 'FileSystem/viewSubFolder/' . $file->folder_id; ?>" data-toggle="modal"><i class="fa fa-eye" aria-hidden="true"></i><span>Open</span>
                                                        </a>
                                                    </li>
                                                <?php
                                                } else {
                                                ?>
                                                    <li>
                                                        <a href="<?php echo base_url() . 'uploads/' . $file->file_name ?>" class="file-dl-toast"><i class="fa fa-download" aria-hidden="true"></i><span>Download</span></a>
                                                    </li>
                                                <?php
                                                }
                                                ?>

                                                <li>
                                                    <a data-toggle="modal" id="<?php echo $file->id; ?>" base_url="<?php echo $file->display_name; ?>" folder_id="<?php echo $file->folder_id; ?>" class="editFile">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i> <span>Rename</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url() . 'FileSystem/deleteFile/' . $file->id . '/' . $file->folder_id; ?>" onclick="return confirm('Are you sure to delete this file?')">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                        <span>Delete</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <h1 class="text-danger text-center">no file found</h1>
                <?php
                }
                ?>
            </div>

        </div>
    </div>
</div>
<!-- service-area end -->

<!--Upload Files -->
<div id="upload-file" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload File</h5>
                <button type="button" class="close cursor" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?php echo base_url() ?>FileSystem/uploadFiles" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" value="<?php echo $folder_id; ?>" name="folder_id_field" id="folder_id_field" />
                    <input type="file" class="form-control" name="images[]" id="files_field" multiple required />
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default view-btn cursor" name="files_upload_btn" id="files_upload_btn">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Upload Files-->

<!--Rename File -->
<div id="renameFile" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <form method="post" action="<?php echo base_url() ?>FileSystem/renameFile" id="renameFileForm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Rename File</h5>
                    <button type="button" class="close cursor" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <label>File Name</label>
                    <input type="text" name="id_field" id="id_field">
                    <input type="text" name="fol_id_field" id="fol_id_field">
                    <input class="form-control" type="text" name="rename_file_name_field" id="rename_file_name_field" placeholder="enter file name" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default view-btn cursor" name="rename_file_btn" id="rename_file_btn">Rename File</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Rename File-->

<!--Create Folder -->
<div id="SubFolder" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <form method="post" action="<?php echo base_url() ?>FileSystem/createSubFolder" id="SubFolderForm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Sub-Folder</h5>
                    <button type="button" class="close cursor" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <label>Sub-Folder Name</label>
                    <input type="text" name="parrent_folder_field" id="parrent_folder_field">
                    <input class="form-control" type="text" name="folder_name_field" id="folder_name_field" placeholder="enter folder name" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default view-btn cursor" name="create_sub_folder_btn" id="create_sub_folder_btn">Create Sub-Folder</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Create Folder-->