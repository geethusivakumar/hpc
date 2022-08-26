<?php
session_start();
if(!$_SESSION['username'])
{
    header('Location:login');
    session_destroy();
}
include 'includes/__dbconnect.php';
$sel2=mysqli_query($conn01,"select user_id  from userlogin where username='".$_SESSION['username']."'");
$row2=mysqli_fetch_array($sel2);
$quiz=mysqli_query($conn01,"select * from quiz where created_by=".$row2['user_id']." && quiz_id=".$_GET['quiz_id']."");
if(mysqli_num_rows($quiz)>0)
{
include 'includes/__header.php';
include 'includes/__adminnavbar.php';
include 'includes/__admintopnav.php';
?>
<script>
    function selectCourse(q)
    {
        var xml= new XMLHttpRequest();
        xml.open("GET", "selectchapters.php?cid="+q, false);
        xml.send();
        document.getElementById("chapterdiv").innerHTML=xml.responseText;
    }
</script>
<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                                    <?php
                                        $q=mysqli_query($conn01,"select * from quiz where quiz_id=".$_GET['quiz_id']."");
                                        $qdetails=mysqli_fetch_array($q);
                                        $ch=mysqli_query($conn01,"select * from coursedetails where chapter_id=".$qdetails['chapter_id']."");
                                        $chdetails=mysqli_fetch_array($ch);
                                    ?>

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                
                                    <h4 class="mb-sm-0 font-size-18">&nbsp;</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="admindashboard">Home</a></li>
                                            <li class="breadcrumb-item active">Quiz</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                            <div class="bg-soft-light p-3 text-center">
                                                <div class="vstack gap-3">
                                                    <div class="grid-example">Quiz</div>
                                                </div>
                                            </div>
                                            <h4 class="mb-sm-0 font-size-18 p-3">Chapter Name : <mark><?php echo $chdetails['chaptername']; ?></mark></h4>
                        </div>
                        <!-- end page title -->
                                        
                        <div class="row">
                            <div class="col-12">
                            <div class="card">
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample1" aria-expanded="true" aria-controls="multiCollapseExample1">Add Multiple Choice Questions</button>
                                    <div class="card-body p-0">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="multi-collapse collapse" id="multiCollapseExample1">
                                                    <div class="card border shadow-none card-body text-muted mb-0">
                                                        
                                                    <form method="post">
                                            <div class="col-lg-12">
                                                <div>
                                                                <div class="mb-3">
                                                                    <label for="basicpill-address-input" class="form-label">Question</label>
                                                                    <textarea id="basicpill-address-input" name="question" class="form-control" rows="2" placeholder="Enter Questin Here"></textarea>
                                                                </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-lg-6">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Option A</label>
                                                        <input class="form-control" type="text" name="option_a" placeholder="Option A" id="example-text-input">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Option B</label>
                                                        <input class="form-control" type="text" name="option_b" placeholder="Option B" id="example-text-input">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Option C</label>
                                                        <input class="form-control" type="text" name="option_c" placeholder="Option C" id="example-text-input">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Option D</label>
                                                        <input class="form-control" type="text" name="option_d" placeholder="Option D" id="example-text-input">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            </div>
                                            <div class="mb-3">
                                             <label class="form-label fw-bold">Correct Answer</label>
                                            <select class="form-select" aria-label="Default select example" name="rightanswer">
                                                      <option value="A">A</option>
                                                      <option value="B">B</option>
                                                      <option value="C">C</option>
                                                      <option value="D">D</option>
                                                    </select>
                                            </div>
                                            <div class="mt-4">
                                                            <button type="submit" name="addqn" class="btn btn-primary w-md">Add Question</button>
                                            </div>
                                            </form>     

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card-body -->
                                </div>
                                <div class="card">
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="true" aria-controls="multiCollapseExample2">Edit Question Details</button>
                                    <div class="card-body p-0">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="multi-collapse collapse" id="multiCollapseExample2">
                                                    <div class="card border shadow-none card-body text-muted mb-0">
                                                        
                                                    
                                                    <?php
                                                    $questions=mysqli_query($conn01,"select * from questions where quiz_id=".$_GET['quiz_id']."");
                                                    while($questiondetails=mysqli_fetch_array($questions))
                                                    {
                                                        ?>
                                                        <form method="post">
                                            <div class="col-lg-12">
                                                <div>
                                                                <div class="mb-3">
                                                                    <label for="basicpill-address-input" class="form-label">Question</label>
                                                                    <textarea id="basicpill-address-input" name="question" class="form-control" rows="2" placeholder="Enter Questin Here"><?php echo $questiondetails['question'] ?></textarea>
                                                                </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-lg-6">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Option A</label>
                                                        <input class="form-control" type="text" name="option_a" value="<?php echo $questiondetails['option_a'] ?>"  placeholder="Option A" id="example-text-input">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Option B</label>
                                                        <input class="form-control" type="text" name="option_b" value="<?php echo $questiondetails['option_b'] ?>"  placeholder="Option B" id="example-text-input">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Option C</label>
                                                        <input class="form-control" type="text" name="option_c" value="<?php echo $questiondetails['option_c'] ?>"  placeholder="Option C" id="example-text-input">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Option D</label>
                                                        <input class="form-control" type="text" name="option_d" value="<?php echo $questiondetails['option_d'] ?>"  placeholder="Option D" id="example-text-input">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            </div>
                                            <div class="mb-3">
                                             <label class="form-label fw-bold">Correct Answer</label>
                                            <select class="form-select" aria-label="Default select example" name="rightanswer">
                                                        <option <?php if ($questiondetails['answer']=="A") { ?>selected="selected"<?php } ?>>A</option>
                                                        <option <?php if ($questiondetails['answer']=="B") { ?>selected="selected"<?php } ?>>B</option>
                                                        <option <?php if ($questiondetails['answer']=="C") { ?>selected="selected"<?php } ?>>C</option>
                                                        <option <?php if ($questiondetails['answer']=="D") { ?>selected="selected"<?php } ?>>D</option>
                                                    </select>
                                            </div>
                                            <div class="mt-4 mb-3">
                                                            <button type="submit" name="editqns<?php echo $questiondetails['qn_id']?>" class="btn btn-primary w-md">Update Question</button>
                                            </div>
                                            </form> 

                                            <?php
                                            if(isset($_POST['editqns'.$questiondetails['qn_id']]))
                                                        {
                                                            $question=mysqli_real_escape_string($conn01,$_POST['question']);
                                                            $option_a=mysqli_real_escape_string($conn01,$_POST['option_a']);
                                                            $option_b=mysqli_real_escape_string($conn01,$_POST['option_b']);
                                                            $option_c=mysqli_real_escape_string($conn01,$_POST['option_c']);
                                                            $option_d=mysqli_real_escape_string($conn01,$_POST['option_d']);
                                                            $answer=$_POST['rightanswer'];
                                                            $ins =mysqli_query($conn01,"update questions set question='".$question."',option_a='".$option_a."',option_b='".$option_b."',option_c='".$option_c."',option_d='".$option_d."',answer='".$answer."' where qn_id=".$questiondetails['qn_id']);
                                                            if($ins)
                                                            {
                                                                echo "<script>
                                                                alert('Question updated successfully');
                                                                document.location='editquiz-".$_GET['quiz_id']."';
                                                                </script>";
                                                            }
                                                            else
                                                            {
                                                                echo "<script>
                                                                alert('Database Error');
                                                                document.location='editquiz-".$_GET['quiz_id']."';
                                                                </script>";
                                                            }
                                                        }
                                            ?>
                                            

                                            <?php
                                            }
                                            ?>

                                                

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card-body -->
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
<?php
if(isset($_POST['addqn']))
			{
                $question=mysqli_real_escape_string($conn01,$_POST['question']);
                $option_a=mysqli_real_escape_string($conn01,$_POST['option_a']);
                $option_b=mysqli_real_escape_string($conn01,$_POST['option_b']);
                $option_c=mysqli_real_escape_string($conn01,$_POST['option_c']);
                $option_d=mysqli_real_escape_string($conn01,$_POST['option_d']);
                $answer=$_POST['rightanswer'];
                $ins =mysqli_query($conn01,"insert into questions(quiz_id,question,option_a,option_b,option_c,option_d,answer)values(".$_GET['quiz_id'].",'".$question."','".$option_a."','".$option_b."','".$option_c."','".$option_d."','".$answer."')");
                if($ins)
				{
					echo "<script>
					alert('Question added successfully');
					document.location='editquiz-".$_GET['quiz_id']."';
					</script>";
				}
                else
				{
					echo "<script>
					alert('Database Error');
					document.location='editquiz-".$_GET['quiz_id']."';
					</script>";
				}
            }
?>
<?php
            }
            else
            {
                header('Location:error404');
            }
            ?>
                                        