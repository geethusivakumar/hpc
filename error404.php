<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/minia/layouts/pages-404.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Apr 2022 13:52:24 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>404 Error | HPC University</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="HPC University is an online platform for HPC Employees and HPC Customers to learn" name="description"/>
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/logo.png">
        <!-- preloader css -->
        <link rel="stylesheet" href="assets/css/preloader.min.css" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>

    <!-- <body data-layout="horizontal"> -->

        <div class="my-5 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <h1 class="display-1 fw-semibold">4<span class="text-primary mx-2">0</span>4</h1>
                            <h4 class="text-uppercase">Sorry, page not found</h4>
                            <div class="mt-5 text-center">
                            <?php
                                                    $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != "off") ? "https" : "http");
                                                    $base_url .= "://".$_SERVER['HTTP_HOST'];
                                                    $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
                                                 ?>
                                <a class="btn btn-primary waves-effect waves-light" href="<?php echo $base_url ?>">Back to Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-10 col-xl-8">
                        <div>
                            <img src="assets/images/error-img.png" alt="" class="img-fluid">
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end content -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <!-- pace js -->
        <script src="assets/libs/pace-js/pace.min.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/minia/layouts/pages-404.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Apr 2022 13:52:24 GMT -->
</html>
