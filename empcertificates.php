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
                        
                    <?php
                                        
                                        $sel2=mysqli_query($conn01,"select userlogin.user_id,userdetails.name from userlogin,userdetails where userlogin.user_id=userdetails.user_id && username='".$_SESSION['username']."'");
                                        $row2=mysqli_fetch_array($sel2);
                                        ?>
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">My Certificates</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="employeedashboard">Home</a></li>
                                            <li class="breadcrumb-item active">Certificates</li>
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

                                <div class="card-bod table-responsive">  
                                        <?php
                                          $query_run="select courses.course_name,certificates.certificate,certificates.cert_id from courses,user_courses,certificates where courses.courseid=user_courses.course_id && user_courses.status='completed' && user_courses.join_id=certificates.join_id && user_courses.user_id=".$row2['user_id'];
                                          $sql_query_run=mysqli_query($conn01,$query_run);
                                        ?>  
                                <table id="datatable" class="table table-bordered   nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Cert No</th>
                                                <th>Course Name</th>
                                                <th>Certificate</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                               <?php
                                               if(mysqli_num_rows($sql_query_run) > 0)
                                               {
                                                    $i=1;
                                                   while($rownum = mysqli_fetch_assoc($sql_query_run))
                                                   {
                                                    $cert=substr($rownum['certificate'],0,-3);
                                                    $cert_img=$cert."jpg";
                                                    $certfct_no="HPC100".$rownum['cert_id'];
                                               ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $certfct_no; ?></td>
                                                <td>
                                                <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                <i class="mdi mdi-check-all label-icon"></i><strong><?php echo $rownum['course_name']; ?></strong> 
                                                </div>
                                                </td>
                                                <td><?php echo "<img src='Certificates/".$cert_img."' style='width:150px; height:100px;'/>"; ?></td>
                                                <td><div class="d-flex justify-content-evenly flex-wrap gap-2">
                                                <a href="download.php?filename=<?php echo $rownum['certificate']; ?>" class="btn btn-success waves-effect waves-light edit_btn" title="Click here to download Certificate">
                                                <i class="mdi mdi-arrow-down-thin font-size-18 align-middle me-2"></i>Download Certificate</a>
                                                
                                                </div></td>
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
                if(isset($_POST['generatecert']))
                {
                    $certfict=mysqli_query($conn01,"select certificates.* from certificates,user_courses where certificates.join_id=user_courses.join_id && user_courses.course_id=".$_GET['courseid']." && user_courses.user_id=".$row2['user_id']);
                    if(mysqli_num_rows($certfict)>0)
                    {
                        echo "<script>alert('Certificate generated already, Please check your certificates on Certificates section..!!');
                                document.location='employeecertificates';
                                </script>";
                    }
                    else{
                    $certfictdetails=mysqli_fetch_array($certfict);
                    $font="Arial.ttf";
                    $image=imagecreatefromjpeg("certificate.jpg");
                    $color=imagecolorallocate($image,81,86,190);
                    $user_id=$row2['user_id'];
                    $name=$row2['name'];
                    $course=$coursedetails['course_name'];
                    imagettftext($image,100,0,1600,1600,$color,$font,$name);
                    imagettftext($image,60,0,1230,2000,$color,$font,$course);
                    imagejpeg($image,"Certificates/".$user_id.".jpg");
                    $pdf=new FPDF('L','in',[11.7,8.27]);
                    $pdf->AddPage();
                    $pdf->Image("Certificates/".$user_id.".jpg",0,0,11.7,8.27);
                    $pdf->Output("Certificates/".$user_id.".pdf","F");
                    imagedestroy($image);
                    
                            $joinid=mysqli_query($conn01,"select join_id from user_courses where course_id=".$_GET['courseid']);
                            $joinid_details=mysqli_fetch_array($joinid);
                            $certificate_pdf=$user_id.".pdf";
                            $ins=mysqli_query($conn01,"insert into certificates(join_id,certificate)values(".$joinid_details['join_id'].",'".$certificate_pdf."')");
                            if($ins)
                            {
                                echo "<script>
                                alert('Certificate generated successfully');
                                document.location='employeecertificates';
                                </script>";
                            }
                            else
                            {
                                echo "<script>
                                alert('Database Error');
                                document.location='employeecertificates';
                                </script>";

                            }
                        }
                }
                ?>
   
                
            <?php

//include 'includes/__adminmodal.php';
include 'includes/__settings.php';
include 'includes/__scripts.php';
?>



<?php
//include 'includes/__adminajax.php';
include 'includes/__footer.php';
?>
