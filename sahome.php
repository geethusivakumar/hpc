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
                                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="sadashboard">Home</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <?php 
                         $total=mysqli_query($conn01,"select * from userlogin where role ='admin' && status='Active'");
                         $totaladmins=mysqli_num_rows($total);
                         $totalemp=mysqli_query($conn01,"select * from userlogin where role='employee' && status='Active'");
                         $totalempusers=mysqli_num_rows($totalemp);
                         $totalcus=mysqli_query($conn01,"select * from userlogin where role='customer' && status='Active'");
                         $totalcususers=mysqli_num_rows($totalcus);
                         $totalcourse=mysqli_query($conn01,"select * from courses where status='Active'");
                         $totalcourses=mysqli_num_rows($totalcourse);
                        ?>

                        <div class="row">
                            <div class="col-xl-3 col-md-6 shadow p-3 mb-5 ">
                                <!-- card -->
                                <div class="card card-h-100 text-center tadmin">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate acadmin">Total Admins</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value acadmin" data-target="<?php echo $totaladmins ?>">0</span>
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate acadmin">Total Employees</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value acadmin" data-target="<?php echo $totalempusers ?>">0</span>
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate acadmin">Total Customers</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value acadmin" data-target="<?php echo $totalcususers ?>">0</span>
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate acadmin">Total Courses</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value acadmin" data-target="<?php echo $totalcourses ?>">0</span>
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
                                        
                                        $query_run="select * from courses order by course_code";
                                        $sql_query_run=mysqli_query($conn01,$query_run);
                                        
                                        if(mysqli_num_rows($sql_query_run) > 0)
                                        {
                                            ?>
                      
                              <div class="row">
                              <div class="col-12">
                              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                  <h4 class="mb-sm-0 font-size-18">HPC Courses</h4>
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
                                          <h4 class="card-title"><a href="" class="coursehyperlink"><?php echo $rownum['course_name'] ?></a></h4>
                                          <p class="card-text"><?php echo substr($rownum['description'],0,50) ?>...</p>
                                          <span><strong>Added By</strong></span>
                                          <?php
                                            $admin=mysqli_query($conn01,"select name  from admin_details where user_id=".$rownum['createdby']."");
                                            $admindetails=mysqli_fetch_array($admin);
                                          ?>
                                            <span class="<?php if($rownum['status']=="Inactive") { echo "text-danger"; } else if($rownum['status']=="Active") { echo "text-success"; }?> text-end statusspan" title="<?php if($rownum['status']=="Inactive") { echo "Inactive Course"; } else if($rownum['status']=="Active") { echo "Active Course"; }?>"><i class="mdi <?php if($rownum['status']=="Inactive") { echo "mdi-block-helper"; } else if($rownum['status']=="Active") { echo "mdi-check-all"; }?> me-3"></i><?php echo ucfirst($admindetails['name']) ?></span>
                                  
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
                