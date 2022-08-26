<?php
session_start();
if(!$_SESSION['username'])
{
    header('Location:login');
    session_destroy();
}
include 'includes/__dbconnect.php';
$sel2=mysqli_query($conn01,"select userlogin.user_id,admin_details.name from userlogin,admin_details where userlogin.user_id=admin_details.user_id && userlogin.username='".$_SESSION['username']."'");
$row2=mysqli_fetch_array($sel2);
$c=mysqli_query($conn01,"select * from courses where courseid =".$_GET['courseid']." && createdby=".$row2['user_id']);
if(mysqli_num_rows($c)>0)
{
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
                        
                    <?php
                                        $course=mysqli_query($conn01,"select * from courses where courseid=".$_GET['courseid']);
                                        $coursedetails=mysqli_fetch_array($course);
                                        ?>
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Test Results of <?php echo $coursedetails['course_name']?> Course</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="admindashboard">Home</a></li>
                                            <li class="breadcrumb-item active">Quiz Results</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    
                                <!--########################### ADD OUTPUT########################### -->
                                

 

                                <!--########################### ADD OUTPUT########################### -->
                                <form method="post">

                                <div class="card-bod table-responsive">  
                                        <?php
                                          $query_run="select coursedetails.chaptername,test_result.* from coursedetails,user_courses,test_result,quiz where coursedetails.courseid=".$coursedetails['courseid']." && quiz.chapter_id=coursedetails.chapter_id && quiz.quiz_id=test_result.test_id && user_courses.course_id=coursedetails.courseid && test_result.user_id=user_courses.user_id && quiz.created_by=".$row2['user_id'];
                                          $sql_query_run=mysqli_query($conn01,$query_run);
                                        ?>  
                                <table id="datatable" class="table table-bordered nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Course</th>
                                                <th>Chapter Name</th>
                                                <th>Quiz Summary</th>
                                                <th>Percentage of Marks</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                               <?php
                                               if(mysqli_num_rows($sql_query_run) > 0)
                                               {
                                                    $i=1;
                                                   while($rownum = mysqli_fetch_assoc($sql_query_run))
                                                   {
                                                    $sel3=mysqli_query($conn01,"select userdetails.name,userdetails.photo,userlogin.role from userdetails,userlogin where userlogin.user_id=userdetails.user_id && userlogin.user_id=".$rownum['user_id']);
                                                    $row3=mysqli_fetch_array($sel3);
                                               ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><img src="<?php if($row3['role']=="customer"){echo "Customers/".$row3['photo'];}else if($row3['role']=="employee"){echo "Employees/".$row3['photo'];} ?>" alt="" class="avatar-sm rounded-circle me-2">
                                            <a href="#" class="text-body"><?php echo $row3['name']; ?></a> <code class="highlighter-rouge">(<?php echo ucfirst($row3['role']) ?>)</code></td>
                                                <td><strong><?php echo $coursedetails['course_name']; ?></strong></td>
                                                <td><strong><?php echo $rownum['chaptername']; ?></strong></td>
                                                <td>
                                                        <div class="d-flex align-items-center mb-3">
                                                            <div class="flex-grow-1 ms-3">
                                                                <span class="font-size-16">Right Answers </span>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <span class="badge rounded-pill badge-soft-success font-size-12 fw-medium"><strong><?php echo $rownum['right_ans']; ?></strong></span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-3">    
                                                            <div class="flex-grow-1 ms-3">
                                                                <span class="font-size-16">Wrong Answers </span>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <span class="badge rounded-pill badge-soft-danger font-size-12 fw-medium"><strong><?php echo $rownum['wrong_ans']; ?></strong></span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-3">    
                                                            <div class="flex-grow-1 ms-3">
                                                                <span class="font-size-16">Unanswered </span>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <span class="badge rounded-pill badge-soft-danger font-size-12 fw-medium"><strong><?php echo $rownum['no_attempt']; ?></strong></span>
                                                            </div>
                                                        </div>    
                                                        </td>
                                                <td><span class="badge rounded-pill <?php if($rownum['score']>=50) { echo "badge-soft-success";} else { echo " badge-soft-danger";}?> font-size-24 fw-medium"><strong><?php echo $rownum['score']."%"; ?></strong></span></td>
                                            </tr>
                                        
                                            <?php
                                            $i=$i+1;
                                                   }
                                                }
                                            ?>
                                            
                                            </tbody>
                                        </table>
                                </div>
                                </form>

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
//include 'includes/__adminajax.php';
include 'includes/__footer.php';
?>
            <?php
            }
            else
            {
                header('Location:error404');
            }
            ?>