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
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/dropzone/css/basic.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/dropzone/css/dropzone.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/summernote/summernote.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/summernote/summernote-bs3.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/codemirror/lib/codemirror.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/codemirror/theme/monokai.css'); ?>" />

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

                        <h2 class="panel-title">List Berita</h2>
                        <div class="row">
                            <div class="pull-right">
                                <a href="#" class="btn btn-sm btn-primary" onclick="add_berita()"><i class="fa fa-plus-square"></i> Add Berita</a>
                            </div>
                        </div>
                    </header>
                    <div class="panel-body">
                        <table class="table table-bordered table-striped" id="datatable-ajax" data-url="<?php echo site_url('berita/list_data') ?>">
                            <thead>
                                <tr>
                                    <th>Berita Id</th>
                                    <th>Judul Berita</th>
                                    <th>Kategori Id</th>
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
            <div class="modal-content modal-lg">
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
        function add_berita() {
            $('#modal-content').modal('show');
            $.ajax({
                type: "POST",
                // processData: false, //important
                // contentType: false, //important
                url: "berita/add_berita",
                // data: fd,
                success: function(responseText) {
                    $('#modal-content .modal-body').html(responseText);
                    $('#modal-content #kategori_id').select2({
                        allowClear: true,
                        placeholder: 'Select Kategori'
                    });

                    $('#modal-content .summernote').summernote();
                },
                error: function(data) {
                    alert(data);
                    // $("#progress1").hide();
                }
            });
        }

        function edit_berita(berita_id) {
            $('#modal-content').modal('show');
            $.ajax({
                type: "POST",
                // processData: false, //important
                // contentType: false, //important
                url: "berita/edit_berita",
                data: {
                    berita_id: berita_id
                },
                success: function(responseText) {
                    $('#modal-content .modal-body').html(responseText);
                    $('#modal-content #kategori_id').select2({
                        allowClear: true,
                        placeholder: 'Select Kategori'
                    });
                    $('#modal-content .summernote').summernote();
                },
                error: function(data) {
                    alert(data);
                    // $("#progress1").hide();
                }
            });
        }

        function save_add() {
            var fd = new FormData();

            var judul_berita = $('#judul_berita').val();
            fd.append('judul_berita', judul_berita);

            var isi_berita = $('#modal-content .note-editable').html();
            fd.append('isi_berita', isi_berita);

            var kategori_id = $('#kategori_id').val();
            fd.append('kategori_id', kategori_id);

            $.ajax({
                type: "POST",
                processData: false, //important
                contentType: false, //important
                url: "berita/proses_add_berita",
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

            var berita_id = $('#berita_id').val();
            fd.append('berita_id', berita_id);

            var judul_berita = $('#judul_berita').val();
            fd.append('judul_berita', judul_berita);

            var isi_berita = $('#modal-content .note-editable').html();
            fd.append('isi_berita', isi_berita);

            var kategori_id = $('#kategori_id').val();
            fd.append('kategori_id', kategori_id);

            $.ajax({
                type: "POST",
                processData: false, //important
                contentType: false, //important
                url: "berita/proses_edit_berita",
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

        function delete_berita(berita_id) {
            var fd = new FormData();

            if (confirm('Apakah anda yakin ingin menghapus data ini?')) {
                $.ajax({
                    type: "POST",
                    // processData: false, //important
                    // contentType: false, //important
                    url: "berita/delete",
                    data: {
                        berita_id: berita_id
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
    <script src="<?php echo site_url('assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/jquery-maskedinput/jquery.maskedinput.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/fuelux/js/spinner.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/dropzone/dropzone.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/bootstrap-markdown/js/markdown.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/bootstrap-markdown/js/to-markdown.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/bootstrap-markdown/js/bootstrap-markdown.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/codemirror/lib/codemirror.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/codemirror/addon/selection/active-line.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/codemirror/addon/edit/matchbrackets.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/codemirror/mode/javascript/javascript.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/codemirror/mode/xml/xml.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/codemirror/mode/htmlmixed/htmlmixed.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/codemirror/mode/css/css.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/summernote/summernote.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/ios7-switch/ios7-switch.js'); ?>"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="<?php echo site_url('assets/javascripts/theme.js'); ?>"></script>

    <!-- Theme Custom -->
    <script src="<?php echo site_url('assets/javascripts/theme.custom.js'); ?>"></script>

    <!-- Theme Initialization Files -->
    <script src="<?php echo site_url('assets/javascripts/theme.init.js'); ?>"></script>

    <!-- Examples -->
    <script src="<?php echo site_url('assets/javascripts/tables/examples.datatables.ajax.js'); ?>"></script>
    <script src="<?php echo site_url('assets/javascripts/forms/examples.advanced.form.js'); ?>" /></script>
</body>

</html>