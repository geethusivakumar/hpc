<?php
session_start();
include("includes/__dbconnect.php");
if(!$_SESSION['username'])
{
    header('Location:login');
    session_destroy();
}
include 'includes/__header.php';
include 'includes/__cusnavbar.php';
include 'includes/__custopnav.php';
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
                                    <h4 class="mb-sm-0 font-size-18">My Courses</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="customerdashboard">Home</a></li>
                                            <li class="breadcrumb-item active">Courses</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        

                        <?php
                                        $sel2=mysqli_query($conn01,"select user_id  from userlogin where username='".$_SESSION['username']."'");
                                        $row2=mysqli_fetch_array($sel2);
                                          $query_run="select courses.*,user_courses.status as coursestatus from courses,user_courses,userlogin where courses.courseid=user_courses.course_id && userlogin.user_id=user_courses.user_id && userlogin.role='customer' && userlogin.status='Active' && userlogin.username='".$_SESSION['username']."' order by course_code";
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
                                            <a href="customer_course-<?php echo $rownum['courseid'] ?>" class="btn btn-primary waves-effect waves-light">Start</a>
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
                