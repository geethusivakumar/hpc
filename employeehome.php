<?php
session_start();
include("includes/__dbconnect.php");
if(!$_SESSION['username'])
{
    header('Location:login');
    session_destroy();
}
include 'includes/__header.php';
include 'includes/__empnavbar.php';
include 'includes/__emptopnav.php';
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
                                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="employeedashboard">Home</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <?php 
                         $total=mysqli_query($conn01,"select * from courses where status='Active'");
                         $totaluactivecourses=mysqli_num_rows($total);
                         $mycourses=mysqli_query($conn01,"select courses.* from courses,user_courses,userlogin where courses.courseid=user_courses.course_id && userlogin.user_id=user_courses.user_id && userlogin.role='employee' && userlogin.status='Active' && userlogin.username='".$_SESSION['username']."'");
                         $mycoursesdetails=mysqli_num_rows($mycourses);
                         $completedcourses=mysqli_query($conn01,"select courses.* from courses,user_courses,userlogin where courses.courseid=user_courses.course_id && userlogin.user_id=user_courses.user_id && userlogin.role='employee' && userlogin.status='Active' && user_courses.status='completed' && userlogin.username='".$_SESSION['username']."'");
                         $completedcoursesdetails=mysqli_num_rows($completedcourses);
                         $mycertificates=mysqli_query($conn01,"select certificates.* from certificates,user_courses,userlogin where certificates.join_id=user_courses.join_id && user_courses.status='completed' && userlogin.user_id=user_courses.user_id && userlogin.status='Active' && userlogin.username='".$_SESSION['username']."'");
                         $mycertificatedetails=mysqli_num_rows($mycertificates);
                        ?>

                        <div class="row">
                            <div class="col-xl-3 col-md-6 shadow p-3 mb-5 ">
                                <!-- card -->
                                <div class="card card-h-100 text-center tadmin">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate acadmin">Total Courses</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value acadmin" data-target="<?php echo $totaluactivecourses ?>">0</span>
                                                </h4>
                                            </div>
                                            <!-- <div class="col-6">
                                                <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                            </div> -->
                                        </div>
                                        <!-- <div class="text-nowrap">
                                            <span class="badge bg-soft-danger text-danger">-29 Trades</span>
                                            <span class="ms-1 text-muted font-size-13">Since last week</span>
                                        </div> -->
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
        
                            <div class="col-xl-3 col-md-6  shadow p-3 mb-5 ">
                                <!-- card -->
                                <div class="card card-h-100 text-center tadmin">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate acadmin">My Courses</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value acadmin" data-target="<?php echo $mycoursesdetails ?>">0</span>
                                                </h4>
                                            </div>
                                            <!-- <div class="col-6">
                                                <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                            </div> -->
                                        </div>
                                        <!-- <div class="text-nowrap">
                                            <span class="badge bg-soft-danger text-danger">-29 Trades</span>
                                            <span class="ms-1 text-muted font-size-13">Since last week</span>
                                        </div> -->
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
        
                            <div class="col-xl-3 col-md-6 shadow p-3 mb-5 ">
                                <!-- card -->
                                <div class="card card-h-100 text-center tadmin">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate acadmin">Courses Completed</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value acadmin" data-target="<?php echo $completedcoursesdetails ?>">0</span>
                                                </h4>
                                            </div>
                                            <!-- <div class="col-6">
                                                <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                            </div> -->
                                        </div>
                                        <!-- <div class="text-nowrap">
                                            <span class="badge bg-soft-danger text-danger">-29 Trades</span>
                                            <span class="ms-1 text-muted font-size-13">Since last week</span>
                                        </div> -->
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6 shadow p-3 mb-5 ">
                                <!-- card -->
                                <div class="card card-h-100 text-center tadmin">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate acadmin">My Certificates</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value acadmin" data-target="<?php echo $mycertificatedetails ?>">0</span>
                                                </h4>
                                            </div>
                                            <!-- <div class="col-6">
                                                <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                            </div> -->
                                        </div>
                                        <!-- <div class="text-nowrap">
                                            <span class="badge bg-soft-danger text-danger">-29 Trades</span>
                                            <span class="ms-1 text-muted font-size-13">Since last week</span>
                                        </div> -->
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            
                              
                        </div><!-- end row-->

                        <?php
                                        $sel2=mysqli_query($conn01,"select user_id  from userlogin where username='".$_SESSION['username']."'");
                                        $row2=mysqli_fetch_array($sel2);
                                          $query_run="select courses.*,user_courses.status as coursestatus from courses,user_courses,userlogin where courses.courseid=user_courses.course_id && userlogin.user_id=user_courses.user_id && userlogin.role='employee' && userlogin.status='Active' && userlogin.username='".$_SESSION['username']."' order by course_code";
                                          $sql_query_run=mysqli_query($conn01,$query_run);
                                          
                                          if(mysqli_num_rows($sql_query_run) > 0)
                                          {
                                              ?>
                        
                                <div class="row">
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
                                            <h4 class="card-title"><?php echo $rownum['course_name'] ?></h4>
                                            <p class="card-text"><?php echo substr($rownum['description'],0,50) ?>...</p>
                                            <a href="start_course-<?php echo $rownum['courseid'] ?>" class="btn btn-primary waves-effect waves-light">Start</a>
                                            <span class="<?php if($rownum['coursestatus']=="ongoing") { echo "text-danger"; } else if($rownum['coursestatus']=="completed") { echo "text-success"; }?> text-end statusspan"><i class="mdi <?php if($rownum['coursestatus']=="ongoing") { echo "mdi-bullseye-arrow"; } else if($rownum['coursestatus']=="completed") { echo "mdi-check-all"; }?> me-3"></i><?php echo ucfirst($rownum['coursestatus']) ?></span>
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


                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                


<?php
include 'includes/__settings.php';
include 'includes/__scripts.php';
?>
<script>
                    $(document).ready(function()
                    {
                        $( "div.card.tadmin" )
                        .mouseover(function() {

                            $( this ).addClass( "toadmin" );
                            $( ".acadmin", this ).addClass( "acoadmin" );
                            
                        })
                        .mouseout(function() {
                            $( this ).removeClass( "toadmin" );
                            $( ".acadmin", this ).removeClass( "acoadmin" );
                        });

                    });
                </script>
<?php
include 'includes/__footer.php';
?>
                