<!-- breadcumb-area start -->
<div class="breadcumb-area black-opacity" style="background: url('<?php echo base_url() ?>assets/images/bg/6.jpg') no-repeat;background-size: cover">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcumb-wrap">
                    <h2 class="white">My Files</h2>
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
            <div class="col-md-12 row m-0 mb-3 p-0">
                <div class="col-md-8">
                    <form action="<?php echo base_url() ?>filesystem/searchFiles" method="POST">
                        <i class="fa fa-search search-folder-icon" aria-hidden="true"></i>
                        <input type="text" name="search_field" id="search_field" class="form-control border-transparent form-focus-none" placeholder="Search for folders" onchange="this.form.submit();">
                    </form>
                </div>
                <div class="col-md-2 col-6 text-right  mt-4 mt-md-0">
                    <form action="<?php echo base_url() ?>filesystem/filterFiles" method="POST">
                        <select class="form-control sort-by" onchange="this.form.submit();" name="sort_field" id="sort_field">
                            <option value="ASC_NAME">Sort By</option>
                            <option value="ASC_NAME">A-Z</option>
                            <option value="DESC_NAME">Z-A</option>
                            <option value="ASC_DATE">Latest to Oldest</option>
                        </select>
                    </form>
                </div>
                <div class="col-md-2 col-6  text-right  mt-4 mt-md-0">
                    <span class="view-btn cursor" data-toggle="modal" data-target="#upload-file"> + Upload File</span>
                </div>
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
                                            if ($file->file_ext == 'pdf') {
                                            ?>
                                                <i class="fa fa-file-pdf-o" aria-hidden="true" style="color: #36c684"></i>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($file->file_ext == 'xlxs') {
                                            ?>
                                                <i class="fa fa-file-excel-o" aria-hidden="true" style="color: #36c684"></i>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($file->file_ext == 'doc') {
                                            ?>
                                                <i class="fa fa-file-word-o" aria-hidden="true" style="color: #36c684"></i>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($file->file_ext == 'ppt') {
                                            ?>
                                                <i class="fa fa-file-powerpoint-o" aria-hidden="true" style="color: #36c684"></i>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($file->file_ext == 'png' || $file->file_ext == 'png') {
                                            ?>
                                                <i class="fa fa-file-image-o" aria-hidden="true" style="color: #36c684"></i>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                        <div class="r-file-name">
                                            <div class="r-file-name-text">
                                                <a href="<?php echo base_url() . 'uploads/' . $file->file_name ?>" target="_blank" class="title"><?php echo $file->file_name; ?></a>
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
                                        <!-- <li class="size">235 KB</li> -->
                                    </ul>
                                </div>
                                <div class="r-file-actions">
                                    <div class="dropdown p-0">
                                        <span class="dropdown-toggle btn btn-sm btn-icon btn-trigger cursor" data-toggle="dropdown">
                                            <i class="fa fa-ellipsis-h"></i>
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right p-0">
                                            <ul class="link-list-plain no-bdr">
                                                <!-- <li>
                                                    <a href="my-files-ca.html" data-toggle="modal"><i class="fa fa-eye" aria-hidden="true"></i><span>Open</span>
                                                    </a>
                                                </li> -->
                                                <li>
                                                    <a href="<?php echo base_url() . 'uploads/' . $file->file_name ?>" class="file-dl-toast"><i class="fa fa-download" aria-hidden="true"></i><span>Download</span></a>
                                                </li>
                                                <li><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i> <span>Rename</span></a></li>
                                                <a href="<?php echo base_url() . 'filesystem/deleteFile/' . $file->id.'/'.$file->folder_id; ?>" onclick="return confirm('Are you sure to delete this file?')">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                    <span>Delete</span>
                                                </a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                else{
                ?>  
                    <h1 class="text-danger text-center">empty folder</h1>
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
            <form action="<?php echo base_url() ?>filesystem/uploadFiles" method="POST" enctype="multipart/form-data">
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