<?php
// ########################UPDATE Admin###############
// if(isset($_POST["update_btn"]))
// {
//     if($_POST["editname1"] != '' )
        
        //echo '<script>alert("update")</script>';
        if(isset($_POST["update_btn"]))
        echo '<script>alert("posted")</script>';
    {
        include("includes/__dbconnect.php");
        echo '<script>alert("connected")</script>';
    

            
        $name = $_POST['editname1'];
        $email = $_POST['editemail01'];
        $pass = $_POST['editpass01'];
        $role1 = $_POST['editrole'];
        $adminstatus = $_POST['editadminstatus'];
        

        $query = "UPDATE userlogin SET emailid='$email', pass='$pass', role='$role1', admindetail=1, status='$adminstatus' WHERE username='$name'";
        echo '<script>alert("inserted")</script>';
        // $output .= '<label class="text-success">Data Inserted</label>';
        if(mysqli_query($conn01,$query))
        
        {echo '<script>alert("entered into db")</script>';
            header("location: admin_register.php");
            
        }
        
    }

 // ########################UPDATE Admin###############


?>  