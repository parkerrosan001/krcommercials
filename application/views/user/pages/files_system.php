<!-- breadcumb-area start -->
<div class="breadcumb-area black-opacity" style="background: url('<?php echo base_url() ?>assets/images/bg/6.jpg') no-repeat;background-size: cover">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcumb-wrap">
                    <h2 class="white">File System</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcumb-area end -->
<div class="service-area" id="projects">
    <div class="container">
        <div class="row mb-5">
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
            <div class="col-md-12">
                <h4>My Folders</h4>
            </div>
            <div class="col-md-12 row m-0 mb-3 p-0">
                <div class="col-md-6">
                    <form action="<?php echo base_url() ?>FileSystem/searchFolders" method="POST">
                        <i class="fa fa-search search-folder-icon" aria-hidden="true"></i>
                        <input type="text" name="search_field" id="search_field" class="form-control border-transparent form-focus-none" placeholder="type keywords and press enter to search for folders" onchange="this.form.submit();">
                    </form>
                </div>
                <div class="col-md-2 col-6 text-right  mt-4 mt-md-0">
                    <form action="<?php echo base_url() ?>FileSystem/filterFolders" method="POST">
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
                    <a href="<?php echo base_url() ?>FileSystem" class="view-btn cursor"> Reset Filters </a>
                </div>
                <div class="col-md-2 col-6 text-right  mt-4 mt-md-0">
                    <span class="view-btn cursor" data-toggle="modal" data-target="#create-folder"> + Create Folder </span>
                </div>
            </div>

            <?php
            if (!empty($folders_data) && sizeof($folders_data)) {
                foreach ($folders_data as $folder) {
            ?>
                    <div class="col-sm-6 col-6 col-lg-2">
                        <div class="my-folder">
                            <div class="text-right">
                                <div class="r-file-actions">
                                    <div class="dropdown p-0">
                                        <span class="dropdown-toggle btn btn-sm btn-icon btn-trigger cursor" data-toggle="dropdown">
                                            <i class="fa fa-ellipsis-h"></i>
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right p-0">
                                            <ul class="link-list-plain no-bdr">
                                                <li>
                                                    <a href="<?php echo base_url() . 'FileSystem/viewFolder/' . $folder->id; ?>" data-toggle="modal"><i class="fa fa-eye" aria-hidden="true"></i><span>Open</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-toggle="modal" id="<?php echo $folder->id; ?>" base_url="<?php echo $folder->folder_name; ?>" class="editFolder">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i> <span>Rename</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url() . 'FileSystem/deleteFolder/' . $folder->id; ?>" onclick="return confirm('Are you sure to delete this folder? All Files inside this folder will be lost.')">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                        <span>Delete</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="folder-icon">
                                <a href="<?php echo base_url() . 'FileSystem/viewFolder/' . $folder->id; ?>"> <i class="fa fa-folder" aria-hidden="true"></i></a>
                            </div>
                            <div class="folder-name">
                                <a href="<?php echo base_url() . 'FileSystem/viewFolder/' . $folder->id; ?>"> <span class="folder-title"><?php echo $folder->folder_name; ?></span></a>
                                <br>
                                <span>
                                    <?php
                                    $dt = new DateTime($folder->created_at);
                                    echo $dt->format('M-d-Y');
                                    ?>
                                </span>
                            </div>
                        </div>

                    </div>
                <?php
                }
            } else {
                ?>
                <h1 class="text-danger text-center">no folder yet created</h1>
            <?php
            }
            ?>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12 p-0 row m-0">
                <div class="col-md-12 mt-3">
                    <h4>Recent Files</h4>
                </div>
                <?php
                if (!empty($recent_files_data) && sizeof($recent_files_data)) {
                    foreach ($recent_files_data as $file) {
                ?>
                        <div class="col-lg-3 col-12">
                            <div class="recent-files">
                                <div class="recentf-inner">
                                    <div class="r-file-title">
                                        <div class="r-file-icon">
                                            <?php
                                            if ($file->file_ext == 'pdf') {
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
                                                <a href="<?php echo base_url() . 'uploads/' . $file->file_name ?>" target="_blank" class="title"><?php echo $file->display_name; ?></a>
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
                                        <li class="size">
                                            <?php
                                            $precision = 2;
                                            $base = log($file->file_size, 1024);
                                            $suffixes = array('', 'KB', 'MB', 'GB', 'TB');

                                            echo round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="r-file-actions">
                                    <div class="dropdown p-0">
                                        <span class="dropdown-toggle btn btn-sm btn-icon btn-trigger cursor" data-toggle="dropdown">
                                            <i class="fa fa-ellipsis-h"></i>
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right p-0">
                                            <ul class="link-list-plain no-bdr">
                                                <li>
                                                    <a href="<?php echo base_url() . 'uploads/' . $file->file_name ?>" class="file-dl-toast"><i class="fa fa-download" aria-hidden="true"></i><span>Download</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>

        </div>
    </div>
</div>


<!--Create Folder -->
<div id="create-folder" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <form method="post" action="<?php echo base_url() ?>FileSystem/createFolder">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Folder</h5>
                    <button type="button" class="close cursor" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <label>Folder Name</label>
                    <input class="form-control" type="text" name="folder_name_field" id="folder_name_field" placeholder="enter folder name" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default view-btn cursor" name="create_folder_btn" id="create_folder_btn">Create Folder</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Create Folder-->

<!--Create Folder -->
<div id="renameFolder" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <form method="post" action="<?php echo base_url() ?>FileSystem/renameFolder" id="renameFolderForm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Rename Folder</h5>
                    <button type="button" class="close cursor" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <label>Folder Name</label>
                    <input type="hidden" name="id_field" id="id_field">
                    <input class="form-control" type="text" name="rename_folder_name_field" id="rename_folder_name_field" placeholder="enter folder name" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default view-btn cursor" name="rename_folder_btn" id="rename_folder_btn">Rename Folder</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Create Folder-->