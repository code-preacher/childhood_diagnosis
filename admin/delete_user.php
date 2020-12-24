<?php
  session_start();
  $id=$_GET['id'];
  $email=$_GET['email'];
  include('../config.php');
 mysqli_query($con,"delete from user_login where id='$id'");
 mysqli_query($con,"delete from suggestion where sender='$email'");
 $_SESSION['dtmsg']= '<span style="color:green;">'."User was successfully deleted".'</span>';
 header("location:view_user.php");
?>