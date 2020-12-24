<?php
  session_start();
  $id=$_GET['id'];
  include('../config.php');
 mysqli_query($con,"delete from diagnose where id='$id'");
 $_SESSION['xmsg']= '<span style="color:green;">'."Diagnose Data was successfully deleted".'</span>';
 header("location:diagnose.php");
?>