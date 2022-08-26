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
$c=mysqli_query($conn01,"select * from courses where courseid =".$_GET['courseid']." && createdby=".$row2['user_id']);
if(mysqli_num_rows($c)>0)
{
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
                        
                    <?php
                                        $course=mysqli_query($conn01,"select * from courses where courseid=".$_GET['courseid']);
                                        $coursedetails=mysqli_fetch_array($course);
                                        ?>
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Assign Customers in to <?php echo $coursedetails['course_name']?></h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="admindashboard">Home</a></li>
                                            <li class="breadcrumb-item active">Assign Courses</li>
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
        <div class="table-responsive mb-4">
        <?php
                                        $sel2=mysqli_query($conn01,"select user_id  from userlogin where username='".$_SESSION['username']."'");
                                        $row2=mysqli_fetch_array($sel2);
                                          $query_run="select userdetails.*,userlogin.* from userdetails,userlogin where userdetails.user_id=userlogin.user_id && userdetails.created_by=".$row2['user_id']." && userlogin.role='customer' && userlogin.status='Active'";
                                          $sql_query_run=mysqli_query($conn01,$query_run);
                                        ?>
                            <table id="datatable" class="table align-middle datatable  table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                <thead>
                                  <tr>
                                    <th scope="col" style="width: 50px;">
                                        <div class="form-check font-size-16">
                                            <input type="checkbox" name="allcustomers" class="form-check-input" value="checkall" id="checkAll">
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>
                                    </th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Qualification</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email ID</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                               if(mysqli_num_rows($sql_query_run) > 0)
                                               {
                                                   
                                                   while($rownum = mysqli_fetch_assoc($sql_query_run))
                                                   {
                                                    $us=mysqli_query($conn01,"select * from user_courses where course_id=".$_GET['courseid']." && user_id=".$rownum['user_id']);
                                                    if(mysqli_num_rows($us) == 0) 
                                                    {
                                               ?>
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check font-size-16">
                                                <input type="checkbox" class="form-check-input" id="contacusercheck1" name="userids[]" value="<?php echo $rownum['user_id']; ?>">
                                                <label class="form-check-label" for="contacusercheck1"></label>
                                            </div>
                                        </th>
                                        <td>
                                            <img src="Customers/<?php echo $rownum['photo']?>" alt="" class="avatar-sm rounded-circle me-2">
                                            <a href="#" class="text-body"><?php echo $rownum['name']; ?></a>
                                        </td>
                                        <td><?php echo $rownum['gender']; ?></td>
                                        <td><?php echo $rownum['qualifn']; ?></td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="tel:<?php echo $rownum['phone']; ?>" class="badge badge-soft-primary"><?php echo $rownum['phone']; ?></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="mailto:<?php echo $rownum['emailid']; ?>" class="badge badge-soft-primary"><?php echo $rownum['emailid']; ?></a>
                                            </div>
                                        </td>
                                    </tr>
                                                    

                                                        
                                                    <?php
                                                   }
                                                   }
                                                }
                                                ?>
                                                
                                    </tbody>
                            </table>
                            <!-- end table -->
                        </div>
                        <div class="mt-4">
                        <button type="submit" name="assignnow" class="btn btn-primary w-md">Assign Now</button>
                        </div>
                    </form>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    
                    <!-- start page title -->
                    <div class="row pt-3">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Total Customers assigned to <?php echo $coursedetails['course_name']?></h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    
     
                                <div class="table-responsive mb-4">
                                <?php
                                          $query="select userdetails.*,userlogin.* from userdetails,userlogin where userdetails.user_id=userlogin.user_id && userdetails.created_by=".$row2['user_id']." && userlogin.role='customer' && userlogin.status='Active'";
                                          $sql_query=mysqli_query($conn01,$query);
                                        ?>
                                <table id="datatable" class="table align-middle datatable  table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Qualification</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email ID</th>
                                    <th scope="col">Course Status</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                               if(mysqli_num_rows($sql_query) > 0)
                                               {
                                                    $i=1;
                                                   while($row = mysqli_fetch_assoc($sql_query))
                                                   {
                                                    $us=mysqli_query($conn01,"select * from user_courses where course_id=".$_GET['courseid']." && user_id=".$row['user_id']);

                                                    if(mysqli_num_rows($us) >0) 
                                                    {
                                                        $r = mysqli_fetch_array($us);
                                               ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td>
                                            <img src="Customers/<?php echo $row['photo']?>" alt="" class="avatar-sm rounded-circle me-2">
                                            <a href="#" class="text-body"><?php echo $row['name']; ?></a>
                                        </td>
                                        <td><?php echo $row['gender']; ?></td>
                                        <td><?php echo $row['qualifn']; ?></td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="tel:<?php echo $row['phone']; ?>" class="badge badge-soft-primary"><?php echo $row['phone']; ?></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="mailto:<?php echo $row['emailid']; ?>" class="badge badge-soft-primary"><?php echo $row['emailid']; ?></a>
                                            </div>
                                        </td>
                                        <td>
                                        <?php if($r['status']=="ongoing") { ?>
                                        <span class="text-danger"><i class="mdi mdi-bullseye-arrow me-3"></i>Ongoing</span>
                                        <?php } else if($r['status']=="completed") { ?>
                                        <span class="text-success"><i class="mdi mdi-check-all me-3"></i>Completed</span>
                                        <?php } ?>
                                        </td>
                                        <td><div class="d-flex flex-wrap">
                                            <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#DeleteCustomer<?php echo $r['join_id']; ?>" title="Delete <?php echo $row['name']; ?> from <?php echo $coursedetails['course_name']?>">
                                            <i class="mdi mdi-trash-can  font-size-18 align-middle me-2"></i> Delete
                                            </button></div>
                                        
                                        <!-- The Modal -->
                                        <div class="modal" id="DeleteCustomer<?php echo $r['join_id']; ?>">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete Customer from Course</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            
                                                        <p><div class="alert alert-warning">Are you sure want to delete this customer from <?php echo $coursedetails['course_name']?>?</p>
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer ">
                                                        <form method="post">
                                                        <input type="hidden" name="h1" value="<?php echo $r['join_id']?>"/>
                                                            <button type="submit" name="deletecustomer<?php echo $r['join_id']; ?>" id="addadmin_btn" class="btn btn-success ">Yes</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        
                                            <?php
                                                if(isset($_POST['deletecustomer'.$r['join_id']]))
                                                {
                                                    $join_id =$_POST['h1'];
                                        $del=mysqli_query($conn01,"delete from user_courses where join_id =".$join_id ."");
                                            if($del)
                                                    {
                                                        echo "<script>
                                                                document.location='assign_course_to_customers-".$_GET['courseid']."';					
                                                              </script>";
                                                        
                                                    }
                                                }
  ?>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        </td>
                                    </tr>
                                                    

                                                        
                                                    <?php
                                                   }
                                                   $i=$i+1;
                                                   }
                                                }
                                                ?>
                                                
                                    </tbody>
                            </table>
                            <!-- end table -->
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

//include 'includes/__adminmodal.php';
include 'includes/__settings.php';
include 'includes/__scripts.php';
?>



<?php
//include 'includes/__adminajax.php';
include 'includes/__footer.php';
?>
<?php
if(isset($_POST['assignnow']))
			{
                
                //$uids="hi";
                 if(@$_POST['allcustomers']!=null)
                 {
                    foreach ($_POST['userids'] as $id) {
                     
                        $ins =mysqli_query($conn01,"insert into user_courses(course_id,user_id,joined_date,status,created_by)values(".$_GET['courseid'].",".$id.",CURDATE(),'ongoing',".$row2['user_id'].")");
                            
                    }
                                                    
                 }
                 else if(@$_POST['userids']!=null)
                 {
                    foreach ($_POST['userids'] as $id) {
                     
                                                    $ins =mysqli_query($conn01,"insert into user_courses(course_id,user_id,joined_date,status,created_by)values(".$_GET['courseid'].",".$id.",CURDATE(),'ongoing',".$row2['user_id'].")");
                                                        
                                                }
                  }
                if($ins)
				{
					echo "<script>
					alert('Assigned successfully');
					document.location='assign_course_to_customers-".$_GET['courseid']."';
					</script>";
				}
                else
				{
					echo "<script>
					alert('Customers not available for this course');
					document.location='assign_course_to_customers-".$_GET['courseid']."';
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