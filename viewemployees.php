<?php
session_start();
include("includes/__dbconnect.php");
if(!$_SESSION['username'])
{
    header('Location:login');
    session_destroy();
}
include 'includes/__header.php';
include 'includes/__navbar.php';
include 'includes/__topnav.php';
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
                                    <h4 class="mb-sm-0 font-size-18">Employees</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="sadashboard">Home</a></li>
                                            <li class="breadcrumb-item active">Employees</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">

 

                                <!--########################### ADD OUTPUT########################### -->

                                    <div class="card-bod table-responsive">
                                        <?php
                                        $sel2=mysqli_query($conn01,"select user_id  from userlogin where username='".$_SESSION['username']."'");
                                        $row2=mysqli_fetch_array($sel2);
                                          $query_run="select userdetails.*,userlogin.* from userdetails,userlogin where userdetails.user_id=userlogin.user_id && userlogin.role='employee'";
                                          $sql_query_run=mysqli_query($conn01,$query_run);
                                        ?>
        
                                        <table id="datatable" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Qualification</th>
                                                <th>Username</th>
                                                <th>Email ID</th>
                                                <th>Photo</th>
                                                <th>Added By</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                               <?php
                                               if(mysqli_num_rows($sql_query_run) > 0)
                                               {
                                                    $i=1;
                                                   while($rownum = mysqli_fetch_assoc($sql_query_run))
                                                   {
                                                    $admin=mysqli_query($conn01,"select name  from admin_details where user_id=".$rownum['created_by']."");
                                                    $admindetails=mysqli_fetch_array($admin);
                                               ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $rownum['name']; ?></td>
                                                <td><?php echo $rownum['gender']; ?></td>
                                                <td><?php echo $rownum['address']; ?></td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <a href="tel:<?php echo $rownum['phone']; ?>" class="badge badge-soft-primary"><?php echo $rownum['phone']; ?></a>
                                                    </div>
                                                </td>
                                                <td><?php echo $rownum['qualifn']; ?></td>
                                                <td><?php echo $rownum['username']; ?></td>
                                                <td><div class="d-flex gap-2">
                                                <a href="mailto:<?php echo $rownum['emailid']; ?>" class="badge badge-soft-primary"><?php echo $rownum['emailid']; ?></a>
                                                </div></td>
                                                <td><?php echo "<img src='Employees/".$rownum['photo']."'  style='width:50px; height:50px;'/>"; ?></td>
                                                <td><?php echo $admindetails['name'] ?></td>
                                                <td>
                                                <?php if($rownum['status']=="Active") { ?>
                                                <div class="px-1 mb-0 text-center" role="alert">
                                                    <i class="mdi mdi-check-all d-block fs-3 mt-1 mb-1 text-success"></i>
                                                    <h5 class="text-success fs-6"><?php echo $rownum['status']; ?></h5>
                                                </div>
                                                <?php } else if($rownum['status']=="Inactive") { ?>
                                                <div class="px-1 mb-0 text-center" role="alert">
                                                    <i class="mdi mdi-block-helper d-block fs-3 mt-1 mb-1 text-danger"></i>
                                                    <h5 class="text-danger fs-6"><?php echo $rownum['status']; ?></h5>
                                                </div>
                                                <?php 
                                                } 
                                                ?>
                                                </td>
                                                
                                            </tr>
                                        
                                            <?php
                                            $i=$i+1;
                                                   }
                                                }
                                            ?>
                                            
                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                <style>
                    th.sorting.sort_del1{
                          border-right: none !important;
                    }
                    th.sorting.sort_del2{
                        border-left: none !important;
                    }
                    th.sorting.sort_del1::after{
                            display: none !important;
                    }
                    th.sorting.sort_del1::before{
                            display: none !important;
                    }
                    th.sorting.sort_del2::after{
                            display: none !important;
                    }
                    th.sorting.sort_del2::before{
                            display: none !important;
                    }
                </style>
            

   
                
            <?php

//include 'includes/__adminmodal.php';
include 'includes/__settings.php';
include 'includes/__scripts.php';
?>



<?php
//include 'includes/__adminajax.php';
include 'includes/__footer.php';
?>
<?php
if(isset($_POST['addemployee']))
			{
                $name=$_POST['name'];
                $gender=$_POST['gender'];
                $address=$_POST['address'];
                $qualifn=$_POST['qualifn'];
                $phone=$_POST['phone'];
				$username=$_POST['username'];
				$emailid=$_POST['emailid'];
				$passw=$_POST['passw'];
                $status=$_POST['status'];
                $ins =mysqli_query($conn01,"insert into userlogin(username,emailid,pass,role,status)values('".$username."','".$emailid."','".$passw."','employee','".$status."')");
                if($ins)
				{
                    $sel1=mysqli_query($conn01,"select user_id  from userlogin where username='".$username."'  &&  emailid='".$emailid."'  && status='".$status."' && role='employee'");
					$row1=mysqli_fetch_array($sel1);
                    // $sel2=mysqli_query($conn01,"select user_id  from userlogin where username='".$_SESSION['username']."'");
					// $row2=mysqli_fetch_array($sel2);
                    $extension=explode("/",$_FILES['photo']['type']);
					$photo=$row1['user_id'].".".$extension[1];
                    mysqli_query($conn01,"insert into userdetails(user_id,name,gender,address,phone,qualifn,photo,created_by)values(".$row1['user_id'].",'".$name."','".$gender."','".$address."','".$phone."','".$qualifn."','".$photo."',".$row2['user_id'].")");
					move_uploaded_file($_FILES['photo']['tmp_name'],'Employees/'.$photo);
					echo "<script>
					alert('Employee added successfully');
					document.location='admin_employees';
					</script>";
				}
                else
				{
					echo "<script>
					alert('Database Error');
					document.location='admin_employees';
					</script>";
				}
            }
            ?>