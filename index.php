<?php
session_start();
include("includes/__dbconnect.php");
?>
<!doctype html>
<html lang="en">

<head>
        
        <meta charset="utf-8" />
        <title>HPC University</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="HPC University is an online platform for HPC Employees and HPC Customers to learn" name="description"/>
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/logo.png">
        
        <!-- plugin css -->
        <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

        <!-- preloader css -->
        <link rel="stylesheet" href="assets/css/preloader.min.css" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-layout="horizontal">
    <div class="loading-area">
    <div class="loading-box"></div>
    <div class="loading-pic">
        <div class="cssload-spinner">
                                            <div class="spinner-border text-primary m-1" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
        </div>
    </div>
    </div>
        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="./" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo.png" alt="" height="24">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo.png" alt="" height="24"> <span class="logo-txt">HPC University</span>
                                </span>
                            </a>

                            <a href="./" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo.png" alt="" height="24">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo.png" alt="" height="24"> <span class="logo-txt">HPC University</span>
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <!-- App Search-->
                    </div>

                    <div class="d-flex">

                        

                        

                        <div class="dropdown d-none d-sm-inline-block">
                            <button type="button" class="btn header-item" id="mode-setting-btn">
                                <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                                <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                            </button>
                        </div>

                        

                        

                        

                        <div class="d-inline-block">
                            <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown"
                             aria-haspopup="true" aria-expanded="false">
                                <a href="login"><span class="d-xl-inline-block ms-1 fw-medium">Login</span></a>
                            </button>
                        </div>
            
                    </div>
                </div>
            </header>
    
            <div class="topnav">
                <div class="container-fluid">
                    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                        <div class="collapse navbar-collapse" id="topnav-menu-content">
                            <ul class="navbar-nav">

                                <li class="nav-item">
                                    <a class="nav-link arrow-none" href="./" id="topnav-dashboard" role="button">
                                        <i data-feather="home"></i><span data-key="t-dashboards">Home</span>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link arrow-none" href="hpccourses" role="button">
                                        <i data-feather="book"></i><span data-key="t-horizontal">Courses</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <div class="row">



                                <div class="card">

                                    <div class="card-body">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class=""></li>
                                                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class=""></li>
                                                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class=""></li>
                                                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" class="active" aria-current="true"></li>
                                            </ol>
                                            <div class="carousel-inner" role="listbox">
                                                <div class="carousel-item">
                                                    <img class="d-block img-fluid mx-auto" src="assets/images/small/1.png" alt="First slide">
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block img-fluid mx-auto" src="assets/images/small/2.png" alt="Second slide">
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block img-fluid mx-auto" src="assets/images/small/3.png" alt="Third slide">
                                                </div>
                                                <div class="carousel-item active">
                                                    <img class="d-block img-fluid mx-auto" src="assets/images/small/4.png" alt="Fourth slide">
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div><!-- end carousel -->
                                    </div><!-- end card-body -->
                                </div>
                                </div><!-- end row-->

                                <?php 
                         $total=mysqli_query($conn01,"select * from courses where status='Active'");
                         $totalactivecourses=mysqli_num_rows($total);
                         $totalemp=mysqli_query($conn01,"select * from userlogin where role='employee' && status='Active'");
                         $totalactiveemployees=mysqli_num_rows($totalemp);
                         $totalactivecus=mysqli_query($conn01,"select * from userlogin where role='customer' && status='Active'");
                         $totalactivecustomers=mysqli_num_rows($totalactivecus);
                         $totalcert=mysqli_query($conn01,"select * from certificates");
                         $totalnoofcert=mysqli_num_rows($totalcert);
                        ?>

                        <!-- <div class="row">
                            <div class="col-lg-3">
                                <div class="card bg-primary border-primary text-white-50">
                                    <div class="card-body">
                                        <h5 class="mb-4 text-white"><i class="mdi mdi-book me-3"></i>Total Courses</h5>
                                        <p class="card-text text-white fs-3"><?php echo $totalactivecourses ?></p>
                                    </div>
                                </div>
                            </div> -->
                            <!-- end col -->
        
                            <!-- <div class="col-lg-3">
                                <div class="card bg-success border-success text-white-50">
                                    <div class="card-body">
                                        <h5 class="mb-4 text-white"><i class="mdi mdi-account-group me-3"></i>Total Employees</h5>
                                        <p class="card-text text-white fs-3"><?php echo $totalactiveemployees ?></p>
                                    </div>
                                </div>
                            </div> -->
                            <!-- end col -->
        
                            <!-- <div class="col-lg-3">
                                <div class="card bg-info border-info text-white-50">
                                    <div class="card-body">
                                        <h5 class="mb-4 text-light"><i class="mdi mdi-account-group me-3"></i>Total Customers</h5>
                                        <p class="card-text text-white fs-3"><?php echo $totalactivecustomers ?></p>
                                    </div>
                                </div>
                            </div> -->
                            <!-- end col -->
                            <!-- <div class="col-lg-3">
                                <div class="card bg-danger border-warning text-white-50">
                                    <div class="card-body">
                                        <h5 class="mb-4 text-light"><i class="mdi mdi-certificate me-3"></i>Certificates Delivered</h5>
                                        <p class="card-text text-white fs-3"><?php echo $totalnoofcert ?></p>
                                    </div>
                                </div>
                            </div> -->
                            <!-- end col -->
                        <!-- </div> -->










                                        <?php
                                        
                                          $query_run="select * from courses where status='Active' order by course_code";
                                          $sql_query_run=mysqli_query($conn01,$query_run);
                                          
                                          if(mysqli_num_rows($sql_query_run) > 0)
                                          {
                                              ?>
                        
                                <div class="row">
                                <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Courses</h4>
                                </div>
                                </div>
                                        <?php
                                
                                               $i=1;
                                              while($rownum = mysqli_fetch_assoc($sql_query_run))
                                              {
                                                  
                                          ?>
                                    <div class="col-md-3 col-xl-3">

                                    <!-- Simple card -->
                                    <div class="card">
                                        <img class="card-img-top img-fluid" src="Courses/<?php echo $rownum['photo'] ?>" alt="Card image cap" title="Click here to add chapters in <?php echo $rownum['course_name'] ?>">
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="login" class="coursehyperlink"><?php echo $rownum['course_name'] ?></a></h4>
                                            <p class="card-text"><?php echo substr($rownum['description'],0,50) ?>...</p>
                                        </div>
                                    </div>

                                    </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                                <?php
                                    }
                                    ?>

                        


                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © HPC University.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    All rights reserved
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        
        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center p-3">

                    <h5 class="m-0 me-2">Theme Customizer</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="m-0" />

                <div class="p-4">
                    <h6 class="mb-3">Layout</h6>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout"
                            id="layout-vertical" value="vertical">
                        <label class="form-check-label" for="layout-vertical">Vertical</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout"
                            id="layout-horizontal" value="horizontal">
                        <label class="form-check-label" for="layout-horizontal">Horizontal</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-mode"
                            id="layout-mode-light" value="light">
                        <label class="form-check-label" for="layout-mode-light">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-mode"
                            id="layout-mode-dark" value="dark">
                        <label class="form-check-label" for="layout-mode-dark">Dark</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-width"
                            id="layout-width-fuild" value="fuild" onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                        <label class="form-check-label" for="layout-width-fuild">Fluid</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-width"
                            id="layout-width-boxed" value="boxed" onchange="document.body.setAttribute('data-layout-size', 'boxed')">
                        <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Position</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-position"
                            id="layout-position-fixed" value="fixed" onchange="document.body.setAttribute('data-layout-scrollable', 'false')">
                        <label class="form-check-label" for="layout-position-fixed">Fixed</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-position"
                            id="layout-position-scrollable" value="scrollable" onchange="document.body.setAttribute('data-layout-scrollable', 'true')">
                        <label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topbar-color"
                            id="topbar-color-light" value="light" onchange="document.body.setAttribute('data-topbar', 'light')">
                        <label class="form-check-label" for="topbar-color-light">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topbar-color"
                            id="topbar-color-dark" value="dark" onchange="document.body.setAttribute('data-topbar', 'dark')">
                        <label class="form-check-label" for="topbar-color-dark">Dark</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-default" value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                        <label class="form-check-label" for="sidebar-size-default">Default</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-compact" value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'md')">
                        <label class="form-check-label" for="sidebar-size-compact">Compact</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-small" value="small" onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                        <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-light" value="light" onchange="document.body.setAttribute('data-sidebar', 'light')">
                        <label class="form-check-label" for="sidebar-color-light">Light</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-dark" value="dark" onchange="document.body.setAttribute('data-sidebar', 'dark')">
                        <label class="form-check-label" for="sidebar-color-dark">Dark</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-brand" value="brand" onchange="document.body.setAttribute('data-sidebar', 'brand')">
                        <label class="form-check-label" for="sidebar-color-brand">Brand</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Direction</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-direction"
                            id="layout-direction-ltr" value="ltr">
                        <label class="form-check-label" for="layout-direction-ltr">LTR</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-direction"
                            id="layout-direction-rtl" value="rtl">
                        <label class="form-check-label" for="layout-direction-rtl">RTL</label>
                    </div>

                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <!-- pace js -->
        <script src="assets/libs/pace-js/pace.min.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- Plugins js-->
        <script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
        <!-- dashboard init -->
        <script src="assets/js/pages/dashboard.init.js"></script>

        <script src="assets/js/app.js"></script>
        <script>
            $(document).ready(function() {
            // > page loader function by = custom.js		
                page_loader();
            });

            function page_loader() {
                $('.loading-area').fadeOut(1000);
            }
        </script>

    </body>

<!-- Mirrored from themesbrand.com/minia/layouts/layouts-horizontal.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Apr 2022 13:52:24 GMT -->
</html>
