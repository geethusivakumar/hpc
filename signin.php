<?php 
session_start();
include("includes/__dbconnect.php");
if(isset($_POST['submit']))
{
    $usename=$_POST['userval'];
    $passvalue=$_POST['passval'];
    $query2 = "SELECT * FROM userlogin where username='$usename' && pass='$passvalue' && status='Active'";
    
    $sql_query1 = mysqli_query($conn01,$query2);
    $usertype=mysqli_fetch_array($sql_query1);

    if($usertype['role']=="superadmin")
    {
        $_SESSION['username']=$usertype['username'];
        header('Location:sadashboard');
    }
    else if($usertype['role']=="admin")
    {
        $_SESSION['username']=$usertype['username'];
        header('Location:admindashboard');
    }
    else if($usertype['role']=="employee")
    {
        $_SESSION['username']=$usertype['username'];
        header('Location:employeedashboard');
    }
    else if($usertype['role']=="customer")
    {
        $_SESSION['username']=$usertype['username'];
        header('Location:customerdashboard');
    }
    else
    {   
        
        $_SESSION['status']='Username or Password is Invalid';
        header('Location:login');
    }
}
?>