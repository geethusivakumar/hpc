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
                                    <h4 class="mb-sm-0 font-size-18">Customers</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="admindashboard">Home</a></li>
                                            <li class="breadcrumb-item active">Customers</li>
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
                                    <button type="button" class="btn btn-danger w-lg waves-effect waves-light add_btn" data-bs-toggle="modal" data-bs-target="#AddAdmin" >Add Customer</button>


                        <!-- The Modal -->
                        <div class="modal" id="AddAdmin">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Customer Profile</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body" id="add_admins">
                                <form  method="POST" class="w-100" enctype="multipart/form-data">
                                            <div class="col-lg-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Name</label>
                                                        <input class="form-control" type="text" name="name" placeholder="Enter Customer Name" id="example-text-input" required>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                            <div class="mb-3">
                                             <label class="form-label fw-bold">Gender</label>
                                            <select class="form-select" aria-label="Default select example" name="gender">
                                                      <option value="Male" selected >Male</option>
                                                      <option value="Female">Female</option>
                                                      
                                                    </select>
                                            </div>
                                            </div>
                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-address-input" class="form-label">Address</label>
                                                                    <textarea id="basicpill-address-input" name="address" class="form-control" rows="2" placeholder="Enter Customer's Address"></textarea>
                                                                </div>
                                                            </div>
                                            
                                             <div class="col-lg-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Qualification</label>
                                                        <input class="form-control" type="text" name="qualifn" placeholder="Enter Customer's Qualification" id="example-text-input" required>
                                                    </div>
                                                    
                                                </div>
                                            </div>                
                                            <div class="col-lg-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Contact Number</label>
                                                        <input class="form-control" type="text" name="phone" placeholder="Enter Customer's Contact Number" id="example-text-input" required>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Email ID</label>
                                                        <input class="form-control" type="email" name="emailid" placeholder="Enter Customer's Email ID" id="example-text-input" required>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Username</label>
                                                        <input class="form-control" type="text" name="username" placeholder="Enter Customer's Username" id="example-text-input" required>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Password</label>
                                                        <input class="form-control" type="password"  name="passw" placeholder="Enter Password" id="example-text-input" required>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Confirm Password</label>
                                                        <input class="form-control" type="password"  name="cpassw" placeholder="Re-enter Password" id="example-text-input" required>
                                                    </div>
                                                    
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
                                            <p class="help-block" style="color:#900;">*Only jpg, jpeg, and png files are allowed*<br/>Resolution - (250px*250px)</p>
                                        </div>
                                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                    
                                    
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer ">
                                    <button type="submit" name="addcustomer" id="addadmin_btn"class="btn btn-success ">Add</button>
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
                                          $query_run="select userdetails.*,userlogin.* from userdetails,userlogin where userdetails.user_id=userlogin.user_id && userdetails.created_by=".$row2['user_id']." && userlogin.role='customer'";
                                          $sql_query_run=mysqli_query($conn01,$query_run);
                                        ?>
        
                                        <table id="datatable" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Qualification</th>
                                                <th>Username</th>
                                                <th>Email ID</th>
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
                                                <td><?php echo $rownum['name']; ?></td>
                                                <td><?php echo $rownum['gender']; ?></td>
                                                <td><?php echo $rownum['address']; ?></td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <a href="tel:<?php echo $rownum['phone']; ?>" class="badge badge-soft-primary"><?php echo $rownum['phone']; ?></a>
                                                    </div>
                                                </td>
                                                <td><?php echo $rownum['qualifn']; ?></td>
                                                <td><?php echo $rownum['username']; ?></td>
                                                <td><div class="d-flex gap-2">
                                                <a href="mailto:<?php echo $rownum['emailid']; ?>" class="badge badge-soft-primary"><?php echo $rownum['emailid']; ?></a>
                                                </div></td>
                                                <td><?php echo "<img src='Customers/".$rownum['photo']."'  style='width:50px; height:50px;'/>"; ?></td>
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
                                                
                                                
                                            <button class="btn btn-success waves-effect waves-light edit_btn" data-bs-toggle="modal" data-bs-target="#CustomerEdit<?php echo $rownum['user_id']; ?>">
                                            <i class="mdi mdi-pencil  font-size-18 align-middle me-2"></i>Edit</button>
                                            
                                            </div>
                                            <!-- The Modal -->
                                                <div class="modal" id="CustomerEdit<?php echo $rownum['user_id']; ?>">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Customer Profile</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body" id="add_admins">
                                                    <form  method="POST" class="w-100" enctype="multipart/form-data">
                                                    <div class="col-lg-12">
                                                    <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Name</label>
                                                        <input class="form-control" type="text" name="name" value="<?php echo $rownum['name']; ?>" placeholder="Enter Customer Name" id="example-text-input">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                            <div class="mb-3">
                                             <label class="form-label fw-bold">Gender</label>
                                            <select class="form-select" aria-label="Default select example" name="gender">
                                                                            <option <?php if ($rownum['gender']=="Male") { ?>selected="selected"<?php } ?> >Male</option>
                                                                            <option <?php if ($rownum['gender']=="Female") { ?>selected="selected"<?php } ?>>Female</option>
                                                      
                                                    </select>
                                            </div>
                                            </div>
                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-address-input" class="form-label">Address</label>
                                                                    <textarea id="basicpill-address-input" name="address" class="form-control" rows="2" placeholder="Enter Customer's Address"><?php echo $rownum['address']; ?></textarea>
                                                                </div>
                                                            </div>
                                            
                                             <div class="col-lg-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Qualification</label>
                                                        <input class="form-control" type="text" name="qualifn" value="<?php echo $rownum['qualifn']; ?>"  placeholder="Enter Customer's Qualification" id="example-text-input">
                                                    </div>
                                                    
                                                </div>
                                            </div>                
                                            <div class="col-lg-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Contact Number</label>
                                                        <input class="form-control" type="text" name="phone" value="<?php echo $rownum['phone']; ?>"   placeholder="Enter Customer's Contact Number" id="example-text-input">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Email ID</label>
                                                        <input class="form-control" type="text" name="emailid" value="<?php echo $rownum['emailid']; ?>"   placeholder="Enter Customer's Email ID" id="example-text-input">
                                                    </div>
                                                    
                                                </div>
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
                                                                    <img src='Customers/<?php echo $rownum['photo'] ?>' style="width:50px; height:50px;" id='userimg'/>
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
                                                            <button type="submit" name="editcustomer<?php echo $rownum['user_id']; ?>" id="addadmin_btn"class="btn btn-success ">Update</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <?php
                                        if(isset($_POST['editcustomer'.$rownum['user_id']]))
                                        {
                                            $name=$_POST['name'];
                                            $gender=$_POST['gender'];
                                            $address=$_POST['address'];
                                            $qualifn=$_POST['qualifn'];
                                            $phone=$_POST['phone'];
                                            $emailid=$_POST['emailid'];
                                            $status=$_POST['status'];
                                            $allowed = array("image/jpeg", "image/jpg", "image/png");
                                            $extension=explode("/",$_FILES['photo']['type']);
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
                                            $upd =mysqli_query($conn01,"update userlogin set emailid='".$emailid."',status='".$status."' where user_id =".$rownum['user_id']);
                                            if($upd)
                                            {
                                                mysqli_query($conn01,"update userdetails set name='".$name."',gender='".$gender."',address='".$address."',phone='".$phone."',qualifn='".$qualifn."',photo='".$photo."' where created_by=".$row2['user_id']." && userdetails.user_id=".$rownum['user_id']);
                                                if($_FILES['photo']['type']!=null)
                                                {
                                                move_uploaded_file($_FILES['photo']['tmp_name'],'Customers/'.$photo);
                                                }
                                                echo "<script>
                                                alert('Customer updated successfully');
                                                document.location='admin_customers';
                                                </script>";
                                            }
                                            else
                                            {
                                                echo "<script>
                                                alert('Database Error');
                                                document.location='admin_customers';
                                                </script>";
                                            }
                                        }
                                        else {
                                        echo "<script>
                                            alert('Only jpg, jpeg, and png files are allowed.');
                                            document.location='admin_customers';
                                            </script>";
                                        }
                                        }
                                        ?>
                                        
                                        
                                        </td>
                                                <td><div class="d-flex justify-content-evenly flex-wrap gap-2 ">
                                            <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#CustomerDelete<?php echo $rownum['user_id']; ?>">
                                            <i class="mdi mdi-trash-can  font-size-18 align-middle me-2"></i> Delete
                                            </button></div>
                                        
                                        <!-- The Modal -->
                                        <div class="modal" id="CustomerDelete<?php echo $rownum['user_id']; ?>">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete Customer Profile</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            
                                                        <p><div class="alert alert-warning">Are you sure want to delete this Customer?</p>
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer ">
                                                        <form method="post">
                                                        <input type="hidden" name="h1" value="<?php echo $rownum['user_id']?>"/>
                                                            <button type="submit" name="deleteemp<?php echo $rownum['user_id']; ?>" id="addadmin_btn"class="btn btn-success ">Yes</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        
                                            <?php
                                                if(isset($_POST['deleteemp'.$rownum['user_id']]))
                                                {
                                                    $user_id =$_POST['h1'];
                                        $del=mysqli_query($conn01,"delete from userlogin where user_id =".$user_id ."");
                                            if($del)
                                                    {
                                                        mysqli_query($conn01,"delete from userdetails where user_id =".$user_id ."");
                                                        unlink("Customers/".$rownum['photo']);
                                                        echo "<script>
                                                                document.location='admin_customers';					
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
if(isset($_POST['addcustomer']))
			{
                $name=$_POST['name'];
                $gender=$_POST['gender'];
                $address=$_POST['address'];
                $qualifn=$_POST['qualifn'];
                $phone=$_POST['phone'];
				$username=$_POST['username'];
				$emailid=$_POST['emailid'];
				$passw=$_POST['passw'];
                $status=$_POST['status'];
                $sel=mysqli_query($conn01,"select * from userlogin where emailid='".$emailid."'");
                if(mysqli_num_rows($sel)==0)
                {
                    $file_type=$_FILES['photo']['type'];    
                    $allowed = array("image/jpeg", "image/jpg", "image/png");
                    if(in_array($file_type, $allowed)) {
                $ins =mysqli_query($conn01,"insert into userlogin(username,emailid,pass,role,status)values('".$username."','".$emailid."','".$passw."','customer','".$status."')");
                if($ins)
				{
                    $sel1=mysqli_query($conn01,"select user_id  from userlogin where username='".$username."'  &&  emailid='".$emailid."'  && status='".$status."' && role='customer'");
					$row1=mysqli_fetch_array($sel1);
                    // $sel2=mysqli_query($conn01,"select user_id  from userlogin where username='".$_SESSION['username']."'");
					// $row2=mysqli_fetch_array($sel2);
                    $extension=explode("/",$_FILES['photo']['type']);
					$photo=$row1['user_id'].".".$extension[1];
                    mysqli_query($conn01,"insert into userdetails(user_id,name,gender,address,phone,qualifn,photo,created_by)values(".$row1['user_id'].",'".$name."','".$gender."','".$address."','".$phone."','".$qualifn."','".$photo."',".$row2['user_id'].")");
					move_uploaded_file($_FILES['photo']['tmp_name'],'Customers/'.$photo);
					echo "<script>
					alert('Customer added successfully');
					document.location='admin_customers';
					</script>";
				}
                else
				{
					echo "<script>
					alert('Database Error');
					document.location='admin_customers';
					</script>";
				}
            }
            else
				{
					echo "<script>
					alert('Only jpg, jpeg, and png files are allowed.');
					document.location='admin_customers';
					</script>";
				}
            }
                else
            {
                echo "<script>
                alert('User with this email id (".$emailid.") exists. Please choose another email id');
                document.location='admin_customers';
                </script>";
            }
            }
            ?>