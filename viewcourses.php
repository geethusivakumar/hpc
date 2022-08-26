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
                                    <h4 class="mb-sm-0 font-size-18">Courses</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="sadashboard">Home</a></li>
                                            <li class="breadcrumb-item active">Courses</li>
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


                                    <div class="card-bod table-responsive">
                                        <?php
                                        $sel2=mysqli_query($conn01,"select user_id  from userlogin where username='".$_SESSION['username']."'");
                                        $row2=mysqli_fetch_array($sel2);
                                          $query_run="select * from courses order by course_code";
                                          $sql_query_run=mysqli_query($conn01,$query_run);
                                        ?>
        
                                        <table id="datatable" class="table table-bordered nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Course Name</th>
                                                <th>Course Code</th>
                                                <th>Course Description</th>
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
                                                    $admin=mysqli_query($conn01,"select name  from admin_details where user_id=".$rownum['createdby']."");
                                                    $admindetails=mysqli_fetch_array($admin);
                                               ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $rownum['course_name']; ?></td>
                                                <td><?php echo $rownum['course_code']; ?></td>
                                                <td><?php echo substr($rownum['description'],0,50); ?>...</td>
                                                <td><?php echo "<img src='Courses/".$rownum['photo']."'  style='width:75px; height:50px;'/>"; ?></td>
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
if(isset($_POST['addcourse']))
			{
                $course_name=$_POST['course_name'];
                $course_code=$_POST['course_code'];
                $description=mysqli_real_escape_string($conn01,$_POST['description']);
                $status=$_POST['status'];
                $ins=mysqli_query($conn01,"insert into courses(course_name,course_code,description,createdby,status)values('".$course_name."','".$course_code."','".$description."',".$row2['user_id'].",'".$status."')");
                if($ins)
				{
                    $sel1=mysqli_query($conn01,"select courseid from courses where course_name='".$course_name."'  &&  course_code='".$course_code."' && createdby=".$row2['user_id']." limit 1");
					$row1=mysqli_fetch_array($sel1);
                    $extension=explode("/",$_FILES['photo']['type']);
					$photo=$row1['courseid'].".".$extension[1];
                    mysqli_query($conn01,"update courses set photo='".$photo."' where courseid=".$row1['courseid']."");
					move_uploaded_file($_FILES['photo']['tmp_name'],'Courses/'.$photo);
					echo "<script>
					alert('Course added successfully');
					document.location='admin_courses';
					</script>";
				}
                else
				{
					echo "<script>
					alert('Database Error');
					document.location='admin_courses';
					</script>";
				}
            }
            ?>