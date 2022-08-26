<?php
session_start();
if(!$_SESSION['username'])
{
    header('Location:login.php');
    session_destroy();
}
include 'includes/__dbconnect.php';
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
                                    <h4 class="mb-sm-0 font-size-18">Administrators</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="sadashboard">Home</a></li>
                                            <li class="breadcrumb-item active">Administrators</li>
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
                                    <button type="button" class="btn btn-danger w-lg waves-effect waves-light add_btn" data-bs-toggle="modal" data-bs-target="#AddAdmin" >Add Admin</button>


                        <!-- The Modal -->
                        <div class="modal" id="AddAdmin">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Admin Profile</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body" id="add_admins">
                                <form  method="POST" class="w-100" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="addname1" class="form-label fw-bold">Name</label>
                                            <input type="text" name="name" id="addname1" class="form-control"  placeholder="Name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="addname1" class="form-label fw-bold">Username</label>
                                            <input type="text" name="username" id="addnusr" class="form-control" placeholder="Name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="addemail01" class="form-label fw-bold">Email ID</label>
                                            <input type="email" name="emailid" id="addemail01" class="form-control" placeholder="Email address" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="addpass01" class="form-label fw-bold">Password</label>
                                            <input type="password" name="passw" id="addpass01" class="form-control"  placeholder="Password" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="addpass01" class="form-label fw-bold">Confirm Password</label>
                                            <input type="password" name="cpassw" id="addpass01" class="form-control"  placeholder="Password" required>
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
                                            <p class="help-block" style="color:#900;">*Only jpg, jpeg, and png files are allowed*<br/>Resolution - (250px*250px)</p>
                                        </div>
                                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                    
                                    
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer ">
                                    <button type="submit" name="addadmin" id="addadmin_btn"class="btn btn-success ">Add</button>
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
                                          $query_run="select admin_details.admin_id,admin_details.name,admin_details.photo,userlogin.* from admin_details,userlogin where admin_details.user_id=userlogin.user_id";
                                          $sql_query_run=mysqli_query($conn01,$query_run);
                                        ?>
        
                                        <table id="datatable" class="table table-bordered nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Email ID</th>
                                                <th>Photo</th>
                                                <th>Status</th>
                                                <th class="sort_del1">Action</th>
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
                                                <td><?php echo $rownum['name']; ?></td>
                                                <td><?php echo $rownum['username']; ?></td>
                                                <td><div class="d-flex gap-2">
                                                <a href="mailto:<?php echo $rownum['emailid']; ?>" class="badge badge-soft-primary"><?php echo $rownum['emailid']; ?></a>
                                                </div></td>
                                                <td><?php echo "<img src='Admin/".$rownum['photo']."'  style='width:50px; height:50px;'/>"; ?></td>
                                                <td>
                                                <?php if($rownum['status']=="Active") { ?>
                                                <div class="px-1 mb-0 text-center" role="alert">
                                                    <i class="mdi mdi-check-all d-block fs-3 mt-1 mb-1 text-success"></i>
                                                    <h5 class="text-success fs-6"><?php echo $rownum['status']; ?></h5>
                                                </div>
                                                <?php } else if($rownum['status']=="Inactive") { ?>
                                                <div class="px-1 mb-0 text-center" role="alert">
                                                    <i class="mdi mdi-block-helper d-block fs-3 mt-1 mb-1 text-danger"></i>
                                                    <h5 class="text-danger fs-6"><?php echo $rownum['status']; ?></h5>
                                                </div>
                                                <?php 
                                                } 
                                                ?>
                                                </td>
                                                <td >
                                            <div class="d-flex justify-content-evenly flex-wrap gap-2">
                                                
                                                
                                            <button class="btn btn-success waves-effect waves-light edit_btn" data-bs-toggle="modal" data-bs-target="#AdminEdit<?php echo $rownum['user_id']; ?>">
                                            <i class="mdi mdi-pencil  font-size-18 align-middle me-2"></i>Edit</button>
                                            
                                            </div>
                                            <!-- The Modal -->
                                                <div class="modal" id="AdminEdit<?php echo $rownum['user_id']; ?>">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Admin Profile</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body" id="add_admins">
                                                        <form  method="POST" class="w-100" enctype="multipart/form-data">
                                                                <div class="mb-3">
                                                                    <label for="addname1" class="form-label fw-bold">Name</label>
                                                                    <input type="text" name="name" id="addname1" class="form-control" value="<?php echo $rownum['name']; ?>"  placeholder="Name">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="addname1" class="form-label fw-bold">Username</label>
                                                                    <input type="text" name="username" id="addusr" value="<?php echo $rownum['username']; ?>" class="form-control" placeholder="Name">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="addpass01" class="form-label fw-bold">Password</label>
                                                                    <div class=" input-group auth-pass-inputgroup">
                                                                    <input type="password" name="passw" id="pssw<?php echo $rownum['user_id']; ?>" class="form-control" value="<?php echo $rownum['pass']; ?>" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                                                    <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon" onclick="clickhere<?php echo $rownum['user_id']; ?>()"><i class="mdi mdi-eye-outline"></i></button>
                                                                    </div>
                                                                    <script>
                                                                        function clickhere<?php echo $rownum['user_id']; ?>()
                                                                        {
                                                                            if(document.getElementById("pssw<?php echo $rownum['user_id']; ?>").type=="password")
                                                                            {
                                                                                document.getElementById("pssw<?php echo $rownum['user_id']; ?>").type="text";
                                                                            }
                                                                            else if(document.getElementById("pssw<?php echo $rownum['user_id']; ?>").type=="text")
                                                                            {
                                                                                document.getElementById("pssw<?php echo $rownum['user_id']; ?>").type="password";
                                                                            }
                                                                        }
                                                                    </script>
                                                                    





                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="addemail01" class="form-label fw-bold">Email ID</label>
                                                                    <input type="email" name="emailid" id="addemail01" value="<?php echo $rownum['emailid']; ?>" class="form-control" placeholder="Email address">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label fw-bold">Status</label>
                                                                    <select class="form-select" aria-label="Default select example" name="status">
                                                                            <option <?php if ($rownum['status']=="Active") { ?>selected="selected"<?php } ?> >Active</option>
                                                                            <option <?php if ($rownum['status']=="Inactive") { ?>selected="selected"<?php } ?>>Inactive</option>
                                                                            
                                                                            </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <input type="file" name="photo" id="photo<?php echo $rownum['user_id']; ?>" class="form-control" onchange='readURL(this);' title="Please upload photo in jpg, jpeg or png format">
                                                                    <p class="help-block" style="color:#900;">*Only jpg, jpeg, and png files are allowed*<br/>Resolution - (250px*250px)</p>
                                                                    <img src='Admin/<?php echo $rownum['photo'] ?>' style="width:50px; height:50px;" id='userimg'/>
                                                                            <script>
                                                                                function readURL(input) {
                                                                                        if (input.files && input.files[0]) {
                                                                                            var reader = new FileReader();

                                                                                            reader.onload = function (e) {
                                                                                                
                                                                                                $('#userimg')
                                                                                                    .attr('src', e.target.result)
                                                                                                    .width(50)
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
                                                            <button type="submit" name="editadmin<?php echo $rownum['user_id']; ?>" id="addadmin_btn"class="btn btn-success ">Update</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                                <?php
                                        if(isset($_POST['editadmin'.$rownum['user_id']]))
                                        {
                                            $name=$_POST['name'];
                                            $emailid=$_POST['emailid'];
                                            $username=$_POST['username'];
                                            $pass=$_POST['passw'];
                                            $status=$_POST['status'];
                                            $extension=explode("/",$_FILES['photo']['type']);
                                            $allowed = array("image/jpeg", "image/jpg", "image/png");
                                            
                                            
                                                if($_FILES['photo']['type']!=null)
                                                {
                                                $photo=$rownum['user_id'].".".$extension[1];
                                                $file_type=$_FILES['photo']['type'];   
                                                }
                                                else if($_FILES['photo']['type']==null)
                                                {
                                                    $photo=$rownum['photo'];
                                                    $ext = explode(".",$rownum['photo']);
                                                    $file_type="image/".$ext[1];
                                                }
                                                if(in_array($file_type, $allowed)) {
                                            $upd =mysqli_query($conn01,"update userlogin set emailid='".$emailid."',username='".$username."',pass='".$pass."',status='".$status."' where user_id =".$rownum['user_id']);
                                            if($upd)
                                            {
                                                mysqli_query($conn01,"update admin_details set name='".$name."',photo='".$photo."' where user_id =".$rownum['user_id']);
                                                if($_FILES['photo']['type']!=null)
                                                {
                                                move_uploaded_file($_FILES['photo']['tmp_name'],'Admin/'.$photo);
                                                }
                                                echo "<script>
                                                alert('Administrator updated successfully');
                                                document.location='sadashboard';
                                                </script>";
                                            }
                                            else
                                            {
                                                echo "<script>
                                                alert('Database Error');
                                                document.location='sadashboard';
                                                </script>";
                                            }
                                        }
                                        else {
                                        echo "<script>
                                            alert('Only jpg, jpeg, and png files are allowed.');
                                            document.location='sadashboard';
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
if(isset($_POST['addadmin']))
			{
                $name=$_POST['name'];
				$username=$_POST['username'];
				$emailid=$_POST['emailid'];
				$passw=$_POST['passw'];
                $status=$_POST['status'];
                $sel=mysqli_query($conn01,"select * from userlogin where emailid='".$emailid."'");
                if(mysqli_num_rows($sel)==0)
                {
                    $adm=mysqli_query($conn01,"select * from userlogin where role='admin'");
                    $admin_no=mysqli_num_rows($adm);
                    if($admin_no<=10)
                    {
                    $file_type=$_FILES['photo']['type'];    
                    $allowed = array("image/jpeg", "image/jpg", "image/png");
                    if(in_array($file_type, $allowed)) {
                $ins =mysqli_query($conn01,"insert into userlogin(username,emailid,pass,role,status)values('".$username."','".$emailid."','".$passw."','admin','".$status."')");
                if($ins)
				{
                    $sel1=mysqli_query($conn01,"select user_id  from userlogin where username='".$username."'  &&  emailid='".$emailid."'  && status='".$status."'");
					$row1=mysqli_fetch_array($sel1);
                    $extension=explode("/",$_FILES['photo']['type']);
					$photo=$row1['user_id'].".".$extension[1];
                    mysqli_query($conn01,"insert into admin_details(user_id,name,photo)values(".$row1['user_id'].",'".$name."','".$photo."')");
					move_uploaded_file($_FILES['photo']['tmp_name'],'Admin/'.$photo);
					echo "<script>
					alert('Administrator added successfully');
					document.location='sadashboard';
					</script>";
				}
                else
				{
					echo "<script>
					alert('Database Error');
					document.location='sadashboard';
					</script>";
				}
            }
            else
				{
					echo "<script>
					alert('Only jpg, jpeg, and png files are allowed.');
					document.location='sadashboard';
					</script>";
				}
            }
            else
            {
                echo "<script>
                alert('Maximum number of Admin is 10. You can\'t add new Admin');
                document.location='sadashboard';
                </script>";
            }
                }
                else
                {
                    echo "<script>
					alert('User with this email id (".$emailid.") exists. Please choose another email id');
					document.location='sadashboard';
					</script>";
                }
            }
            ?>