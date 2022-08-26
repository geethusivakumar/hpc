<?php
session_start();
if(!$_SESSION['username'])
{
    header('Location:login');
    session_destroy();
}
include 'includes/__dbconnect.php';
include 'includes/__header.php';
include 'includes/__adminnavbar.php';
include 'includes/__admintopnav.php';
?>
<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Change Password</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="admindashboard">Home</a></li>
                                            <li class="breadcrumb-item active">Profile</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body p-4">
        
                                        <div class="row">
                                            <form method="post">
                                            <div class="col-lg-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Current Password</label>
                                                        <input class="form-control" type="password" name="cur_passw" placeholder="Enter Your Current Password" id="example-text-input">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">New Password</label>
                                                        <input class="form-control" type="password" name="new_passw" placeholder="Enter New Password" id="example-text-input">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Re-enter Password</label>
                                                        <input class="form-control" type="password"  name="re_passw" placeholder="Re-enter Password" id="example-text-input">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                            <button type="submit" name="changepass" class="btn btn-primary w-md">Change Now</button>
                                            </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <!-- End Form Layout -->


                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
            </div>

                
                
            

   
                
            
<script src="assets/js/script.js"></script>


<?php
//include 'includes/__adminajax.php';
include 'includes/__settings.php';
include 'includes/__scripts.php';
include 'includes/__footer.php';
?>
            <?php
            if(isset($_POST['changepass']))
			{
                $cur_passw=$_POST['cur_passw'];
				$new_passw=$_POST['new_passw'];
				$sel=mysqli_query($conn01,"select pass from userlogin where username ='".$_SESSION['username']."'");
                if(mysqli_num_rows($sel)>0)
                {
                    $row=mysqli_fetch_array($sel);
                    $pass=$row['pass'];
                        if($cur_passw==$pass)
                            {
                    
                                mysqli_query($conn01,"update userlogin  set pass='".$new_passw."' where username='".$_SESSION['username']."'") or die(mysqli_error($conn01));
                                echo "<script>alert('Password Changed Successfully');
                                document.location='adminpassword';</script>";

                            }

                else
                {
                echo "<script>alert('Password Does Not Match');
                document.location='adminpassword';
                </script>";
                }
                }
                }
            ?>