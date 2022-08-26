<?php
session_start();
if(isset($_POST['logout_btn']))
{
session_destroy();
unset($_SESSION['username']); // will delete just the name data
header('Location:login');
}
?>