<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KR Commercial Interiors Inc. | <?php echo $page_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/fav-icon-fl.png" type="image/x-icon" />

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin_assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin_assets/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin_assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin_assets/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin_assets/plugins/summernote/summernote-bs4.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">

                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-cogs"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                        <a href="<?php echo base_url() ?>admin/dashboard/accountSettings" class="dropdown-item">
                            <i class="nav-icon fas fa-user mr-3" aria-hidden="true"></i>
                            My Account
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo base_url() ?>admin/login/logout" class="dropdown-item">
                            <i class='nav-icon fas fa-sign-out-alt mr-3'></i>
                            Logout
                        </a>
                        <div class="dropdown-divider"></div>
                    </div>

                </li>

            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="<?php echo base_url() ?>admin/dashboard" class="brand-link">
                <img src="<?php echo base_url() ?>assets/images/logo-black.png" alt="Koffiey" class="brand-image">
                <br>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <!-- <img src="<?php echo base_url() ?>assets/admin_assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
                        <i class='nav-icon fas fa-user fa-2x' style="color: white;"></i>
                    </div>
                    <div class="info">
                        <a href="<?php echo base_url() ?>admin/dashboard" class="d-block"><?php echo $_SESSION['logged_in_name']; ?></a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item has-treeview">
                            <a href="<?php echo base_url() ?>admin/dashboard" class="nav-link <?php if ($_SESSION['current_page'] == 'Dashboard') {
                                                                                                    echo 'active';
                                                                                                } ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="<?php echo base_url() ?>admin/FileSystem" class="nav-link <?php if ($_SESSION['current_page'] == 'File System') {
                                                                                                    echo 'active';
                                                                                                } ?>">
                                <i class="nav-icon fas fa-list" aria-hidden="true"></i>
                                <p>
                                    File System
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="<?php echo base_url() ?>admin/users" class="nav-link <?php if ($_SESSION['current_page'] == 'Users') {
                                                                                                echo 'active';
                                                                                            } ?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Manage Users
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link <?php if ($_SESSION['current_page'] == 'Projects') {
                                                            echo 'active';
                                                        } ?>">
                                <i class="nav-icon fas fa-list" aria-hidden="true"></i>
                                <p>
                                    Projects
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>admin/projects" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Page Content</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>admin/projects/manageProjects" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Manage Projects</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link <?php if ($_SESSION['current_page'] == 'Staff') {
                                                            echo 'active';
                                                        } ?>">
                                <i class="nav-icon fas fa-list" aria-hidden="true"></i>
                                <p>
                                    Staff
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>admin/staff" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Page Content</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>admin/staff/manageStaff" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Manage Staff</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link <?php if ($_SESSION['current_page'] == 'Services') {
                                                            echo 'active';
                                                        } ?>">
                                <i class="nav-icon fas fa-list" aria-hidden="true"></i>
                                <p>
                                    Services
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>admin/services" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Page Content</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>admin/services/manageServices" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Manage Services</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link <?php if ($_SESSION['current_page'] == 'Manage Content') {
                                                            echo 'active';
                                                        } ?>">
                                <i class="nav-icon fas fa-cogs" aria-hidden="true"></i>
                                <p>
                                    Manage Content
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>admin/Content" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Slider Content</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>admin/Content/homePageContent" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Home Page Content</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>admin/Content/contactUsContent" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Contact Us Content</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="<?php echo base_url() ?>admin/dashboard/accountSettings" class="nav-link <?php if ($_SESSION['current_page'] == 'Account Settings') {
                                                                                                                    echo 'active';
                                                                                                                } ?>">
                                <i class='nav-icon fas fa-user'></i>
                                <p>
                                    My Account
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="<?php echo base_url() ?>admin/login/logout" class="nav-link">
                                <i class='nav-icon fas fa-sign-out-alt'></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"><?php echo $page_title; ?></h1>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content mt-2">

                <?php $this->load->view($view_to_load); ?>

            </section>

        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2020 <a href="<?php echo base_url() ?>">KR Commercial Interiors Inc.</a></strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/sparklines/sparkline.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/dist/js/adminlte.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/dist/js/pages/dashboard.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/dist/js/demo.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>


    <script src="<?php echo base_url() ?>assets/admin_assets/users.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/manage_projects.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/manage_staff.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/manage_services.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/file_system.js"></script>

    <script>
        $(function() {
            $("#datatable").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>

    <script>
        $(function() {
            $("#datatable1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>

    <script type='text/javascript'>
        function preview_image(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output_image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <script type='text/javascript'>
        function preview_slider_image(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output_slider_image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <script type='text/javascript'>
        function preview_slider_image1(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output_slider_image1');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

<script type='text/javascript'>
        function preview_special_image(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output_special_image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <script type='text/javascript'>
        function preview_special_image1(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output_special_image1');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <script>
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#discount_expiry_field').attr('min', maxDate);
        });
    </script>

    <script>
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#discount_edit_expiry_field').attr('min', maxDate);
        });
    </script>

    <script>
        function preview_image(event) {
            var reader = new FileReader();
            reader.onload = function() {

                var output = document.getElementById('output_image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>