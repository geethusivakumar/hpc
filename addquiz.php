<?php
session_start();
if(!$_SESSION['username'])
{
    header('Location:login');
    session_destroy();
}
include 'includes/__dbconnect.php';
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

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Quiz</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="admindashboard">Home</a></li>
                                            <li class="breadcrumb-item active">Quiz</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                                        <?php
                                        $sel2=mysqli_query($conn01,"select user_id  from userlogin where username='".$_SESSION['username']."'");
                                        $row2=mysqli_fetch_array($sel2);
                                        ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                    <button type="button" class="btn btn-danger w-lg waves-effect waves-light add_btn" data-bs-toggle="modal" data-bs-target="#AddQuiz" >Add Quiz</button>


                        <!-- The Modal -->
                        <div class="modal" id="AddQuiz">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Quiz</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body" id="add_admins">
                                <form  method="POST" class="w-100" enctype="multipart/form-data">
                                            <div class="col-lg-12">
                                                <div>
                                                <div class="mb-3">
                                             <label class="form-label fw-bold">Select Course</label>
                                                <?php
                                                $course=mysqli_query($conn01,"select * from courses where createdby=".$row2['user_id']);
                                                ?>
                                                    <select class="form-select" aria-label="Default select example" name="courseid" onchange="selectCourse(this.value)" required>
                                                    <option value="">-- Select Course --</option>
                                                        <?php 
                                                        while($coursedetails=mysqli_fetch_array($course))
                                                        {
                                                            ?>
                                                      <option value="<?php echo $coursedetails['courseid'] ?>"><?php echo $coursedetails['course_name'] ?></option>
                                                      <?php
                                                        }
                                                      ?>
                                                    </select>
                                            </div>
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3" id="chapterdiv">
                                             <label class="form-label fw-bold">Select Chapter</label>
                                                <select class="form-select" aria-label="Default select example" name="chapter_id">
                                                      <option value="Active" selected >-- Select Chapter --</option>
                                                </select>
                                            </div>
                                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                    
                                    
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer ">
                                    <button type="submit" name="addquiz" id="addadmin_btn"class="btn btn-success ">Add</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>


                                        <!-- <h4 class="card-title">Default Datatable</h4>
                                        <p class="card-title-desc">DataTables has most features enabled by
                                            default, so all you need to do to use it with your own tables is to call
                                            the construction function: <code>$().DataTable();</code>.
                                        </p> -->
                                    </div>
                                <!--########################### ADD OUTPUT########################### -->
                                

 

                                <!--########################### ADD OUTPUT########################### -->

                                    <div class="card-bod table-responsive">
                                        <?php
                                        $sel2=mysqli_query($conn01,"select user_id  from userlogin where username='".$_SESSION['username']."'");
                                        $row2=mysqli_fetch_array($sel2);
                                          $query_run="select courses.*,coursedetails.*,quiz.* from courses,coursedetails,quiz where courses.courseid=coursedetails.courseid && quiz.chapter_id =coursedetails.chapter_id && coursedetails.createdby=quiz.created_by && quiz.created_by=".$row2['user_id']."";
                                          $sql_query_run=mysqli_query($conn01,$query_run);
                                        ?>
        
                                        <table id="datatable" class="table table-bordered   nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Course Name</th>
                                                <th>Chapter Name</th>
                                                <th class="sort_del1">Action</th>
                                                <th class="sort_del2"></th>
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
                                                <td><?php echo $rownum['course_name']; ?></td>
                                                <td><?php echo $rownum['chaptername']; ?></td>
                                                <td >
                                            <div class="d-flex justify-content-evenly flex-wrap gap-2">
                                                
                                                
                                            <a href="editquiz-<?php echo $rownum['quiz_id']; ?>" class="btn btn-success waves-effect waves-light edit_btn">
                                            <i class="mdi mdi-pencil  font-size-18 align-middle me-2"></i>Edit</a>
                                            
                                            </div>
                                            
                                        
                                        </td>
                                                <td><div class="d-flex justify-content-evenly flex-wrap gap-2 ">
                                            <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#QuizDelete<?php echo $rownum['quiz_id']; ?>">
                                            <i class="mdi mdi-trash-can  font-size-18 align-middle me-2"></i> Delete
                                            </button></div>
                                        
                                        <!-- The Modal -->
                                        <div class="modal" id="QuizDelete<?php echo $rownum['quiz_id']; ?>">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete Quiz</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            
                                                        <p><div class="alert alert-warning">Are you sure want to delete this Quiz?</p>
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer ">
                                                        <form method="post">
                                                        <input type="hidden" name="h1" value="<?php echo $rownum['quiz_id']?>"/>
                                                            <button type="submit" name="deletequiz<?php echo $rownum['quiz_id']; ?>" id="addadmin_btn"class="btn btn-success ">Yes</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        
                                            <?php
                                                if(isset($_POST['deletequiz'.$rownum['quiz_id']]))
                                                {
                                                    $quiz_id =$_POST['h1'];
                                        $del=mysqli_query($conn01,"delete from quiz where quiz_id =".$quiz_id."");
                                            if($del)
                                                    {
                                                        echo "<script>
                                                                document.location='onlinequiz';					
                                                              </script>";
                                                        
                                                    }
                                                }
  ?>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        </td>
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
if(isset($_POST['addquiz']))
			{
                $courseid=$_POST['courseid'];
                $chapter_id=$_POST['chapter_id'];
                $ins =mysqli_query($conn01,"insert into quiz(courseid,chapter_id,created_by)values(".$courseid.",".$chapter_id.",".$row2['user_id'].")");
                if($ins)
				{
					echo "<script>
					alert('Quiz added successfully');
					document.location='onlinequiz';
					</script>";
				}
                else
				{
					echo "<script>
					alert('Database Error');
					document.location='onlinequiz';
					</script>";
				}
            }
            ?>