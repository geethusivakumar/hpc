<?php
session_start();
if(!$_SESSION['username'])
{
    header('Location:login');
    session_destroy();
}
include 'includes/__dbconnect.php';
require 'vendor/autoload.php';
$sel2=mysqli_query($conn01,"select user_id  from userlogin where username='".$_SESSION['username']."'");
$row2=mysqli_fetch_array($sel2); 
$c=mysqli_query($conn01,"select * from user_courses where course_id =".$_GET['courseid']." && user_id=".$row2['user_id']);
if(mysqli_num_rows($c)>0)
{
include 'includes/__header.php';
include 'includes/__empcoursenavbar.php';
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
                                    <h4 class="mb-sm-0 font-size-18">&nbsp;</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="employeedashboard">Home</a></li>
                                            <li class="breadcrumb-item active">Courses</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                        <?php
                                $course=mysqli_query($conn01,"select * from courses where courseid =".$_GET['courseid']."");
                                $coursedetails=mysqli_fetch_array($course);
                            ?>
                        <div class="d-grid gap-2">
                                        <button type="button" class="btn btn-primary btn-lg waves-effect waves-light"><?php echo $coursedetails['course_name'];?></button>
                                    </div>
                            <div class="col-12">
                                <div class="card">

                                    <?php
                                        if((@$_GET['chap_details']=='summary')&&(@$_GET['chap_id']!=""))
                                        {
                                            $chap=mysqli_query($conn01,"select * from coursedetails where chapter_id =".@$_GET['chap_id']."");
                                            $chapdetails=mysqli_fetch_array($chap);
                                            ?>
                                            <div class="card-body p-4">
                                                <div class="row">
                                                <p class="card-text"><?php echo $chapdetails['chaptersummary'];?></p>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        else if((@$_GET['chap_details']=='notes')&&(@$_GET['chap_id']!=""))
                                        {
                                            $chap=mysqli_query($conn01,"select * from coursedetails where chapter_id =".@$_GET['chap_id']."");
                                            $chapdetails=mysqli_fetch_array($chap);
                                            ?>
                                            <div class="card-body p-4">
                                                <div class="row">
                                                    <?php
                                                    $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != "off") ? "https" : "http");
                                                    $base_url .= "://".$_SERVER['HTTP_HOST'];
                                                    $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
                                                    ?>
                                                <!-- <iframe src="http://www.slideshare.net/api/oembed/2?url=https://ssni.co.in/wp-content/uploads/2021/10/b01.pdf&embedded=true" style="width:100%; height:700px;" frameborder="0"></iframe> -->
                                                <iframe src="https://docs.google.com/gview?url=<?php echo $base_url ?>pdf/<?php echo $chapdetails['pdfpath'];?>&embedded=true" style="width:100%; height:700px;" frameborder="0"></iframe>
                                                <!-- <object data="pdf/<?php //echo $chapdetails['pdfpath'];?>"  style="width: 100%; height: 800px; display: block;"></object> -->
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        else if((@$_GET['chap_details']=='pptx')&&(@$_GET['chap_id']!=""))
                                        {
                                            $chap=mysqli_query($conn01,"select * from coursedetails where chapter_id =".@$_GET['chap_id']."");
                                            $chapdetails=mysqli_fetch_array($chap);
                                            ?>
                                            <div class="card-body p-4">
                                                <div class="row">
                                                    <?php
                                                    $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != "off") ? "https" : "http");
                                                    $base_url .= "://".$_SERVER['HTTP_HOST'];
                                                    $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
                                                 ?>
                                                    <iframe src='https://view.officeapps.live.com/op/embed.aspx?src=<?php echo $base_url ?>pptx/<?php echo $chapdetails['pptxpath'];?>' width='100%' height='600px' frameborder='0'> </iframe>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        else if((@$_GET['chap_details']=='video')&&(@$_GET['chap_id']!=""))
                                        {
                                            $chap=mysqli_query($conn01,"select * from coursedetails where chapter_id =".@$_GET['chap_id']."");
                                            $chapdetails=mysqli_fetch_array($chap);
                                            $ext = explode(".",$chapdetails['videopath']);
                                            $s3 = new Aws\S3\S3Client([
                                                'region'  => 'us-east-2',
                                                'version' => 'latest',
                                                'credentials' => [
                                                    'key'    => "AKIAVMHR7ZJ7YSUYP7FP",
                                                    'secret' => "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",
                                                ]
                                            ]);
                                            
                                            $cmd = $s3->getCommand('GetObject', [
                                                'Bucket' => 'test-hcfire',
                                                'Key' => $chapdetails['videopath']
                                            ]);
                                            
                                            $request = $s3->createPresignedRequest($cmd, '+20 minutes');
                                            
                                            $presignedUrl = (string)$request->getUri();
                                            ?>
                                            <div class="card-body p-4">
                                                <div class="row">
                                                <video controls autoplay width="100%" height="100%" controlsList="nodownload" id="videoid<?php echo $_GET['chap_id'];?>">
                                                                            <source src='<?php echo $presignedUrl ?>' type='video/<?php echo $ext[1] ?>'>
                                                                            </video>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        else if((@$_GET['chap_details']=='quiz')&&(@$_GET['chap_id']!=""))
                                        {
                                            $chap=mysqli_query($conn01,"select * from coursedetails where chapter_id =".@$_GET['chap_id']."");
                                            $chapdetails=mysqli_fetch_array($chap);
                                            $quizid=mysqli_query($conn01,"select quiz_id from quiz where chapter_id =".@$_GET['chap_id']."");
                                            $quizid=mysqli_fetch_array($quizid);
                                            ?>
                                            <div class="bg-soft-light p-3 text-center">
                                                <div class="vstack gap-3">
                                                    <div class="grid-example">Quiz</div>
                                                </div>
                                            </div>
                                            <h4 class="mb-sm-0 font-size-18 p-3">Contents : <mark><?php echo $chapdetails['chaptername']; ?></mark></h4>
                                            <form method="post" action="empsubmitquiz.php">
                                            <?php
                                            $quizqns=mysqli_query($conn01,"select questions.* from questions,quiz,user_courses where questions.quiz_id=quiz.quiz_id && quiz.chapter_id=".@$_GET['chap_id']." && user_courses.user_id=".$row2['user_id']." && user_courses.course_id=quiz.courseid order by rand() limit 10");
                                            if(mysqli_num_rows($quizqns)>0)
                                            {
                                                $i=1;
                                                $x='';
                                            while($quizqndetails = mysqli_fetch_array($quizqns))
                                                {
                                                    ?>

                                                    
                                                        <div class="card border border-primary">
                                                            <div class="card-header bg-transparent border-primary">
                                                                <h5 class="my-0 text-primary"><?php echo $i; ?>. <?php echo $quizqndetails['question']; ?></h5>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="card-body">
                                                                    <p class="card-text"><strong>A. </strong><input type="radio" name="<?php echo $quizqndetails['qn_id']; ?>" value="A"/> <?php echo $quizqndetails['option_a']; ?></p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="card-body">
                                                                    <p class="card-text"><strong>B. </strong><input type="radio" name="<?php echo $quizqndetails['qn_id']; ?>" value="B"/> <?php echo $quizqndetails['option_b']; ?></p>
                                                                    </div>
                                                                </div>
                                                                    
                                                                <div class="col-lg-6">
                                                                    <div class="card-body">
                                                                    <p class="card-text"><strong>C. </strong><input type="radio" name="<?php echo $quizqndetails['qn_id']; ?>" value="C"/> <?php echo $quizqndetails['option_c']; ?></p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="card-body">
                                                                    <p class="card-text"><strong>D. </strong><input type="radio" name="<?php echo $quizqndetails['qn_id']; ?>" value="D"/> <?php echo $quizqndetails['option_d']; ?></p>
                                                                    <input type="radio" style="visibility: hidden;" checked="checked" value="none" name="<?php echo $quizqndetails['qn_id']; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                      
                                                    <?php
                                                    
                                                    $x=$x.$quizqndetails['qn_id'].",";
                                                    
                                                    $i++;
                                                    // $_SESSION['quiz_id']=$quizqndetails['quiz_id'];
                                                }
                                                $_SESSION['qn']=$x;
                                                $_SESSION['totalqn']=$i-1;
                                            }
                                                
                                        ?>
                                        <div class="mt-4">
                                                            <button type="submit" name="submitquiz" class="btn btn-primary w-100">Submit Quiz</button>
                                            </div>
                                            </form>
                                            <?php

                                            
                                        }
                                    else
                                    {
                                    ?>




                                    <div class="card-body p-4">
        
                                        <div class="row">
                                        <p class="card-text"><?php echo $coursedetails['description'];?></p>
                                        </div>
                                    </div>
                                    
                                            <!-- Cover image -->
                                            <div class="row">
                                                            <img class="d-block img-fluid mx-auto" src="assets/images/cover.png" alt="First slide">
                                                        
                                            </div><!-- end row-->
                                            <!-- Cover image -->
                                    <?php
                                        }
                                        ?>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <!-- End Form Layout -->


                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
            </div>

                
                
            

   
                
            
<script src="assets/js/script.js"></script>


<?php
//include 'includes/__adminajax.php';
include 'includes/__settings.php';
include 'includes/__scripts.php';
include 'includes/__footer.php';
?>
<script>
                                       /* document.getElementById("quizbtn<?php //echo $_GET['chap_id'];?>").style.pointerEvents="none";
                                        document.getElementById("quizbtn<?php //echo $_GET['chap_id'];?>").style.cursor="default";

                                        document.getElementById('videoid<?php// echo $_GET['chap_id'];?>').addEventListener('ended',videoEndHandler<?php //echo $_GET['chap_id'];?>,false);
                                        function videoEndHandler<?php //echo $_GET['chap_id'];?>(e) { 
                                        document.getElementById("quizbtn<?php //echo $_GET['chap_id'];?>").style.pointerEvents="auto";
                                            document.getElementById("quizbtn<?php //echo $_GET['chap_id'];?>").style.cursor="pointer";
                                        }*/
                                   </script>
<script>
        $(document).ready(function()
    { 
        $(document).bind("contextmenu",function(e){
                return false;
        }); 
    })
</script>         
            <?php
            }
            else
            {
                header('Location:error404');
            }
            ?>