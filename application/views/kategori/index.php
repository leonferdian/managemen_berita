<!doctype html>
<html class="fixed">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title><?php echo $page_title ?></title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/bootstrap/css/bootstrap.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/font-awesome/css/font-awesome.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/magnific-popup/magnific-popup.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/bootstrap-datepicker/css/datepicker3.css'); ?>" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/select2/select2.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css'); ?>" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php echo site_url('assets/stylesheets/theme.css'); ?>" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="<?php echo site_url('assets/stylesheets/skins/default.css'); ?>" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?php echo site_url('assets/stylesheets/theme-custom.css'); ?>">

    <!-- Head Libs -->
    <script src="<?php echo site_url('assets/vendor/modernizr/modernizr.js'); ?>"></script>

</head>

<body>
    <section class="body">

        <!-- start: header -->
        <header class="header">
            <div class="logo-container">
                <!-- <a href="../" class="logo">
						<img src="assets/images/logo.png" height="35" alt="Porto Admin" />
					</a> -->
                <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <!-- start: search & user box -->
            <div class="header-right">

                <!-- <form action="pages-search-results.html" class="search nav-form">
						<div class="input-group input-search">
							<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</form> -->

                <span class="separator"></span>

                <div id="userbox" class="userbox">
                    <a href="#" data-toggle="dropdown">
                        <!-- <figure class="profile-picture">
                            <img src="<?php #echo site_url('images/avatar/' . $_SESSION['foto']); 
                                        ?>" alt="Joseph Doe" class="img-circle" data-lock-picture="<?php echo site_url('images/avatar/' . $_SESSION['foto']); ?>" />
                        </figure> -->
                        <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                            <span class="name"><?php echo $_SESSION['username']; ?></span>
                            <span class="role">administrator</span>
                        </div>

                        <i class="fa custom-caret"></i>
                    </a>

                    <div class="dropdown-menu">
                        <ul class="list-unstyled">
                            <li class="divider"></li>
                            <!-- <li>
                                <a role="menuitem" tabindex="-1" href="<?php echo site_url('member/profile') ?>"><i class="fa fa-user"></i> My Profile</a>
                            </li> -->
                            <!-- <li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
								</li> -->
                            <li>
                                <a role="menuitem" tabindex="-1" href="<?php echo site_url('member/logout/' . $_SESSION['username']) ?>"><i class="fa fa-power-off"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end: search & user box -->
        </header>
        <!-- end: header -->

        <div class="inner-wrapper">
            <!-- start: sidebar -->
            <aside id="sidebar-left" class="sidebar-left">

                <div class="sidebar-header">
                    <div class="sidebar-title" style="color: #fff;">
                        Navigation
                    </div>
                    <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>


                <?php $this->load->view('_partials/back_page/side_menu'); ?>

            </aside>
            <!-- end: sidebar -->
            <!-- end: page -->
            <section role="main" class="content-body">
                <header class="page-header">
                    <h2>Dashboard</h2>

                    <div class="right-wrapper pull-right">
                        <ol class="breadcrumbs">
                            <li>
                                <a href="#">
                                    <i class="fa fa-home"></i>
                                </a>
                            </li>
                        </ol>

                        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class=""></i></a>
                    </div>
                </header>

                <!-- start: page -->
                <section class="panel">
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="#" class="fa fa-caret-down"></a>
                            <!-- <a href="#" class="fa fa-times"></a> -->
                        </div>

                        <h2 class="panel-title">List Kategori</h2>
                        <div class="row">
                            <div class="pull-right">
                                <a href="#" class="btn btn-sm btn-primary" onclick="add_kategori()"><i class="fa fa-plus-square"></i> Add Kategori</a>
                            </div>
                        </div>
                    </header>
                    <div class="panel-body">
                        <table class="table table-bordered table-striped" id="datatable-ajax" data-url="<?php echo site_url('kategori/list_data') ?>">
                            <thead>
                                <tr>
                                    <th>Kategori Id</th>
                                    <th>Kategori</th>
                                    <th style="width: 150px;"><i class="fa fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </section>
                <!-- end: page -->
            </section>
        </div>
    </section>
    <div class="modal fade" id="modal-content" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h2 class="modal-title font-weight-bold"></h2>
                </div>
                <!-- <span id="progress_view2" style="display:none"><img src="images/loading.gif" width="20" /> Please Wait... </span> -->
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <script>
        function add_kategori() {
            $('#modal-content').modal('show');
            $.ajax({
                type: "POST",
                // processData: false, //important
                // contentType: false, //important
                url: "kategori/add_kategori",
                // data: fd,
                success: function(responseText) {
                    $('#modal-content .modal-body').html(responseText);
                },
                error: function(data) {
                    alert(data);
                    // $("#progress1").hide();
                }
            });
        }

        function edit_kategori(kategori_id) {
            $('#modal-content').modal('show');
            $.ajax({
                type: "POST",
                // processData: false, //important
                // contentType: false, //important
                url: "kategori/edit_kategori",
                data: {
                    kategori_id: kategori_id
                },
                success: function(responseText) {
                    $('#modal-content .modal-body').html(responseText);
                },
                error: function(data) {
                    alert(data);
                    // $("#progress1").hide();
                }
            });
        }

        function save_add() {
            var fd = new FormData();

            var kategori = $('#kategori').val();
            fd.append('kategori', kategori);

            $.ajax({
                type: "POST",
                processData: false, //important
                contentType: false, //important
                url: "kategori/proses_add_kategori",
                data: fd,
                success: function(responseText) {
                    alert(responseText);
                    location.reload();
                },
                error: function(data) {
                    alert(data);
                }
            });
        }

        function save_edit() {
            var fd = new FormData();

            var kategori_id = $('#kategori_id').val();
            fd.append('kategori_id', kategori_id);

            var kategori = $('#kategori').val();
            fd.append('kategori', kategori);

            $.ajax({
                type: "POST",
                processData: false, //important
                contentType: false, //important
                url: "kategori/proses_edit_kategori",
                data: fd,
                success: function(responseText) {
                    alert(responseText);
                    location.reload();
                },
                error: function(data) {
                    alert(data);
                }
            });
        }

        function delete_kategori(kategori_id) {
            var fd = new FormData();

            if (confirm('Apakah anda yakin ingin menghapus data ini?')) {
                $.ajax({
                    type: "POST",
                    // processData: false, //important
                    // contentType: false, //important
                    url: "kategori/delete",
                    data: {
                        kategori_id: kategori_id
                    },
                    success: function(responseText) {
                        alert(responseText);
                        location.reload();
                    },
                    error: function(data) {
                        alert(data);
                    }
                });
            }
        }
    </script>

    <!-- Vendor -->
    <script src="<?php echo site_url('assets/vendor/jquery/jquery.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/bootstrap/js/bootstrap.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/nanoscroller/nanoscroller.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/magnific-popup/magnific-popup.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/jquery-placeholder/jquery.placeholder.js'); ?>"></script>

    <!-- Specific Page Vendor -->
    <script src="<?php echo site_url('assets/vendor/select2/select2.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js'); ?>"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="<?php echo site_url('assets/javascripts/theme.js'); ?>"></script>

    <!-- Theme Custom -->
    <script src="<?php echo site_url('assets/javascripts/theme.custom.js'); ?>"></script>

    <!-- Theme Initialization Files -->
    <script src="<?php echo site_url('assets/javascripts/theme.init.js'); ?>"></script>


    <!-- Examples -->
    <script src="<?php echo site_url('assets/javascripts/tables/examples.datatables.ajax.js'); ?>"></script>
</body>

</html>