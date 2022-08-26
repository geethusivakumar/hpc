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
                                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="admindashboard">Home</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
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
                                                    <span class="counter-value acadmin" data-target="<?php echo $totaluactiveadmins ?>">0</span>
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
                                                    <span class="counter-value acadmin" data-target="<?php echo $totalactiveemployees ?>">0</span>
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
                                                    <span class="counter-value acadmin" data-target="<?php echo $totalactivecustomers ?>">0</span>
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
                                                    <span class="counter-value acadmin" data-target="<?php echo $totalnoofcourse ?>">0</span>
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
                