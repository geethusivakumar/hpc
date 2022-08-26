<?php
session_start();
include("includes/__dbconnect.php");
if(!$_SESSION['username'])
{
    header('Location:login');
    session_destroy();
}
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
                                    <h4 class="mb-sm-0 font-size-18">Chapters</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="admindashboard">Home</a></li>
                                            <li class="breadcrumb-item active">Chapters</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <?php 
                         $total=mysqli_query($conn01,"select * from userlogin where role='admin' && status='Active'");
                         $totaluactiveadmins=mysqli_num_rows($total);
                         $totalemp=mysqli_query($conn01,"select * from userlogin where role='employee' && status='Active'");
                         $totalactiveemployees=mysqli_num_rows($totalemp);
                         $totalactivecus=mysqli_query($conn01,"select * from userlogin where role='customer' && status='Active'");
                         $totalactivecustomers=mysqli_num_rows($totalactivecus);
                         $totalcourse=mysqli_query($conn01,"select * from courses where status='Active'");
                         $totalnoofcourse=mysqli_num_rows($totalcourse);
                        ?>
                        <?php
                                        $sel2=mysqli_query($conn01,"select user_id  from userlogin where username='".$_SESSION['username']."'");
                                        $row2=mysqli_fetch_array($sel2);
                                          $query_run="select courses.*,courses.status as coursestatus,userlogin.* from courses,userlogin where courses.createdby=userlogin.user_id && courses.createdby=".$row2['user_id']." && courses.status='Active'";
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
                                            <a href="add_chapter-<?php echo $rownum['courseid'] ?>" class="btn btn-primary waves-effect waves-light">Chapters</a>
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
                