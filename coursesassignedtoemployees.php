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
                                    <h4 class="mb-sm-0 font-size-18">Employees assigned to different Courses</h4>

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
                                        $query="select userdetails.name,userdetails.photo,courses.course_name,user_courses.joined_date,user_courses.status as coursestatus,admin_details.name as adminname from userdetails,courses,user_courses,admin_details,userlogin where courses.courseid=user_courses.course_id && user_courses.user_id=userlogin.user_id && user_courses.user_id=userdetails.user_id && userdetails.user_id=userlogin.user_id && userlogin.role='employee' && userdetails.created_by=user_courses.created_by && user_courses.created_by=admin_details.user_id order by userdetails.name";
                                        $sql_query=mysqli_query($conn01,$query);
                                        ?>
        
        <table id="datatable" class="table align-middle datatable  table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th scope="col">Employee Name</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Joined Date</th>
                                    <th scope="col">Assigned By</th>
                                    <th scope="col">Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                               if(mysqli_num_rows($sql_query) > 0)
                                               {
                                                    $i=1;
                                                   while($row = mysqli_fetch_assoc($sql_query))
                                                   {
                                                    $date = date('d F, Y', strtotime($row['joined_date']));
                                               ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td>
                                            <img src="Employees/<?php echo $row['photo']?>" alt="" class="avatar-sm rounded-circle me-2">
                                            <a href="#" class="text-body"><?php echo $row['name']; ?></a>
                                        </td>
                                        <td><?php echo $row['course_name']; ?></td>
                                        <td><?php echo $date; ?></td>
                                        <td><?php echo $row['adminname']; ?></td>
                                        <td>
                                        <?php if($row['coursestatus']=="ongoing") { ?>
                                        <span class="text-danger"><i class="mdi mdi-bullseye-arrow me-3"></i>Ongoing</span>
                                        <?php } else if($row['coursestatus']=="completed") { ?>
                                        <span class="text-success"><i class="mdi mdi-check-all me-3"></i>Completed</span>
                                        <?php } ?>
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
