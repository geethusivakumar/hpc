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
include 'includes/__fpdf.php';
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
                                        $sel2=mysqli_query($conn01,"select userlogin.user_id,userdetails.name from userlogin,userdetails where userlogin.user_id=userdetails.user_id && username='".$_SESSION['username']."'");
                                        $row2=mysqli_fetch_array($sel2);
                                        ?>
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Test Results of <?php echo $coursedetails['course_name']?> Course</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="employeedashboard">Home</a></li>
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
                                          $query_run="select coursedetails.chaptername,test_result.* from coursedetails,user_courses,test_result,quiz where coursedetails.courseid=".$coursedetails['courseid']." && quiz.chapter_id=coursedetails.chapter_id && quiz.quiz_id=test_result.test_id && user_courses.course_id=coursedetails.courseid && test_result.user_id=user_courses.user_id && test_result.user_id=".$row2['user_id'];
                                          $sql_query_run=mysqli_query($conn01,$query_run);
                                        ?>  
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Chapter Name</th>
                                                <th>Quiz Summary</th>
                                                <th>Percentage of Marks</th>
                                                <th>Result</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                               <?php
                                               if(mysqli_num_rows($sql_query_run) > 0)
                                               {
                                                    $i=1;
                                                   while($rownum = mysqli_fetch_assoc($sql_query_run))
                                                   {
                                                       
                                               ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
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
                                                                <span class="font-size-16">Un Answered </span>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <span class="badge rounded-pill badge-soft-danger font-size-12 fw-medium"><strong><?php echo $rownum['no_attempt']; ?></strong></span>
                                                            </div>
                                                        </div>    
                                                        </td>
                                                <td><span class="badge rounded-pill <?php if($rownum['score']>=50) { echo "badge-soft-success";} else { echo " badge-soft-danger";}?> font-size-24 fw-medium"><strong><?php echo $rownum['score']."%"; ?></strong></span></td>
                                                <td><span class="badge rounded-pill <?php if($rownum['score']>=50) { echo "badge-soft-success";} else { echo " badge-soft-danger";}?> font-size-24 fw-medium"><strong>
                                                    <?php
                                                            if($rownum['score']>=50)
                                                            {
                                                           echo "Passed";  
                                                            }
                                                            else 
                                                            {
                                                            echo "Failed"; 
                                                            }
                                                             ?></strong></span></td>
                                            </tr>
                                        
                                            <?php
                                            $i=$i+1;
                                                   }
                                                }
                                            ?>
                                            
                                            </tbody>
                                        </table>
                                </div>
                                <?php
                        $coursechapters=mysqli_query($conn01,"select * from coursedetails where courseid=".$_GET['courseid']);
                        $coursechaptersnumber=mysqli_num_rows($coursechapters);
                        $check_query=mysqli_query($conn01,"select COUNT(test_result.result_id) as totaltests,MAX(test_result.score) as maxmarks from coursedetails,user_courses,test_result,quiz where quiz.quiz_id=test_result.test_id && coursedetails.chapter_id=quiz.chapter_id && user_courses.course_id=quiz.courseid && quiz.courseid=coursedetails.courseid && user_courses.user_id=test_result.user_id && quiz.courseid=".$_GET['courseid']." && test_result.score>=50 && test_result.user_id=".$row2['user_id']." having COUNT(test_result.result_id)>=".$coursechaptersnumber);
                        if(mysqli_num_rows($check_query) > 0)
                                               {
                        ?>
                                <div class="mt-4">
                                <button type="submit" name="generatecert" class="btn btn-primary w-100">Generate Certificate</button>
                                </div>
                                <?php
                        }
                        ?>
                                </form>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        <div class="card-body">
                        


                                        <div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                            <i class="mdi mdi-alert-outline label-icon"></i><strong>Warning</strong> Generate Certificate button will be active once you have completed all chapters quizzes corresponding to each course and you must also need to secure 50% marks for each quizzes..!!
                                        </div>

                                        



                            </div>
                        
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
                    $joinid=mysqli_query($conn01,"select join_id from user_courses where course_id=".$_GET['courseid']." && user_id=".$row2['user_id']);
                    $joinid_details=mysqli_fetch_array($joinid);
                    $join_id=$joinid_details['join_id'];
                    $certificate_pdf=$join_id.".pdf";
                            $ins=mysqli_query($conn01,"insert into certificates(join_id,certificate)values(".$join_id.",'".$certificate_pdf."')");
                            if($ins)
                            {
                                $c=mysqli_query($conn01,"select cert_id from certificates where join_id=".$join_id." && certificate='".$certificate_pdf."' order by cert_id desc limit 1");
                                $cdetails=mysqli_fetch_array($c);
                                $font=__DIR__."/Arial.ttf";
                                $fontwidth=imagefontwidth($font);
                                $image=imagecreatefromjpeg("certificate.jpg");
                                $color=imagecolorallocate($image,81,86,190);
                                $name=$row2['name'];
                                $course=$coursedetails['course_name'];
                                $certno="HPC100".$cdetails['cert_id'];
                                $cntrecertno=(imagesx($image)/2)-($fontwidth*(strlen($certno)/2));
                                $cntrename=(imagesx($image)/2)-($fontwidth*(strlen($name)/2));
                                $cntrecourse=(imagesx($image)/2)-($fontwidth*(strlen($course)/2));
                                imagettftext($image,40,0,$cntrecertno,230,$color,$font,$certno);
                                imagettftext($image,80,0,$cntrename,1350,$color,$font,$name);
                                imagettftext($image,60,0,$cntrecourse,1570,$color,$font,$course);
                                imagejpeg($image,"Certificates/".$join_id.".jpg");
                                $pdf=new FPDF('L','in',[11.7,8.27]);
                                $pdf->AddPage();
                                $pdf->Image("Certificates/".$join_id.".jpg",0,0,11.7,8.27);
                                $pdf->Output("Certificates/".$join_id.".pdf","F");
                                imagedestroy($image);
                                mysqli_query($conn01,"update user_courses set status='completed' where course_id=".$_GET['courseid']." && user_id=".$row2['user_id']);
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
