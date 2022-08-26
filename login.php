<?php 
session_start();
?>
<!doctype html>
<html lang="en">

    

<head>

        <meta charset="utf-8" />
        <title>Login | HPC University</title>
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
    <!-- <body data-layout="horizontal"> -->
        <div class="auth-page">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-xxl-3 col-lg-4 col-md-5">
                        <div class="auth-full-page-content d-flex p-sm-5 p-4">
                            <div class="w-100">
                                <div class="d-flex flex-column h-100">
                                    <div class="mb-4 mb-md-5 text-center">
                                    <span class="logo-txt">HPC University</span>
                                        <a href="./" class="d-block auth-logo">
                                            <img src="assets/images/logo.png" alt="" height="180"> 
                                        </a>
                                    </div>
                                    <div class="auth-content my-auto">
                                        <div class="text-center">
                                            <h5 class="mb-0">Welcome Back !</h5>
                                            <p class="text-muted mt-2">Sign in to continue to HPC .</p>
                                        </div>
                                        <form class="mt-4 pt-2" action="signin.php" method="POST" onsubmit="return validate()">
                                            <div class="mb-3">
                                                <label class="form-label">Username</label>
                                                <input type="text" class="form-control" name="userval" id="username" placeholder="Enter username" onblur="validate1()">
                                            </div>
                                            <div class="mb-3">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1">
                                                        <label class="form-label">Password</label>
                                                    </div>
                                                   
                                                </div>
                                                
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" name="passval" id="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon"  onblur="validate2()">
                                                    <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                            </div>
                                
                                            <div class="mb-3">
                                                <button name="submit" class="btn btn-danger w-100 waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                        </form>
                                        <div class="flex-grow-1">
                                                        <label class="form-label"><?php
                                                            echo @$_SESSION['status'];
                                                            if(@$_SESSION['status']!="")
                                                            {
                                                            unset($_SESSION['status']);
                                                            }
                                                            ?>
                                                        </label>
                                                    </div>

                                       
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- end auth full page content -->
                    </div>
                    <!-- end col -->
                    <div class="col-xxl-9 col-lg-8 col-md-7">
                        <div class="auth-bg pt-md-5 p-4 d-flex">
                            <div class="bg-overlay bg-danger"></div>
                            <!-- <ul class="bg-bubbles">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul> -->
                            <!-- end bubble effect -->
                            <div class="row justify-content-center align-items-center">
                                <div class="col-xl-7">
                                    <div class="p-0 p-sm-4 px-xl-0">
                                        <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                            <!-- <div class="carousel-indicators carousel-indicators-rounded justify-content-start ms-0 mb-0">
                                                <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                            </div> -->
                                            <!-- end carouselIndicators -->
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="testi-contain text-white">
                                                        <div class="mt-4 pt-3 pb-5">
                                                            <div class="d-flex align-items-start">
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                            <!-- end carousel-inner -->
                                        </div>
                                        <!-- end review carousel -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container fluid -->
        </div>


        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <!-- pace js -->
        <script src="assets/libs/pace-js/pace.min.js"></script>
        <!-- password addon init -->
        <script src="assets/js/pages/pass-addon.init.js"></script>
        <script>
            $(document).ready(function() {
            // > page loader function by = custom.js		
                page_loader();
            });

            function page_loader() {
                $('.loading-area').fadeOut(1000);
            }
        </script>
        
        <script>
            function validate()
			{
                var username=document.getElementById("username").value;
                var password=document.getElementById("password").value;
                var b=/^[a-zA-Z0-9!@#\$%\^\&*\)\(+=._-]{4,}$/
                if(username=="")
				{
					document.getElementById("username").style.border="2px solid #FF0000";
	                document.getElementById("username").placeholder="Please enter your username";
					return false;
				}
                else if(!b.test(username))
				{
					document.getElementById("username").style.border="2px solid #FF0000";
					document.getElementById("username").value="";
	document.getElementById("username").placeholder="Minimum length of username is 4";
					return false;
				}
                else if(password=="")
				{
					document.getElementById("password").style.border="2px solid #FF0000";
	                document.getElementById("password").placeholder="Please enter your password";
					return false;
				}
                else if(!b.test(password))
				{
					document.getElementById("password").style.border="2px solid #FF0000";
					document.getElementById("password").value="";
	                document.getElementById("password").placeholder="Minimum length of password is 4";
					return false;
				}
                else
				{
					return true;
				}
            }
            function validate1()
			{
                var username=document.getElementById("username").value;
                var b=/^[a-zA-Z0-9!@#\$%\^\&*\)\(+=._-]{4,}$/
                if(username=="")
				{
					document.getElementById("username").style.border="2px solid #FF0000";
	                document.getElementById("username").placeholder="Please enter your username";
				}
                else if(!b.test(username))
				{
					document.getElementById("username").style.border="2px solid #FF0000";
					document.getElementById("username").value="";
	                document.getElementById("username").placeholder="Minimum length of username is 4";
				}
                else
                {
                    document.getElementById("username").style.border="1px solid #ced4da";
	                document.getElementById("username").placeholder="";
                }
            }
            function validate2()
			{
                var password=document.getElementById("password").value;
                var b=/^[a-zA-Z0-9!@#\$%\^\&*\)\(+=._-]{4,}$/
                if(username=="")
				{
					document.getElementById("password").style.border="2px solid #FF0000";
	                document.getElementById("password").placeholder="Please enter your username";
				}
                else if(!b.test(password))
				{
					document.getElementById("password").style.border="2px solid #FF0000";
					document.getElementById("password").value="";
	                document.getElementById("password").placeholder="Minimum length of username is 4";
				}
                else
                {
                    document.getElementById("password").style.border="1px solid #ced4da";
	                document.getElementById("password").placeholder="";
                }
            }
        </script>
    </body>



</html>