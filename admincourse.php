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
                                    <h4 class="mb-sm-0 font-size-18">Courses</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="admindashboard">Home</a></li>
                                            <li class="breadcrumb-item active">Courses</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                    <button type="button" class="btn btn-danger w-lg waves-effect waves-light add_btn" data-bs-toggle="modal" data-bs-target="#AddCourse" >Add Course</button>


                        <!-- The Modal -->
                        <div class="modal" id="AddCourse">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Course</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body" id="add_admins">
                                <form  method="POST" class="w-100" enctype="multipart/form-data">
                                            <div class="col-lg-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Course Name</label>
                                                        <input class="form-control" type="text" name="course_name" placeholder="Enter Course Name" id="example-text-input">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Course Code</label>
                                                        <input class="form-control" type="text" name="course_code" placeholder="Enter Course Code" id="example-text-input">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-address-input" class="form-label">Course Description</label>
                                                                    <textarea id="basicpill-address-input" name="description" class="form-control" rows="2" placeholder="Enter Course Description"></textarea>
                                                                </div>
                                                            </div>
                                            
                                            <div class="mb-3">
                                             <label class="form-label fw-bold">Status</label>
                                            <select class="form-select" aria-label="Default select example" name="status">
                                                      <option value="Active" selected >Active</option>
                                                      <option value="Inactive">Inactive</option>
                                                      
                                                    </select>
                                            </div>
					                    <div class="mb-3">
                                            <input type="file" name="photo" id="photo" class="form-control" title="Please upload photo in jpg, jpeg or png format">
                                            <p class="help-block" style="color:#900;">*Only jpg, jpeg, and png files are allowed*<br/>Resolution - (350px*250px)</p>
                                        </div>
                                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                    
                                    
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer ">
                                    <button type="submit" name="addcourse" id="addadmin_btn"class="btn btn-success ">Add</button>
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
                                <div class="outputadd" id="outputadd">
                                    
                                    </div>

 

                                <!--########################### ADD OUTPUT########################### -->

                                    <div class="card-bod table-responsive">
                                        <?php
                                        $sel2=mysqli_query($conn01,"select user_id  from userlogin where username='".$_SESSION['username']."'");
                                        $row2=mysqli_fetch_array($sel2);
                                          $query_run="select courses.*,courses.status as coursestatus,userlogin.* from courses,userlogin where courses.createdby=userlogin.user_id && courses.createdby=".$row2['user_id']." order by course_code";
                                          $sql_query_run=mysqli_query($conn01,$query_run);
                                        ?>
        
                                        <table id="datatable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Course Name</th>
                                                <th>Course Code</th>
                                                <th>Course Description</th>
                                                <th>Photo</th>
                                                <th>Status</th>
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
                                                <td><?php echo $rownum['course_code']; ?></td>
                                                <td><?php echo substr($rownum['description'],0,50); ?>...</td>
                                                <td><?php echo "<img src='Courses/".$rownum['photo']."'  style='width:75px; height:50px;'/>"; ?></td>
                                                <td>
                                                <?php if($rownum['coursestatus']=="Active") { ?>
                                                <div class="px-1 mb-0 text-center" role="alert">
                                                    <i class="mdi mdi-check-all d-block fs-3 mt-1 mb-1 text-success"></i>
                                                    <h5 class="text-success fs-6"><?php echo $rownum['coursestatus']; ?></h5>
                                                </div>
                                                <?php } else if($rownum['coursestatus']=="Inactive") { ?>
                                                <div class="px-1 mb-0 text-center" role="alert">
                                                    <i class="mdi mdi-block-helper d-block fs-3 mt-1 mb-1 text-danger"></i>
                                                    <h5 class="text-danger fs-6"><?php echo $rownum['coursestatus']; ?></h5>
                                                </div>
                                                <?php 
                                                } 
                                                ?>
                                                </td>
                                                <td >
                                            <div class="d-flex justify-content-evenly flex-wrap gap-2">
                                                
                                                
                                            <button class="btn btn-success waves-effect waves-light edit_btn" data-bs-toggle="modal" data-bs-target="#CourseEdit<?php echo $rownum['courseid']; ?>">
                                            <i class="mdi mdi-pencil  font-size-18 align-middle me-2"></i>Edit</button>
                                            
                                            </div>
                                            <!-- The Modal -->
                                                <div class="modal" id="CourseEdit<?php echo $rownum['courseid']; ?>">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Course</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body" id="add_admins">
                                                    <form  method="POST" class="w-100" enctype="multipart/form-data">
                                                    <div class="col-lg-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Course Name</label>
                                                        <input class="form-control" type="text" name="course_name" value="<?php echo $rownum['course_name']; ?>" placeholder="Enter Course Name" id="example-text-input">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Course Code</label>
                                                        <input class="form-control" type="text" name="course_code" value="<?php echo $rownum['course_code']; ?>" placeholder="Enter Course Code" id="example-text-input">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-address-input" class="form-label">Course Description</label>
                                                                    <textarea id="basicpill-address-input" name="description" class="form-control" rows="2" placeholder="Enter Course Description"><?php echo $rownum['description']; ?></textarea>
                                                                </div>
                                                            </div>
                                            
                                            <div class="mb-3">
                                             <label class="form-label fw-bold">Status</label>
                                                    <select class="form-select" aria-label="Default select example" name="status">
                                                            <option <?php if ($rownum['coursestatus']=="Active") { ?>selected="selected"<?php } ?> >Active</option>
                                                            <option <?php if ($rownum['coursestatus']=="Inactive") { ?>selected="selected"<?php } ?>>Inactive</option>
                                                      
                                                    </select>
                                            </div>
                                                                <div class="mb-3">
                                                                    <input type="file" name="photo" id="photo<?php echo $rownum['courseid']; ?>" class="form-control" onchange='readURL(this);' title="Please upload photo in jpg, jpeg or png format">
                                                                    <p class="help-block" style="color:#900;">*Only jpg, jpeg, and png files are allowed*<br/>Resolution - (350px*250px)</p>
                                                                    <img src='Courses/<?php echo $rownum['photo'] ?>' style="width:75px; height:50px;" id='userimg'/>
                                                                            <script>
                                                                                function readURL(input) {
                                                                                        if (input.files && input.files[0]) {
                                                                                            var reader = new FileReader();

                                                                                            reader.onload = function (e) {
                                                                                                
                                                                                                $('#userimg')
                                                                                                    .attr('src', e.target.result)
                                                                                                    .width(75)
                                                                                                    .height(50);
                                                                                            };

                                                                                            reader.readAsDataURL(input.files[0]);
                                                                                        }
                                                                                    }
                                                                            </script>
                                                                </div>
                                                                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                                            
                                                            
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer ">
                                                            <button type="submit" name="editcourse<?php echo $rownum['courseid']; ?>" id="addadmin_btn"class="btn btn-success ">Update</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <?php
                                        if(isset($_POST['editcourse'.$rownum['courseid']]))
                                        {
                                            $course_name=mysqli_real_escape_string($conn01,$_POST['course_name']);
                                            $course_code=$_POST['course_code'];
                                            $description=mysqli_real_escape_string($conn01,$_POST['description']);
                                            $status=$_POST['status'];
                                            $allowed = array("image/jpeg", "image/jpg", "image/png");
                                            $extension=explode("/",$_FILES['photo']['type']);
                                                if($_FILES['photo']['type']!=null)
                                                {
                                                $photo=$rownum['courseid'].".".$extension[1];
                                                $file_type=$_FILES['photo']['type'];
                                                }
                                                else if($_FILES['photo']['type']==null)
                                                {
                                                    $photo=$rownum['photo'];
                                                    $ext = explode(".",$rownum['photo']);
                                                    $file_type="image/".$ext[1];
                                                }
                                                if(in_array($file_type, $allowed)) {
                                            $upd =mysqli_query($conn01,"update courses set course_name='".$course_name."',course_code ='".$course_code."',description='".$description."', photo='".$photo."', status='".$status."' where courseid =".$rownum['courseid']." && createdby=".$row2['user_id']);
                                            if($upd)
                                            {
                                                if($_FILES['photo']['type']!=null)
                                                {
                                                move_uploaded_file($_FILES['photo']['tmp_name'],'Courses/'.$photo);
                                                }
                                                echo "<script>
                                                alert('Course updated successfully');
                                                document.location='admin_courses';
                                                </script>";
                                            }
                                            else
                                            {
                                                echo "<script>
                                                alert('Database Error');
                                                document.location='admin_courses';
                                                </script>";
                                            }
                                        }
                                        else
                                            {
                                                echo "<script>
                                                alert('Only jpg, jpeg, and png files are allowed.');
                                                document.location='admin_courses';
                                                </script>";
                                            }
                                        }
                                        ?>
                                        
                                        
                                        </td>
                                                <td><div class="d-flex justify-content-evenly flex-wrap gap-2 ">
                                            <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#CourseDelete<?php echo $rownum['courseid']; ?>">
                                            <i class="mdi mdi-trash-can  font-size-18 align-middle me-2"></i> Delete
                                            </button></div>
                                        
                                        <!-- The Modal -->
                                        <div class="modal" id="CourseDelete<?php echo $rownum['courseid']; ?>">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete Course</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            
                                                        <p><div class="alert alert-warning">Are you sure want to delete this Course?</p>
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer ">
                                                        <form method="post">
                                                        <input type="hidden" name="h1" value="<?php echo $rownum['courseid']?>"/>
                                                            <button type="submit" name="deletecourse<?php echo $rownum['courseid']; ?>" id="addadmin_btn"class="btn btn-success ">Yes</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        
                                            <?php
                                                if(isset($_POST['deletecourse'.$rownum['courseid']]))
                                                {
                                                    $courseid =$_POST['h1'];
                                        $del=mysqli_query($conn01,"delete from courses where courseid =".$courseid ."");
                                            if($del)
                                                    {
                                                        unlink("Courses/".$rownum['photo']);
                                                        echo "<script>
                                                                document.location='admin_courses';					
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
if(isset($_POST['addcourse']))
			{
                $course_name=$_POST['course_name'];
                $course_code=$_POST['course_code'];
                $description=mysqli_real_escape_string($conn01,$_POST['description']);
                $status=$_POST['status'];
                $file_type=$_FILES['photo']['type'];    
                    $allowed = array("image/jpeg", "image/jpg", "image/png");
                    if(in_array($file_type, $allowed)) {
                $ins=mysqli_query($conn01,"insert into courses(course_name,course_code,description,createdby,status)values('".$course_name."','".$course_code."','".$description."',".$row2['user_id'].",'".$status."')");
                if($ins)
				{
                    $sel1=mysqli_query($conn01,"select courseid from courses where course_name='".$course_name."'  &&  course_code='".$course_code."' && createdby=".$row2['user_id']." limit 1");
					$row1=mysqli_fetch_array($sel1);
                    $extension=explode("/",$_FILES['photo']['type']);
					$photo=$row1['courseid'].".".$extension[1];
                    mysqli_query($conn01,"update courses set photo='".$photo."' where courseid=".$row1['courseid']."");
					move_uploaded_file($_FILES['photo']['tmp_name'],'Courses/'.$photo);
					echo "<script>
					alert('Course added successfully');
					document.location='admin_courses';
					</script>";
				}
                else
				{
					echo "<script>
					alert('Database Error');
					document.location='admin_courses';
					</script>";
				}
            }
            else
				{
					echo "<script>
					alert('Only jpg, jpeg, and png files are allowed.');
					document.location='admin_courses';
					</script>";
				}
            }
            ?>